<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\CarPart;
use Illuminate\Support\Facades\Storage;

class SearchController extends Controller
{
    //
    public function autocomplete(Request $request)
    {


        if($request->get('query')){
        
           $query = $request->get('query');
           $role = $request->get('role');

           if($role == 1){
              $data = User::Where("profession","LIKE","%{$query}%")
                   ->where("role","=",1)
                   ->get();
           }else if($role == 2){
               $data = User::Where("profession","LIKE","%{$query}%")
                   ->where("role","=",2)
                   ->get();
           }
           
         
        }

    
   
            $output = '<ul class="list-group list-group-flush bg-dark shadow mt-3 text-light rounded-lg" style="display:block;position:relative;cursor:pointer">';
                 
                 foreach($data as $row){
                 $output .= '<strong class="list-group-item list-group-item-dark" style="padding:0px 10px;font-weight:normal;">
                     <span class="text-light text-lowercase">'.$row->name.'</span>
                     <em class="text-lowercase" style="color:black">'.$row->id.'</em>
                     </strong>'.'<div class="small font-weight-lighter text-secondary" style="padding:0px 10px 3px 10px;font-weight:normal;">'.$row->profession.'</div>'.'<br>';
                 }
                 $output .= '</ul>';

                 echo $output;
    }



    public function autocompleteCarpart(Request $request)
    {


        if($request->get('query')){
        
           $query = $request->get('query');
          
           
           $data = CarPart::where("part_name","LIKE","%{$query}%")
                   ->orWhere("description","LIKE","%{$query}%")
                   ->get();
        }

    
   
       $output = '<ul class="list-group list-group-flush bg-dark shadow mt-3 text-light rounded-lg" style="display:block;position:relative;cursor:pointer">';
                 
                 foreach($data as $row){
                 $output .= '<strong class="list-group-item list-group-item-dark" style="padding:0px 10px;font-weight:normal;">
                     <span class="text-light text-lowercase">'.$row->part_name.'</span>
                     <em class="text-lowercase" style="color:black">'.$row->car_id.'</em>
                     </strong>'.'<div class="small font-weight-lighter text-secondary" style="padding:0px 10px 3px 10px;font-weight:normal;">'.$row->model.'</div>'.'<br>';
                 }
                 $output .= '</ul>';

                 echo $output;
    }
}
