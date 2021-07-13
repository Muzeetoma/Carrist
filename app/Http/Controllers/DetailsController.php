<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\CarModelNames;
use App\Models\CarNames;
use App\Models\CarPart;
use App\Models\Carrist_cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DetailsController extends Controller
{
public function showCardetails(Request $request){

 $checker = 0;

 $this->validate($request, [
          'car_id' => 'required'
        ]);

 $carpart_id = $request->input("car_id");
 $carpart = CarPart::where('car_id', $carpart_id)->first();

 $car_models = CarModelNames::get();

 $car_names = CarNames::get();

 $user_id = Auth::id();

 $isCartExists = Carrist_cart::where('user_id','=',$user_id)
                    ->where('p_id','=',$carpart_id)
                    ->where('type','=',2)
                    ->first();

if($isCartExists){
 $checker = 1;  
}
                    
  $cart_number =  Carrist_cart::where('user_id', Auth::id())->count();

  return view("details/carpart", ['carpart' => $carpart,'checker' => $checker,'car_models' => $car_models,'car_names' => $car_names,'cart_num' => $cart_number]);
}



public function showUserdetails(Request $request){

 $checker = 0;

 $this->validate($request, [
          'user_id' => 'required'
        ]);

 $user_id = $request->input("user_id");

 $user_type = DB::table('users')->where('id','=',$user_id)->first();

        
        if($user_type->role == 2){
         $user = DB::table('users')->leftJoin('mechanic_types', 'users.spec', '=', 'mechanic_types.m_id')
                    ->where('users.id','=',$user_id)
                    ->first();
        }else if($user_type->role == 1){
        
        $user = DB::table('users')->leftJoin('dealer_types', 'users.spec', '=', 'dealer_types.d_id')
                    ->where('users.id','=',$user_id)
                    ->first();
        }else{

         $user = Auth::user();
        }
        

  $userId = Auth::id();

  $isUserExists = Carrist_cart::where('user_id','=',$userId)
                     ->where('p_id','=',$user_id)
                     ->where('type','=',1)
                     ->first();

if($isUserExists){
  $checker = 1; 
}
     
  $cart_number =  Carrist_cart::where('user_id', Auth::id())->count();

  return view("details/user", ['user' => $user,'checker' => $checker,'cart_num' => $cart_number]);
}
}
