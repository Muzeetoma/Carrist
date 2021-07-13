@extends('layouts.admin')

@section('content')
<form method="POST" action="{{ route('edit.dealer') }}" enctype="multipart/form-data">
                        @csrf

                        <input type="hidden" name="id" value="{{$user->id}}">
                      <div class="form-group p-2">
                     

                            <div class="col-md-12">
                                <h6 class="text-secondary">Upload New Image</h6>
                                <input type="file" name="dealer_image" >
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
                                <input id="name" type="text" placeholder="Name" class="form-control @error('name') is-invalid @enderror" name="dealer_name" value="{{ $user->name }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                         <div class="form-group p-2">
                           
                            <span class="text-dark text-secondary ml-3">Dealer In</span>
                             @if($user->spec ==0 )
                            <h6 class="text-danger ml-3">none specified, choose what you deal in</h6>
                            @else
                            <h6 class="text-dark ml-3 border rounded-lg p-2">{{$user->dealer_type}}</h6>
                            @endif
                            <div class="col-md-12">
                            <select name="dealer_spec">
                            @foreach($dealers as $dealer_type)
                             <option value="{{$dealer_type->d_id}}">{{$dealer_type->dealer_type}}</option>
                             @endforeach
                             </select>

                                @error('dealer_spec')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group p-2">
                           
                            <span class="text-dark text-secondary ml-3">Profession Summary</span>
                            <div class="col-md-12">
                                <input id="profession" type="text" placeholder="profession" class="form-control @error('profession') is-invalid @enderror" name="dealer_profession" value="{{ $user->profession }}" required autocomplete="profession" autofocus>
                                
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
                                <input id="address" type="text" placeholder="address" class="form-control @error('address') is-invalid @enderror" name="dealer_address" value="{{ $user->address }}" required autocomplete="address" autofocus>

                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                  <!--
                   <div class="form-group p-2">
                           
                            <span class="text-dark text-secondary ml-3">Price</span>
                            <div class="col-md-12">
                                <input id="price" type="number" placeholder="Enter your price amount for your services" class="form-control @error('price') is-invalid @enderror" name="dealer_price" value="{{ $user->price }}" required autocomplete="price" autofocus>

                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        -->

                         <div class="form-group p-2">
                           
                            <span class="text-dark text-secondary ml-3">Phone</span>
                            <div class="col-md-12">
                                <input id="phone" type="phone" placeholder="Phone" class="form-control @error('phone') is-invalid @enderror" name="dealer_phone" value="{{ $user->phone }}" required autocomplete="phone">

                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group mb-0">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary text-light">
                                    {{ __('Edit') }}
                                </button>
                            </div>
                        </div>
                    </form>



@endsection