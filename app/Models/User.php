<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded =['id','created_at','updated_at'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }
    public function activation()
    {
        return $this->hasOne(activation::class, 'user_id');
    }

    public function Cars()
    {
        return $this->hasMany(Car::class, 'user_id');
    }

    public function Rental_Cars()
    {
        return $this->belongsToMany(Car::class,'car_user')
        ->withPivot('id','deliver','purpose','location', 'contract','status', 'payment_status' ,'deliver_key','start','end')->withTimestamps();
    }

    public function Reviews()
    {
        return $this->belongsToMany(Car::class,'car__reviews','user_id','car_id')
        ->withPivot('review','rate')->withTimestamps();
    }
}
