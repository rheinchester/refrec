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
                        {{-- <div class="input-group">
                            <input class="form-control" name="query" placeholder="Search Reference by Name"> 
                            <button type="submit" class="btn btn-info">Search</button>
                        </div> --}}


                    </form>
                    @if (is_array($selectedReferences) > 0)
                    {{-- <h3>Workshops</h3> --}}
                    <form method="POST" action="{{ route('references.generateLink', Auth::user()->id) }}">
                        @csrf

                        <table class="table table-striped">
                            <tr>
                                <th>

                                        <a href="{{ route('reference.create') }}" class="btn btn-primary">
                                            Add Reference
                                        </a>
                                        {{-- <input class="form-control" name="query" placeholder="Search Reference by Name">  --}}

                                </th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th>
                                    <div class="input-group">
                                        {{-- <input class="form-control" name="query" placeholder="Search Reference by Name">  --}}
                                        <button type="submit" class="btn btn-info" >Generate Share Link</button>
                                    </div>
                                </th>
                            </tr>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Letter</th> 
                                <th>Edit</th> 
                                <th>Show</th> 
                                {{-- <th>Actions</th>
                                <th></th> --}}
                                {{-- <th colspan='2' class="text-center">Actions</th> --}}
                            </tr>


                            @foreach ($selectedReferences as $reference)
                            
                            <tr>
                                {{-- <th>{{$reference->name}}</th>   --}}
                                <th>{{$reference->first_name}} {{$reference->last_name}}</th>  
                                <th>{{$reference->email}}</th> 
                                {{-- <th>
                                    <a href="{{route('reference.edit', [$reference->id])}}" class="btn btn-primary">
                                        Details
                                    </a>
                                </th>  --}}
                            <th><a href="{{ route('reference.letter', $reference->id) }}">{{$reference->letter}}</a></th> 
                            <th><a href="{{ route('reference.edit', $reference->id) }}" class="btn btn-primary">Edit</a></th> 
                            <th><a href="{{ route('reference.show', $reference->id) }}" class="btn btn-primary">Show</a></th>
                            <th>
                                <div class="form-check">
                                    <input class="form-check-input" name="items[]" type="checkbox" value={{$reference->id}} id="flexCheckDefault" checked>
                                </div>
                            </th>

                                {{-- <th><a href="{{route('appointment.create', [$reference->id])}}" class="btn btn-primary">Letter</a> </th>  --}}
                            @endforeach
                        </table>
                    </form>
                    @else
                        <h3>No workshop created</h3>
                    @endif
                </div>
            </div>
        </div> 
    </div>
</div>
@endsection
