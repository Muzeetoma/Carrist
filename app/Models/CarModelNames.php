<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarModelNames extends Model
{
    use HasFactory;



    protected $guard = 'admin';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $primaryKey = "car_model_id";

    protected $fillable = [
        'car_model_name',
        'car_name_fgn_id',
       
    ];
}
