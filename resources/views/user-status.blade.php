@extends('layouts.app')
@section('content')
<div class="container">
    @if ($message != '')
        <div class="alert alert-success" role="alert">
            {{ $message }}     
        </div>
    @endif
    <a href="/admin" class="btn btn-primary">Go Back</a>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Status</div>
    
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.updateStatus',  [$user->id]) }}">
                            @csrf
    
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
                                <div class="col-md-6">
                                    <input id="name" type="name" class="form-control" name="name" value={{$user->name}} disabled autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control"  name="email" value="{{ $user->email }}" disabled autofocus>
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label for="status" class="col-md-4 col-form-label text-md-right">{{ __('status') }}</label>
                                <div class="col-md-6">
                                    {{Form::select('status', ['Active' => 'Active', 'Inactive' => 'Inactive'], $user->status );}}
                                </div>

                                <div class="form-group">
                                </div>
                            </div>


                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Submit') }}
                                    </button>
                                    @method('PUT')
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
    {{-- {!! Form::open([
        'action' => ['AdminController@updateStatus', $user->id],
        'method' =>'POST',
        'enctype' =>'multipart/form-data'])!!}
        
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    {{Form::label('name', 'Name')}}
                    {{Form::text('name', $user->name, ['class' => 'form-control', 'placeholder'=>'Name', 'disabled'=> true])}}
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    {{Form::label('email', 'Email')}}
                    {{Form::text('email', $user->email, ['class' => 'form-control', 'placeholder'=>'Email', 'disabled'=> true])}}
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    {{Form::label('status', 'Status')}}
                    {{Form::select('status', ['Active' => 'Active', 'Inactive' => 'Inactive'], $user->status );}}
                </div>
            </div>
        </div>
        {{Form::hidden('_method', 'PUT')}}
        {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
    {!! Form::close() !!} --}}

    

@endsection