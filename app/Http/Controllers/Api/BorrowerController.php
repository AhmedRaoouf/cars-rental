<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CarResource;
use App\Http\Resources\FilterCarResource;
use App\Http\Resources\RentResource;
use App\Models\activation;
use App\Models\Borrower_Rental_Images;
use App\Models\Car;
use App\Models\Car_Model;
use App\Models\Car_User;
use App\Models\Color;
use App\Models\Plan;
use App\Models\Payment;
use App\Models\Role;
use App\Models\Structure;
use App\Models\Transmisstion;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;


class BorrowerController extends Controller
{
    public function borroweractive(Request $request)
    {
        $access_token = $request->header('Authorization');
        $user = User::where('access_token', "=", $access_token)->first();

        $activate = activation::where('user_id', $user->id)->exists();

        if ($activate) {
            return response()->json([
                "status" => false,
                'message' => "Your files have been already sent. Wait for an email when the account is activated"
            ]);
        } else {

            $validator = Validator::make($request->all(), [
                "personal_identity_image" => ["required", "image"],
                "license_image" => ["required", "image"],
            ]);
            if ($validator->fails()) {
                return response()->json([
                    "status" => false,
                    "message" => $validator->errors()->all()
                ]);
            }


            $personal_identity_image = $request->file('personal_identity_image');
            $personal_identity_filename = $personal_identity_image->getClientOriginalName();
            $personal_identity_image2 = pathinfo($personal_identity_filename, PATHINFO_FILENAME);
            $personal_identity_image_ext = $personal_identity_image->getClientOriginalExtension();
            $personal_identity_image_filename = $personal_identity_image2 . time() . '.' . $personal_identity_image_ext;
            $personal_identity_image->move('uploads/borrower_activation/', $personal_identity_image_filename);

            $license_image = $request->file('license_image');
            $license_filename = $license_image->getClientOriginalName();
            $license_image2 = pathinfo($license_filename, PATHINFO_FILENAME);
            $license_image_ext = $license_image->getClientOriginalExtension();
            $license_image_filename = $license_image2 . time() . '.' . $license_image_ext;
            $license_image->move('uploads/borrower_activation/', $license_image_filename);



            $active = activation::create([
                "user_id" => $user->id,
                "personal_identity_image" => $personal_identity_image_filename,
                "license_image" => $license_image_filename,
            ]);

            if ($active) {
                return response()->json([
                    "status" => true,
                    'message' => "Your files have been sent successfully. Wait for an email when the account is activated"
                ]);
            }
        }
    }

    public function all(Request $request)
    {
        $access_token = $request->header('Authorization');
        $user = User::where('access_token', "=", $access_token)->first();
        $cars = Car::where('user_id', '!=',$user->id)->get();
        return FilterCarResource::collection($cars);
    }

