@extends('layouts.app')
@section('content')

    <div class="col-md-7">
        <div class="card ">
    
            <div class="card-body">
                <form>
                    <div class="row">
                        <div class="col-md-5 pr-1">
                            <div class="form-group">
                                <label>Organization</label>
                                <input type="text" class="form-control" disabled="" placeholder="Company" value="{{$reference->organization}}">
                            </div>
                        </div>
                        <div class="col-md-3 px-1">
                            <div class="form-group">
                                <label>Referee</label>
                                <input type="text" class="form-control" placeholder="Username" value="{{$referee->name}}" disabled>
                            </div>
                        </div>
                        <div class="col-md-4 pl-1">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" class="form-control" placeholder="Email" value="{{$reference->email}}" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 pr-1">
                            <div class="form-group">
                                <label>First Name</label>
                                <input type="text" class="form-control" placeholder="Company" value="{{$reference->first_name}}" disabled>
                            </div>
                        </div>
                        <div class="col-md-6 pl-1">
                            <div class="form-group">
                                <label>Last Name</label>
                                <input type="text" class="form-control" placeholder="Last Name" value="{{$reference->last_name}}" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Qualification</label>
                                <input type="text" class="form-control" placeholder="Home Address" value="{{$reference->qualification}}" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 pr-1">
                            <div class="form-group">
                                <label>City</label>
                                <input type="text" class="form-control" placeholder="City" value="Clarenville" disabled>
                            </div>
                        </div>
                        <div class="col-md-4 px-1">
                            <div class="form-group">
                                <label>Country</label>
                                <input type="text" class="form-control" placeholder="Country" value="Canada" disabled>
                            </div>
                        </div>
                        <div class="col-md-4 pl-1">
                            <div class="form-group">
                                <label>Phone</label>
                                <input type="text" class="form-control" placeholder="Phone" value="{{$reference->phone}}" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Letter</label>
                                {{-- <textarea rows="4" cols="80" class="form-control" placeholder="Here can be your description" value="{{$reference->letter}}">Reference letter is here</textarea> --}}
                                {{-- <input type="file" class="form-control" placeholder="ZIP Code" value="{{$reference->letter}}" disabled> --}}
                                <td><a href="{{ route('reference.letter', $reference->id) }}">{{$reference->letter}}</a></td>
                            </div>
                        </div>
                    </div>
                    <th><a href="{{ route('reference.edit', $reference->id) }}" class="btn btn-primary">Edit</a></th> 
                    {{-- <button type="submit" class="btn btn-info btn-fill pull-right">Edit</button> --}}
                    {{--  <button type="submit" class="btn btn-info btn-fill pull-right">Mark as Read</button> #Implement this on the institution end. Create roles next --}}
                    <div class="clearfix"></div>
                </form>
            </div>
        </div>
    </div>
@endsection 
