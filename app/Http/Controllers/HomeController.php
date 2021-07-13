<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Carrist_cart;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user_id = Auth::id();

        $dealers = DB::table('users')->where('role',1)->latest()->limit(8)->get();
        
        $mechanics = DB::table('users')->where('role',2)->latest()->limit(8)->get();
       
        $carparts = DB::table('car_parts')->latest()->limit(8)->get();

        $cart_number =  DB::table('carrist_carts')->where('user_id',$user_id)->count();

        return view('welcome', ['carparts' => $carparts,'dealers' => $dealers, 'mechanics' => $mechanics,'cart_num' => $cart_number]);

    }

     public function welcome()
    {
        $user_id = Auth::id();

        $dealers = DB::table('users')->where('role',1)->latest()->limit(8)->get();
        
        $mechanics = DB::table('users')->where('role',2)->latest()->limit(8)->get();
       
        $carparts = DB::table('car_parts')->latest()->limit(8)->get();

        $cart_number =  DB::table('carrist_carts')->where('user_id',$user_id)->count();

        return view('welcome', ['carparts' => $carparts,'dealers' => $dealers, 'mechanics' => $mechanics,'cart_num' => $cart_number]);

    }

    public function about()
    {
        $cart_number =  Carrist_cart::where('user_id', Auth::id())->count();

        return view('about', ['cart_num' => $cart_number]);
    }
     public function verified()
    {
        return view('verified');
    }
}
