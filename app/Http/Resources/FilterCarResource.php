<?php

namespace App\Http\Resources;

use App\Models\Car_Brand;
use App\Models\Car_Model;
use App\Models\Color;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FilterCarResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $currentDate =  Carbon::now('+2:00')->format("d M Y");

        $images = [];
        
        foreach($this->Images as $image){
            $path = asset("uploads/cars/".$image['image']);
            array_push($images,$path);
        }

        $brand = Car_Brand::where('id', $this->brand_id)->select('brand')->first()->brand;
        $model = Car_Model::where('id', $this->model_id)->select('model')->first()->model;
        $color = Color::where('id', $this->color_id)->select('name')->first()->name;

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
            'id' => $this->id,
            'Owner' => [
                'id' =>$this->User->id,
                'username' =>$this->User->username,
                'phone' =>$this->User->phone,
                'image' =>$image
            ],       
            'Brand'=>$brand,
            'Model'=>$model,
            'Color'=>$color,
            'daily_price'=>$this->daily_price,
            'total_price'=>$this->total_price,
            'location'=>$this->location,
            'duration'=>$duration,
            'deliver' => $this->deliver,
            'image' => $images ?? [],
            'status' => $this->status,
            'rent' => $rent,
            'Reviews' => [
                'review' => ReviewResource::collection($this->User_Reviews),
                'average_rate' => $average_rate
            ]
        ];
    }
}
