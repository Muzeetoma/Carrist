<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'QwikMech') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/jquery.js') }}" ></script>
   

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="{{ asset('lineawesome/css/line-awesome.min.css') }}" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/w3.css') }}" rel="stylesheet">
    <style>
      .d-3{ height:200px !important;}
      .c-3{ height:215px !important;}
      .b-3{ height:270px !important;}
      .l-3{ height:250px !important;}
      .m-3{min-height: 50% !important;}
      a,a:hover{
        text-decoration:none;
      }
      #nvb img{
        height:50px;
        width: 65px 
      }
        .la-user-edit,.la-sign-out{
            font-size:18px;
        }
        .bg-grey{
          background-color:gainsboro;
        }
        .bg-grey:hover{
          background-color:white;
        }
        .bg-darkpurple {background: linear-gradient(to bottom, #6600cc 0%, #6600cc 100%);}
        .bg-orange {background: orange;}
        #search-container{
          display:none;
          width:100%;
          height:100%;
          position:fixed;
          top:0;
          left:0;
          z-index:3000;

        }
        .display-5{
          font-size:3em !important;
        }
        
.bg-dark, .list-group-item-dark{
  background-color: #000 !important;
  color:white !important;
}
@media screen and (min-width: 480px) {
#sm-bar{
  display:none;
}
}
@media screen and (max-width: 480px) {
  .display-5{ font-size:1.9em !important;}
  .display-5+h4{font-size:.7em;}
  #nvb img{
        height:45px;
        width: 38px 
      }

}
     </style>   
</head>
<body onload="showCoords(event)">
 
    <div id="app">
    <nav class="navbar navbar-expand-md fixed-top" style="background: linear-gradient( to bottom,rgba(29, 11, 41, 0.65),rgba(0,0,0,0.43), transparent);">
  <!-- Brand -->
  <a class="navbar-brand" href="/" id="nvb"><img src="{{ asset('/img/logo.png') }}" class="img-fluid pr-lg-4 ml-lg-4"/></a>

  <!-- Toggler/collapsibe Button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="la la-stream text-light " style="font-size:28px"></span>
  </button>

  <!-- Navbar links -->
  <div class="collapse navbar-collapse ml-4 justify-content-end" id="collapsibleNavbar">
    <ul class="navbar-nav">
      @auth
      @if($cart_num >= 1)
     <form method="GET" action="{{ route('shopping.cart') }}" class="mr-5">
     <input type="hidden" name="user_id" value=""/>
      {{ csrf_field() }}
    <button type="submit" class="navbar-brand" style="background:transparent;border:1px solid transparent"><span class="la la-shopping-bag text-light" style="font-size:24px"></span><span class="small bg-danger rounded-circle px-1 py-0 text-light shadow">{{$cart_num}}</span></button>
     </form>
     @endif
      @endauth

        <li class="nav-item">
        <a class="nav-link" href="/"><span class="text-light " style="font-size:14px">Home</span></a>
      </li>
      
       <li class="nav-item">
        <a class="nav-link" href="{{ route('category.carparts') }} "><span class="text-light " style="font-size:14px">AutoShop</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('category.mechanics') }} "><span class="text-light " style="font-size:14px">Mechs</span></a>
      </li>
     
       <li class="nav-item">
        <a class="nav-link" href="{{ route('category.dealers') }}"><span class="text-light " style="font-size:14px">Vends</span></a>
      </li>
    
    
    @guest
       @if (Route::has('login'))
        <li class="nav-item">
         <a class="nav-link" href="{{ route('login') }}"><span class="text-light " style="font-size:14px">Login</span></a>
        </li>
      @endif

       @if (Route::has('register'))
         <li class="nav-item">
          <a class="nav-link" href="{{ route('register') }}"><span class="text-light font-weight-lighter bg-orange rounded py-1 px-2" style="font-size:12.5px">Signup</span></a>
         </li>
        @endif
          @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                   @if(Auth::user()->profile_photo_path == "")
                                     @php
        
                                     $arr = explode(' ',trim(Auth::user()->name));
                                     echo htmlspecialchars($arr[0]);

                                     @endphp
                                     @else

                                     <img src="{{ asset('/images/users/'.Auth::user()->profile_photo_path) }}" style="border:2px solid black" class="rounded-circle" height="25px" width="25px">
  
                                     @endif
                                </a>
                                

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                     <a class="dropdown-item" href="{{ route('user.edit') }}">
                                       <span class="la la-user-edit"></span><span> user profile</span>
                                    </a>

                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <span class="la la-sign-out"></span><span> Logout</span>
                                    </a>
                                    
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
    @endguest
        <li class="nav-item">
        <a class="nav-link bg-grey rounded py-0 px-2 mt-2 shadow-lg search-button" style="width:100px;cursor:pointer" id=""><span class="la la-search text-dark"></span> <span class="text-dark" style="font-size:12.5px">Search</span></a>
        </li>
    
    </ul>
  </div>
