<!DOCTYPE html>
@extends('MasterView.app')

@section('title', 'User Transaction Detail')

@section('content')
    @foreach($details as $detail)
        <div class="row" id="detailBox">
            <div class="col-md-6">
                <img style="width: 100%;" src="{{asset('storage/PhizzaPicture/'.$detail->image)}}" alt="{{$detail->phizza_name}}">
            </div>
            <div class="col-md-6">
                <h2>{{$detail->phizza_name}}</h2>
                <h3>Rp. {{$detail->price}}</h3>
                <h3>Quantity: {{$detail->quantity}}</h3>
                <h3>Total Price: Rp. {{$detail->price * $detail->quantity}}</h3>
            </div>
        </div>
    @endforeach
@endsection

