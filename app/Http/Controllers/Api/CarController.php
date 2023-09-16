<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CarResource;
use App\Http\Resources\FilterCarResource;
use App\Models\Car;
use App\Models\Car_Brand;
use App\Models\Car_Image;
use App\Models\Car_Model;
use App\Models\Car_Plan;
use App\Models\Car_Reviews;
use App\Models\Car_User;
use App\Models\City;
use App\Models\Color;
use App\Models\Extra;
use App\Models\Fuel_Type;
use App\Models\Governorate;
use App\Models\Mileage;
use App\Models\Plan;
use App\Models\Role;
use App\Models\Structure;
use App\Models\Transmisstion;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;






class CarController extends Controller
{
    
    public function create(Request $request)
    {

        $access_token = $request->header('Authorization');
        $user = User::where('access_token', "=", $access_token)->first();

        $validator = Validator::make($request->all(), [
            "brand" => ["required", "exists:car_brands,brand"],
            "model" => ["required", "exists:car_models,model"],
            "year" => ["required", "integer", "min:2015"],
            "number_of_seats" => ["required", "integer"],
            "number_of_doors" => ["required", "integer"],
            "fuel_type" => ["required", "exists:fuel__types,name"],
            "transmission" => ["required", "exists:transmisstions,name"],
            "mileage" => ["required", "exists:mileages,name"],
            "color" => ["required", "exists:colors,name"],
            "body_type" => ["required", "exists:structures,name"],
            "deliver" => ["required", "string", "in:true,false"],
            "extras" => ['nullable', 'array'],
            "extras.*" => ['nullable', 'string', "exists:extras,name"],
            "description" => ["nullable", "string"],

            "city" => ["required", "exists:cities,city_name_en"],
            "governorate" => ["required", "exists:governorates,governorate_name_en"],
            "plate_number" => ["required", "string"],
            "license_expiration_date" => ["required", "Date"],
            "license_image" => ["required", "image"],
            "inssurance_image" => ["required", "image"],

            "image" => ["required", "array", "min:1", "max:4"],
            "distance" => ["required", "integer", "max:140"],
            "market_value" => ["required", "numeric"],
            "daily_price" => ["required", "numeric"],
            "plan" => ["required", "exists:plans,name"],
            "driver" => ["required", "in:With,Without"],

            "location" => ["required", "string"],
            "latitude" => ["required", "numeric"],
            "longitude" => ["required", "numeric"],

            "duration" => ["required", "integer"]
        ]);


        if ($validator->fails()) {
            return response()->json([
                "status" => false,
                "message" => $validator->errors()->all()
            ]);
        }


        $license_image = $request->file('license_image');
        $license_image_ext = $license_image->getClientOriginalExtension();
        $license_image_filename = time() . '.' . $license_image_ext;
        $license_image->move('uploads/license/', $license_image_filename);

        $inssurance_image = $request->file('inssurance_image');
        $inssurance_image_ext = $inssurance_image->getClientOriginalExtension();
        $inssurance_image_filename = time() . '.' . $inssurance_image_ext;
        $inssurance_image->move('uploads/inssurance/', $inssurance_image_filename);


        if ($request->plan == 1) {
            $total_price = $request->duration * $request->daily_price;
        } elseif ($request->plan == 2) {
            $total_price = $this->monthsToDays($request->duration) * $request->daily_price;
        } else {
            $total_price = $this->yearsToDays($request->duration) * $request->daily_price;
        }

        $brand = Car_Brand::where('brand', $request->brand)->select('id')->first()->id;
        $model = Car_Model::where('model', $request->model)->select('id')->first()->id;
        $fuel_type = Fuel_Type::where('name', $request->fuel_type)->select('id')->first()->id;
        $transmission = Transmisstion::where('name', $request->transmission)->select('id')->first()->id;
        $mileage = Mileage::where('name', $request->mileage)->select('id')->first()->id;
        $color = Color::where('name', $request->color)->select('id')->first()->id;
        $body_type = Structure::where('name', $request->body_type)->select('id')->first()->id;
        $city = City::where('city_name_en', $request->city)->select('id')->first()->id;
        $governorate = Governorate::where('governorate_name_en', $request->governorate)->select('id')->first()->id;
        $plan = Plan::where('name', $request->plan)->select('id')->first()->id;



        $car = Car::create([
            "user_id" => $user->id,
            "brand_id" => $brand,
            "model_id" => $model,
            "year" => $request->year,
            "number_of_seats" => $request->number_of_seats,
            "number_of_doors" => $request->number_of_doors,
            "fuel_type_id" => $fuel_type,
            "transmission_id" => $transmission,
            "mileage_id" => $mileage,
            "color_id" => $color,
            "body_type_id" => $body_type,
            "deliver" => $request->deliver,
            "description" => $request->description,

            "city_id" => $city,
            "governorate_id" => $governorate,
            "plate_number" => $request->plate_number,
            "license_expiration_date" => $request->license_expiration_date,
            "license_image" => $license_image_filename,
            "inssurance_image" => $inssurance_image_filename,

            "distance" => $request->distance,
            "market_value" => $request->market_value,
            "daily_price" => $request->daily_price,
            "total_price" => $total_price,
            "plan_id" => $plan,
            "driver" => $request->driver,

            "location" => $request->location,
            "latitude" => $request->latitude,
            "longitude" => $request->longitude,

            "duration" => $request->duration
        ]);

        $status = $car->where('id', $car->id)->first()['status'];


        $extras = $request->extras;

        if ($extras != Null) {
            foreach ($extras as $extra) {
                $extra_id = Extra::where('name', $extra)->select('id')->first()->id;
                $car->Extras()->attach($extra_id);
            }
        }

        for ($i = 0; $i < count($request->image); $i++) {
            $image = $request->file('image')[$i];
            $image_filename = $image->getClientOriginalName();
            $image2 = pathinfo($image_filename, PATHINFO_FILENAME);
            $image_ext = $image->getClientOriginalExtension();
            $filename = $image2 . time() . '.' . $image_ext;
            $image->move('uploads/cars/', $filename);


            Car_Image::create([
                "car_id" => $car->id,
                "image" => $filename
            ]);
        }


        if ($car) {
            return response()->json([
                "status" => true,
                'message' => "Car Listed Successfully",
                'data' => [
                    'car' => new CarResource($car),
                    'status' => $status
                ],

            ]);
        }
    }

    public function car_brands(){
        $brands = Car_Brand::all();
        

        return response()->json([
            'brands' => $brands,
        ]);

    }

    public function car_models($brand_id){
        $models = Car_Model::where('brand_id', $brand_id)->get();

        return response()->json([
            'models' => $models,
        ]);

    }

    public function car_info(){
        
        $fuel_types = Fuel_Type::all();
        $transmissions = Transmisstion::all();
        $mileages = Mileage::all();
        $colors = Color::all();
        $body_types = Structure::all();
        $extras = Extra::all();

        return response()->json([
           
            'fuel_types' => $fuel_types,
            'transmissions' => $transmissions,
            'mileages' => $mileages,
            'colors' => $colors,
            'body_types' => $body_types,
            'extras' => $extras,
        ]);

    }


    public function car_governorates(){
        $governorates = Governorate::all();

        return response()->json([
            'governorates' => $governorates,
        ]);

    }

    public function car_cities($governorate_id){
        $cities = City::where('governorate_id', $governorate_id)->get();
        return response()->json([
            'cities' => $cities,
        ]);

    }

    public function car_plans(){
        $plans = Plan::all();

        return response()->json([
            'plans' => $plans,
        ]);

    }

    

    

    public function show($id)
    {

        $car = Car::findOrFail($id);
        return new CarResource($car);
    }

    public function review($id, Request $request)
    {
        $access_token = $request->header('Authorization');
        $user = User::where('access_token', "=", $access_token)->first();


        $validator = Validator::make($request->all(), [
            "review" => ["required", "string"],
            "rate" => ["required", "integer", "max:5"],
        ]);

        if ($validator->fails()) {
            return response()->json([
                "status" => false,
                "message" => $validator->errors()->all()
            ]);
        }

        $car = Car::findOrFail($id);
        Car_Reviews::create([
            'user_id' => $user->id,
            'car_id' => $car->id,
            'review' => $request->review,
            'rate' => $request->rate
        ]);
        return response()->json([
            'status' => true,
            'message' => "Your rating and review sent successfully",
            'data' => [
                'Review' => $request->review,
                'Rating' => $request->rate
            ]
        ]);

    }


    


    


    // public function verify(Request $request, $car_id)
    // {
    //     $access_token = $request->header('Authorization');
    //     $user = User::where('access_token', "=", $access_token)->first();
    //     $user_role = Role::where('id', $user->role_id)->first()['name'];

    //     if ($user_role == 'borrower') {

    //         $validator = Validator::make($request->all(), [
    //             "license_number" => ["required", "string"],
    //             "license_image" => ["required", "image"],
    //             "inssurance_date" => ["required", "Date"],
    //             "expiry_date" => ["required", "Date"],
    //             "country" => ["required", "string"],
    //             "card_number" => ["required", "string"],
    //             "personal_identity_image" => ["required", "image"],
    //         ]);

    //         if ($validator->fails()) {
    //             return response()->json([
    //                 "status" => false,
    //                 "message" => $validator->errors()->all()
    //             ]);
    //         }

    //         $license_image = $request->file('license_image');
    //         $license_image_ext = $license_image->getClientOriginalExtension();
    //         $license_image_filename = time() . '.' . $license_image_ext;
    //         $license_image->move('uploads/borrower_license/', $license_image_filename);


    //         $personal_identity_image = $request->file('personal_identity_image');
    //         $personal_identity_image_ext = $personal_identity_image->getClientOriginalExtension();
    //         $personal_identity_image_filename = time() . '.' . $personal_identity_image_ext;
    //         $personal_identity_image->move('uploads/borrower_personal_identity/', $personal_identity_image_filename);


    //         $user->Rental_Cars()->updateExistingPivot($car_id, [
    //             'license_number' => $request->license_number,
    //             'inssurance_date' => $request->inssurance_date,
    //             'expiry_date' => $request->expiry_date,
    //             'country' => $request->country,
    //             'card_number' => $request->card_number,
    //             'license_image' => $license_image_filename,
    //             'personal_identity_image' => $personal_identity_image_filename
    //         ]);

    //         $status = Car_User::where('car_id', $car_id)->select('status')->first()['status'];
    //         return response()->json([
    //             "status" => true,
    //             'message' => "Verification completed successfully",
    //             'status' => $status
    //         ]);
    //     }
    //     return response()->json([
    //         'message' => "You are not Borrower Now. Please Switch the account to Borrower so that you can Filter cars"
    //     ]);
    // }


    public function yearsToDays($years)
    {
        // years = 2
        $days = $years * 365; // Assuming a non-leap year الغير كبيسة  730
        $leapDays = floor($years / 4); // Counting leap years الكبيسة 0
        $days += $leapDays; // Adding leap days 730+0 = 730

        return $days;
    }
    public function monthsToDays($months)
    {
        $days = $months * 30; // Assuming each month has 30 days
        return $days;
    }
}
