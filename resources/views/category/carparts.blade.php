@extends('layouts.panel')

@section('content')
<style>
    body{background-color: white;}
    .bg-darkpurple {background: linear-gradient(to bottom, #6600cc 0%, #6600cc 100%);}
    a:focus{color:red;}
    nav > img{max-height:90px;}
    
</style>
<br><br>
<hr>
<aside class="container p-2 p-lg-4">
<h1 class="font-weight-lighter">Carparts</h1>
<h6 class="small text-secondary">Buy original carparts from different dealers</h6>
<br><br>

<div class="row">
<div class="col-0 col-md-3 col-lg-3 p-0 mb-3" style="background:#fff">
<div class="container p-0">
  
    
  <nav class="navbar navbar-expand-md " style="background:#e8e8e8">

  <!-- Toggler/collapsibe Button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar_">
    <span class="la la-bars text-dark " style="font-size:27px"></span>
  </button>

  <div class="collapse navbar-collapse pl-3 justify-content-start" id="collapsibleNavbar_">
  
<ul class="navbar-nav  flex-column">
  <li class="nav-item">
    <a class="nav-link" href=""><h5 class="text-dark font-weight-bolder">All</h5></a>
  </li>
  @foreach($carnames as $carname)
  <li class="nav-item">
     <a class="nav-link" href="#demo-{{$carname->car_name_id}}" data-toggle="collapse">
       <h6 class="text-dark font-weight-bolder">{{$carname->car_name}}</h6>
       </a>
  </li>
  @foreach($carmodels as $carmodel)
  @if($carname->car_name_id === $carmodel->car_name_fgn_id && $carmodel->car_model_name != "")
  <div id="demo-{{$carname->car_name_id}}" class="collapse pl-4 py-0">
   <li class="nav-item py-0">
       <a class="nav-link py-0" href="#demo-{{$carname->car_id}}" data-toggle="collapse">
       <span class="text-dark font-weight-lighter py-0">
       <a href="/category/carparts/model/{{$carmodel->car_model_id}}" class="text-dark py-0">{{$carmodel->car_model_name}}</a>
       </span>
       </a>
  </li>
  </div>
  @endif
  @endforeach


  @endforeach
</ul>
</div>
</nav>
</div>
</div>

<div class="col-12 col-md-9 col-lg-9">
<div class="row">
@foreach($carparts as $carpart)
<div class="col-6 col-lg-3 px-2 mb-3">
  <form method="POST" action="{{ route('carpart.details') }}">
     @csrf
   <input type="hidden" name="car_id" value="{{ $carpart->car_id }}">
   <button type="submit" style="background:transparent;border:transparent;">
  <div class="container border py-2 px-0 c-3" style="border-radius:20px">
    <center>
      <nav>
    <img src="{{asset('images/carparts/'.$carpart->car_image)}}" style="border-radius:20px" class="img-fluid bg-light" width="90%">
    </nav>
    </center>
   
    <div class="container">
    <hr>
    <center>
    <h6 class="font-weight-bold text-dark text-left">{{ $carpart->part_name }}</h6>
      <h6 class="font-weight-bold text-secondary small text-left">
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
    <h5 class="font-weight-bold text-dark text-left h5" style="color:orangered"><span class="text-danger">N</span> {{ $carpart->price }}</h5>
    </center>
    </div>
    

  </div>
  </button>
  </form>
</div>
 @endforeach


</div>
</div>


</div>




<br><hr>
 
 <div class="d-flex justify-content-center">
    {!! $carparts->links() !!}
</div>
</aside> 

<script>
sessionStorage.clickcount = 1;
</script>
@endsection