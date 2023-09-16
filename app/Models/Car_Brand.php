<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car_Brand extends Model
{
    use HasFactory;

    protected $guarded =['id'];
    protected $table = 'car_brands';

    public function Models()
    {
        return $this->hasMany(Model::class, 'brand_id');
    }
}