</nav>

        <main class="">
         @include('inc.messages')
         @yield('content')
        </main>
        <br><br>
    <nav class="navbar navbar-expand-md navbar-light bg-light fixed-bottom mt-3" style="border-top:1px solid gainsboro" id="sm-bar">
    <a href="/" class="navbar-brand"><span class="la la-home text-dark font-weight-bolder" style="font-size:23px"></span></a>
    <a id="" class="navbar-brand search-button"><span class="la la-search text-dark font-weight-bolder" style="font-size:23px"></span></a>
     @auth
     @if($cart_num >= 1)
     <form method="GET" action="{{ route('shopping.cart') }}">
     <input type="hidden" name="user_id" value=""/>
      {{ csrf_field() }}
    <button type="submit" class="navbar-brand" style="background:transparent;border:1px solid transparent">
    <span class="la la-shopping-bag text-dark font-weight-bolder" style="font-size:24px">
    </span><span class="small bg-primary rounded-circle px-1 py-0 text-light shadow">{{$cart_num}}</span></button>
     </form>
     @endif
     @endauth
    <a href="{{ route('user.edit') }}" class="navbar-brand"><span class="la la-user text-dark font-weight-bolder" style="font-size:23px"></span></a>

</nav>

   <br><br>
    <footer class="m-0 p-3" style="background: rgb(16, 2, 39);width:100%;overflow:hidden;height:50%">
    <div class="row">
    <div class="col-6 col-md-3 col-lg-3">
      <a class="navbar-brand " href="/"><img src="{{ asset('/img/logo.png') }}" width="30%" class="img-fluid pr-lg-4 ml-lg-4"/></a>
      <br>
      <i class="small text-light ml-lg-4">making car maintenance easier</i>
    </div>
    <div class="col-6 col-md-3 col-lg-3">
    <ul class="navbar-nav">
         <li class="nav-item">
        <h6 class="nav-link" href="/"><span class="text-light font-weight-bold" style="font-size:14px">Main</span></h6>
        </li>  
        <li class="nav-item">
        <a class="nav-link" href="/"><span class="text-light" style="font-size:14px">Home</span></a>
      </li>
       <li class="nav-item">
        <a class="nav-link" href="{{ route('category.carparts') }} "><span class="text-light " style="font-size:14px">AutoShop</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('category.mechanics') }} "><span class="text-light " style="font-size:14px">Mechanics</span></a>
      </li>
     
       <li class="nav-item">
        <a class="nav-link" href="{{ route('category.dealers') }}"><span class="text-light " style="font-size:14px">Dealers</span></a>
      </li>
    
   
    
    </ul>

    </div>
    <div class="col-6 col-md-3 col-lg-3">
          <ul class="navbar-nav">
         <li class="nav-item">
        <h6 class="nav-link" href="/"><span class="text-light font-weight-bold" style="font-size:14px">Company</span></h6>
        </li> 
      <li class="nav-item">
        <a class="nav-link" href="{{ route('about') }} "><span class="text-light" style="font-size:14px">About</span></a>
      </li>
             </li>
    @guest
       @if (Route::has('login'))
        <li class="nav-item">
         <a class="nav-link" href="{{ route('login') }}"><span class="text-light " style="font-size:14px">Login</span></a>
        </li>
      @endif

       @if (Route::has('register'))
         <li class="nav-item">
          <a class="nav-link" href="{{ route('register') }}"><span class="text-light font-weight-lighter bg-orange rounded py-1 px-2" style="font-size:12.5px">Signup</span></a>
         </li>
        @endif
          @else

              <li class="nav-item">
           <a class="nav-link" href="{{ route('user.edit') }}"><span class="text-light " style="font-size:14px"> User profile</span>
             </a>
             </li>
            
                        




                    
    @endguest
     
    </ul>
    </div>
    <div class="col-6 col-md-3 col-lg-3">
   <ul class="navbar-nav">
         <li class="nav-item">
        <h6 class="nav-link" href="/"><span class="font-weight-bold" style="font-size:14px;color:orange;">Contact</span></h6>
        </li>  
        <li class="nav-item">
        <a class="" href="/"><span class="text-light" style="font-size:20px"><span class="la la-facebook"></span> </span></a>
        <a class="" href=""><span class="text-light " style="font-size:20px"><span class="la la-instagram"></span> </span></a>
        <a class="" href=""><span class="text-light " style="font-size:20px"><span class="la la-envelope"></span></span></a>
      
      </li>
       <li class="nav-item">
      </li>
      <li class="nav-item">
     </li>
     
       <li class="nav-item">
        <a class="nav-link" href=""><span class="text-light " style="font-size:14px"><span class="la la-phone"></span>  +234 817 477 8319</span></a>
      </li>
    
   
    
    </ul>

    </div>
    </div>
    <hr>
    <center>
      <h6 class="" style="color: orange;">2021 QuicKMech All Rights Reserved</h6>
      </center>
    </footer>


        </div>


    <div class="bg-light p-lg-5 py-4 px-2" id="search-container">
    <div class="d-flex justify-content-between">
    <div class="px-4">
    <span class="display-5">Hi, @auth @php $arr = explode(' ',trim(Auth::user()->name)); echo htmlspecialchars($arr[0]); @endphp @endauth
            @guest User @endguest
            </span><h4>Find Carparts, Mechanics and Dealers</h4>

    </div>
    <div class="px-4">
    <span class="la la-close" style="font-size:32px" id="close-search"></span>
    </div>
    </div>
