@extends('layouts.app')
@section('content')
{{-- @include('inc.padding') --}}
<div class="container custom-padding">
    <a href="{{route('home')}}" class="btn btn-primary">Go Back</a>
    <h3>You are booking {{$workshop->name}}</h3>
    <hr>
    <h5> It  holds every {{$workshop->day}} by {{$workshop->time}}. The total duration is {{$hours}}, therefore {{$message}}.</h5>
    <form  method="POST" action="{{ route('appointment.store', [$workshop->id]) }}">
        @csrf
        <div class="input-group col-md-4">
            <input  value ="{{$hours}}" class="form-control" name="hours" placeholder="Enter hours here" hidden> 
            <button type="submit" class="btn btn-info float-right">Submit</button>
        </div>
    </form>
    <hr>


    {{-- <a href="{{route('appointment.store', [$workshop->id])}} " class="btn btn-primary float-right">Submit</a> --}}
@endsection