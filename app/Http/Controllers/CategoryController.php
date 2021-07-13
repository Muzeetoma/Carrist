<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\CarPart;
use App\Models\Carrist_cart;
use App\Models\CarModelNames;
use App\Models\CarNames;
use App\Models\MechanicTypes;
use App\Models\DealerTypes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
   public function showCarparts(){

    $carparts = CarPart::paginate(8);
                         
    $carmodels =  CarModelNames::join('car_parts','car_model_names.car_model_id','=','car_parts.car_model_id')
                                 ->groupby('car_model_names.car_model_id')
                                 ->distinct()
                                 ->get();


    $carnames = CarNames::join('car_model_names','car_names.car_name_id','=','car_model_names.car_name_fgn_id')
                          ->groupby('car_model_names.car_name_fgn_id')
                          ->distinct()
                          ->get();  

    $car_models = CarModelNames::get();  
    $car_names = CarNames::get();                                      

    $cart_number =  Carrist_cart::where('user_id', Auth::id())->count();

   return view('category/carparts', ['carparts' => $carparts, 'cart_num' => $cart_number, 'carmodels' => $carmodels, 'carnames' => $carnames
   , 'car_models' => $car_models, 'car_names' => $car_names]);
   }

   public function modelCarparts($part){

    $carparts = CarPart::join('car_model_names','car_parts.car_model_id','=','car_model_names.car_model_id')
                          ->where('car_parts.car_model_id', $part)
                          ->paginate(8); 

    $carnames = CarNames::join('car_model_names','car_names.car_name_id','=','car_model_names.car_name_fgn_id')
                          ->groupby('car_model_names.car_name_fgn_id')
                          ->distinct()
                          ->get();
    
    $carmodels =  CarModelNames::join('car_parts','car_model_names.car_model_id','=','car_parts.car_model_id')
                                 ->groupby('car_model_names.car_model_id')
                                 ->distinct()
                                 ->get();


    $car_models = CarModelNames::get();  
    $car_names = CarNames::get();                                      

    $cart_number =  Carrist_cart::where('user_id', Auth::id())->count();

   return view('category/carparts', ['carparts' => $carparts, 'cart_num' => $cart_number, 'carmodels' => $carmodels, 'carnames' => $carnames
   , 'car_models' => $car_models, 'car_names' => $car_names]);

   }

   public function showMechanics(){

    $mechanics = DB::table('users')->leftJoin('mechanic_types', 'users.spec', '=', 'mechanic_types.m_id')
                    ->where('role','=',2)
                    ->paginate(8);

    $cart_number =  Carrist_cart::where('user_id', Auth::id())->count();

    $mechanic_types = DB::table('mechanic_types')->latest()->get();

    $section_name = "All";


    return view('category/mechanics', ['mechanics' => $mechanics, 'mechanic_types' => $mechanic_types, 'cart_num' => $cart_number, 'sec_name' => $section_name]);
  }

   public function findMechanics($spec){

    $mechanics = DB::table('users')->leftJoin('mechanic_types', 'users.spec', '=', 'mechanic_types.m_id')
                    ->where('role','=',2)
                    ->where('spec','=',$spec)
                    ->paginate(8);
     
     $cart_number =  Carrist_cart::where('user_id', Auth::id())->count();

     $mechanic_types = DB::table('mechanic_types')->latest()->get();

     $col_type = DB::table('mechanic_types')->where('m_id','=',$spec)->first();

     $section_name = $col_type->mechanic_type;

     return view('category/mechanics', ['mechanics' => $mechanics, 'mechanic_types' => $mechanic_types, 'cart_num' => $cart_number, 'sec_name' => $section_name]);
  }


  public function showDealers(){

     $dealers = DB::table('users')->leftJoin('dealer_types', 'users.spec', '=', 'dealer_types.d_id')
                    ->where('role','=',1)
                    ->paginate(8);

    $cart_number =  Carrist_cart::where('user_id', Auth::id())->count();

    $dealer_types = DB::table('dealer_types')->latest()->get();

    $section_name = "All";


     return view('category/dealers', ['dealers' => $dealers, 'dealer_types' => $dealer_types, 'cart_num' => $cart_number, 'sec_name' => $section_name]);
  }


    public function findDealers($spec){

    $dealers = DB::table('users')->leftJoin('dealer_types', 'users.spec', '=', 'dealer_types.d_id')
                    ->where('role','=',1)
                    ->where('spec','=',$spec)
                    ->paginate(8);
     
     $cart_number =  Carrist_cart::where('user_id', Auth::id())->count();

     $dealer_types = DB::table('dealer_types')->latest()->get();

     $col_type = DB::table('dealer_types')->where('d_id','=',$spec)->first();

     $section_name = $col_type->dealer_type;

     return view('category/dealers', ['dealers' => $dealers, 'dealer_types' => $dealer_types, 'cart_num' => $cart_number, 'sec_name' => $section_name]);
  }
}
