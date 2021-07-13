<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class CarPart extends Model
{

    use HasFactory, Notifiable;

    protected $guard = 'admin';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $primaryKey = "car_id";

    protected $fillable = [
        'car_image',
        'part_name',
        'car_model_id',
        'price',
        'description',
        'dealer_id',
    ];

    
}
