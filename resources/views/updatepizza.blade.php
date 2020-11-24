@extends('MasterView.app', ['user' => $user])

@section('title', 'Edit Phizza')

@section('content')
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-md-4">
                <img style="width: 300px !important" src="{{asset('storage/PhizzaPicture/'.$phizza->image)}}" alt="{{$phizza->image}}">
            </div>
            <div class="col-md-8">
                <h2 class="ml-1">Edit Pizza Details</h2>
                <form action="/EditPhizza/{{$phizza->phizza_id}}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group row">
                        <label for="phizza_name" class="col-sm-2 col-form-label">Pizza Name:</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="phizza_name" name="phizza_name" value="{{old('phizza_name') ?? $phizza->phizza_name}}">
                            @error('phizza_name')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="price" class="col-sm-2 col-form-label">Pizza Price:</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="price" name="price" value="{{old('price') ?? $phizza->price}}">
                            @error('price')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="desc" class="col-sm-2 col-form-label">Pizza Description:</label>
                        <div class="col-sm-7">
                            <textarea type="text" class="form-control" id="desc" name="desc">{{old('desc') ?? $phizza->desc}}</textarea>
                            @error('desc')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="image" class="col-sm-2 col-form-label">Pizza Image:</label>
                        <div class="col-sm-7">
                            <input type="file" class="form-control" id="image" name="image">
                            @error('image')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
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
