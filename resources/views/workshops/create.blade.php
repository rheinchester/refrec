@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create Workshops</h1>

        <div class="card-body">
            <form method="POST" action="{{ route('workshop.store') }}">
                @csrf

                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
                    <div class="col-md-6">
                        <input id="name" type="name" class="form-control" name="name"autofocus>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="day" class="col-md-4 col-form-label text-md-right">{{ __('Day') }}</label>
                    <div class="col-md-6">
                        <select style="width: 244px" id="day" name="day">
                            <option value="Monday">Monday</option>
                            <option value="Tuesday">Tuesday</option>
                            <option value="Wednesday">Wednesday</option>
                            <option value="Thursday">Thursday</option>
                            <option value="Friday">Friday</option>
                            <option value="Saturday">Saturday</option>
                            <option value="Sunday">Sunday</option>
                          </select>      
                    </div>
                </div>
                
                <div class="form-group row">
                    <label for="status" class="col-md-4 col-form-label text-md-right">{{ __('Time') }}</label>
                    <div class="col-md-3">
                        <input id="time" type="time" name="time" class="form-control">
                    </div>
                </div>


                <div class="form-group row mb-0">
                    <div class="col-md-8 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Submit') }}
                        </button>
                    </div>
                </div>
            </form>


        </div>
    </div>
@endsection