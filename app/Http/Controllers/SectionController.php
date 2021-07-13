<?php

namespace App\Http\Controllers;

use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\CarPart;
use Illuminate\Support\Facades\Storage;



class SectionController extends Controller
{
   
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function editUser()
    {

        $user_id = Auth::id();

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
      
        $cart_number =  DB::table('carrist_carts')->where('user_id', Auth::id())->count();

        $mechanics = DB::table('mechanic_types')->get();

        $dealers = DB::table('dealer_types')->get();
        
        return view('user-edit', ['user' => $user,'cart_num' => $cart_number,'mechanics'=> $mechanics,'dealers'=> $dealers]);
    }

    public function userEdit(Request $request){

           $this->validate($request, [
          'user_image' => 'image|nullable|max:1999',
          'name' => 'required',
          'phone' => 'required',
          ]);

           $user_id = Auth::id();

           $user = user::find($user_id);
    

            if($request->hasFile('user_image')){

            //delete former profile picture
            $old_image_path= public_path('/images/users/').$user->profile_photo_path; // get previous image from folder
            if (File::exists($old_image_path) && $user->profile_photo_path != "") { // unlink or remove previous image from folder
               unlink($old_image_path);
            }

            $user_image = $request->file('user_image');

            $filenameWithExt = $request->file('user_image')->getClientOriginalName();

            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

            $extension = $request->file('user_image')->getClientOriginalExtension();

            $fileNameToStore = $filename .'_'.time().'.'.$extension;

            //$path = $request->file('user_image')->storeAs('public/users', $fileNameToStore);
            $destinationPath = public_path('images/users/');
            $user_image->move($destinationPath, $fileNameToStore);

        }else{
            $fileNameToStore = 'noimage.jpg';
        }

        
        if($request->hasFile('user_image')){
        $user->profile_photo_path = $fileNameToStore;
        }

        $user->name = $request->input('name');
        $user->phone = $request->input('phone');

        if($user->save()){
         
         return redirect()->route('user.edit')->with('success', 'User updated Successfully!');
        }
        else{
        return redirect()->route('home')->with('error', 'User not updated!');
        }
        
       
      
    }



        public function mechanicEdit(Request $request){

           $this->validate($request, [
          'mechanic_image' => 'image|nullable|max:1999',
          'mechanic_name' => 'required',
          'mechanic_phone' => 'required',
          'mechanic_spec' => 'required',
          'mechanic_profession' => 'required',
          'mechanic_address' => 'required',
          'mechanic_price' => 'required',
          ]);

           $user_id = Auth::id();

           $user = user::find($user_id);
    

            if($request->hasFile('mechanic_image')){

            //delete former profile picture
            $old_image_path= public_path('/images/users/').$user->profile_photo_path; // get previous image from folder
            if (File::exists($old_image_path) && $user->profile_photo_path != "") { // unlink or remove previous image from folder
               unlink($old_image_path);
            }

            $mech_image = $request->file('mechanic_image');

            $filenameWithExt = $request->file('mechanic_image')->getClientOriginalName();

            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

            $extension = $request->file('mechanic_image')->getClientOriginalExtension();

            $fileNameToStore = $filename .'_'.time().'.'.$extension;

            //$path = $request->file('mechanic_image')->storeAs('public/users', $fileNameToStore);
            $destinationPath = public_path('images/users/');
            $mech_image->move($destinationPath, $fileNameToStore);

        }else{
            $fileNameToStore = 'noimage.jpg';
        }

        
        if($request->hasFile('mechanic_image')){
        $user->profile_photo_path = $fileNameToStore;
        }

        $user->name = $request->input('mechanic_name');
        $user->phone = $request->input('mechanic_phone');
        $user->spec = $request->input('mechanic_spec');
        $user->profession = $request->input('mechanic_profession');
        $user->address = $request->input('mechanic_address');
        $user->price = $request->input('mechanic_price');
        
        

        if($user->save()){
         
         return redirect()->route('user.edit')->with('success', 'Profile updated Successfully!');
        }
        else{
        return redirect()->route('home')->with('error', 'User not updated!');
        }
        
       
      
    }
  


}
