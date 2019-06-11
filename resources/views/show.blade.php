@extends('layouts.master')

@section('content')



<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <div class="card">
                    <div class="card-header"><h3><b>View Member Details</b><h3></div>  

                        <div class="card-body">

    @foreach($members as $mem)
        <div class="card-title"><b>NAME : {{$mem->name}}</b></div>
        <p class="card-text"><b>MEMBER ID: </b>{{$mem->memberNo}}</p>

        <p class="card-text"><b>PAYMENT DATE: </b>
            @if($mem->memberstatus == 'active')
            {{ Carbon\Carbon::parse($mem->registerDate)->format('d-m-Y')}}

            @elseif($mem->memberstatus == 'expired')
            {{ Carbon\Carbon::parse($mem->registerDate)->format('d-m-Y')}}

            @elseif($mem->memberstatus == 'pending')
            {{$mem->registerDate == '-' }}
            not available
            @endif 
        </p>
        <p class="card-text"><b>EXPIRY DATE : </b>
            @if($mem->memberstatus == 'active')
            {{ Carbon\Carbon::parse($mem->registerDate)->format('d-m-Y')}}

            @elseif($mem->memberstatus == 'expired')
            {{ Carbon\Carbon::parse($mem->registerDate)->format('d-m-Y')}}

            @elseif($mem->memberstatus == 'pending')
            {{$mem->registerDate == '-' }}
            not available
            @endif 
        </p>
        <p class="card-text"><b>YEAR BORN : </b>{{$mem->yearOfBorn}}</p>
        <p class="card-text"><b>IC NUMBER : </b>{{$mem->nric}}</p>
        <p class="card-text"><b>OCCUPATION : </b>{{$mem->occupation}}</p>
        <p class="card-text"><b>ADDRESS : </b>{{$mem->address}}</p>
        <p class="card-text"><b>PHONE NO: </b>{{$mem->phoneNo}}</p>
        <p class="card-text"><b>MEMBER STATUS: </b>{{$mem->memberstatus}}</p>


        <a href="{{action('MemberController@index')}}" class="btn btn-primary">Back</a>
        </div>
    @endforeach
</div>
</div>
            </div>
        </div>
    </div>
</div>
</div>

@endsection
