@extends('MasterView.app', ['user' => $user])

@section('title', 'Update Phizza')

@section('content')
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-md-2">
                <img style="width: 300px !important" src="{{asset('storage/PhizzaPicture/'.$phizza->image)}}" alt="{{$phizza->image}}">
            </div>
            <div class="col-md-8">
                <h2>Edit Pizza Details</h2>
                <form action="/UpdatePhizza/{{$phizza->phizza_id}}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group row">
                        <label for="phizza_name" class="col-sm-2 col-form-label">Pizza Name:</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="phizza_name" name="phizza_name">
                        </div>
                    </div>
                    @if(Session::has('error') && Session::get('error') == 'phizza_name')
                        <span class="text-danger">{{ Session::get('msg') }}</span>
                    @endif
                    <br>
                    <div class="form-group row">
                        <label for="price" class="col-sm-2 col-form-label">Pizza Price:</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="price" name="price">
                        </div>
                    </div>
                    @if(Session::has('error') && Session::get('error') == 'price')
                        <span class="text-danger">{{ Session::get('msg') }}</span>
                    @endif
                    <br>
                    <div class="form-group row">
                        <label for="desc" class="col-sm-2 col-form-label">Pizza Description:</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="desc" name="desc">
                        </div>
                    </div>
                    @if(Session::has('error') && Session::get('error') == 'desc')
                        <span class="text-danger">{{ Session::get('msg') }}</span>
                    @endif
                    <br>
                    <div class="form-group row">
                        <label for="image" class="col-sm-2 col-form-label">Pizza Image:</label>
                        <div class="col-sm-7">
                            <input type="file" class="form-control" id="image" name="image">
                        </div>
                    </div>
                    @if(Session::has('error') && Session::get('error') == 'image')
                        <span class="text-danger">{{ Session::get('msg') }}</span>
                    @endif
                    <input type="hidden" name="idPhizza" value="{{$phizza->phizza_id}}">
                    <br>
                    <div class="form-group row">
                        <button style="cursor: pointer" type="submit" class="btn btn-primary">Edit Pizza</button>
                    </div>
                </form>
            </div>
            </div>
        </div>
@endsection
