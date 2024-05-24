@extends('layouts.app')
@section('content')
{{-- @include('inc.padding') --}}
<div class="container custom-padding">
    <a href="{{route('home')}}" class="btn btn-primary">Go Back</a>
    Sorry! You can only book one appointment a day. You would have to drop your already existing appointment before rescheduling another one.
    <hr>
@endsection