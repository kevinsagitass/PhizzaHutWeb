@extends('MasterView.app')

@section('title', 'Home Page')


@section('content')
    @if(array_keys(session()->get('ability') , "ADD_PIZZA"))
        Hai Admin
    @elseif(array_keys(session()->get('ability') , "VIEW_CART"))
        Hai Member
    @else
        Hai Guest
    @endif
@endsection