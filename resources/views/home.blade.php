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
                        
                        
                        
                        @if (!empty(Auth::user()->appointment))
                        <table>
                            <tr>
                                <th><h4>Here's your appointment. You can only book one a day  .</h4></th>
                                <div class="float-left">
                                    <th><a href="{{route('workshop.index')}}" class="btn btn-success">Search</a></th>
                                </div>
                            </tr>
                        </table>
                            
                            
                               
                           
                        </div>
                            </div>
                            <table class="table table-striped">
                                <tr>
                                    <th>Name</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                
                                    <th colspan='2' class="text-center">Actions</th>
                                </tr>                        
                                <tr>
                                    <th>{{$workshop->name}}</th>  
                                    <th>{{$workshop->day}}</th> 
                                    <th>{{$workshop->time}}</th>
                                    <th><a href="{{route('appointment.show', [$appointment->id])}}" class="btn btn-info">Details</a> </th> 
                                    
                                    <th>
                                        <form action="{{route('appointment.destroy', $appointment->id)}}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <input onclick="return confirm('Are you sure?')"  class="btn btn-danger" type="submit" value="Drop" /> 
                                        </form>
                                    </th> 
                            </table>
                            @else
                            <table>
                                <tr>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </table>
                            <div class="row">
                                <h4 class="col col-md-12">You have no Workshop appointment <a class="btn btn-primary" href="{{route('workshop.index')}}">Schedule One</a></h4>
                                
                            </div>

                    @endif 
                </div>
            </div>
        </div>
    </div>
</div>
{{-- {{Auth::user()->id == $gallery->user->id)}} --}}
@endsection