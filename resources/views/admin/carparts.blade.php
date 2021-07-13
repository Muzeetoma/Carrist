@extends('layouts.admin')

@section('content')
<div class="container">
<div class="d-flex justify-content-between">
<div class="p-2">    <!-- Page Heading -->
        <h2 class="h1 mb-2 text-gray-800 font-weight-normal">Car Parts</h2>
</div>
<div class="p-2">    <!-- Page Heading -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
  Add Car Part
</button>
</div>
</div>
    
                  
               <div class="table-responsive">
               <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                 <thead>
                   <tr>

                     <th class="w3-small">Image</th>
                     <th class="w3-small">Name</th>
                     <th class="w3-small">Model</th>
                     <th class="w3-small">Price</th>
                     <th class="w3-small">Description</th>
                     <th class="w3-small">Status </th>
                     <th class="w3-small">Dealer </th>
                     <th class="w3-small">Action</th>



                   </tr>
                 </thead>

                 <tbody>
                    @foreach($carparts as $carpart)
                     <tr>
                     <td><img src="{{ asset('/images/carparts/'.$carpart->car_image) }}" height="60px" width="60px"></td>
                     <td><span class="small">{{ $carpart->part_name }} </span> </td>
                     <td><span class="small">
                     
                        @foreach($car_models as $car_model)
                        @if($carpart->car_model_id == $car_model->car_model_id)
                         {{ $car_model->car_model_name }} 
                         
                         @foreach($car_names as $car_name)
                        @if($car_model->car_name_fgn_id == $car_name->car_name_id)
                         <strong>{{ $car_name->car_name }} </strong>
                        @endif
                        @endforeach

                        @endif
                        @endforeach
                        </span> </td>
                     <td><span class="small">{{ $carpart->price }} </span> </td>
                     <td><span class="small">{{ $carpart->description }} </span> </td>
                     
                         <td>
                          @if($carpart->availability == 0)
                             <form action="{{ route('carpart.available') }}" method="post">
                            {{ csrf_field() }}
                            <input type="hidden" name="id" value="{{ $carpart->car_id }}">
                            <button type="submit" name="available" class="btn btn-dark px-3 py-1"><small class="">inactive</small></button>
                            </form>
                         @endif
                         @if($carpart->availability == 1)
                            <form action="{{ route('carpart.available') }}" method="post">
                            {{ csrf_field() }}
                            <input type="hidden" name="id" value="{{ $carpart->car_id }}">
                            <button type="submit" name="available" class="btn btn-success px-3 py-1"><small class="">active</small></button>
                            </form>
                         @endif
                          
                        </td>
                        <td><span class="small">
                        @foreach($dealers as $dealer)
                        @if($carpart->dealer_id == $dealer->id)
                         {{ $dealer->name }} 
                        @endif
                        @endforeach
                        </span> </td>
                        <td>
                         <form action="{{ route('carpart.show.edit') }}" method="post">
                            {{ csrf_field() }}
                            <input type="hidden" name="id" value="{{ $carpart->car_id }}">
                            <button type="submit" name="edit" class="btn btn-warning px-2 py-1"><small>Edit</small></button>
                            </form>
                             </td>
                         <td>
                            <form action="{{ route('carpart.delete') }}" method="post">
                            {{ csrf_field() }}
                            <input type="hidden" name="id" value="{{ $carpart->car_id }}">
                            <button type="submit" name="delete" class="btn btn-danger px-2 py-1"><small class="la la-trash"></small></button>
                            </form>
                        </td>
                        
                        </tr>
                     @endforeach       
                 </tbody>
               </table>
           
    <br><hr>
<div class="d-flex justify-content-center">
    {!! $carparts->links() !!}
</div>
</div>


<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Add Car Part</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
         <form method="POST" action="{{ route('carpart.store') }}" enctype="multipart/form-data">
                        @csrf


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
                                <input id="name" type="text" placeholder="Name" class="form-control @error('name') is-invalid @enderror" name="part_name" value="{{ old('name') }}" required autocomplete="name" autofocus>

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
                                <input id="price" type="number" placeholder="price" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price') }}" required autocomplete="price">

                                @error('price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group p-2">
                           

                            <div class="col-md-12">
                                <input id="description" placeholder="Description" type="description" class="form-control @error('description') is-invalid @enderror" name="description" required autocomplete="new-description">

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
                               <input list="dealers" name="dealer_id" id="dealer">

                            <datalist id="dealers">
                            @foreach($dealers as $dealer)
                            <option value="{{$dealer->id}}">{{$dealer->name}}</option>
                            @endforeach
                            </datalist>
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

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
@endsection
