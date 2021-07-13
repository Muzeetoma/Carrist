<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarNames extends Model
{
    use HasFactory;


    protected $guard = 'admin';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $primaryKey = "car_name_id";

    protected $fillable = [
        'car_name',
       
    ];
}
