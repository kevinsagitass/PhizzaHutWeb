<!DOCTYPE html>
@extends('MasterView.app')

@section('title', 'Cart')

@section('content')
    @foreach ($items as $item)  
       <div class="row" id="detailBox">
            <div class="col-md-6">
                <img style="width: 100%;" src="{{asset('storage/PhizzaPicture/'.$item->image)}}" alt="{{$item->phizza_name}}">
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-12">
                        <h3>{{$item->phizza_name}}</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <h4>Rp. {{$item->price}}</h4>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-12">
                        <h4>Quantity : {{$item->quantity}}</h4>
                    </div>
                </div>
                <br>
                <form class="row" action="{{'/UpdateCartItem/'.$item->item_id}}" method="POST">
                    {{ csrf_field() }}
                    <div class="col-md-4">
                        Quantity
                    </div>
                    <div class="col-md-4">
                        <input type="number" class="form-control" id="quantity" name="quantity" value="{{ old('quantity') }}">
                    </div>
                    <div class="col-md-4">
                        <button style="cursor: pointer" type="submit" class="btn btn-primary">Update Quantity</button>
                    </div>
                </form>
                <br>
                <form class="row" action="{{'/DeleteCartItem/'.$item->item_id}}" method="POST">
                    {{ csrf_field() }}
                    <div class="col-md-4">
                    </div>
                    <div class="col-md-4">
                    </div>
                    <div class="col-md-4">
                        <button style="cursor: pointer" type="submit" class="btn btn-danger">Delete From Cart</button>
                    </div>
                </form>
                <br>
                @if(Session::has('err'))
                    <span class="text-danger">{{ Session::get('err') }}</span>
                @endif
            </div>
       </div>
    @endforeach
    <div class="row">
        <div class="col-md-12" style="text-align: center">
            @if(count($items) > 0) 
            <form class="row" action="{{'/Checkout/'.Auth::User()['user_id']}}" method="POST">
                {{ csrf_field() }}
                <div class="col-md-12">
                    <button style="cursor: pointer" type="submit" class="btn btn-primary">Checkout</button>
                </div>
            </form>
            @else
                <h2>No Data !!!</h2>
            @endif
        </div>
   </div>
@endsection