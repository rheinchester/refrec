@extends('layouts.app')

@section('content')
<div class="container float-container">
        <div class="col-md-12 float-left">
            <div class="card">
                <div class="card-header"><h3>{{ __('Workshops') }} 
                @if (Auth::guard('admin') && Auth::user()->role == 'Admin')
                    <a href="{{route('workshop.create')}}" style="float: right" class="btn btn-primary">Add workshop</a></h3>     
                @endif
                
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <form method="GET" action="{{ route('search') }}">
                        @csrf
                        <div class="input-group">
                            <input class="form-control" name="query" placeholder="Search Workshops by Name"> 
                            <button type="submit" class="btn btn-info">Search</button>
                        </div>
                    </form>
                    @if (count($workshops)>0)
                    {{-- <h3>Workshops</h3> --}}
                    <table class="table table-striped">
                        <tr>
                            <th>Name</th>
                            <th>Date</th>
                            <th>Time</th>
                            {{-- <th>Actions</th>
                            <th></th> --}}
                            <th colspan='2' class="text-center">Actions</th>
                        </tr>


                        @foreach ($workshops as $workshop)
                        
                        <tr>
                            <th>{{$workshop->name}}</th>  
                            <th>{{$workshop->day}}</th> 
                            <th>{{$workshop->time}}</th>
                            <th class="text-center"><a href="{{route('appointment.create', [$workshop->id])}}" class="btn btn-primary">Book Appointment</a> </th> 
                            <th>
                                <a href="{{route('workshop.show', [$workshop->id])}}" class="btn btn-primary">
                                    Details
                                </a>
                            </th> 
                         @endforeach
                    </table>
                    @else
                        <h3>No workshop created</h3>
                    @endif
                </div>
            </div>
        </div> 
    </div>
</div>
@endsection