    // FILTER CARS
    public function filter(Request $request)
    {
        $access_token = $request->header('Authorization');
        $user = User::where('access_token', "=", $access_token)->first();

        $query = Car::query();

        if ($request->all() !== []) {

            // Apply sorting if requested
            if ($request->has('sort_by')) {
                $sortBy = $request->get('sort_by');
                if ($sortBy === 'low_to_high') {
                    $query->orderBy('daily_price', 'asc');
                } else if ($sortBy === 'high_to_low') {
                    $query->orderBy('daily_price', 'desc');
                }
            }

            // Apply driver if requested
            if ($request->has('driver')) {
                $driver = $request->get('driver');
                if ($driver === 'With') {
                    $query->where('driver', 'With');
                } else if ($driver === 'Without') {
                    $query->where('driver', 'Without');
                }
            }


            // Apply deliver if requested
            if ($request->has('deliver')) {
                $deliver = $request->get('deliver');
                if ($deliver === 'true') {
                    $query->where('deliver', 'true');
                } else if ($deliver === 'false') {
                    $query->where('deliver', 'false');
                }
            }

            // Check if price filter is set
            if ($request->has('min_price') and $request->has('max_price')) {
                $query->whereBetween('daily_price', [$request->get('min_price'), $request->get('max_price')]);
            } elseif ($request->has('min_price')) {
                return response()->json([
                    "status" => false,
                    "message" => "You must also determine max price"
                ]);
            } elseif ($request->has('max_price')) {
                return response()->json([
                    "status" => false,
                    "message" => "You must also determine min price"
                ]);
            }

            // Check if type filter is set
            if ($request->has('type')) {
                $body_type_id = Structure::where('name', $request->get('type'))->first()['id'] ?? 0;
                $query->where('body_type_id', $body_type_id);
            }


            // // Check if model filter is set
            if ($request->has('model')) {
                $model_id = Car_Model::where('model', $request->get('model'))->first()['id'] ?? 0;
                $query->where('model_id', $model_id);
            }

            // // Check if year filter is set
            if ($request->has('min_year') and $request->has('max_year')) {
                $query->whereBetween('year', [$request->get('min_year'), $request->get('max_year')]);
            } elseif ($request->has('min_year')) {
                return response()->json([
                    "status" => false,
                    "message" => "You must also determine max year"
                ]);
            } elseif ($request->has('max_year')) {
                return response()->json([
                    "status" => false,
                    "message" => "You must also determine min year"
                ]);
            }

            // // Check if gearbox filter is set
            if ($request->has('transmission')) {
                $transmission_id = Transmisstion::where('name', $request->get('transmission'))->first()['id'] ?? 0;
                $query->where('transmission_id', $transmission_id);
            }

            // // Check if number_of_seats filter is set
            if ($request->has('number_of_seats')) {
                $query->where('number_of_seats', $request->get('number_of_seats'));
            }

            // // Check if color filter is set
            if ($request->has('color')) {
                $color_id = Color::where('name', $request->get('color'))->first()['id'] ?? 0;
                $query->where('color_id', $color_id);
            }

            $query->where('status', 'available');
            $query->where('user_id', '!=',$user->id);

            // Fetch the filtered cars and return the results
            $cars = $query->get();

            if (count($cars) !== 0) {
                return FilterCarResource::collection($cars);
            } else {
                return response()->json([
                    "status" => false,
                    "message" => "No Results Found"
                ]);
            }
        } else {
            return response()->json([
                "status" => false,
                "message" => "Request is empty"
            ]);
        }
    }

    public function search(Request $request)
    {
        $access_token = $request->header('Authorization');
        $user = User::where('access_token', "=", $access_token)->first();

        $validator = Validator::make($request->all(), [
            "plan" => ["exists:plans,id"],
        ]);

        if ($validator->fails()) {
            return response()->json([
                "status" => false,
                "message" => $validator->errors()->all()
            ]);
        }

        $plan = $request->input('plan');

        $query = Car::query();


        if ($request->plan == 1) {

            $validator = Validator::make($request->all(), [
                "latitude" => ["numeric"],
                "longitude" => ["numeric"],
                "min_distance" => ["integer", "min:0"],
                "max_distance" => ["integer", "max:140"],
                "From_days" => ["integer"],
                "To_days" => ["integer"]
            ]);

            if ($validator->fails()) {
                return response()->json([
                    "status" => false,
                    "message" => $validator->errors()->all()
                ]);
            }

            $query->where('plan_id', 1);

            $latitude = $request->get('latitude');
            $longitude = $request->get('longitude');
            $min_distance = $request->get('min_distance');
            $max_distance = $request->get('max_distance');

            $from = $request->get('From_days');
            $to = $request->get('To_days');


            if ($request->has('latitude') and $request->has('longitude')) {
                $query->selectRaw('(6371 * acos(cos(radians(?)) * cos(radians(latitude)) * cos(radians(longitude) - radians(?)) + sin(radians(?)) * sin(radians(latitude)))) AS distance', [$latitude, $longitude, $latitude])
                    ->orderBy('distance')->select('*');
            }

            if ($request->has('min_distance') and $request->has('max_distance')) {
                $query->whereBetween('distance', [$min_distance, $max_distance]);
            }

            if ($request->has('From_days') and $request->has('To_days')) {
                $query->whereBetween('duration', [$from, $to]);
            }


            $query->where('user_id', '!=',$user->id);

            $cars = $query->get();
            if (count($cars) != 0) {
                return FilterCarResource::collection($cars);
            } else {
                return response()->json([
                    'message' => "Not Found"
                ]);
            }
        } elseif ($request->plan == 2) {
            $validator = Validator::make($request->all(), [
                "latitude" => ["numeric"],
                "longitude" => ["numeric"],
                "From_month" => ["integer"],
                "To_month" => ["integer"]
            ]);

            if ($validator->fails()) {
                return response()->json([
                    "status" => false,
                    "message" => $validator->errors()->all()
                ]);
            }

            $query->where('plan_id', 2);

            $latitude = $request->get('latitude');
            $longitude = $request->get('longitude');
            $from = $request->get('From_month');
            $to = $request->get('To_month');


            if ($request->has('latitude') and $request->has('longitude')) {
                $query->selectRaw('(6371 * acos(cos(radians(?)) * cos(radians(latitude)) * cos(radians(longitude) - radians(?)) + sin(radians(?)) * sin(radians(latitude)))) AS distance', [$latitude, $longitude, $latitude])
                    ->orderBy('distance')->select('*');
            }


            if ($request->has('From_month') and $request->has('To_month')) {
                $query->whereBetween('duration', [$from, $to]);
            }

            $cars = $query->get();
            if (count($cars) != 0) {
                return FilterCarResource::collection($cars);
            } else {
                return response()->json([
                    'message' => "Not Found"
                ]);
            }
        } elseif ($request->plan == 3) {
            $validator = Validator::make($request->all(), [
                "latitude" => ["numeric"],
                "longitude" => ["numeric"],
                "From_year" => ["integer"],
                "To_year" => ["integer"]
            ]);

            if ($validator->fails()) {
                return response()->json([
                    "status" => false,
                    "message" => $validator->errors()->all()
                ]);
            }


            $query->where('plan_id', 3);

            $latitude = $request->get('latitude');
            $longitude = $request->get('longitude');
            $from = $request->get('From_year');
            $to = $request->get('To_year');


            if ($request->has('latitude') and $request->has('longitude')) {
                $query->selectRaw('(6371 * acos(cos(radians(?)) * cos(radians(latitude)) * cos(radians(longitude) - radians(?)) + sin(radians(?)) * sin(radians(latitude)))) AS distance', [$latitude, $longitude, $latitude])
                    ->orderBy('distance')->select('*');
            }


            if ($request->has('From_year') and $request->has('To_year')) {
                $query->whereBetween('duration', [$from, $to]);
            }

            $cars = $query->get();

            if (count($cars) != 0) {
                return FilterCarResource::collection($cars);
            } else {
                return response()->json([
                    'message' => "Not Found"
                ]);
            }
        }
    }



