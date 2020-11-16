<!DOCTYPE html>
@extends('MasterView.app')

@section('title', 'Phizza Details')

@section('content')
   <div class="row" id="detailBox">
        <div class="col-md-6">
            <img style="width: 100%;" src="{{asset('storage/PhizzaPicture/'.$phizza->image)}}" alt="{{$phizza->phizza_name}}">
        </div>
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-12">
                    <h3>{{$phizza->phizza_name}}</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <p>{{$phizza->desc}}</p>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-12">
                    <h4>{{$phizza->price}}</h4>
                </div>
            </div>
            @if(array_keys(session()->get('ability'), "DELETE_PIZZA"))
                <br>
                <form class="row" action="{{'/DeletePhizza/'.$phizza->phizza_id}}" method="POST">
                    {{ csrf_field() }}
                    <div class="col-md-3">
                        <button type="submit" class="btn btn-danger">Delete Phizza</button>
                    </div>
                </form>
            @endif
        </div>
   </div>
@endsection