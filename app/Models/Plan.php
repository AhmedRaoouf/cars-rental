<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;

    protected $guarded =['id','created_at','updated_at'];

    public function cars()
    {
        return $this->hasMany(Car::class, 'plan_id');
    }

}