    public function send(Request $request, $car_id)
    {

        $access_token = $request->header('Authorization');
        $user = User::where('access_token', "=", $access_token)->first();
        $car = Car::findOrNew($car_id);


        if ($car->exists) 
        {
            $check = Car_User::where('user_id', $user->id)->where('car_id', $car->id)->exists();
            if (!$check) 
            {
                if ($car->status == 'available') {
                    if ($car->deliver == 'true') {

                        $validator = Validator::make($request->all(), [
                            "deliver" => ["required", "string", "in:true,false"],
                            "purpose" => ["nullable", "string"]
                        ]);

                        if ($validator->fails()) {
                            return response()->json([
                                "status" => false,
                                "message" => $validator->errors()->all()
                            ]);
                        }

                        if ($request->deliver == "true") {
                            $validator = Validator::make($request->all(), [
                                "location" => ["required", "string"],
                            ]);

                            if ($validator->fails()) {
                                return response()->json([
                                    "status" => false,
                                    "message" => $validator->errors()->all()
                                ]);
                            }



                            $user->Rental_Cars()->attach($car_id, [
                                'deliver' => $request->deliver,
                                'purpose' => $request->purpose ?? Null,
                                'location' => $request->location
                            ]);

                            return response()->json([
                                "status" => true,
                                'message' => "Request Send Successfully",
                                'data' => new FilterCarResource($car)
                            ]);
                        } else {
                            $user->Rental_Cars()->attach($car_id, [
                                'deliver' => $request->deliver,
                                'purpose' => $request->purpose ?? Null,
                            ]);

                            return response()->json([
                                "status" => true,
                                'message' => "Request Send Successfully",
                                'data' => new FilterCarResource($car)
                            ]);
                        }
                    } elseif($car->deliver == 'false') {
                        $validator = Validator::make($request->all(), [
                            "purpose" => ["nullable", "string"]

                        ]);

                        if ($validator->fails()) {
                            return response()->json([
                                "status" => false,
                                "message" => $validator->errors()->all()
                            ]);
                        }

                        $user->Rental_Cars()->attach($car_id, [
                            'purpose' => $request->purpose ?? Null,
                        ]);

                        return response()->json([
                            "status" => true,
                            'message' => "Request Send Successfully",
                            'data' => new FilterCarResource($car)
                        ]);
                    }
                } else {
                    return response()->json([
                        'message' => "Your Requested car is busy"
                    ]);
                }
            } else{
                $car_status = Car_User::where('user_id', $user->id)->where('car_id', $car->id)->first()['status'];
                if($car_status == 'canceled' or $car_status == 'done'){
                    if ($car->status == 'available') {
                        if ($car->deliver == 'true') {
    
                            $validator = Validator::make($request->all(), [
                                "deliver" => ["required", "string", "in:true,false"],
                                "purpose" => ["nullable", "string"]
                            ]);
    
                            if ($validator->fails()) {
                                return response()->json([
                                    "status" => false,
                                    "message" => $validator->errors()->all()
                                ]);
                            }
    
                            if ($request->deliver == "true") {
                                $validator = Validator::make($request->all(), [
                                    "location" => ["required", "string"],
                                ]);
    
                                if ($validator->fails()) {
                                    return response()->json([
                                        "status" => false,
                                        "message" => $validator->errors()->all()
                                    ]);
                                }
    
    
    
                                $user->Rental_Cars()->attach($car_id, [
                                    'deliver' => $request->deliver,
                                    'purpose' => $request->purpose ?? Null,
                                    'location' => $request->location
                                ]);
    
                                return response()->json([
                                    "status" => true,
                                    'message' => "Request Send Successfully",
                                    'data' => new FilterCarResource($car)
                                ]);
                            } else {
                                $user->Rental_Cars()->attach($car_id, [
                                    'deliver' => $request->deliver,
                                    'purpose' => $request->purpose ?? Null,
                                ]);
    
                                return response()->json([
                                    "status" => true,
                                    'message' => "Request Send Successfully",
                                    'data' => new FilterCarResource($car)
                                ]);
                            }
                        } elseif($car->deliver == 'false') {
                            $validator = Validator::make($request->all(), [
                                "purpose" => ["nullable", "string"]
    
                            ]);
    
                            if ($validator->fails()) {
                                return response()->json([
                                    "status" => false,
                                    "message" => $validator->errors()->all()
                                ]);
                            }
    
                            $user->Rental_Cars()->attach($car_id, [
                                'purpose' => $request->purpose ?? Null,
                            ]);
    
                            return response()->json([
                                "status" => true,
                                'message' => "Request Send Successfully",
                                'data' => new FilterCarResource($car)
                            ]);
                        }
                    } else {
                        return response()->json([
                            'message' => "Your Requested car is busy"
                        ]);
                    }
                }else{
                    return response()->json([
                        "status" => false,
                        'message' => "You cannot send request again",
                    ]);

                }
                
            }

        }else {
            return response()->json([
                "status" => false,
                'message' => "Requested Car Not found",
            ]);
        }

    }