<hr class="ml-4">
<br>

  <ul class="nav nav-pills justify-content-center">
  <li class="nav-item">
    <a class="nav-link active" data-toggle="pill" href="#home"><h6 class="text-dark">Carparts</h6></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" data-toggle="pill" href="#menu1"><h6 class="text-dark">Dealers</h6></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" data-toggle="pill" href="#menu2"><h6 class="text-dark">Mechanics</h6></a>
  </li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
  <div class="tab-pane container active px-5" id="home">
    <br><br>
    <div class="row">
    <div class="col-10"><input type="text" name="carname" placeholder="Search carparts.." class="form-control py-3 border border-white shadow" value="" id="car-search-bar" autocomplete="off">
     </div>
    <div class="col-2">
    <form method="POST" action="{{ route('carpart.details') }}" id="dealer_details_post">
     <input type="hidden" id="car_detail_id" name="car_id" value=""/>
      {{ csrf_field() }}
    <button type="submit" class="btn btn-dark rounded-lg"><span class="la la-search text-light" style="font-size:20px"></span></button>
     </form>
     </div>
    </div>
     
     
     
     <div id="car-search-list" class=""></div>
    
   {{ csrf_field() }}
  </div>
  <div class="tab-pane container px-5 fade" id="menu1">
    <br><br>
    
     <div class="row">
     <div class="col-10"> <input type="text" name="dealer" placeholder="Search dealers.." class="form-control py-3 border border-white shadow" id="dealer-search-bar" autocomplete="off">
     <input type="hidden" name="dealer_role" value="2">
     </div>
     <div class="col-2">
      <form method="POST" action="{{ route('user.details') }}">
     <input type="hidden" id="dealer_detail_id" name="user_id" value=""/>
      {{ csrf_field() }}
    <button type="submit" class="btn btn-dark rounded-lg"><span class="la la-search text-light" style="font-size:20px"></span></button>
     </form></div>
     </div>
    
     
     <div id="dealer-search-list" class=""></div>
    
    {{ csrf_field() }}

  </div>
  <div class="tab-pane container px-5 fade" id="menu2">
     <br><br>
    
     
     <div class="row">
     <div class="col-10"> <input type="text" name="mechanic" placeholder="Search mechanics.." class="form-control py-3 border border-white shadow" id="mechanic-search-bar" autocomplete="off">
     <input type="hidden" name="mechanic_role" value="2">
     </div>
     <div class="col-2">
      <form method="POST" action="{{ route('user.details') }}">
     <input type="hidden" id="mechanic_detail_id" name="user_id" value=""/>
      {{ csrf_field() }}
    <button type="submit" class="btn btn-dark rounded-lg"><span class="la la-search text-light" style="font-size:20px"></span></button>
     </form></div>
     </div>
    
     
     <div id="mechanic-search-list" class=""></div>
    
    {{ csrf_field() }}
  </div>
