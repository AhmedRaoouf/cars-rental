<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;
    protected $guarded =['id','created_at','updated_at'];

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function Extras()
    {
        return $this->belongsToMany(Extra::class,'cars_extras')->withTimestamps();
    }

    public function Images()
    {
        return $this->hasMany(Car_Image::class);
    }

    public function Availability()
    {
        return $this->hasMany(Availability::class);
    }

    public function Borrower()
    {
        return $this->belongsToMany(User::class,'car_user')
        ->withPivot('id','deliver','purpose','location', 'contract','status', 'payment_status','deliver_key','start','end')->withTimestamps();
    }

    public function Plan()
    {
        return $this->belongsTo(Plan::class);
    }

    public function Fuel()
    {
        return $this->belongsTo(Fuel_Type::class);
    }

    public function Transmisstion()
    {
        return $this->belongsTo(Transmisstion::class);
    }

    public function Mileage()
    {
        return $this->belongsTo(Mileage::class);
    }

    public function Color()
    {
        return $this->belongsTo(Color::class);
    }
    
    public function Structure()
    {
        return $this->belongsTo(Structure::class);
    }

    public function City()
    {
        return $this->belongsTo(City::class);
    }

    public function Governorate()
    {
        return $this->belongsTo(Governorate::class);
    }

    public function User_Reviews()
    {
        return $this->belongsToMany(User::class,'car__reviews','car_id','user_id')
        ->withPivot('review','rate')->withTimestamps();
    }
}
