<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car_Image extends Model
{
    use HasFactory;
    protected $guarded =['id','created_at','updated_at'];
    protected $visible = ['image'];

    public function Car_Image()
    {
        return $this->belongsTo(Car::class);
    }
}