    public function cancel(Request $request, $car_id)
    {
        $access_token = $request->header('Authorization');
        $user = User::where('access_token', "=", $access_token)->first();
        $car = Car::findOrNew($car_id);

        if ($car->exists) {

            $check = Car_User::where('user_id', $user->id)->where('car_id', $car->id)->exists();

            if ($check) {
                $car_request = Car_User::where('user_id', $user->id)->where('car_id', $car->id)->first();
                $car_request->delete();
                return response()->json([
                    "status" => true,
                    'message' => "Your Request has been canceled"
                ]);
            } else {
                return response()->json([
                    "status" => false,
                    'message' => "Your Request has not been sent"
                ]);
            }
        } else {
            return response()->json([
                "status" => false,
                'message' => "Requested Car Not found",
            ]);
        }
    }



    public function paymentcallback(Request $request){
        // $data = $request->all();
        // $data = [
        //     "success" => $request->['obj']['success'],
        //     "merchant_order_id" => $request['obj']['order']['merchant_order_id']
        // ];
        // $jsonData = json_encode($data);
        // $publicPath = $_SERVER['DOCUMENT_ROOT']; // Get the document root path
        // $filePath = $publicPath . '/uploads/json-data.json';
        // file_put_contents($filePath, $jsonData);
        
        $success = $request['obj']['success'];
        $isSuccess  = filter_var($success, FILTER_VALIDATE_BOOLEAN);
        $merchant_order_id = $request['obj']['order']['merchant_order_id'];
        $pay= Payment::where('id', $merchant_order_id)->first();
        $rent= Car_User::where('id', $pay->rent_id)->first();

        if ($isSuccess) { // transcation succeeded.
            $pay->update([
                'status' => 'done'
            ]);
            $rent->update([
                'payment_status' => 'confirmed'
            ]);
        }else { // transaction failed.
            $pay->update([
                    'status' => 'canceled'
                ]);
        }
        
    }


    public function borrowingcars(Request $request)
    {
        $access_token = $request->header('Authorization');
        $user = User::where('access_token', "=", $access_token)->first();
        $cars = Car_User::where('user_id', $user->id)->get();
        
        return RentResource::collection($cars);
    }

    
    
}
