@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h1>Reference Link</h1>
            <div class="col-md-7">
                <div class="card ">
        
                    <div class="card-body">

                        <form method="POST" action="" enctype="multipart/form-data">
                            @csrf
 

                            <div class="form-group">
                                <label for="email">Reference Link</label>
                                <textarea type="email" class="form-control" placeholder="name@example.com" name="email" id="email">{{$sharedrefs->sharedLink}}</textarea>
                            </div>

                            
{{-- 
                            <div style="padding-top: 20px;" class="form-group">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div> --}}
                        </form>

                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection