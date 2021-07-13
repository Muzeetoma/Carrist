@extends('layouts.admin')

@section('content')
<div class="container">
    
<div class="container">
<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#myModal1">
  Add Dealer
</button>
</div>
                  
               <div class="table-responsive">
               <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                 <thead>
                   <tr>
                     <th class="w3-small">Image</th> 
                     <th class="w3-small">Name</th>
                     <th class="w3-small">Email</th>
                     <th class="w3-small">Phone</th>
                     <th class="w3-small">Role</th>
                     <th class="w3-small">Profession</th>
                     <th class="w3-small">Address </th>
                     <th class="w3-small">Action</th>



                   </tr>
                 </thead>

                 <tbody>
                    @foreach($dealers as $user)
                     <tr>
                     <td>
                     @if(empty($user->profile_photo_path))
                     <img src="{{ asset('/images/users/default.png') }}" height="50px" width="50px" class="rounded-circle" />
                     @else
                     <img src="{{ asset('/images/users/'.$user->profile_photo_path) }}" height="50px" width="50px" class="rounded-circle" />
                     @endif
                     </td>
                     <td><span class="small">{{ $user->name }} </span> </td>
                     <td><span class="small">{{ $user->email }} </span> </td>
                     <td><span class="small">{{ $user->phone }} </span> </td>
                     <td><span class="small"><span class="font-weight-bold text-success">Dealer</span></span></td>
                        <td><span class="small">
                        @if(empty($user->profession))
                        None
                        @else
                        {{ $user->profession }}
                        @endif
                         
                        </span> 
                        </td>
                        <td><span class="small">
                        @if(empty($user->address))
                        None
                        @else
                        {{ $user->address }} 
                        @endif
                        </span> 
                        </td>
                        <td><a href="/dealer-edit/{{$user->id}}" class="btn btn-primary">update</a></td>
                         <td>
                          @if($user->available == 0)
                             <form action="{{ route('dealers.available') }}" method="post">
                            {{ csrf_field() }}
                            <input type="hidden" name="id" value="{{ $user->id }}">
                            <button type="submit" name="available" class="btn btn-dark px-3 py-1"><small class="">suspended</small></button>
                            </form>
                         @endif
                         @if($user->available == 1)
                            <form action="{{ route('dealers.available') }}" method="post">
                            {{ csrf_field() }}
                            <input type="hidden" name="id" value="{{ $user->id }}">
                            <button type="submit" name="available" class="btn btn-success px-3 py-1"><small class="">active</small></button>
                            </form>
                         @endif
                          
                        </td>
                
                          <td>
                          @if($user->verified == 0)
                             <form action="{{ route('dealers.verify') }}" method="post">
                            {{ csrf_field() }}
                            <input type="hidden" name="id" value="{{ $user->id }}">
                            <button type="submit" name="verify" class="btn btn-dark px-3 py-1"><small class="">unverified</small></button>
                            </form>
                         @endif
                         @if($user->verified == 1)
                            <form action="{{ route('dealers.verify') }}" method="post">
                            {{ csrf_field() }}
                            <input type="hidden" name="id" value="{{ $user->id }}">
                            <button type="submit" name="unverify" class="btn btn-success px-3 py-1"><small class="">verified</small></button>
                            </form>
                         @endif
                          
                        </td>
                        <td>
                            <form action="{{ route('dealers.delete') }}" method="post">
                            {{ csrf_field() }}
                            <input type="hidden" name="id" value="{{ $user->id }}">
                            <button type="submit" name="delete" class="btn btn-danger px-2 py-1"><small class="la la-trash"></small></button>
                            </form>
                        </td>
                        
                        </tr>
                     @endforeach       
                 </tbody>
               </table>

<div class="d-flex justify-content-center">
    {!! $dealers->links() !!}
</div> 
</div>



<div class="modal" id="myModal1">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Add Dealer</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
      <form method="POST" action="{{ route('register.dealer') }}" id="dealer_form">
                        @csrf

                         <!--<input type="hidden" name="verified" value="0">  
                         <input type="hidden" name="available" value="0">-->
                            
                        <div class="form-group p-2">
                           

                            <div class="col-md-12">
                                <input id="name" type="text" placeholder="Name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group p-2">
                           

                            <div class="col-md-12">
                                <input id="email" type="email" placeholder="Email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                         <div class="form-group p-2">
                           

                            <div class="col-md-12">
                                <input id="phone" type="phone" placeholder="Phone" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone">

                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                         <div class="form-group p-2">
                           

                            <div class="col-md-12">
                                <input id="address" type="address" placeholder="address" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address">

                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group p-2">
                           

                            <div class="col-md-12">
                                <input id="profession" type="profession" placeholder="Profession" class="form-control @error('profession') is-invalid @enderror" name="profession" value="{{ old('profession') }}" required autocomplete="profession">

                                @error('profession')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                      
                        <div class="form-group p-2">
                           

                            <div class="col-md-12">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required value="QRe2345eQt" autocomplete="new-password" readonly>

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                      

                        <input type="hidden" name="role" value="1"> 
                        
                    
                        <div class="form-group p-2">
                           
                         
                            <div class="col-md-12">
                                <input id="password-confirm" placeholder="Confirm Password" type="password" class="form-control" name="password_confirmation" value="QRe2345eQt" required autocomplete="new-password" readonly>
                            </div>
                         
                        </div>
                      

                        <div class="form-group mb-0">
                            <div class="col-md-12">
                                <button type="submit" id="submit" class="btn btn-warning btn-block">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
@endsection
