@extends('layouts.panel')

@section('content')
<style>
    body{background-color: white;}
    .bg-darkpurple {background: linear-gradient(to bottom, #6600cc 0%, #6600cc 100%);}
     nav > img{max-height:80px !important;}
</style>
<br><br>
<hr>
<aside class="container p-2 p-lg-4">
<h1 class="font-weight-lighter">Vends</h1>
<h6 class="small text-secondary">Get started with our vendors in different fields and with great skills </h6>
<br><br>

<div class="row">
<div class="col-0 col-md-3 col-lg-3 p-0" style="background:#e8e8e8">
<div class="container p-0">
  
    
  <nav class="navbar navbar-expand-md " style="background:#e8e8e8">

  <!-- Toggler/collapsibe Button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar_">
    <span class="la la-bars text-dark " style="font-size:27px"></span>
  </button>

  <div class="collapse navbar-collapse ml-4 justify-content-start" id="collapsibleNavbar_">
  
<ul class="navbar-nav  flex-column">
  <li class="nav-item">
    <a class="nav-link" href="{{ route('category.dealers') }}"><h5 class="text-dark font-weight-bolder">All</h5></a>
  </li>
   @foreach($dealer_types as $types)
  <li class="nav-item">
    <a class="nav-link" href="/category/dealers/{{$types->d_id}}"><span class="text-dark">{{$types->dealer_type}}</span></a>
  </li>
 @endforeach
</ul>
</div>
</nav>
</div>
</div>
<div class="col-12 col-md-9 col-lg-9 p-0">
<div class="container">
<h5 class="text-dark font-weight-bolder mt-4 mt-lg-2 ml-3 mb-4">{{$sec_name}}</h5>
<div class="row">
 @foreach($dealers as $user)
<div class="col-6 col-lg-3 mb-3">
  <form method="POST" action="{{ route('user.details') }}">
     @csrf
   <input type="hidden" name="user_id" value="{{ $user->id }}">
   <button type="submit" style="background:transparent;border:transparent;">
  <div class="container border py-4 px-0 d-3" style="border-radius:20px">
  
    <center>
     @if($user->profile_photo_path == "")
    <nav>
    <img src="{{asset('images/users/default.png')}}" class="box mx-auto rounded-lg img-fluid shadow-lg" width="60%">
     </nav>
     @else
     
        <nav> 
        <img src="{{asset('images/users/'.$user->profile_photo_path)}}" class="box mx-auto rounded-lg img-fluid shadow-lg" width="60%">
        </nav>
     @endif <br>
   

    </center>
 <h6 class="font-weight-bold text-dark">
       @php
        
         $arr = explode(' ',trim($user->name));
         echo htmlspecialchars($arr[0] .' '. $arr[1]);

        @endphp
    </h6>
    <span class="small text-secondary">
    {{$user->dealer_type}}
    </span>
  
  </div>
  </button>
  </form>
</div>
 @endforeach



</div> 


</div>
</div>

</div>




<br><hr>
<div class="d-flex justify-content-center">
    {!! $dealers->links() !!}
</div> 
</aside> 
</aside>
<script>
sessionStorage.clickcount = 1;
</script>
@endsection