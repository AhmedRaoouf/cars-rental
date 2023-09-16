<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car_Model extends Model
{
    use HasFactory;
    protected $guarded =['id'];
    protected $table = 'car_models';

    public function Brand()
    {
        return $this->belongsTo(Car_Brand::class);
    }


}
