<!DOCTYPE html>
@extends('MasterView.app')

@section('title', 'Add Phizza')

@section('content')

<table class="table">
    <thead>
        <tr>
            <th>Name</th>
            <th>Price</th>
            <th>Desc</th>
            <th>Image</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>asldasda</td>
            <td>asldasda</td>
            <td>asldasda</td>
        </tr>
        {{-- foreach data  --}}
        @foreach ($products as $product)
            <tr>
                <td>{{$product->name}}</td>
                <td>{{$product->price}}</td>
                <td>{{$product->desc}}</td>
                <td>{{$product->image}}</td>
            </tr>
        @endforeach
    </tbody>
</table>
    
@endsection

