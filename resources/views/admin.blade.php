@extends('layouts.app')

@section('content')
<div class="container float-container">
    {{-- <div class="row justify-content-center"> --}}
        <div class="col-md-6 float-left">
            <div class="card">
                <div class="card-header"><h3>{{ __('Users') }}</h3></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    @if (count($users)>0)
                    {{-- List of user information --}}
                    <table class="table table-striped">
                        <tr>
                            <th>Name</th>
                            <th>email</th>
                            <th>Status</th>
                        </tr>
                        
                        @foreach ($users as $user)
                        <tr>
                            <th>{{$user->name}}</th>  
                            <th>{{$user->email}}</th> 
                            <th>
                                <a href="{{route('admin.editStatus', [$user->id])}}">
                                    {{$user->status}}
                                </a>
                            </th>  
                         @endforeach
                    </table>
                    @else
                        <h3>No user registered</h3>
                    @endif
                        
                    
                    {{-- @component('components.who')
                        
                    @endcomponent --}}
                </div>
            </div>
        </div>

        <div class="col-md-6 float-left">
            <div class="card">
                <div class="card-header"><h3>{{ __('Workshops') }} <a href="/admin" style="float: right" class="btn btn-primary">Add workshop</a></h3> 
                
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    @if (count($workshops)>0)
                    {{-- <h3>Workshops</h3> --}}
                    <table class="table table-striped">
                        <tr>
                            <th>Name</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Actions</th>
                            <th></th>
                            {{-- <th colspan='2'>Actions</th> --}}
                        </tr>
                        
                        @foreach ($workshops as $workshop)
                        <tr>
                            <th>{{$workshop->name}}</th>  
                            <th>{{$workshop->day}}</th> 
                            <th>{{$workshop->time}}</th> 
                            <th><a href="" class="btn btn-success">Edit</a> </th> 
                            <th><a href="" class="btn btn-danger">Delete</a> </th> 
                         @endforeach
                    </table>
                    @else
                        <h3>No user registered</h3>
                    @endif
                        
                    
                    {{-- @component('components.who')
                        
                    @endcomponent --}}
                </div>
            </div>
        </div> 
    </div>
</div>
@endsection
