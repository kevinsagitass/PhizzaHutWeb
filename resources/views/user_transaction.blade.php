<!DOCTYPE html>
@extends('MasterView.app')

@section('title', 'User Transactions')

@section('content')
    @foreach($transactions as $transactionIndex => $transaction)
        <a style="text-decoration: none; color: black" href="{{url('/UserTransactionDetail/'.$transaction->transaction_id)}}">
        <div class="row" id="detailBox" style="{{$transactionIndex % 2 == 0 ? 'background-color: red': 'background-color: white'}}">
            <div class="col-md-12">
                Transaction At {{$transaction->transaction_date}}
            </div>
        </div>
    </a>
    @endforeach
@endsection

