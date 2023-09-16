<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    use HasFactory;

    protected $guarded =['id','created_at','updated_at'];


    public function cars()
    {
        return $this->hasMany(Car::class, 'color_id');
    }
}
