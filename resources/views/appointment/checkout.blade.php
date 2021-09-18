@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{route('home')}}" class="btn btn-primary">Go Back</a>
    <h1>Congrats {{Auth::user()->name}}</h1>
    
    <hr>
    <h5> You have booked {{$workshop->name}} for {{$appointment->hours}} hours. It holds every {{$workshop->day}} by {{$workshop->time}}.</h5>
    <hr>
    
@endsection