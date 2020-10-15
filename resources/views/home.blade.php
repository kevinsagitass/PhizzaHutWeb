@extends('MasterView.app', ['user' => $user])

@section('title', 'Home Page')


@section('content')
    @if(array_keys($userAbility , "ADD_PIZZA"))
        Hai Admin
    @elseif(array_keys($userAbility , "VIEW_CART"))
        Hai Member
    @else
        Hai Guest
    @endif
@endsection