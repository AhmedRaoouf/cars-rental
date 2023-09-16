<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Structure extends Model
{
    use HasFactory;

    protected $guarded =['id','created_at','updated_at'];


    public function cars()
    {
        return $this->hasMany(Car::class, 'body_type_id');
    }
}
