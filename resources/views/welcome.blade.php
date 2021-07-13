@extends('layouts.panel')

@section('content')
<style>
*{
   padding:0;
}
body{
    margin:0;
    padding:0;
    background:white;
}
aside{
  padding-left:7% !important;
  padding-right:7% !important;
}
 .bg-purple {
    background: linear-gradient(to bottom, #660066 0%, #660066 100%);}
    .price-color{
      color: linear-gradient(to bottom, #6b0909 0%, #6e072a 100%);
      }
    
 .billboard{
    background-size:100% contain;
    height:90vh;

}
.rounded-xlg{
  border-radius: 15px;
}
nav > img{
  height: 140px;
  width: 75%;
}
.img-fluid{
  max-height: 100%;
}




.text-dark{
  color:black !important;
}
a, a:hover{
  text-decoration: none !important;
}

@media screen and (max-width: 480px) {
  #side_img {display:none !important;}
  .display-4{font-size:3em;}
  aside{
  padding-left:3% !important;
  padding-right:3% !important;
}
nav > img{
  height: 100px;
  width: 75%;
}



.h5{
  font-size: 1.5em !important;
}

}
</style>

<div class="container-fluid billboard p-lg-3 px-lg-5" style="background: rgb(21, 5, 46);">

<br><br><br><br><br>

<div class="row">
<div class="col-lg-6">
<div class="container pl-lg-5">
<h1 class="text-light display-4 font-weight-bolder">The Most Reliable Online <span style="color:orange;">Autoshop</span> .</h1>
<h6 class="text-light ml-lg-1">Get Your Automobile Fixed . Anywhere . Anytime </h6>
<br><br>
@guest
<a href="{{ route('register') }}" class="btn rounded-xlg ml-lg-3 bg-white shadow py-3 px-4"><span class="text-dark font-weight-bold"> Get started <span class="la la-arrow-right ml-3" style="font-size: larger;"></span></a>
<br><br><br>
@endguest
<div class="container ml-lg-3" style="border-left:1px solid orange;">
<p class="text-light small">
QwikMech is focused on providing Car repairs and maintenance services in Nigeria. You don’t have to worry if your car breaks down in an unexpected place, 
with QwikMech you can just book for a trusted and tested Mechanic near you,  to come to your aid.

</p>
</div>
</div>

</div>
<div class="col-lg-6">


<div class="container-fluid d-md-none d-lg-block d-none p-1 rounded-lg" style="border: .1px solid rgb(184, 156, 34);" id="side_img">
<img src="{{ asset('/images/users/main_image.png') }}" class="img-fluid rounded-lg pr-lg-4 mr-lg-4" width="90%">
</div>

</div>
</div>
</div>


<aside class="jumbotron mb-0" style="background: rgba(181, 216, 216, 0.2);">
<h1 class="font-weight-bolder ml-lg-5 mt-0 text-center">Our Options</h1>
<h6 class="small text-secondary px-lg-5 px-1 text-center">With QwikMech you don’t worry about mechanics 
  extorting  from you by either over pricing car parts prices or the services they rendered you.</h6>
<br><br>
<div class="row px-lg-1">


<div class="col-lg-4 col-md-6 px-4 mb-4">
<a href="{{ route('category.dealers') }}">
<div class="container p-4 bg-white rounded">
  <div class="row">
    <div class="col-12">
      <img src="img/dealer.svg" class="img-fluid mb-2 rounded-lg pr-lg-4 mr-lg-4" width="80%">
    </div>
    <div class="col-12">
      <h4 class="text-dark">Vends</h4>
      <p class="text-secondary">
    With QwikMech we connect you directly with trusted car parts vendors for both new and used(toks), you pay directly to us assuring you that you’d get the best price for any part you purchase through our platform.
      </p></div>
  </div>


</div>
</a>
</div>

<div class="col-lg-4 col-md-6 px-4 mb-4">
<a href="{{ route('category.mechanics') }}">
<div class="container p-4 bg-white rounded">
  <div class="row">
    <div class="col-12">
      <img src="img/mechanic.svg" class="img-fluid mb-2 rounded-lg pr-lg-4 mr-lg-4" width="50%">
    </div>
    <div class="col-12">
      <h4 class="text-dark">Mechs</h4>
      <p class="text-secondary">
        With QwikMech you can now order for a mechanic service same way you order for a cab service using Uber or Bolt.
        With your location on our App detects your exact location and connects with you the closet and available mechanic.
      
      </p></div>
  </div>


</div>
</a>
</div>


<div class="col-lg-4 col-md-6 px-4 mb-4">
  <a href="{{ route('category.carparts') }}">
  <div class="container p-4 bg-white rounded">
   <div class="row">
     <div class="col-12"> <img src="img/autoshop.svg" class="img-fluid mb-2 rounded-lg pr-lg-4 mr-lg-4" width="100%"></div>
     <div class="col-12"> <h4 class="text-dark">Autoshop</h4>
      <p class="text-secondary">
        For those who prefer using auto workshops you’re not left out, QwikMech would serve as a directory to the best Auto work shops around you.
      
      </p>
    </div>
   </div> 
 
 
  </div>
  </a>
  </div>

</div>
</aside>

<aside class="jumbotron mt-0 mb-0 px-lg-3 p-lg-5" style="background: rgb(21, 5, 46);">
  <br>
<center><h1 class="font-weight-bolder" style="color: orange;">Our Services</h1>
<h6 class="small text-light">You pay directly  for any service on our platform as well as  ordering any car part from us thereby saving you the stress and extortion from today’s mechanics</h6></center>

<br>

<div class="container px-3 mb-4">
  
  <div class="container p-4 rounded">
  <div class="row">
    <div class="col-12 col-lg-6"><img src="img/business.png" class="img-fluid mb-2 rounded-lg pr-lg-4 mr-lg-5" width="100%"></div>
    <div class="col-12 col-lg-6">
      <h4 class="" style="color: orange;">Info</h4>
      <p class="text-light">
        Book a Mechanic close to you  from any location, order for any car part and get it delivered to your doorstep at very competitive rates. This and anything you need to keep your car performing in the best condition is all we want to achieve with QwikMech. Our services in Nigeria includes attending to emergency car break down situation, towing, car engine maintenance, car brakes service, car true service, car Ac service, car panel beating service, car denting and painting,
        battery services etc. literally anything you need to get your car fixed and on the go</p>
    </div>
  </div>
  
 
  </div>
  
  </div>

</aside>

<aside class="jumbotron my-0 px-lg-5 p-lg-5" style="background-color: rgba(181, 216, 216, 0.2);">
<div class="container px-4 px-lg-5">
<a href="{{ route('category.carparts') }}"><h1 class="font-weight-bolder text-dark">Car parts</h1></a>
<h6 class="small text-secondary">Buy authentic car parts at cheap rates</h6>
<br><br>
<div class="row">
 @foreach($carparts as $carpart)
<div class="col-12 col-lg-3 mb-4">
  <form method="POST" action="{{ route('carpart.details') }}">
     @csrf
   <input type="hidden" name="car_id" value="{{ $carpart->car_id }}">
   <button type="submit" style="background:transparent;border:transparent;">
  <div class="container py-4 px-3 b-3 bg-white rounded-lg">
    <div style="width:100%;height:145px;" >
    <img src="{{ asset('/images/carparts/'.$carpart->car_image) }}" style="border-radius:5px" class="img-fluid bg-light h-100" width="100%">
    </div>
   
    <div class="container mt-3 mb-2" style="text-align: left;">
    <h6 class="font-weight-bold text-secondary">{{ $carpart->part_name }}</h6>
    <span class="font-weight-bolder h5">
      <h5 class="text-dark font-weight-bold badge badge-warning p-2">N</span> <span>{{ $carpart->price }}</span></h5>
    
    </div>
   

  </div>
  </button>
  </form>
  
</div>
 @endforeach



</div>
<hr> 
</div>   
</aside>




<aside class="jumbotron my-0 px-lg-5 pb-lg-5 pt-lg-0" style="background-color: rgba(181, 216, 216, 0.2);">
  
<div class="container px-4 px-lg-5">
<a href="{{ route('category.dealers') }}"><h1 class="font-weight-lighter text-dark">Vends</h1></a>
<h6 class="small text-secondary">Our Vendors bring quality material to the table.</h6>
<br><br>
<div class="row">
 @foreach($dealers as $user)
 <div class="col-12 col-md-6 col-lg-3 mb-4">
  <a href="/category/dealers/{{$user->d_id}}">
    <div class="container py-3 px-3 l-3 bg-white rounded-lg">
    <center>
   @if($user->image_path == "")
   <br>
   <div style="width:100%;height:150px;" >
    <img src="{{ asset('/images/users/default.png') }}" style="border-radius:7px" class="img-fluid bg-light h-100" width="100%">
    </div>
     @else
     
        <br>
        <div style="width:100%;height:150px;" >
        <img src="{{ asset('/images/dealers/'.$user->image_path) }}" style="border-radius:7px" class="img-fluid bg-light h-100" width="100%">
        </div>
         
     @endif
    
    </center>

 <div class="container mt-3" style="text-align: left;">
  <h5 class="font-weight-bold text-dark text-center">{{$user->dealer_type}}</h5>
  </div>

  </div>
  </a>
</div>
 @endforeach



</div> 
<hr> 
</div> 
</aside>



<aside class="jumbotron mt-0 px-lg-5 pb-lg-5 pt-lg-0" style="background-color: rgba(181, 216, 216, 0.2);">
<div class="container px-4 px-lg-5">
<a href="{{ route('category.mechanics') }}"><h1 class="font-weight-lighter text-dark">Mechanics</h1></a>
<h6 class="small text-secondary">Quality technicians at the go</h6>
<br><br>
<div class="row">
 @foreach($mechanics as $user)
 <div class="col-12 col-md-6 col-lg-3 mb-4">
 <a href="/category/mechanics/{{$user->m_id}}">
  <div class="container py-3 px-3 l-3 bg-white rounded-lg">
    <center>
   @if($user->image_path == "")
   <br>
   <div style="width:100%;height:145px;">
    <img src="{{ asset('/images/users/default.png') }}" style="border-radius:7px" class="img-fluid bg-light h-100" width="100%">
    </div>
     @else
     
        <br>
        <div style="width:100%;height:150px;">
          <img src="{{ asset('/images/mechs/'.$user->image_path) }}" style="border-radius:7px" class="img-fluid bg-light h-100" width="100%">
        </div>
     @endif
  

  <div class="container font-weight-bold text-center">
 <br>
 <h5 class="font-weight-bold text-dark">{{$user->mechanic_type}}</h5>
 </div>

    </center>

  </div>
  </a>
</div>
 @endforeach



</div>  
</div>
</aside>

<script>
sessionStorage.clickcount = 1;
</script>
@endsection