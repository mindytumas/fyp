@extends('layouts.master')


@section('content')


<div class ="container">
    <div class="row">
        <div class="col-md-8 form-inline">
            <h1><b>Members Details</b></h1>
                
                <form action="/search" method="get" class=" col-md-4 text-right">
                    <div class="input-group">
                        <input type="search" name="search" class="form-control">
                        <span class="input-group-prepend">
                            <button type="submit" class="btn  btn-primary">Search</button>
                        </span>
                    </div>
                    </form>
                
        @if(Auth::user()->admin != '1')
        <div class="col-md-2 text-right">
            <a href="{{ action ('MemberController@create') }}" class="btn  btn-primary" >Add Member</a>
        </div>
        @endif
    </div>
    
    <div class="container">
        <p>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>@sortablelink('name', 'NAME')</th>
                        <th>MEMBER ID</th>
                        <th>PAYMENT DATE</th>
                        <th>MEMBER STATUS</th>
                        <th width="230">ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = ($members->currentpage()-1)* $members->perpage() + 1;?>
                    @foreach($members as $mem)
                    <tr>
                            <td>{{$i++}}</td>
                            <td>{{$mem->name}}</td>
                            <td>{{$mem->memberNo}}</td>
                            <td>@if($mem->memberstatus == 'active')
                                {{ Carbon\Carbon::parse($mem->registerDate)->format('d-m-Y')}}
                            
                                @elseif($mem->memberstatus == 'expired')
                                {{ Carbon\Carbon::parse($mem->registerDate)->format('d-m-Y')}}

                                @else
                                {{($mem->registerDate == '-' )}}
                                not available

                                @endif
                            </td>
                            <td>{{$mem->memberstatus}}</td>

                            <td>
                    <form action="{{action('MemberController@destroy', $mem->id) }}" method="post">
                    <div class="dropdown">
                        <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Action
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="{{action('MemberController@show', $mem->id)}}">View</a>
                                            <a class="dropdown-item" href="{{action('MemberController@edit', $mem->id)}}">Edit</a>

                                                
                                                @method('DELETE')
                                                @csrf
                                            
                                                <button type="submit" id="deletesubmit" onclick="return confirm('Are you sure?')"  class="dropdown-item danger">Delete</button>
                                                
                                            </div>
                                        </div>                
                        
                    </form>
                </td>
                </tr>
                    @endforeach
            </table>
        </p>
            </div>

        </div>
    </div>
    {!! $members->appends(request()->except('page'))->render() !!}
        

@endsection