@extends('layouts.panel')

@section('content')
<style>
    body{background-color: white;}
    .bg-purple {background: linear-gradient(to bottom, #660066 0%, #660066 100%);color:white;}
    .row:nth-child(even){background: #f3f3f3;}
    #sm-container{display:none;}
    @media screen and (max-width: 480px) {
      #sm-container{display:block;}
      #lg-container{display:none;}
      .row:nth-child(even){background: #fff;}
     }
</style>

    <!--spinner-->
        <div style="width:100%;height:100%;background-color:rgba(250,250,250,0.7);position:fixed;top:0;left:0;z-index:100" id="spin">
    <center>

         <div class="spinner-border text-primary" style="margin-top:25%"></div>
        </center>

    </div>

    <!--spinner-->
<br><br>
<hr>
<div class="container bg-white px-lg-5 py-2">
<span class="la la-close" style="font-size:32px;position:fixed;right:7.5%;top:90px;z-index:2000;" onclick="runBack()" id="back"></span>
<h1>Shopping Bag</h1>
<h6 class="text-secondary font-weight-normal">{{Auth::user()->name}}</h6>
<br><br>

<div class="container" id="lg-container">

@foreach($cart_parts as $cart_part)
<div class="row py-1 mb-1">

<div class="col-2 p-1">
<div class="container">
 <img src="{{ asset('/images/carparts/'.$cart_part->car_image) }}" style="border-radius:20px" class="img-fluid rounded-lg" width="30%">
 </div>  
</div>
<div class="col-3">
<div class="container">
<h6 class="mt-3 font-weight-bold">{{$cart_part->part_name}}</h6>
   <h6 class="font-weight-normal text-dark small">
            @foreach($car_models as $car_model)

            @foreach($car_names as $car_name)
            @if(($car_model->car_model_id === $cart_part->car_model_id) && ($car_model->car_name_fgn_id === $car_name->car_name_id))
            {{$car_name->car_name}}
            @endif
            @endforeach

            @if($car_model->car_model_id === $cart_part->car_model_id)
            {{$car_model->car_model_name}}
            @endif
            @endforeach
            </h6>
</div>
</div>

<div class="col-2">
<div class="container">
<h6 class="mt-3"><span class="font-weight-bold">N</span> {{$cart_part->price}}</h6>
</div>
</div>

<div class="col-2">
<div class="container">
<div class="row">
<div class="col-4"><form method="POST" action="{{ route('shopping.minus') }}">
@csrf
<input type="hidden" name="p_id" value="{{ $cart_part->p_id }}"/>
<input type="hidden" name="qty" value="{{ $cart_part->qty }}"/>
<button type="submit" onclick="setCoords()" style="background:transparent;border:1px solid transparent">
<span class="la la-minus mt-3 bg-light rounded-circle" style="font-size:20px"></span>
</button>
</form></div>
<div class="col-4"><h6 class="text-dark mt-3">{{$cart_part->qty}}</h6></div>
<div class="col-4"><form method="POST" action="{{ route('shopping.plus') }}">
@csrf
<input type="hidden" name="p_id" value="{{ $cart_part->p_id }}"/>
<input type="hidden" name="qty" value="{{ $cart_part->qty }}"/>
<button type="submit" onclick="setCoords()" style="background:transparent;border:1px solid transparent">
<span class="la la-plus mt-3 bg-light rounded-circle" style="font-size:20px"></span>
</button>
</form></div>
</div>
</div>
</div>

<div class="col-2">
<div class="container text-right">
<form method="POST" action="{{ route('shopping.delete') }}">
@csrf
<input type="hidden" name="p_id" value="{{ $cart_part->p_id }}"/>
<input type="hidden" name="qty" value="{{ $cart_part->qty }}"/>
<input type="hidden" name="type" value="{{ 2 }}"/>
<button type="submit" onclick="setCoords()" style="background:transparent;border:1px solid transparent">
<span class="la la-close mt-3 bg-danger p-1 text-light rounded-circle" style="font-size:12px"></span>
</button>
</form>

</div>
</div>

</div>
@endforeach



@foreach($cart_users as $cart_user)
<div class="row py-1 mb-1">

<div class="col-2 p-1">
<div class="container">
 <img src="{{ asset('/images/users/'.$cart_user->profile_photo_path) }}" style="border-radius:20px" class="img-fluid rounded-circle" width="30%">
 </div>  
</div>
<div class="col-3">
<div class="container">
<h6 class="mt-3 font-weight-bold">{{$cart_user->name}}</h6>
<h6 class="text-secondary small">
     @php
        
         $arr = explode(' ',trim($cart_user->profession));
         $arr_len = count($arr);
         if($arr_len < 2)
         echo htmlspecialchars($arr[0]);
         else
         echo htmlspecialchars($arr[0] .' '. $arr[1]);

        @endphp
</h6>
</div>
</div>
<div class="col-2">
<div class="container">
<h6 class="mt-3"><span class="font-weight-bold">N</span> {{$cart_user->price}}</h6>
</div>
</div>
<div class="col-2">
<div class="container">
<div class="row">
<div class="col-4"><span class="la la-minus mt-3 bg-secondary text-light rounded-circle" style="font-size:20px"></span></div>
<div class="col-4"><h6 class="text-dark mt-3">{{1}}</h6></div>
<div class="col-4"><span class="la la-plus mt-3 bg-secondary text-light rounded-circle" style="font-size:20px"></span></div>
</div>
</div>
</div>
<div class="col-2">
<div class="container text-right">
<form method="POST" action="{{ route('shopping.delete') }}">
@csrf
<input type="hidden" name="p_id" value="{{ $cart_user->p_id }}"/>
<input type="hidden" name="qty" value="{{ $cart_user->qty }}"/>
<input type="hidden" name="type" value="{{ 1 }}"/>
<button type="submit" onclick="setCoords()" style="background:transparent;border:1px solid transparent">
<span class="la la-close mt-3 bg-danger p-1 text-light rounded-circle" style="font-size:12px"></span>
</button>
</form>
</div>
</div>

</div>
@endforeach


<div class="container bg-light mt-4 px-0 ">
<h5 class="bg-dark text-light p-1 px-2">Summary</h5>
<div class="container bg-light p-2">
 <div class="row">
<div class="col-6"><h4>Total Price</h4></div>   
<div class="col-6 text-right"><h4>N {{$total_price}}</h4>  </div>   
</div>   
   
</div>    

</div>
</div>

<!--small container-->

<div class="container" id="sm-container">

@foreach($cart_parts as $cart_part)
<div class="row py-1 pb-3 mb-3" style="border-bottom:1px solid #f3f3f3;">

<div class="col-3 p-1">
<div class="container mt-3">
 <img src="{{ asset('/storage/carparts/'.$cart_part->car_image) }}" style="border-radius:20px" class="img-fluid rounded-lg" width="100%">
 </div>  
</div>
<div class="col-9">
<div class="container p-0 m-0 text-right">
<form method="POST" action="{{ route('shopping.delete') }}">
@csrf
<input type="hidden" name="p_id" value="{{ $cart_part->p_id }}"/>
<input type="hidden" name="qty" value="{{ $cart_part->qty }}"/>
<input type="hidden" name="type" value="{{ 2 }}"/>
<button type="submit" onclick="setCoords()" style="background:transparent;border:1px solid transparent">
<span class="la la-close mt-3 bg-danger p-1 text-light rounded-circle" style="font-size:12px"></span>
</button>
</form>
</div>
<div class="container">
<h6 class="font-weight-bold">{{$cart_part->part_name}}</h6>
   <h6 class="font-weight-normal text-dark small text-left">
            @foreach($car_models as $car_model)

            @foreach($car_names as $car_name)
            @if(($car_model->car_model_id === $cart_part->car_model_id) && ($car_model->car_name_fgn_id === $car_name->car_name_id))
            {{$car_name->car_name}}
            @endif
            @endforeach

            @if($car_model->car_model_id === $cart_part->car_model_id)
            {{$car_model->car_model_name}}
            @endif
            @endforeach
            </h6>
<h6 class="mt-3"><span class="font-weight-bold">N</span> {{$cart_part->price}}</h6>

<div class="container px-1 py-1 rounded-lg bg-light">
<div class="row">
<div class="col-4"><form method="POST" action="{{ route('shopping.minus') }}">
@csrf
<input type="hidden" name="p_id" value="{{ $cart_part->p_id }}"/>
<input type="hidden" name="qty" value="{{ $cart_part->qty }}"/>
<button type="submit" onclick="setCoords()" style="background:transparent;border:1px solid transparent">
<span class="la la-minus  bg-light rounded-circle" style="font-size:15px"></span></button></form></div>
<div class="col-4"><h6 class="text-dark ">{{$cart_part->qty}}</h6></div>
<div class="col-4">
<form method="POST" action="{{ route('shopping.plus') }}">
@csrf
<input type="hidden" name="p_id" value="{{ $cart_part->p_id }}"/>
<input type="hidden" name="qty" value="{{ $cart_part->qty }}"/>
<button type="submit" onclick="setCoords()" style="background:transparent;border:1px solid transparent">
<span class="la la-plus  bg-light rounded-circle" style="font-size:15px"></span>
</button>
</form>
</div>
</div>
</div>


</div>
</div>


</div>
@endforeach



@foreach($cart_users as $cart_user)
<div class="row py-1 pb-3 mb-3" style="border-bottom:1px solid #f3f3f3;">

<div class="col-3 p-1">
<div class="container mt-3">
 <img src="{{ asset('/storage/users/'.$cart_user->profile_photo_path) }}" style="border-radius:20px" class="img-fluid rounded-circle" width="100%">
 </div>  
</div>
<div class="col-9">
<div class="container text-right p-0 m-0">
<form method="POST" action="{{ route('shopping.delete') }}">
@csrf
<input type="hidden" name="p_id" value="{{ $cart_user->p_id }}"/>
<input type="hidden" name="qty" value="{{ $cart_user->qty }}"/>
<input type="hidden" name="type" value="{{ 1 }}"/>
<button type="submit" onclick="setCoords()" style="background:transparent;border:1px solid transparent">
<span class="la la-close mt-3 bg-danger p-1 text-light rounded-circle" style="font-size:12px"></span>
</button>
</form>
</div>
<div class="container">
<h6 class="font-weight-bold">{{$cart_user->name}}</h6>
<h6 class="text-secondary small">
     @php
        
         $arr = explode(' ',trim($cart_user->profession));
         $arr_len = count($arr);
         if($arr_len < 2)
         echo htmlspecialchars($arr[0]);
         else
         echo htmlspecialchars($arr[0] .' '. $arr[1]);

        @endphp
</h6>
<h6 class="mt-3"><span class="font-weight-bold">N</span> {{$cart_user->price}}</h6>

<div class="container">
<div class="row bg-light rounded-lg px-2 py-1">
<div class="col-4"><span class="la la-minus bg-secondary text-light rounded-circle" style="font-size:15px"></span></div>
<div class="col-4"><h6 class="text-dark">{{1}}</h6></div>
<div class="col-4"><span class="la la-plus bg-secondary text-light rounded-circle" style="font-size:15px"></span></div>
</div>
</div>
</div>
</div>


</div>
@endforeach


<div class="container bg-light mt-4 px-0 ">
<h5 class="bg-dark text-light p-1 px-2">Summary</h5>
<div class="container bg-light p-2">
<div class="row">
<div class="col-6"><h4>Total Price</h4></div>   
<div class="col-6 text-right"><h4>N {{$total_price}}</h4>  </div>   
</div>   
   
</div>    

</div>



<br><br><br>
</div>

<div class="container my-3">
<center>

<button class="btn btn-success rounded-lg">Pay Now</button>

</center>
</div>
</div>
<script>
if (sessionStorage.clickcount) {

}else{
sessionStorage.clickcount = 1;
}


function countClicks(){
if (sessionStorage.clickcount) {
  sessionStorage.clickcount = Number(sessionStorage.clickcount) + 1;
} else {
  sessionStorage.clickcount = 1;
}

}

function runBack(){
    var times = Number(sessionStorage.clickcount);
     window.history.go(-times);
}


</script>

@endsection
