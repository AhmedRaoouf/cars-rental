<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ContarctCreateController;
use App\Models\Car;
use App\Models\Role;
use App\Models\User;
use App\Models\Car_User;
use App\Models\activation;
use Illuminate\Http\Request;
use App\Http\Resources\CarResource;
use App\Http\Controllers\Controller;
use App\Http\Resources\RentResource;
use App\Http\Resources\FilterCarResource;
use App\Models\Car_Brand;
use App\Models\Rental_Car_Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class OwnerController extends Controller
{
    public function owneractive(Request $request)
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
                "inssurance_image" => ["required", "image"],
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
            $personal_identity_image->move('uploads/owner_activation/', $personal_identity_image_filename);

            $license_image = $request->file('license_image');
            $license_filename = $license_image->getClientOriginalName();
            $license_image2 = pathinfo($license_filename, PATHINFO_FILENAME);
            $license_image_ext = $license_image->getClientOriginalExtension();
            $license_image_filename = $license_image2 . time() . '.' . $license_image_ext;
            $license_image->move('uploads/owner_activation/', $license_image_filename);

            $inssurance_image = $request->file('inssurance_image');
            $inssurance_filename = $inssurance_image->getClientOriginalName();
            $inssurance_image2 = pathinfo($inssurance_filename, PATHINFO_FILENAME);
            $inssurance_image_ext = $inssurance_image->getClientOriginalExtension();
            $inssurance_image_filename = $inssurance_image2 . time() . '.' . $inssurance_image_ext;
            $inssurance_image->move('uploads/owner_activation/', $inssurance_image_filename);

            $active = activation::create([
                "user_id" => $user->id,
                "personal_identity_image" => $personal_identity_image_filename,
                "license_image" => $license_image_filename,
                "inssurance_image" => $inssurance_image_filename,
            ]);

            if ($active) {
                return response()->json([
                    "status" => true,
                    'message' => "Your files have been sent successfully. Wait for an email when the account is activated"
                ]);
            }
        }
    }

    public function newcars(Request $request)
    {
        $access_token = $request->header('Authorization');
        $user = User::where('access_token', "=", $access_token)->first();
        $cars = Car::where('user_id', $user->id)->get();
        return FilterCarResource::collection($cars);
    }

    public function Rentalcars(Request $request)
    {
        $access_token = $request->header('Authorization');
        $user = User::where('access_token', "=", $access_token)->first();

        $cars = $user->Cars()->select('id')->get();

        $car_ids = array();
        foreach ($cars as $car) {
            array_push($car_ids, $car->id);
            // $car_status = Car_User::where('car_id', $car->id)->select('status')->first();
            // if(isset($car_status)){
            //     if($car_status['status'] === 'confirmed'){
            //         array_push($car_ids, $car->id);
            //     }
            // }
        }


        $rental_cars = Car_User::whereIn('car_id', $car_ids)->get();

        // $rental_cars_ids = array();
        // foreach ($rental_cars as $rental_car) {
        //     array_push($rental_cars_ids, $rental_car->car_id);
        // }
        // $rent_cars = Car_User::whereIn('id', $rental_cars_ids)->get();

        return RentResource::collection($rental_cars);
    }


    public function accept($rent_id)
    {
        $rent = Car_User::where('id', $rent_id)->first();
        if ($rent != Null) {
            $rent->update([
                'status' => 'confirmed'
            ]);
            return response()->json([
                "status" => true,
                'message' => "Request Confirmed Successfully",
            ]);
        } else {
            return response()->json([
                "status" => false,
                'message' => "Request Not Found",
            ]);
        }
    }

    public function reject($rent_id)
    {
        $rent = Car_User::where('id', $rent_id)->first();
        if ($rent != Null) {
            $rent->update([
                'status' => 'canceled'
            ]);
            return response()->json([
                "status" => true,
                'message' => "Request Canceled Successfully",
            ]);
        } else {
            return response()->json([
                "status" => false,
                'message' => "Request Not Found",
            ]);
        }
    }


    public function deliver($rent_id)
    {
        $rent = Car_User::where('id', $rent_id)->first();
        $car = Car::where('id', $rent->car_id)->first();


        // (1) Borrower
        $borrower = User::where('id', $rent->user_id)->first()->username;

        // (2) Owner
        $owner = User::where('id', $car->user_id)->first()->username;

        // (3) Car
        $car_name = Car_Brand::where('id',$car->brand_id)->first()->brand;

        // (4) Duration
        if($car->Plan->name == 'Short Term'){
            $duration = $car->duration . ' Days';
        }elseif($car->Plan->name == 'Long Term'){
            $duration = $car->duration . ' Months';
        }elseif($car->Plan->name == 'Click n Own'){
            $duration = $car->duration . ' Years';
        }

        // (5) From - To
        $from = $rent->start;
        $to = $rent->end;

        //(6) Total Price
        $total = $car->total_price;


        if ($rent != Null) {
            if ($rent->status == "confirmed" and $rent->payment_status == "confirmed") {
                $contractController = new ContarctCreateController();
                $contract = $contractController->generateContract($owner, $borrower , $car_name , $duration, $from , $to , $total);

                $rent->update([
                    'deliver_key' => 'true',
                    'contract' => $contract['filename']
                ]);


                return response()->json([
                    "status" => true,
                    'message' => "Deliver Key Done Successfully",
                ]);
            } else {
                return response()->json([
                    "status" => false,
                    'message' => "Check Your Request Confirmation or Payment Confirmation or both",
                ]);
            }
        } else {
            return response()->json([
                "status" => false,
                'message' => "Request Not Found",
            ]);
        }
    }


}
