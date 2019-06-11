@extends('layouts.master')

@section('content')

<div class="container">
    <canvas id="myChart"></canvas>
</div>

<script>
    let myChart = documeny.getElementById('myChart').getContext('2d');
</script>
@endsection