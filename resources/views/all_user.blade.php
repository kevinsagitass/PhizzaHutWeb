@extends('MasterView.app', ['user' => $user])

@section('title', 'All User')

@section('content')
<div class="row">
    <div class="col-md-2"><span></span></div>
    <div class="col-md-10">
    @foreach($users as $userKey => $user)
        @if($userKey % 3 == 0)
            <div class="row">
        @endif
        <div class="col-md-3">
            <table style="margin: 25px; border: 1px solid black; width: 100%">  
                <thead style="background-color: red; color: white">
                <tr><th>User ID : {{$user->user_id}}</th></tr>
                </thead>
                <tbody>
                <tr><td>UserName : {{$user->username}}</td></tr>
                <tr><td>Email : {{$user->email}}</td></tr>
                <tr><td>Address : {{$user->address}}</td></tr>
                <tr><td>Phone Number : {{$user->phone_number}}</td></tr>
                <tr><td>Gender : {{$user->gender}}</td></tr>
                </tbody>
            </table>
        </div>
        @if($userKey % 3 == 2) 
            </div>
        @endif
    @endforeach
    </div>
</div>
@endsection