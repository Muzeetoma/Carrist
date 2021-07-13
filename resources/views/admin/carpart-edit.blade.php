@extends('layouts.admin')

@section('content')
<div class="container">
 <form method="POST" action="{{ route('carpart.edit') }}" enctype="multipart/form-data">
                      @csrf

                      <input type="hidden" value="{{ $carpart->car_id }}" name="car_id">
                      <div class="form-group p-2">
                           

                            <div class="col-md-12">
                                <input type="file" name="car_image" >
                                @error('car_img')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group p-2">
                           

                            <div class="col-md-12">
                            <h5 class="text-secondary">Carpart name</h5>
                                <input id="name" type="text" value="{{ $carpart->part_name }}" class="form-control @error('name') is-invalid @enderror" name="part_name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group p-2">
                           
                            <h6 class="ml-3 text-secondary">Car Model</h6>
                            <div class="col-md-12">
                            <select name="model" id="car_model_name">
                            @foreach($car_models as $car_model)
                             <option value="{{$car_model->car_model_id}}">{{$car_model->car_model_name}}</option>
                             @endforeach
                             </select>
                                @error('car_model')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                         <div class="form-group p-2">
                           

                            <div class="col-md-12">
                            <h5 class="text-secondary">Carpart price</h5>
                                <input id="price" type="number" value="{{ $carpart->price }}" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price') }}" required autocomplete="price">

                                @error('price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group p-2">
                           

                            <div class="col-md-12">
                            <h5 class="text-secondary">Description</h5>
                                <input id="description" value="{{ $carpart->description }}" type="text" class="form-control @error('description') is-invalid @enderror" name="description" required autocomplete="new-description">

                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                       <div class="form-group p-2">
                           <h6 class="ml-4">Dealer</h6>

                            <div class="col-md-12">
                            
                            <select name="dealer_id" id="dealer">
                            @foreach($dealers as $dealer)
                            <option value="{{$dealer->id}}">{{$dealer->name}}</option>
                            @endforeach
                            </select>
                            </div>
                        </div>

                        <div class="form-group mb-0">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary btn-block">
                                    {{ __('ADD') }}
                                </button>
                            </div>
                        </div>
                    </form>
</div>
@endsection