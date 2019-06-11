<!DOCTYPE html>
<html>
    <head>
        
        <title>PDF</title>
        <style type="text/css">
        table{
            width: 100%  
            margin: 0 auto;
            border: 1px solid;

        }
        </style>
    </head>
    <body>
    <table>
        <caption><h1>Member Info</h1></caption>
        <thead>
            <tr>
                <th>NAME</th>
                <th>MEMBER ID</th>
                <th>REGISTER DATE</th>
                <th>EXPIRED DATE</th>
                <th>YEAR BORN</th>
                <th>IC NUMBER</th>
                <th>OCCUPATION</th>
                <th>NO TEL</th>
                <th>STATUS</th>
            </tr>
        </thead>
    <tbody>
    @foreach($members as $key => $mem)
        <tr>
                <td>{{$mem->name}}</td>
                <td>{{$mem->memberNo}}</td>
                <td>{{$mem->registerDate}}</td>
                <td>{{$mem->expiredrDate}}</td>
                <td>{{$mem->yearOfBorn}}</td>
                <td>{{$mem->nric}}</td>
                <td>{{$mem->occupation}}</td>
                <td>{{$mem->phoneNo}}</td>
                <td>{{$mem->status}}</td>
        </tr>
    @endforeach
    </tbody>
</table>
</body>
</html>

