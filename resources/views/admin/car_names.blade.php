@extends('layouts.admin')

@section('content')
<div class="container">
<div class="d-flex justify-content-between">
<div class="p-2">    <!-- Page Heading -->
        <h2 class="h1 mb-2 text-gray-800 font-weight-normal">Car Names</h2>
</div>
<div class="p-2">    <!-- Page Heading -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
  Add Car Name
</button>
</div>

<div class="p-2">    <!-- Page Heading -->
<button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#myModal2">
  Add Car Model
</button>
</div>
</div>


<div class="row">
<div class="col-6">
<div class="container">



</div>
</div>
<div class="col-6">

<div class="container"></div>


</div>

</div>
    
                  
               <div class="table-responsive">
               <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                 <thead>
                   <tr>

                     
                     <th class="w3-small">Names</th>
                     <th class="w3-small">Action</th>



                   </tr>
                 </thead>

                 <tbody>
                    @foreach($car_names as $car_name)
                     <tr>
                     
                     <td><strong class="">{{ $car_name->car_name }} </strong>
                     <br>
                     @foreach($car_models as $car_model)
                     @if($car_model->car_name_fgn_id == $car_name->car_name_id)
                     <span class="small">{{ $car_model->car_model_name }} </span><br> 
                     @endif
                     @endforeach
                     </td>
                     <td>
                    <button class="btn btn-danger text-light"><small>Undeletable</small></button>
                        </td>
                        
                    </tr>
                     @endforeach       
                 </tbody>
               </table>
           
    
</div>


<div class="modal" id="myModal2">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Add Car Models</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
         <form method="POST" action="{{ route('car.models.add') }}">
                        @csrf


                        <div class="form-group p-2">
                           

                            <div class="col-md-12">
                                <input id="car_model_name" type="text" placeholder="car model name" class="form-control @error('car_name') is-invalid @enderror" name="car_model_name" value="{{ old('car_name') }}" required autocomplete="car_name" autofocus>

                                @error('car_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        
                        <div class="form-group p-2">
                           

                            <div class="col-md-12">
                            <select name="car_name_fgn_id" id="car_name_fgn_id">
                            @foreach($car_names as $car_name)
                             <option value="{{$car_name->car_name_id}}">{{$car_name->car_name}}</option>
                             @endforeach
                             </select>
                                @error('car_name_fgn_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
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





<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Add Car Names</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
         <form method="POST" action="{{ route('car.names.add') }}">
                        @csrf

                        <div class="form-group p-2">
                           

                            <div class="col-md-12">
                                <input id="name" type="text" placeholder="Name" class="form-control @error('name') is-invalid @enderror" name="car_name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
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
