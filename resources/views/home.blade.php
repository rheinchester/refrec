@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('User Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    
                    <div class="panel">
                        <h1>Hello {{Auth::user()->name}}!</h1>
                    </div>

                    
                     @if (Auth::user()->appointment)
                    
                    <table class="table table-striped">
                        <tr>
                            <th>Name</th>
                            <th>Date</th>
                            <th>Time</th>
                           
                            <th colspan='2' class="text-center">Actions</th>
                        </tr>


                        {{-- @foreach ($workshops as $workshop) --}}
                        
                        <tr>
                            <th>{{$workshop->name}}</th>  
                            <th>{{$workshop->day}}</th> 
                            <th>{{$workshop->time}}</th>
                            <th><a href="{{route('workshop.edit', [$workshop->id])}}" class="btn btn-success">Edit</a> </th> 
                            <th>
                                <form action="{{route('workshop.destroy', $workshop->id)}}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <input class="btn btn-danger" type="submit" value="Delete" /> 
                                </form>
                            </th> 
                         {{-- @endforeach --}}
                    </table>
                    @else
                    <table>
                        <tr>
                            <th></th>
                            <th></th>
                        </tr>
                    </table>
                        <div class="row">
                            <h4 class="col col-md-12">You have no Workshop Appointment <a class="btn btn-primary" href="{{route('workshop.index')}}">Schedule Appointment</a></h4>
                            
                        </div>

                    @endif 
                </div>
            </div>
        </div>
    </div>
</div>
{{-- {{Auth::user()->id == $gallery->user->id)}} --}}
@endsection