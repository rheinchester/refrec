@extends('layouts.app')
@section('content')
{{-- @include('inc.padding') --}}
<div class="container custom-padding">
    <a href="{{route('home')}}" class="btn btn-primary">Go Back</a>
    Sorry! You can only book one appointment a day 
    <hr>


    {{-- <a href="{{route('appointment.store', [$workshop->id])}} " class="btn btn-primary float-right">Submit</a> --}}
@endsection