@extends('layouts.master')


@section('content')



<div class ="container">
        <div class="row">
            <div class="col-md-12">
                <h1><b>Report of Members Details</b></h1>
              <div class="col-md-12 text-right">
                    <a href="{{ route('export_excel.excel') }}" class="btn btn-primary">Export to Excel</a>
            </div>
    <!--<div class="col-md-2">
            <a href="{{ action ('PDFController@getPDF') }}" class="btn btn-primary">Export to PDF</a>
    </div>-->
  

</div>

    <div class ="container">
        <p>
<table class="table table-bordered">
        <thead>
            <tr>
                <th>NO.</th>
                <th>NAME</th>
                <th>MEMBER ID</th>
                <th>PAYMENT DATE</th>
                <th>EXPIRY DATE</th>
                <th>YEAR BORN</th>
                <th>NRIC</th>
                <th>OCCUPATION</th>
                <th>TEL NO.</th>
                <th>MEMBER STATUS</th>
            </tr>
        </thead>
    <tbody>
    @foreach($members as $key => $mem)
        <tr>
                <td>{{$mem->id}}</td>

                <td>{{$mem->name}}</td>
                <td>{{$mem->memberNo}}</td>
                <td>{{Carbon\Carbon::parse($mem->registerDate)->format('d-m-Y')}}</td>
                <td>{{Carbon\Carbon::parse($mem->expiredDate)->format('d-m-Y')}}</td>
                <td>{{$mem->yearOfBorn}}</td>
                <td>{{$mem->nric}}</td>
                <td>{{$mem->occupation}}</td>
                <td>{{$mem->phoneNo}}</td>
                <td>{{$mem->memberstatus}}</td>
        </tr>
    @endforeach
</table>
</p>
</div>
</div>
</div>


@endsection