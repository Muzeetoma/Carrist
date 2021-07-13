<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\CarPart;
use App\Models\Carrist_cart;
use App\Models\CarModelNames;
use App\Models\CarNames;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CartController extends Controller
{

 public function __construct()
    {
        $this->middleware('auth');
    }

    
    public function showCart(){

    $cart_number =  Carrist_cart::where('user_id', Auth::id())->count();

    $cart_users = DB::table('carrist_carts')->join('users', function ($join) {
                            $join->on('carrist_carts.p_id', '=', 'users.id')
                            ->where('carrist_carts.user_id','=',Auth::id())
                            ->where('carrist_carts.type','=',1);
                           })->get();

    $cart_parts = DB::table('carrist_carts')->join('car_parts', function ($join) {
                            $join->on('carrist_carts.p_id', '=', 'car_parts.car_id')
                            ->where('carrist_carts.user_id','=',Auth::id())
                            ->where('carrist_carts.type','=',2);
                           })->get();


  
     $total_price = 0.0;
     $total_parts_price = 0.0;
     $total_users_price = 0.0;

     foreach($cart_parts as $item){
        $total_parts_price += ($item->price * $item->qty);
     } 

     foreach($cart_users as $item){
        $total_users_price += ($item->price * $item->qty);
     }                  

     $total_price = $total_parts_price + $total_users_price; 

      $car_models = CarModelNames::get();  
    
      $car_names = CarNames::get();

    return view('shopping/cart', ['cart_num' => $cart_number,'cart_users' => $cart_users,'cart_parts' => $cart_parts,
    'total_price' => $total_price, 'car_models' => $car_models, 'car_names' => $car_names]);
    }    
    
    public function delete(Request $request){

     $this->validate($request, [
        'p_id' => 'required',
        'qty' => 'required',
        'type' => 'required'
     ]);

     $p_id = $request->input('p_id');
     $u_id = Auth::id();
     $type = $request->input('type');;
     $qty = $request->input('qty');

     $cart_item = Carrist_cart::where('p_id','=',$p_id)
                                ->where('user_id','=',$u_id)
                                ->where('type','=',$type)
                                ->first();
  

    if($cart_item->delete()){
       return redirect()->route('shopping.cart');
     }else{
       return redirect()->route('shopping.cart');
     }

     
}

public function deleteMech(){

}

    
    public function minus(Request $request){

     $this->validate($request, [
        'p_id' => 'required',
        'qty' => 'required'
     ]);

     $p_id = $request->input('p_id');
     $u_id = Auth::id();
     $type = 2;
     $qty = $request->input('qty');

     if($qty > 1){
   
     $cart_item = Carrist_cart::where('p_id','=',$p_id)
                                ->where('user_id','=',$u_id)
                                ->where('type','=',$type)
                                ->first();

      $cart_item->qty = $qty - 1;


      if($cart_item->save())
       return redirect()->route('shopping.cart');
     }else{
       return redirect()->route('shopping.cart');
     }

     
                  

   }

   public function plus(Request $request){

     $this->validate($request, [
        'p_id' => 'required',
        'qty' => 'required'
     ]);

     $p_id = $request->input('p_id');
     $u_id = Auth::id();
     $type = 2;
     $qty = $request->input('qty');

     if($qty < 10){
   
     $cart_item = Carrist_cart::where('p_id','=',$p_id)
                                ->where('user_id','=',$u_id)
                                ->where('type','=',$type)
                                ->first();

      $cart_item->qty = $qty + 1;


      if($cart_item->save())
       return redirect()->route('shopping.cart');
     }
   }

    public function add_to_cart(Request $request){

      $this->validate($request, [
        'p_id' => 'required',
        'u_id' => 'required',
        'qty' => 'required',
        'type' => 'required'
       
      ]);

 $checker = 0;     
 $cart_number =  Carrist_cart::where('user_id', Auth::id())->count();

 $type = $request->input('type');

 if($type == 2){
 $item_id = $request->input("p_id");
 $item = CarPart::where('car_id', $item_id)->first();  
 } else{
 $item_id = $request->input("p_id");
 $item = User::where('id', $item_id)->first();
 }
 

 $user_id = Auth::id();

 $isCartExists = Carrist_cart::where('user_id','=',$user_id)
                    ->where('p_id','=',$item_id)
                    ->where('type','=',$type)
                    ->first();

                    if($isCartExists){
                    $checker = 1;  
                    }
 

      $cart = new Carrist_cart;
      $cart->p_id = $request->input('p_id');
      $cart->user_id = $request->input('u_id');
      $cart->qty = $request->input('qty');
      $cart->type = $request->input('type');

      $car_models = CarModelNames::get();

      $car_names = CarNames::get();

      if($isCartExists){

         if($type == 2) 
         return view("details/carpart", ['carpart' => $item,'checker' => $checker,'car_models' => $car_models,'car_names' => $car_names,'cart_num' => $cart_number]);
          else
         return view("details/user", ['user' => $item,'checker' => 1, 'cart_num' => $cart_number]);

      }else{

       if($cart->save()){
    
         if($type == 2) 
           return view("details/carpart", ['carpart' => $item,'checker' => $checker,'car_models' => $car_models,'car_names' => $car_names,'cart_num' => $cart_number]);

         else
         return view("details/user", ['user' => $item,'checker' => 1, 'cart_num' => $cart_number]);
      }
      }

     
         
     
    }
}
