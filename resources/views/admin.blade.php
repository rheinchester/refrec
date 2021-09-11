@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Admin Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    @if (count($users)>0)
                    <h3>Your Gallery</h3>
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
                        <h3>{{$response}}</h3>
                    @endif
                        
                    
                    {{-- @component('components.who')
                        
                    @endcomponent --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
