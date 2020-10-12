<!DOCTYPE html>
@extends('MasterView.app')

@section('title', 'Login Page')

@section('content')
    <div class="row">
        <div class="col-md-3">
        </div>
        <div class="col-md-6">
            <form action="/Login" method="POST">
                {{ csrf_field() }}
                @if(Session::has('error') && Session::get('error') == 'user')
                    <span class="text-danger">{{ Session::get('msg') }}</span>
                @endif
                <div class="form-group">
                    <div>
                        <label for="username">Email : </label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
                    </div>
                </div>
                @if(Session::has('error') && Session::get('error') == 'email')
                    <span class="text-danger">{{ Session::get('msg') }}</span>
                @endif
                <br>
                <div class="form-group">
                    <div>
                        <label for="username">Password : </label>
                        <input type="password" class="form-control" id="password" name="password" value="{{ old('password') }}">
                    </div>
                </div>
                @if(Session::has('error') && Session::get('error') == 'password')
                    <span class="text-danger">{{ Session::get('msg') }}</span>
                @endif
                <br>
                <div class="form-group">
                <input type="checkbox" name="remember" value="{{true}}" value="{{ old('remember') }}">Remember Me
                 </div>
                <div class="form-group">
                    <button style="cursor: pointer" type="submit" class="btn btn-primary">Login</button>
                 </div>
            </form>
        </div>
        <div class="col-md-3">
        </div>
    </div>
@endsection