@extends('layouts.master')

@section('content')


<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <div class="card">
                    <div class="card-header"><h3><b>Create New User</b><h3></div>
      
                    <div class="card-body">

        <form action="{{ route('user.store')}}" method="post">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="name">NAME :</label>
                    <input type="text" name="name" class="form-control" required>
                </div>

                <div class="form-group">
                        <label for="name">USERNAME :</label>
                        <input type="text" name="username" class="form-control" required>
                    </div>

                <div class="form-group">
                    <label for="name">EMAIL ADDRESS :</label>
                    <input type="email" name="email" class="form-control" required>
                    </div>
                
                    <div class="form-group">
                            <label for="name">PASSWORD :</label>
                            <input type="text" name="password" class="form-control" value="secret" required>
                            </div>
                    

                    <div class="card-footer">
                            <button type="submit" class="btn btn-success">Submit</button>
                            
                          </div>

            </form>
      </div>   
    </div>
</div>
        </div>
    </div>

@stop
