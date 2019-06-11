@extends('layouts.master')

@section('content')



<div class="container">
  <div class="row justify-content-center">
      <div class="col-md-11">
          <div class="card">
              <div class="card-header"><h3><b>Register New Member</b><h3></div>

              <div class="card-body">

              <form action="{{action('MemberController@store') }}" method="post" data-parsley-validate ="">
               @csrf
    
            <div class="form-group">
                <label for="name">NAME :</label>
                <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}" >
            </div>
  
            <div class="form-group">
              <label for="memberNo">MEMBER ID :</label>
              <input type="string" class="form-control" name="memberNo" id="memberNo" value="{{ old('memberNo') }}" required>
            </div>
   
            <div class="form-group">
              <label for="yearOfBorn">YEAR BORN :</label>
              <input type="year" class="form-control" name="yearOfBorn" id="yearOfBorn" value="{{ old('yearOfBorn') }}"   required>
            </div>
  
            <div class="form-group">
              <label for="nric">IC NUMBER :</label>
              <label class="red">*without dash (-)*</label>
              <input type="string" class="form-control" name="nric" id="nric" value="{{ old('nric') }}"  required>
            </div>
  
            <div class="form-group">
                <label for="occupation">OCCUPATION :</label>
                <input type="string" class="form-control" name="occupation" id="occupation"value="{{ old('occupation') }}"   required>
            </div>
  
            <div class="form-group">
              <label for="address">ADDRESS :</label>
              <input type="text" class="form-control" name="address" id="address" value="{{ old('address') }}"   required>
            </div>
              
            <div class="form-group">
                <label for="phoneNo">PHONE NO :</label>
                <input type="integer" class="form-control" name="phoneNo" id="phoneNo" value="{{ old('phoneNo') }}"   required>
            </div>
          
          <label for="paymentstatus">MEMBERSHIP FEE PAYMENT STATUS :</label>
          <div class="form-check">
            <li><label>Not Complete</label>
                <input type="checkbox" name="paymentstatus" id="paymentstatus" value="0"  >

          </div></li>
         <div class="form-check">
                <li><label>Complete</label>
        <input type="checkbox" class="btn btn-primary" data-toggle="modal" data-target="#paymentdate" name="paymentstatus" id="paymentstatus" value="1"  >
          
        </div> </li> 
          <!-- Modal -->
          <div class="modal fade" id="paymentdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">PAYMENT DATE :</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                    If payment status is <i>completed</i>, please fill in the <b>payment date</b> :
                      <div class="form-group">
                        <input type="date" class="form-control" name="registerDate" id="registerDate" >
                      </div>
                      
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Save</button>
                </div>
              </div>
            </div>
          </div>




        <!-- /.card-body -->
        
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
                
              </div>
            
            </div>
          </div>
      </div>
      </div>
      </div>


@endsection