</div>

    </div>

        <script>
          $(".search-button").click(function(){
          $("#search-container").show();
          });

          $("#close-search").click(function(){
          $("#search-container").fadeOut("slow");
          });

          $(document).ready(function(){


            $('#car-search-bar').keyup(function(){

              var query = $(this).val();

              if(query != ''){
                var _token = $('input[name="_token"]').val();
                //var role = $('input[name="role"]').val();
                
                $.ajax({
                  url:"{{ route('autocomplete.carpart') }}",
                  method:"POST",
                  data:{query:query, _token:_token},
                  success:function(data){

                    $('#car-search-list').fadeIn();
                    $('#car-search-list').html(data);
                  }
                })

              }
            });

 $(document).on('click', 'strong', function(){

     
     $('#car-search-bar').val($(this).find('span').text());
     //get id from the search results in the em tag
     $('#car_detail_id').val($(this).find('em').text());
     
     //console.log(this);
     //document.getElementById("car_details_post").submit();
     $('#car-search-list').fadeOut();
    });

  });

          $(document).ready(function(){


            $('#dealer-search-bar').keyup(function(){

              var query = $(this).val();

              if(query != ''){
                var _token = $('input[name="_token"]').val();
                var role = $('input[name="dealer_role"]').val();
                
                $.ajax({
                  url:"{{ route('autocomplete') }}",
                  method:"POST",
                  data:{query:query, _token:_token,role:role},
                  success:function(data){

                    $('#dealer-search-list').fadeIn();
                    $('#dealer-search-list').html(data);
                  }
                })

              }
            });

$(document).on('click', 'strong', function(){

     $('#dealer-search-bar').val($(this).find('span').text());
     //get id from the search results in the em tag
     $('#dealer_detail_id').val($(this).find('em').text());
     
     //console.log(this);
     //document.getElementById("dealer_details_post").submit();
     $('#dealer-search-list').fadeOut();
    });

  });


            $(document).ready(function(){


            $('#mechanic-search-bar').keyup(function(){

              var query = $(this).val();

              if(query != ''){
                var _token = $('input[name="_token"]').val();
                var role = $('input[name="mechanic_role"]').val();
                
                $.ajax({
                  url:"{{ route('autocomplete') }}",
                  method:"POST",
                  data:{query:query, _token:_token, role:role},
                  success:function(data){

                    $('#mechanic-search-list').fadeIn();
                    $('#mechanic-search-list').html(data);
                  }
                })

              }
            });

 $(document).on('click', 'strong', function(){

     $('#mechanic-search-bar').val($(this).find('span').text());
     //get id from the search results in the em tag
     $('#mechanic_detail_id').val($(this).find('em').text());
     
     //console.log(this);
     //document.getElementById("mechanic_details_post").submit();
     $('#mechanic-search-list').fadeOut();
    });

  });

//functions to implement details page back button
function goBack() {
  window.history.back();
  sessionStorage.setItem("pagenum","1");
}

function goBackBack() {
  window.history.go(-2);
  sessionStorage.setItem("pagenum","1");
}

function onePageSet(){
  sessionStorage.setItem("pagenum","1");
}

function twoPageSet(){
  sessionStorage.setItem("pagenum","2");
}

function getPageNum(){
  var num = sessionStorage.getItem("pagenum");
  
  return num;
}

function getBack(){
  if(getPageNum() == "2"){
     goBackBack(); 
  }else{
    goBack(); 
  }
    
}

var sz = 0;

window.onscroll = function() {scrollWin()};



function scrollWin() {

sz = window.scrollY;

}

function setCoords() {


 showSpinner();
 sessionStorage.setItem("cy", sz);
  countClicks();
}

function showCoords(event) {

 window.scrollTo(0,sessionStorage.getItem("cy"));

 dontShow();

}

function showSpinner(){

 document.getElementById("spin").style.display = "block";
}
function dontShow(){

document.getElementById("spin").style.display = "none";
}
    </script>

</body>
</html>
