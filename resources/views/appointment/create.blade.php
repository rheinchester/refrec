@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{route('workshop.index')}}" class="btn btn-primary">Go Back</a>
    <h1>{{$workshop->name}}</h1>
    
    <hr>
    <h4>Day: {{$workshop->day}}</h4>
    <h4>Time: {{$workshop->time}}</h4>
    <h5>This appointment cost $10/hour. How many hours do you plan on attending?</h5>
    <h5 class="text-info">{{ session('message') }}</h5>
    <hr>
    {{-- <a href="{{route('appointment.store', [$workshop->id])}} " class="btn btn-primary float-right">Submit</a> --}}
    <form method="GET" action="{{ route('appointment.estimate') }}">
        @csrf
        <div class="input-group col-md-4">
            <input  value ="{{$hours}}" class="form-control" name="hours" placeholder="Enter hours here"> 
            <input  value ="{{$workshop->id}}" class="form-control" name="workshop_id" placeholder="Enter hours here" hidden> 
            <button type="submit" class="btn btn-info">Estimate hours</button>
        </div>
       
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <p class="text-danger">{{ $error }}</p>
            @endforeach
        @endif
    </form>
   
    
    
@endsection