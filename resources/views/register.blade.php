@extends('MasterView.app')

@section('title', 'Register Page')

@section('content')
    <div class="row">
        <div class="col-md-3">
        </div>
        <div class="col-md-6">
            <form action="/Register" method="POST">
                {{ csrf_field() }}
                <div style="align-content: center;">
                    <div>
                        <div class="form-group">
                            <div>
                                <label for="username">Username : </label>
                                <input type="text" class="form-control" id="username" name="username" value="{{ old('username') }}">
                            </div>
                        </div>
                        @if(Session::has('error') && Session::get('error') == 'username')
                            <span class="text-danger">{{ Session::get('msg') }}</span>
                        @endif
                        <br>
                        <div class="form-group">
                            <div>
                                <label for="email">Email : </label>
                                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
                            </div>
                        </div>
                        @if(Session::has('error') && Session::get('error') == 'email')
                            <span class="text-danger">{{ Session::get('msg') }}</span>
                        @endif
                        <br>
                        <div class="form-group">
                            <div>
                                <label for="password">Password : </label>
                                <input type="password" class="form-control" id="password" name="password" value="{{ old('password') }}">
                            </div>
                        </div>
                        @if(Session::has('error') && Session::get('error') == 'password')
                            <span class="text-danger">{{ Session::get('msg') }}</span>
                        @endif
                        <br>
                        <div class="form-group">
                            <div>
                                <label for="confirm_password">Confirm Password : </label>
                                <input type="password" class="form-control" id="confirm_password" name="confirm_password" value="{{ old('confirm_password') }}">
                            </div>
                        </div>
                        @if(Session::has('error') && Session::get('error') == 'confirm_password')
                            <span class="text-danger">{{ Session::get('msg') }}</span>
                        @endif
                        <br>
                        <div class="form-group">
                            <div>
                                <label for="address">Address : </label>
                                <input type="text" class="form-control" id="address" name="address"  value="{{ old('address') }}">
                            </div>
                        </div>
                        @if(Session::has('error') && Session::get('error') == 'address')
                            <span class="text-danger">{{ Session::get('msg') }}</span>
                        @endif
                        <br>
                        <div class="form-group">
                            <div>
                                <label for="phone_number">Phone Number : </label>
                                <input type="text" class="form-control" id="phone_number" name="phone_number" value="{{ old('phone_number') }}">
                            </div>
                        </div>
                        @if(Session::has('error') && Session::get('error') == 'phone_number')
                            <span class="text-danger">{{ Session::get('msg') }}</span>
                        @endif
                        <br>
                        <div class="form-group">
                            <div>
                                <label for="gender">Gender : </label>
                                <input type="radio" name="gender" value="Male" {{ old('gender') =="Male" ? 'checked='.'"checked"' : '' }}>Male
                                <input type="radio" name="gender" value="Female" {{ old('gender') =="Female" ? 'checked='.'"checked"' : '' }}>Female
                            </div>
                        </div>
                        @if(Session::has('error') && Session::get('error') == 'gender')
                            <span class="text-danger">{{ Session::get('msg') }}</span>
                        @endif
                        <br>
                        <br>
                        <div class="form-group">
                           <button style="cursor: pointer" type="submit" class="btn btn-primary">Register</button>
                        </div>
                        <br>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-3">
        </div>
    </div>
@endsection
