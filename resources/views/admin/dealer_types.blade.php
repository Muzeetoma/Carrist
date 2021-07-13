@extends('layouts.admin')

@section('content')
<div class="container">
<div class="d-flex justify-content-between">
<div class="p-2">    <!-- Page Heading -->
        <h2 class="h1 mb-2 text-gray-800 font-weight-normal">Dealer Types</h2>
</div>
<div class="p-2">    <!-- Page Heading -->
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
    Add Type
  </button>
  </div>
</div>
    
                  
               <div class="table-responsive">
               <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                 <thead>
                   <tr>

                     <th class="w3-small">Image</th>
                     <th class="w3-small">Name</th>
                     <th class="w3-small">Action</th>



                   </tr>
                 </thead>

                 <tbody>
                    @foreach($dealer_types as $dealer_type)
                     <tr>
                     <td><img src="{{ asset('/images/dealers/'.$dealer_type->image_path) }}" height="60px" width="60px"></td>
                     <td><span class="small">{{ $dealer_type->dealer_type }} </span> </td>
                     <td>

                     <!--       <form action="{{ route('dealer.types.destroy') }}" method="post">
                            {{ csrf_field() }}
                            <input type="hidden" name="id" value="{{ $dealer_type->d_id }}">
                            <button type="submit" name="delete" class="btn btn-danger px-2 py-1"><small class="la la-trash"></small></button>
                            </form>-->
                            <button class="btn btn-danger text-light"><small>Undeletable</small></button>
                        </td>
                        
                    </tr>
                     @endforeach       
                 </tbody>
               </table>
           
    
</div>


<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Add Dealer Type</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
         <form method="POST" action="{{ route('dealer.types.add') }}" enctype="multipart/form-data">
                        @csrf


                      <div class="form-group p-2">
                           

                            <div class="col-md-12">
                                <input type="file" name="dealer_image" >
                                @error('dealer_img')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group p-2">
                           

                            <div class="col-md-12">
                                <input id="name" type="text" placeholder="Name" class="form-control @error('name') is-invalid @enderror" name="dealer_type" value="{{ old('name') }}" required autocomplete="name" autofocus>

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
