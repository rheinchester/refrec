@extends('layouts.app')
@section('content')
{{-- @include('inc.padding') --}}
<div class="container custom-padding">
    <a href="{{route('home')}}" class="btn btn-primary">Go Back</a>
    <h3>{{$workshop->name}}</h3>
    <hr>
    <h4> Holds every {{$workshop->day}} by {{$workshop->time}}. </h4>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
    <hr>
    
@endsection