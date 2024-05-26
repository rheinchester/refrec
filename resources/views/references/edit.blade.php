@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h1>Create Reference</h1>
            <div class="col-md-7">
                <div class="card ">
        
                    <div class="card-body">
                        <form method="POST" action="{{ route('reference.update', [$reference->id])}}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
        
                                    <div class="row">
                                        <div class="col">
                                        <label for="first_name">First Name</label>
                                        <input type="text" class="form-control" placeholder="First name" name="first_name" id="first_name" value="{{$reference->first_name}}" autofocus>
                                    </div>
                                    <div class="col">
                                        <label for="last_name">Last Name</label>
                                        <input type="text" class="form-control" placeholder="Last name" name="last_name" id="last_name" value="{{$reference->last_name}}"autofocus>
                                      </div>
                                    </div>
       
                            </div>

                            <div class="form-group">
                                <label for="email">Email address </label>
                                <input type="email" class="form-control" placeholder="name@example.com" name="email" value="{{$reference->email}}" id="email">
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="phone" class="form-control" id="phone" placeholder="Phone number with country code" value="{{$reference->phone}}" name="phone" id="phone">
                            </div>
                            

                            <div class="form-group">
                                <label for="qualification">Qualification </label>
                                <input type="text" class="form-control" id="qualification" placeholder="What is his role do they play in their existing firm" value="{{$reference->qualification}}" name="qualification" id="qualification">
                            </div>
                            <div class="form-group">
                                <label for="qualification">Organization </label>
                                <input type="text" class="form-control" id="organization" placeholder="Where is their current organization" value="{{$reference->organization}}" name="organization">
                            </div>

                            <div class="form-group">
                                <div class="custom-file">
                                    <input style="padding-top: 20px" type="file" class="custom-file-input" name="letter" id="letter">
                                    <a href="{{ route('reference.letter', $reference->id) }}"><label class="custom-file-label" for="customFile">{{$reference->letter}}</label></a>
                                </div>
                            </div>

                            <div style="padding-top: 20px;" class="form-group">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>

                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection