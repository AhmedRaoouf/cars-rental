<?php

namespace App\Http\Resources;

use App\Models\Car_Brand;
use App\Models\Car_Model;
use App\Models\City;
use App\Models\Color;
use App\Models\Fuel_Type;
use App\Models\Governorate;
use App\Models\Mileage;
use App\Models\Plan;
use App\Models\Structure;
use App\Models\Transmisstion;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use PhpParser\Node\Stmt\Foreach_;

class CarResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {

        $currentDate =  Carbon::now('+2:00')->format("d M Y");

        $extras = [];
        foreach($this->Extras as $extra){
            array_push($extras,$extra->name);
        }
        
        $images = [];
        
        foreach($this->Images as $image){
            $path = asset("uploads/cars/".$image['image']);
            array_push($images,$path);
        }

        if($this->Plan->name == 'Short Term'){
            $duration = $this->duration . ' Days';
            $to = Carbon::now('+2:00')->addDays($this->duration)->format("d M Y");
        }elseif($this->Plan->name == 'Long Term'){
            $duration = $this->duration . ' Months';
            $to = Carbon::now('+2:00')->addMonths($this->duration)->format("d M Y");
        }elseif($this->Plan->name == 'Click n Own'){
            $duration = $this->duration . ' Years';
            $to = Carbon::now('+2:00')->addYears($this->duration)->format("d M Y");

        }
        

        $brand = Car_Brand::where('id', $this->brand_id)->select('brand')->first()->brand;
        $model = Car_Model::where('id', $this->model_id)->select('model')->first()->model;
        $fuel_type = Fuel_Type::where('id', $this->fuel_type_id)->select('name')->first()->name;
        $transmission = Transmisstion::where('id', $this->transmission_id)->select('name')->first()->name;
        $mileage = Mileage::where('id', $this->mileage_id)->select('name')->first()->name;
        $color = Color::where('id', $this->color_id)->select('name')->first()->name;
        $body_type = Structure::where('id', $this->body_type_id)->select('name')->first()->name;
        $city = City::where('id', $this->city_id)->select('city_name_en')->first()->city_name_en;
        $governorate = Governorate::where('id', $this->governorate_id)->select('governorate_name_en')->first()->governorate_name_en;
        $plan = Plan::where('id', $this->plan_id)->select('name')->first()->name;



        $rates = array();
        foreach($this->User_Reviews as $review){
            array_push($rates,$review->pivot->rate);
        }

        $rates_sum = array_sum($rates);
        $count = count($rates);

        if($count != 0){
            $average_rate = $rates_sum / $count;
        }else{
            $average_rate = 0;
        }

        $img = $this->User->img;
        if ($img !== NULL){
            $image = asset("uploads/users/$img");
        }else{
            $image = 'Not Found';
        }

        if (empty($this->Borrower) || !isset($this->Borrower[0])) {
            $rent = null;
        } else {
            $contract = $this-> Borrower[0]['pivot']['contract']; 
            if ($contract !== NULL) {
                $con = asset('uploads/contracts/'.$contract);
            } else {
                $con = 'Not Found';
            }
            $rent = [
                'rent_id' => $this->Borrower[0]['pivot']['id'] ?? null,
                'rent_status' => $this->Borrower[0]['pivot']['status'] ?? null,
                'payment_status' => $this->Borrower[0]['pivot']['payment_status'] ?? null,
                'deliver_key' => $this->Borrower[0]['pivot']['deliver_key'] ?? null,
                'start' => $this->Borrower[0]['pivot']['start'] ?? null,
                'end' => $this->Borrower[0]['pivot']['end'] ?? null,
                'contract' => $con ?? null
            ];
        }



        return [
            'Car_Information' => [
                'id' => $this->id,
                'Brand'=>$brand ?? '',
                'Model'=>$model ?? '',
                'Year' => $this->year ?? 0,
                'number_of_seats' => $this->number_of_seats ?? 0,
                'number_of_doors' => $this->number_of_doors ?? 0,
                'fuel_type' => $fuel_type ?? '',
                'Transmission' => $transmission ?? '',
                'Mileage'=> $mileage ?? '',
                'Color'=>$color ?? '',
                'car_structure'=> $body_type ?? '',
                'deliver' => $this->deliver,
                'Extras' => $extras ?? [],
                'description' => $this->description
            ],
           
            'Photos_Price' => [
                'images' => $images ?? [],
                'distance' => $this->distance ?? 0, 
                'market_value' => $this->market_value ?? 0, 
                'daily_price' => $this->daily_price ?? 0,
                'total_price'=>$this->total_price ?? 0,
                'Plan' => $plan ?? 0,
                'Driver' => $this->driver . " Driver" ?? '',
            ],
            'Parking_Address' => [
                'location' => $this->location,
                'latitude' => $this->latitude,
                'longitude' => $this->longitude,
            ],
            'Rental_Duration' =>[
                'duration' => $duration, 
                'From' => $currentDate,        
                'To' => $to,        
            ],
            'Reviews' => [
                'review' => ReviewResource::collection($this->User_Reviews),
                'average_rate' => $average_rate
            ],
            'Owner' => [
                'id' =>$this->User->id,
                'username' =>$this->User->username,
                'image' =>$image,
                'phone' => $this->User->phone
            ],
            'Borrower'=>$this->Borrower[0]['username'] ?? "No Borrower Now",
            'rent' => $rent,
        ];
    }
}
