@extends('layouts.app')
@section('content')
{{-- @include('inc.padding') --}}
<div class="container custom-padding">
    <a href="{{route('home')}}" class="btn btn-primary">Go Back</a>
    <h3>{{$workshop->name}}</h3>
    <hr>
    <h5> Holds every {{$workshop->day}} by {{$workshop->time}}. </h5>
    <hr>
    
@endsection