@extends('layouts.app')

@section('content')
<div class="container float-container">
        <div class="col-md-12 float-left">
            <div class="card">
                <div class="card-header"><h3>{{ __('References') }}                
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
                            <input class="form-control" name="query" placeholder="Search Reference by Name"> 
                            <button type="submit" class="btn btn-info">Search</button>
                        </div>
                    </form>
                    @if (count($references)>0)
                    {{-- <h3>Workshops</h3> --}}
                    <table class="table table-striped">
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Letter</th>
                            <th>Qualification</th>
                            {{-- <th>Actions</th>
                            <th></th> --}}
                            <th colspan='2' class="text-center">Actions</th>
                        </tr>


                        @foreach ($references as $reference)
                        
                        <tr>
                            <th>{{$reference->name}}</th>  
                            <th>{{$reference->day}}</th> 
                            <th>{{$reference->time}}</th>
                            <th class="text-center"><a href="{{route('appointment.create', [$reference->id])}}" class="btn btn-primary">Book Appointment</a> </th> 
                            <th>
                                <a href="{{route('workshop.show', [$reference->id])}}" class="btn btn-primary">
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
