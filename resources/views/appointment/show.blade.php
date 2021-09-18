@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{route('home')}}" class="btn btn-primary">Go Back</a>
    
    <hr>
    <h5> You booked {{$workshop->name}} for {{$appointment->hours}}. It holds every {{$workshop->day}} by {{$workshop->time}}. Your total cost is NGN{{$appointment->hours*1000}}</h5>
    <hr>
    
@endsection