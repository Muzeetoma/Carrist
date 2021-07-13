<?php

namespace App\Http\Controllers\Auth;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Auth;

class RoleRegisterController extends Controller
{
    public function __construct(){
        $this->middleware('guest');//people not logged in as admin
    }



    public function mechanic_register(Request $request){
       //validate form data

         $this->validate($request, [
             'email' => 'required|email',
             'name' => 'required',
             'address' => 'required',
             'profession' => 'required|min:5|max:100',
             'phone' => 'required|min:11|max:17',
             'password' => 'required|min:6|confirmed',
             'role'=>'required'
         ]);
      
        $user = User::create(request(['email','name','address','profession','phone','password','role']));
      
         auth()->login($user);

        $user = Auth::user();
        $cart_number =  DB::table('carrist_carts')->where('user_id', Auth::id())->count();
      
        $dealers = DB::table('dealer_types')->latest()->limit(4)->get();
        
        $mechanics = DB::table('mechanic_types')->latest()->limit(4)->get();
       
        $carparts = DB::table('car_parts')->latest()->limit(4)->get();
        
        return view('user-edit', ['user' => $user,'cart_num' => $cart_number,'dealers' => $dealers,'mechanics' => $mechanics,'carparts' => $carparts]);
        }



}
