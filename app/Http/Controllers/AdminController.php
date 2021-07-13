<?php

namespace App\Http\Controllers;

use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\CarPart;
use App\Models\CarNames;
use App\Models\CarModelNames;
use App\Models\MechanicTypes;
use App\Models\DealerTypes;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
     
        return view('admin/admin');
    }

    public function showUsers()
    {

       $users = DB::table('users')->paginate(10);
       
     
        return view('admin/users')->with('users',$users);
    }

    public function showDealers()
    {

        $dealers = User::where('role','=',1)->paginate(10);
       
     
        return view('admin/dealers')->with('dealers',$dealers);
    }

    public function showDealerEdit($spec_id)
    {

        $user = DB::table('users')->leftJoin('dealer_types', 'users.spec', '=', 'dealer_types.d_id')
        ->where('users.id','=',$spec_id)
        ->first();

        $dealers = DB::table('dealer_types')->get();
       
     
        return view('admin/dealer-edit',['user' => $user, 'dealers' => $dealers]);
    }


   public function showCarnames(){
 
       $car_names = CarNames::orderBy('car_name')->get();

       $car_models = CarModelNames::get();

       return view('admin/car_names', ['car_names' => $car_names, 'car_models' => $car_models]);
   }


   public function addCarName(Request $request){

      $this->validate($request, [
          'car_name' => 'required'
        ]);

        $car_names = new CarNames;
        $car_names->car_name = $request->input('car_name');
       

        if($car_names->save())
         return redirect()->route('admin.car-names')->with('success', 'Added Successfully!');
   }

   public function addCarModel(Request $request){
       $this->validate($request, [
           'car_name_fgn_id' => 'required',
           'car_model_name' => 'required',
       ]);
        
        $car_models = new CarModelNames;
        $car_models->car_model_name  = $request->input('car_model_name');
        $car_models->car_name_fgn_id = $request->input('car_name_fgn_id');

        if($car_models->save())
         return redirect()->route('admin.car-names')->with('success', 'Added Successfully!');

   }



     public function showCarparts()
    {

        $users = DB::table('users')->get();
        //$carparts = DB::table('car_parts')->get();
        $carparts = CarPart::paginate(8);

        $dealers = User::where('role','=',1)->get();

        $car_models = CarModelNames::get();

        $car_names = CarNames::get();

        return view('admin/carparts', ['carparts' => $carparts,'users' => $users,'car_models' => $car_models,'car_names' => $car_names,'dealers'=>$dealers]);
    }


   public function showDealerTypes()
    {

       $dealer_types = DB::table('dealer_types')->get();
       
     
        return view('admin/dealer_types')->with('dealer_types',$dealer_types);
    }

    public function showMechanicTypes()
    {

       $mechanic_types = DB::table('mechanic_types')->get();
       
     
        return view('admin/mechanic_types')->with('mechanic_types',$mechanic_types);
    }

     public function destroyDealerType(Request $request){
     $this->validate($request, [
          'id' => 'required'
        ]);

        
       

        $type_id = $request->input('id');

        $dealer_type = DealerTypes::findorfail($type_id);

         //delete former profile picture
         $old_image_path= public_path('/images/dealers/').$dealer_type->image_path; // get previous image from folder
         if (File::exists($old_image_path) && $dealer_type->image_path != "") { // unlink or remove previous image from folder
            unlink($old_image_path);
         }

        $type = DealerTypes::where('id', $type_id)->firstorfail()->delete();

        
        return redirect()->route('admin.dealer-types')->with('success', 'Deleted Successfully!');
     }

      public function addDealerType(Request $request){

      $this->validate($request, [
          'dealer_image' => 'required|image|nullable|max:1999',
          'dealer_type' => 'required',
        ]);

        if($request->hasFile('dealer_image')){

            $d_image = $request->file('dealer_image');

            $filenameWithExt = $request->file('dealer_image')->getClientOriginalName();

            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

            $extension = $request->file('dealer_image')->getClientOriginalExtension();

            $fileNameToStore = $filename .'_'.time().'.'.$extension;

            //$path = $request->file('dealer_image')->storeAs('public/users', $fileNameToStore);
            $destinationPath = public_path('images/dealers/');
            $d_image->move($destinationPath, $fileNameToStore);

        }else{
            $fileNameToStore = 'noimage.png';
        }

        $dealer_types = new DealerTypes;
        $dealer_types->image_path = $fileNameToStore;
        $dealer_types->dealer_type = $request->input('dealer_type');
       

        if($dealer_types->save())
         return redirect()->route('admin.dealer-types')->with('success', 'Added Successfully!');
     }


       public function destroyMechanicType(Request $request){

        $this->validate($request, [
          'id' => 'required'
        ]);

        
       

        $type_id = $request->input('id');

        $mechanic_type = MechanicTypes::findorfail($type_id);

        //delete old picture
        $old_image_path= public_path('/images/mechs/').$mechanic_type->image_path; // get previous image from folder
        if (File::exists($old_image_path) && $mechanic_type->image_path != "") { // unlink or remove previous image from folder
           unlink($old_image_path);
        }
        $type = MechanicTypes::where('id', $type_id)->firstorfail()->delete();

        
        return redirect()->route('admin.mechanic-types')->with('success', 'Deleted Successfully!');

     }

      public function addMechanicType(Request $request){
      $this->validate($request, [
          'mechanic_image' => 'required|image|nullable|max:1999',
          'mechanic_type' => 'required',
        ]);

        if($request->hasFile('mechanic_image')){

            $mech_image = $request->file('mechanic_image');

            $filenameWithExt = $request->file('mechanic_image')->getClientOriginalName();

            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

            $extension = $request->file('mechanic_image')->getClientOriginalExtension();

            $fileNameToStore = $filename .'_'.time().'.'.$extension;

           // $path = $request->file('mechanic_image')->storeAs('public/users', $fileNameToStore);
           $destinationPath = public_path('images/mechs/');
           $mech_image->move($destinationPath, $fileNameToStore);


        }else{
            $fileNameToStore = 'noimage.png';
        }

        $mechanic_types = new MechanicTypes;
        $mechanic_types->image_path = $fileNameToStore;
        $mechanic_types->mechanic_type = $request->input('mechanic_type');
       

        if($mechanic_types->save())
         return redirect()->route('admin.mechanic-types')->with('success', 'Added Successfully!');
     }

     public function editCarpart(Request $request)
    {
          $this->validate($request, [
          'car_id' => 'required',
          'car_image' => 'image|nullable|max:1999',
          'part_name' => 'required',
          'model' => 'required',
          'price' => 'required',
          'description' => 'required',
          'dealer_id' => 'required',
        ]);

        if($request->hasFile('car_image')){

            $car_image = $request->file('car_image');

            $filenameWithExt = $request->file('car_image')->getClientOriginalName();

            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

            $extension = $request->file('car_image')->getClientOriginalExtension();

            $fileNameToStore = $filename .'_'.time().'.'.$extension;

            $destinationPath = public_path('images/carparts/');
            $car_image->move($destinationPath, $fileNameToStore);


        }else{
            $fileNameToStore = 'noimage.jpg';
        }

        $carpart_id = $request->input('car_id');

     
        $carpart = CarPart::find($carpart_id);
        if($request->hasFile('car_image')){
        $carpart->car_image = $fileNameToStore;
        }

        $carpart->part_name = $request->input('part_name');
        $carpart->car_model_id = $request->input('model');
        $carpart->price = $request->input('price');
        $carpart->description = $request->input('description');
        $carpart->dealer_id = $request->input('dealer_id');

        if($carpart->save())
         return redirect()->route('admin.carparts')->with('success', 'Carpart updated Successfully!');
       
    
       
    }
     public function showCarpartEdit(Request $request)
    {

       $this->validate($request, [
          'id' => 'required'
        ]);

        
        $carpart_id = $request->input('id');
        
        $users = DB::table('users')->get();
        $carpart = DB::table('car_parts')->where('car_id', $carpart_id)->first();
        //$user = User::where('id', $user_id)->firstorfail()->delete();
        //$carparts = DB::table('car_parts')->leftJoin('users', 'car_parts.dealer_id', '=', 'users.id')->get();

                //$carpart = DB::table('car_parts')->join('users', function ($join) {
                            //$join->on('car_parts.dealer_id', '=', 'users.id')->where('car_parts.car_id', '=', 4);
                          //})->get();
        //return view('admin/carparts')->with('carparts',$carparts,'users',$users);
        
         $dealers = User::where('role','=',1)->get();

         $car_models = CarModelNames::get();

        return view('admin/carpart-edit', ['carpart' => $carpart,'users' => $users,'dealers'=> $dealers,'car_models'=>$car_models]);
    }
    
    public function deleteUsers($id)
    {

        $user = User::findorfail($id);

        $user->delete();
     
        return view('admin/users')->with('success','User Removed');

    }

    public function destroy(Request $request){
        
         $this->validate($request, [
          'id' => 'required'
        ]);

        
        $user_id = $request->input('id');

        $user = User::where('id', $user_id)->firstorfail()->delete();

        return redirect()->route('admin.users')->with('success', 'Deleted Successfully!');

    }



    public function destroyDealers(Request $request){
        
        $this->validate($request, [
         'id' => 'required'
       ]);

       
       $user_id = $request->input('id');

       $user = User::where('id', $user_id)->firstorfail()->delete();

       return redirect()->route('admin.dealers')->with('success', 'Dealer Deleted Successfully!');

   }

   
   public function verifyDealers(Request $request){
        
    $this->validate($request, [
     'id' => 'required'
   ]);

   $user_id = $request->input('id');

   $user = DB::table('users')->where('id', $user_id)->first();

   if($user->verified == 0){

    DB::table('users')->where('id', $user_id)->update(['verified' => 1]);
    return redirect()->route('admin.dealers')->with('success', 'Dealer Verified Successfully!');

   }else{

    DB::table('users')->where('id', $user_id)->update(['verified' => 0]);
    return redirect()->route('admin.dealers')->with('success', 'Dealer Verified Successfully!');
   }

   }

   public function availableDealers(Request $request){
        
    $this->validate($request, [
     'id' => 'required'
   ]);

   
   $user_id = $request->input('id');

   $user = DB::table('users')->where('id', $user_id)->first();

   if($user->available == 0){

    DB::table('users')->where('id', $user_id)->update(['available' => 1]);
    return redirect()->route('admin.dealers')->with('success', 'Dealer made available Successfully!');

   }else{

    DB::table('users')->where('id', $user_id)->update(['available' => 0]);
    return redirect()->route('admin.dealers')->with('success', 'Dealer made unavailable Successfully!');
   }
 }


    public function destroyCarpart(Request $request){
        
         $this->validate($request, [
          'id' => 'required'
        ]);

        
       

        $car_part_id = $request->input('id');

        $carpart = CarPart::findorfail($car_part_id);


        $old_image_path= public_path('/images/carparts/').$carpart->car_image; // get previous image from folder
         if (File::exists($old_image_path) && $carpart->car_image != "") { // unlink or remove previous image from folder
            unlink($old_image_path);
         }

        $car_part = CarPart::where('car_id', $car_part_id)->firstorfail()->delete();

        
        return redirect()->route('admin.carparts')->with('success', 'Deleted Successfully!');

    }

        public function verify(Request $request){
        
         $this->validate($request, [
          'id' => 'required'
        ]);

        
        $user_id = $request->input('id');

        $user = DB::table('users')->where('id', $user_id)->first();

        if($user->verified == 0){

         DB::table('users')->where('id', $user_id)->update(['verified' => 1]);
         return redirect()->route('admin.users')->with('success', 'Verified Successfully!');

        }else{

         DB::table('users')->where('id', $user_id)->update(['verified' => 0]);
         return redirect()->route('admin.users')->with('success', 'Verified Successfully!');
        }

        

    }

        public function availableCarpart(Request $request){
        
         $this->validate($request, [
          'id' => 'required'
        ]);

        
        $carpart_id = $request->input('id');

        $carpart = DB::table('car_parts')->where('car_id', $carpart_id)->first();

        if($carpart->availability == 0){

         DB::table('car_parts')->where('car_id', $carpart_id)->update(['availability' => 1]);
         return redirect()->route('admin.carparts')->with('success', 'Car part made available Successfully!');

        }else{

         DB::table('car_parts')->where('car_id', $carpart_id)->update(['availability' => 0]);
         return redirect()->route('admin.carparts')->with('success', 'Car part made unavailable Successfully!');
        }

        

    }

        public function available(Request $request){
        
         $this->validate($request, [
          'id' => 'required'
        ]);

        
        $user_id = $request->input('id');

        $user = DB::table('users')->where('id', $user_id)->first();

        if($user->available == 0){

         DB::table('users')->where('id', $user_id)->update(['available' => 1]);
         return redirect()->route('admin.users')->with('success', 'User made available Successfully!');

        }else{

         DB::table('users')->where('id', $user_id)->update(['available' => 0]);
         return redirect()->route('admin.users')->with('success', 'User made unavailable Successfully!');
        }
      }


     public function dealer_register(Request $request){
    
          $this->validate($request, [
              'email' => 'required|email',
              'name' => 'required',
              'address' => 'required',
              'profession' => 'required|min:5|max:100',
              'phone' => 'required|min:11|max:17',
              'password' => 'required|min:6|confirmed',
              'role'=>'required'
          ]);
       
          User::create(request(['email','name','address','profession','phone','password','role']));
    
          
          $dealers = User::where('role','=',1)->get();
       
         
          return view('admin/dealers', ['dealers' => $dealers])->with('success', 'Dealer made unavailable Successfully!');  
     }

     public function dealerEdit(Request $request){

        $this->validate($request, [
        'id' => 'required',
       'dealer_image' => 'image|nullable|max:1999',
       'dealer_name' => 'required',
       'dealer_spec' => 'required',
       'dealer_phone' => 'required',
       'dealer_profession' => 'required',
       'dealer_address' => 'required',
       ]);

        $user_id = $request->input('id');

        $user = user::find($user_id);
 

         if($request->hasFile('dealer_image')){

         //delete former profile picture
         $old_image_path= public_path('/images/users/').$user->profile_photo_path; // get previous image from folder
         if (File::exists($old_image_path) && $user->profile_photo_path != "") { // unlink or remove previous image from folder
            unlink($old_image_path);
         }

         $d_image = $request->file('dealer_image');

         $filenameWithExt = $request->file('dealer_image')->getClientOriginalName();

         $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

         $extension = $request->file('dealer_image')->getClientOriginalExtension();

         $fileNameToStore = $filename .'_'.time().'.'.$extension;

         //$path = $request->file('dealer_image')->storeAs('public/users', $fileNameToStore);

         $destinationPath = public_path('images/users/');
         $d_image->move($destinationPath, $fileNameToStore);

     }else{
         $fileNameToStore = 'noimage.jpg';
     }

     
     if($request->hasFile('dealer_image')){
     $user->profile_photo_path = $fileNameToStore;
     }

     $user->name = $request->input('dealer_name');
     $user->phone = $request->input('dealer_phone');
     $user->profession = $request->input('dealer_profession');
     $user->address = $request->input('dealer_address');
     $user->spec = $request->input('dealer_spec');
     

     $dealers = User::where('role','=',1)->paginate(10);
       
     
     if($user->save()){
      
       return view('admin/dealers')->with('dealers',$dealers)->with('success', 'Profile updated Successfully!');
     }
     else{
      return view('admin/dealers')->with('dealers',$dealers)->with('error', 'User not updated!');
     }
     
    
   
 }



    public function storeCarpart(Request $request){

    $this->validate($request, [
          'car_image' => 'required|image|nullable|max:1999',
          'part_name' => 'required',
          'model' => 'required',
          'price' => 'required',
          'description' => 'required',
          'dealer_id' => 'required',
        ]);

        if($request->hasFile('car_image')){

            $car_image = $request->file('car_image');

            $filenameWithExt = $request->file('car_image')->getClientOriginalName();

            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

            $extension = $request->file('car_image')->getClientOriginalExtension();

            $fileNameToStore = $filename .'_'.time().'.'.$extension;

            //$path = $request->file('car_image')->storeAs('public/carparts', $fileNameToStore);
            $destinationPath = public_path('images/carparts/');
            $car_image->move($destinationPath, $fileNameToStore);
        

        }else{
            $fileNameToStore = 'noimage.png';
        }

        $carpart = new CarPart;
        $carpart->car_image = $fileNameToStore;
        $carpart->part_name = $request->input('part_name');
        $carpart->car_model_id = $request->input('model');
        $carpart->price = $request->input('price');
        $carpart->description = $request->input('description');
        $carpart->dealer_id = $request->input('dealer_id');

        if($carpart->save())
         return redirect()->route('admin.carparts')->with('success', 'Carpart added Successfully!');
       
    }
}
