@extends('layouts.app')
@section('content')
{{-- @include('inc.padding') --}}
<div class="container custom-padding">
    <a href="{{route('admin.dashboard')}}" class="btn btn-primary">Go Back</a>
    <hr>
    <h1>A workshop named <strong>{{$name}}</strong> already exists.</h1>
@endsection