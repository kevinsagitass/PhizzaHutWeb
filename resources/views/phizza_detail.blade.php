<!DOCTYPE html>
@extends('MasterView.app')

@section('title', 'Phizza Details')

@section('content')
   <div class="row" id="detailBox">
        <div class="col-md-6">
            <img style="width: 100%;" src="{{asset('storage/PhizzaPicture/'.$detail->image)}}" alt="{{$detail->phizza_name}}">
        </div>
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-12">
                    <h3>{{$detail->phizza_name}}</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <p>{{$detail->desc}}</p>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-12">
                    <h4>{{$detail->price}}</h4>
                </div>
            </div>
            @if(array_keys(session()->get('ability'), "ADD_PIZZA_TO_CART"))
                <br>
                <form class="row" action="{{'/AddPhizzaToCart/'.$detail->phizza_id}}" method="POST">
                    {{ csrf_field() }}
                    <div class="col-md-4">
                        Quantity
                    </div>
                    <div class="col-md-5">
                        <input type="number" class="form-control" id="quantity" name="quantity" value="{{ old('quantity') }}">
                    </div>
                    <div class="col-md-3">
                        <button style="cursor: pointer" type="submit" class="btn btn-primary">Add to Cart</button>
                    </div>
                </form>
                <br>
                @if(Session::has('err'))
                    <span class="text-danger">{{ Session::get('err') }}</span>
                @endif
            @endif
        </div>
   </div>
@endsection