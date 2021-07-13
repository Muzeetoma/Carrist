<?php


namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Carrist_cart extends Model
{
    use HasFactory, Notifiable;


      protected $fillable = [
        'p_id',
        'user_id',
        'qty',
        'type',
    ];

  

}
