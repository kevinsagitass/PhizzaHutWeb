<!DOCTYPE html>
@extends('MasterView.app')

@section('title', 'Add Phizza')

@section('content')
    <div class="row">
        <div class="col-md-3">
        </div>
        <div class="col-md-6">
            <form action="/AddPhizza" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                @if(Session::has('error') && Session::get('error') == 'user')
                    <span class="text-danger">{{ Session::get('msg') }}</span>
                @endif
                <div class="form-group">
                    <h1>Add New Pizza</h1>
                    <div>
                        <label for="phizza_name">Pizza Name: </label>
                        <input type="text" class="form-control" id="phizza_name" name="phizza_name" value="{{ old('phizza_name') }}">
                        @error('phizza_name')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <div>
                        <label for="price">Pizza Price: </label>
                        <input type="text" class="form-control" id="price" name="price" value="{{ old('price') }}">
                        @error('price')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <div>
                        <label for="desc">Pizza Desc: </label>
                        <textarea type="text" class="form-control" id="desc" name="desc" value="{{ old('desc') }}"></textarea>
                        @error('desc')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <div>
                        <label for="image">Pizza Image: </label>
                        <input type="file" class="form-control" id="image" name="image" value="{{ old('image') }}">
                        @error('image')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <button style="cursor: pointer" type="submit" class="btn btn-primary">Add Pizza</button>
                 </div>
            </form>
        </div>
        <div class="col-md-3">
        </div>
    </div>
@endsection
