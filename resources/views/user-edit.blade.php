@extends('layouts.panel')

@section('content')
<style>
    body{
        background-color: white;
        position:relative;
    }
    .bg-purple {
    background: linear-gradient(to bottom, #660066 0%, #660066 100%);
}
aside{
    position:absolute;
    background: rgba(250,250,250,0.1);
    height:100%;
    padding:5% !important;
    
    z-index:1;
}

</style>
<br>
<div class="container bg-white p-lg-4 mt-5">

    <div class="row shadow-lg" >
    <div class="col-lg-6 col-12 p-0 bg-light p-5">
     
     <div class="d-flex align-items-center" style="width:100%;height:100%">
      
      @if($user->profile_photo_path == "")
     <div class="box rounded-circle bg-purple mx-auto" style="height:120px;width:120px;">
         <br>
         <center><span class="text-light display-4 my-auto">{{ \Illuminate\Support\Str::limit($user->name, 1, $end='') }}</span></center>
     </div>
     @else
     
         <br>
        <img src="{{ asset('/images/users/'.$user->profile_photo_path) }}" class="box mx-auto rounded-circle img-fluid shadow-lg" width="50%">
  
     @endif
     </div>
    

    </div>    

    <div class="col-lg-6 col-12 p-0">
       
        <div class="container py-5" id="user_cover">
        <h5 class="text-center font-weight-bold">EDIT PROFILE FOR <br>
        @php
        
         $arr = explode(' ',trim($user->name));
         echo htmlspecialchars($arr[0] .' '. $arr[1]);

        @endphp
        </h5>
        <hr>
         <!--role 0 is user-->
        @if($user->role == 0)
 <form method="POST" action="{{ route('edit.user') }}" enctype="multipart/form-data">
                        @csrf

                     
                      <div class="form-group p-2">
                           

                            <div class="col-md-12">
                                <h6 class="text-secondary">Upload New Image</h6>
                                <input type="file" name="user_image" >
                                @error('user_image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group p-2">
                           

                            <div class="col-md-12">
                                <input id="name" type="text" placeholder="Name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                

                         <div class="form-group p-2">
                           

                            <div class="col-md-12">
                                <input id="phone" type="phone" placeholder="Phone" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ $user->phone }}" required autocomplete="phone">

                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group mb-0">
                            <div class="col-md-12">
                                <button type="submit" class="btn bg-purple btn-block text-light">
                                    {{ __('Edit') }}
                                </button>
                            </div>
                        </div>
                    </form>
                    @endif


<!--role 2 is mechanic-->
@if($user->role == 2)
 <form method="POST" action="{{ route('edit.mechanic') }}" enctype="multipart/form-data">
                        @csrf

                     
                      <div class="form-group p-2">
                           

                            <div class="col-md-12">
                                <h6 class="text-secondary">Upload New Image</h6>
                                <input type="file" name="mechanic_image" >
                                @error('user_image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group p-2">
                           
                            <span class="text-dark text-secondary ml-3">Name</span>
                            <div class="col-md-12">
                                <input id="name" type="text" placeholder="Name" class="form-control @error('name') is-invalid @enderror" name="mechanic_name" value="{{ $user->name }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                           <div class="form-group p-2">
                           
                            <span class="text-dark text-secondary ml-3">Skill Type</span>
                            @if($user->spec ==0 )
                            <h6 class="text-danger ml-3">none specified, choose your skill</h6>
                            @else
                            <h6 class="text-dark ml-3 border rounded-lg p-2">{{$user->mechanic_type}}</h6>
                            @endif
                            <div class="col-md-12">
                            <select name="mechanic_spec" id="spec">
                            @foreach($mechanics as $mechanic_type)
                             <option value="{{$mechanic_type->m_id}}">{{$mechanic_type->mechanic_type}}</option>
                             @endforeach
                             </select>

                                @error('spec')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            
                        </div>


                        <div class="form-group p-2">
                           
                            <span class="text-dark text-secondary ml-3">Edit your professional information</span>
                            <div class="col-md-12">
                            <textarea type="textarea" id="profession" class="form-control @error('profession') is-invalid @enderror" name="mechanic_profession" rows="3" cols="5" maxlength="100" required>{{ $user->profession }}</textarea>
                                
                                @error('profession')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                   <div class="form-group p-2">
                           
                            <span class="text-dark text-secondary ml-3">Address</span>
                            <div class="col-md-12">
                                <input id="address" type="text" placeholder="address" class="form-control @error('address') is-invalid @enderror" name="mechanic_address" value="{{ $user->address }}" required autocomplete="address" autofocus>

                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                         <div class="form-group p-2">
                           
                            <span class="text-dark text-secondary ml-3">Phone</span>
                            <div class="col-md-12">
                                <input id="phone" type="phone" placeholder="Phone" class="form-control @error('phone') is-invalid @enderror" name="mechanic_phone" value="{{ $user->phone }}" required autocomplete="phone">

                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                            <div class="form-group p-2">
                           
                            <span class="text-dark text-secondary ml-3">Price</span>
                            <div class="col-md-12">
                                <input id="price" type="number" placeholder="Enter your price anmount in Naira(NGN)" class="form-control @error('price') is-invalid @enderror" name="mechanic_price" value="{{ $user->price }}" required autocomplete="price" autofocus>

                                @error('price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                   

                        <div class="form-group mb-0">
                            <div class="col-md-12">
                                <button type="submit" class="btn bg-purple btn-block text-light">
                                    {{ __('Edit') }}
                                </button>
                            </div>
                        </div>
                    </form>
                    @endif



                    <br>

    </div> 
    </div>

    </div>
 
</div>  
<script>
sessionStorage.clickcount = 1;

</script>  
@endsection