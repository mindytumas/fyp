@extends('layouts.master')

@section('content')



<div class="container-fluid">
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title"><b>Users Details<b></h3>
        
        <!-- search function
        <div class="row inline">
          <div class="card-tools">
            <div class="input-group input-group-sm" style="width: 150px;">
              <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

              <div class="input-group-append">
                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
              </div>
            </div>
          </div>
        </div>
        -->

        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
          <table class="table table-hover">
            <tbody><tr>
              <th>NO.</th>
              <th>NAME</th>
              <th>USERNAME</th>
              <th>EMAIL ADDRESS</th>
              <th>DELETE</th>
            </tr>
            <tr>
                
                    <tbody>
                            @if($users->count() > 0)
                            
                                @foreach($users as $user)
                                <tr>
                                    <td>
                                      {{$user->id}}
                                    </td>
        
                                    <td>
                                        {{$user->name}}
                                    </td>
                                    <td>
                                        {{$user->username}}
                                    </td>
                                    <td>
                                        {{$user->email}}
                                    </td>
                                    
                                    <td>
                                        @if(Auth::id() !== $user->id)
                                            <a href="{{ route('user.delete', ['id' =>$user->id])}}" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')" >Delete</a>
                                        @endif 
                                    </td>
                                  </tr>
                                @endforeach
                            @else
                                <tr>
                                    <th colspan="5" class="text-center">No users</th>
                                </tr>
                                @endif
         
                        </tbody></table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                    </div>
                </div>
            </div>

               
    
@stop



