@extends('layouts.admin')

@section('content')
<div class="container">
    
                  
               <div class="table-responsive">
               <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                 <thead>
                   <tr>

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
                    @foreach($users as $user)
                     <tr>
                     <td><span class="small">{{ $user->name }} </span> </td>
                     <td><span class="small">{{ $user->email }} </span> </td>
                     <td><span class="small">{{ $user->phone }} </span> </td>
                     <td><span class="small">
                         @if($user->role == 0)
                           <span class="font-weight-bold text-success">User</span>
                         @endif
                         @if($user->role == 2)
                           <span class="font-weight-bold text-success">Mechanic</span>
                         @endif
                          @if($user->role == 1)
                           <span class="font-weight-bold text-success">Dealer</span>
                         @endif
                        </span> </td>
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
                         <td>
                          @if($user->available == 0)
                             <form action="{{ route('users.available') }}" method="post">
                            {{ csrf_field() }}
                            <input type="hidden" name="id" value="{{ $user->id }}">
                            <button type="submit" name="available" class="btn btn-dark px-3 py-1"><small class="">suspended</small></button>
                            </form>
                         @endif
                         @if($user->available == 1)
                            <form action="{{ route('users.available') }}" method="post">
                            {{ csrf_field() }}
                            <input type="hidden" name="id" value="{{ $user->id }}">
                            <button type="submit" name="available" class="btn btn-success px-3 py-1"><small class="">active</small></button>
                            </form>
                         @endif
                          
                        </td>
                
                          <td>
                          @if($user->verified == 0)
                             <form action="{{ route('users.verify') }}" method="post">
                            {{ csrf_field() }}
                            <input type="hidden" name="id" value="{{ $user->id }}">
                            <button type="submit" name="verify" class="btn btn-dark px-3 py-1"><small class="">unverified</small></button>
                            </form>
                         @endif
                         @if($user->verified == 1)
                            <form action="{{ route('users.verify') }}" method="post">
                            {{ csrf_field() }}
                            <input type="hidden" name="id" value="{{ $user->id }}">
                            <button type="submit" name="unverify" class="btn btn-success px-3 py-1"><small class="">verified</small></button>
                            </form>
                         @endif
                          
                        </td>
                        <td>
                            <form action="{{ route('users.delete') }}" method="post">
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
    {!! $users->links() !!}
</div> 
</div>
@endsection
