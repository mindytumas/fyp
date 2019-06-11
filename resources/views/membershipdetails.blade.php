@extends('layouts.master')


@section('content')


<div class ="container">
        <div class="row">
            <div class ="form-inline">
            
            <div class="col-md-8">
                <h1><b>Membership Details</b></h1>
            </div> 
                    
                    <form action="/search1" method="get" class="col-md-4 text-right" >
                        <div class="input-group">
                            <input type="search" name="search" class="form-control">
                            <span class="input-group-prepend">
                                <button type="submit" class="btn  btn-primary">Search</button>
                            </span>
                        </div>
                        </form>
                    
                    
        </div>
        <div class="container">
                <p>
                    <table class="table">
  <thead class="thead-dark">
        <tr>
            <th>NO</th>
            <th>NAME</th>
            <th>MEMBER ID</th>
            <th>PAYMENT DATE</th>
            <th>EXPIRY DATE</th>
            <th>MEMBER STATUS</th>
            @if(Auth::user()->admin != '1')
            <th width="230">ACTION</th>
            @endif
        </tr>
    
    </thead>
    <tbody class="thead-light">
        <?php $i = 0 ?>
        @foreach($members as $mem)
        <?php $i++ ?>
        <tr>
                <td>{{$i}}</td>
                <td>{{$mem->name}}</td>
                <td>{{$mem->memberNo}}</td>
                <td>@if($mem->memberstatus == 'active')
                    {{ Carbon\Carbon::parse($mem->registerDate)->format('d-m-Y')}}
                
                    @elseif($mem->memberstatus == 'expired')
                    {{ Carbon\Carbon::parse($mem->registerDate)->format('d-m-Y')}}

                    @elseif($mem->memberstatus == 'pending')
                    {{$mem->registerDate == '-' }}
                    not available
                    @endif
                </td>
                <td>
                    @if($mem->memberstatus == 'active')
                    {{ Carbon\Carbon::parse($mem->expiredDate)->format('d-m-Y')}}
                    
                    @elseif($mem->memberstatus == 'expired')
                    {{ Carbon\Carbon::parse($mem->expiredDate)->format('d-m-Y')}}
    
                    @elseif($mem->memberstatus == 'pending')
                    {{$mem->expiredDate == '-' }}
                    not available
                    @endif
                </td>
                <td>{{$mem->memberstatus}}</td>
                @if(Auth::user()->admin != '1')
                <td>
                
                    @if ($mem->memberstatus == 'pending')
                    <a href="{{ route('memberstatus.pendingmakeactive', ['id' =>$mem->id])}}" class="btn btn-success btn-sm">Activate</a>

                    @elseif($mem->memberstatus == 'active')
                        <label class="red">Disable</label>
                    
                    @elseif($mem->memberstatus == 'expired')
                        <!--<a href="{{ route('memberstatus.renew', ['id' =>$mem->id])}}" class="btn btn-warning btn-sm">Renew</a>-->
                        
                        <form action="{{action('MemberController@renew', ['id' =>$mem->id])}}" method="post">
                        @csrf
                      
                        <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#renewdate" value="PUT">
                            Renew
                        </button>


                        <!--Modal-->
                        <div class="modal fade" id="renewdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLabel">RENEW DATE :</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                        Please fill in the <b>renew date</b> :
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
                            </form>
                        
                    @endif
            </td>
            @endif

    </tr>
    @endforeach
</table>
</p>
</div>

</div>
</div>
{{ $members->links()}}



@endsection