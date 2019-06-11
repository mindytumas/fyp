@extends('layouts.master')

@section('content')


@if (count($errors) > 0)
<div class="alert alert-danger" role="alert">
    <strong>Errors :</strong></ul>
    @foreach($errors->all() as $error)
        <li>{{$error}}</li>
    @endforeach
</div>
@endif

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">
                <div class="card-header"><h3><b>Edit Member Details</b><h3></div>


        <div class="card-body">
        @foreach($members as $mem)

            <form action="{{action('MemberController@update', $mem->id)}}" method="post">
            @csrf
            @method('PUT')
  

            <div class="form-group">
                <label>Nama</label>
                <input type="text" class="form-control" name="name" value="{{$mem->name}}" required="autofocus">
            </div>


            <div class="form-group">
              <label>Member ID</label>
              <input type="string" class="form-control"name="memberNo" value="{{$mem->memberNo}}" required="autofocus">
            </div>
     
            
            <div class="form-group">
              <label>Tahun Kelahiran</label>
              <input type="year" class="form-control" name="yearOfBorn" value="{{$mem->yearOfBorn}}" required="autofocus">
            </div>
  
            <div class="form-group">
              <label>No. Kad Pengenalan</label>
              <input type="string" class="form-control" name="nric" value="{{$mem->nric}}" required="autofocus">
            </div>
  
            <div class="form-group">
                <label>Pekerjaan</label>
                <input type="string" class="form-control" name="occupation" value="{{$mem->occupation}}" required="autofocus" >
            </div>
  
            <div class="form-group">
              <label>Alamat</label>
              <input type="text" class="form-control" name="address" value="{{$mem->address}}" required="autofocus">
            </div>
              
            <div class="form-group">
                <label>Nombor Tel</label>
                <input type="integer" class="form-control" name="phoneNo" value="{{$mem->phoneNo}}" required="autofocus">
            </div>

            
            <div class="card-footer">
                    <button type="submit"  class="btn btn-warning">Update</button> 
                    <a href="{{ action('MemberController@index')}}" class="btn btn-default">Back</a>
            </div>
                </form>
        @endforeach
                </div>
              </div>
          </div>
        </div>
      </div>
    </div>
@endsection
