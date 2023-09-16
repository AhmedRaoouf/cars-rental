<?php

namespace App\Http\Resources;

use App\Models\Car;
use App\Models\Car_Brand;
use App\Models\Car_Model;
use App\Models\Car_User;
use App\Models\Color;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Resources\Json\JsonResource;

class RentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $currentDate =  Carbon::now('+2:00')->format("d M Y");
        $car = Car::where('id', $this->car_id)->first();


        $images = [];

        foreach ($car->Images as $image) {
            $path = asset("uploads/cars/" . $image['image']);
            array_push($images, $path);
        }

        $brand = Car_Brand::where('id', $car->brand_id)->select('brand')->first()->brand;
        $model = Car_Model::where('id', $car->model_id)->select('model')->first()->model;
        $color = Color::where('id', $car->color_id)->select('name')->first()->name;

        if ($car->Plan->name == 'Short Term') {
            $duration = $car->duration . ' Days';
            $to = Carbon::now('+2:00')->addDays($car->duration)->format("d M Y");
        } elseif ($car->Plan->name == 'Long Term') {
            $duration = $car->duration . ' Months';
            $to = Carbon::now('+2:00')->addMonths($car->duration)->format("d M Y");
        } elseif ($car->Plan->name == 'Click n Own') {
            $duration = $car->duration . ' Years';
            $to = Carbon::now('+2:00')->addYears($car->duration)->format("d M Y");
        }


        $rates = array();
        foreach ($car->User_Reviews as $review) {
            array_push($rates, $review->pivot->rate);
        }

        $rates_sum = array_sum($rates);
        $count = count($rates);

        if ($count != 0) {
            $average_rate = $rates_sum / $count;
        } else {
            $average_rate = 0;
        }


        $borrower = User::where('id', $this->user_id)->first();


        $img = $borrower->img;
        if ($img !== NULL) {
            $image = asset("uploads/users/$img");
        } else {
            $image = 'Not Found';
        }




        $contract = $this->contract;
        if ($contract !== NULL) {
            $con = asset('uploads/contracts/' . $contract);
        } else {
            $con = 'Not Found';
        }
        $rent = [
            'rent_id' => $this->id ?? null,
            'rent_status' => $this->status ?? null,
            'payment_status' => $this->payment_status ?? null,
            'deliver_key' => $this->deliver_key ?? null,
            'start' => $this->start ?? null,
            'end' => $this->end ?? null,
            'contract' => $con ?? null
        ];




        return [
            'id' => $this->car_id,
            'Borrower' => [
                'id' => $borrower->id,
                'username' => $borrower->username,
                'phone' => $borrower->phone,
                'image' => $image
            ],
            'Brand' => $brand,
            'Model' => $model,
            'Color' => $color,
            'daily_price' => $car->daily_price,
            'total_price' => $car->total_price,
            'location' => $car->location,
            'duration' => $duration,
            'deliver' => $car->deliver,
            'image' => $images ?? [],
            'status' => $car->status,
            'rent' => $rent,
            'Reviews' => [
                'review' => ReviewResource::collection($car->User_Reviews),
                'average_rate' => $average_rate
            ]
        ];
    }
}
