@extends('layouts.panel')

@section('content')
<style>
body{
    background:white;
}
</style>    
<div class="container bg-white p-lg-5" id="main">
     <br><br>
    <div class="row shadow-lg">
    <div class="col-lg-6 col-12 p-0">
     <div class="container bg-light p-3" style="height:100%">
         <br><br><br>
         <center>
    <img src="{{ asset('images/users/car.png') }}" class="img-fluid rounded-lg pr-lg-4 mt-lg-2 ml-lg-5" width="70%">
</center>   
     </div>   
    </div>
    <div class="col-lg-6 col-12">
        <div class="container p-lg-5 p-3">
        <h4 class="text-center mt-2">SIGN INTO YOUR ACCOUNT</h4>
        <h6 class="text-center text-secondary small">Log in to get started</h6>
         <br><br>
   <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                           
                            <div class="col-md-12">
                                <input id="email" placeholder="Email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                         
                            <div class="col-md-12">
                                <input id="password" placeholder="Password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-12">
                                <button type="submit" id="submit" class="btn bg-darkpurple btn-block text-light">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                    <br>
<center>
<span class="text-secondary small">Created an account? | <a href="/register">Sign Up</a> | <a href="/">Home</a></span>
</center>
    </div> 
    </div>
    </div>
                   
</div>

<script>

$(document).ready(function(){

    $('form').on('submit', function (e) {
     $('button[type=submit], input[type=submit]', $(this)).blur().addClass('disabled is-submited');
});

$(document).on('click', 'button[type=submit].is-submited, input[type=submit].is-submited', function(e) {
    e.preventDefault();
});


});
</script>
@endsection
