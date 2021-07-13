@extends('layouts.panel')

@section('content')
<style>
    body{background-color: white;}
    .bg-darkpurple {background: linear-gradient(to bottom, #6600cc 0%, #6600cc 100%);}

    
</style>
<script>
if(getPageNum() != "2")
   onePageSet();

sessionStorage.clickcount = 1;

</script>
<br><br><hr>

<div class="container">
<div class="container px-3">
<div class="d-flex justify-content-between">
<div class="p-1"><h1 class="font-weight-bolder mb-0">Product Details</h1>
<span class="small"></span>
</div>  
<div class="p-1">
<span class="la la-close" style="font-size:32px" onclick="getBack()" id="back"></span></div>     
</div>

</div>
<br><br>

    <div class="row">
        <div class="col-lg-6 col-md-6 mb-3" style="border-right:1px solid gainsboro">
         <div class="container">
         <img src="{{ asset('/images/carparts/'.$carpart->car_image) }}" class="img-fluid rounded-sm" width="100%">
  
        </div>   
        </div>
        <div class="col-lg-6 col-md-6">
            <div class="container">
            <h2 class="font-weight-normal">{{$carpart->part_name}}</h2>
            <h6 class="font-weight-normal text-danger">
            @foreach($car_models as $car_model)

            @foreach($car_names as $car_name)
            @if(($car_model->car_model_id === $carpart->car_model_id) && ($car_model->car_name_fgn_id === $car_name->car_name_id))
            {{$car_name->car_name}}
            @endif
            @endforeach

            @if($car_model->car_model_id === $carpart->car_model_id)
            {{$car_model->car_model_name}}
            @endif
            @endforeach
            </h6>

             <hr>
             <h4 class="text-dark font-weight-bolder"><span class="text-danger">N</span> <span class="">{{$carpart->price}}</span></h4>
             <hr>

              <h6 class="text-black font-weight-bold mt-4">Description</h6>
              <p>{{ $carpart->description}}</p>
              
              <br>
              @auth
              <form method="POST" action="{{ route('shopping.add') }}">
              {{ csrf_field() }}
              <input type="hidden" name="u_id" value="{{ Auth::user()->id }}"/>
              <input type="hidden" name="p_id" value="{{ $carpart->car_id }}"/>
              <input type="hidden" name="qty" value="1"/>
              <input type="hidden" name="type" value="2"/>
              @if($checker == 0)
              <button class="btn bg-darkpurple btn-block mb-5 shadow" type="submit" onclick="twoPageSet()"><span class="text-light">add to cart</span></button>
             @else
              <nav class="btn btn-outline-dark btn-block mb-5 shadow inactive"><span>added to cart</span> <span class="la la-shopping-bag" style="font-size:18px"></span></nav>
             
              @endif
              </form> 
              @endauth

              @guest
              <a href="{{ route('login') }}" class="btn bg-darkpurple btn-block mb-5 shadow" type="submit"><span class="text-light">login to add to cart</span></a>
              
              @endguest
                <br> 
            </div>
        </div>
    </div>
</div>

@endsection