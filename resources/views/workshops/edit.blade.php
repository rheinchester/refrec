@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Workshops</h1>

        <div class="card-body">
            <form method="POST" action="{{ route('workshop.update', [$workshop->id]) }}">
                @csrf
                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
                    <div class="col-md-6">
                        <input value="{{$workshop->name}}" id="name" type="name" class="form-control" name="name"autofocus>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="day" class="col-md-4 col-form-label text-md-right">{{ __('Day') }}</label>
                    <div class="col-md-6">
                        <select style="width: 244px" id="day" name="day" value="{{$workshop->day}}">
                            <option value="{{$select_day}}" disabled selected hidden>{{$select_day}}</option>
                            @foreach ($days as $day)
                                <option value="{{$day}}" selected>{{$day}}</option>
                            @endforeach
                          </select>      
                    </div>
                </div>
                
                <div class="form-group row">
                    <label for="status" class="col-md-4 col-form-label text-md-right">{{ __('Time') }}</label>
                    <div class="col-md-3">
                        
                           <input value="{{$workshop->time}}" id="time" type="time" name="time" class="form-control">
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
@endsection