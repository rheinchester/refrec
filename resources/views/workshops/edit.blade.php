@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create Workshops</h1>

        <div class="card-body">
            <form method="POST" action="{{ route('workshop.create',  [$workshop->id]) }}">
                @csrf

                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
                    <div class="col-md-6">
                        <input id="name" type="name" class="form-control" name="name" value={{$workshop->name}} autofocus>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="day" class="col-md-4 col-form-label text-md-right">{{ __('Day') }}</label>
                    <div class="col-md-6">
                        <input id="day" type="day" class="form-control"  name="day" value="{{ $workshop->day }}" autofocus>
                    </div>
                </div>
                
                <div class="form-group row">
                    <label for="status" class="col-md-4 col-form-label text-md-right">{{ __('Time') }}</label>
                    <div class="col-md-6">
                        {{-- {{Form::select('status', ['Active' => 'Active', 'Inactive' => 'Inactive'], $user->status);}} --}}
                        <input id="time" type="time" name class="form-control">
                    </div>
{{-- 
                    <div class="form-group">
                    </div> --}}
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
@endsection