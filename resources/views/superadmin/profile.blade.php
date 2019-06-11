@extends('layouts.master')

@section('content')


<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <div class="card">
                    <div class="card-header"><h3><b>Edit My Profile</b><h3></div>
    
    
            <div class="card-body">
            <form action="{{ route('user.profile.update')}}" method="post" enctype='multipart/form-data'>
                {{csrf_field()}}
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" value="{{$user->name}}" class="form-control" required="autofocus">
                </div>

                <div class="form-group">
                        <label for="name">Username</label>
                        <input type="text" name="username" value="{{$user->username}}" class="form-control" required="autofocus">
                </div>
    

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" value="{{$user->email}}" class="form-control" required="autofocus">
                    </div>
                

                <div class="form-group">
                    <label for="password">New Password</label>
                    <div class="input-group">
                        <input type="password" name="password" class="form-control" value="{{$user->password}}" id="pwd">                    
                            <div class="input-group-text">
                                    <i class ="fa fa-eye" id="eye"></i>
                            </div>
                    </div>
                </div>

                <div class="form-group">
                        <label for="password-confirm">Confirm Password</label>
                        <input id="password-confirm" type="text" class="form-control" name="password_confirmation" >     
                </div>

       



                <div class="card-footer">
                        <button type="submit"  class="btn btn-warning">Update</button> 
                </div>

            </form>
        </div>
    </div>
</div>
</div>
</div>

@stop