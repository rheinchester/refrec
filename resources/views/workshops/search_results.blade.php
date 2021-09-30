@extends('layouts.app')

@section('content')
<div class="container float-container">
    <div class="row justify-content-center"> 

        <div class="col-md-10 float-left">
            <div class="card">
                <div class="card-header"><h3>{{ __('Workshops') }} <a href="{{route('workshop.create')}}" style="float: right" class="btn btn-primary">Add workshop</a></h3> 
                
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
                               
                            @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <p class="text-danger">{{ $error }}</p>
                            @endforeach
                        @endif
                    </form>
                    
                    @if (count($workshops)>0)
                    {{-- <h3>Workshops</h3> --}}
                    <table class="table table-striped table-responsive">
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
                            <th><a href="{{route('workshop.edit', [$workshop->id])}}" class="btn btn-success">Edit</a> </th> 
                            <th>
                                <form action="{{route('workshop.destroy', $workshop->id)}}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <input class="btn btn-danger" type="submit" value="Delete" /> 
                                </form>
                            </th> 
                         @endforeach
                    </table>
                    @else
                        <div class="row justify-content-center">
                            <h4>No Query matches your search result</h4>
                        </div>
                    @endif
                </div>
            </div>
        </div> 
    </div>
</div>
@endsection
