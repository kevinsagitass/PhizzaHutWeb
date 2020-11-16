@extends('MasterView.app')

@section('title', 'Home Page')


@section('content')
    <div class="container">
        <div id="homeBox">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="ml-3">Our Freshly Made Pizza</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h3 class="ml-3">Order it Now</h3>
                </div>
            </div>
            @if(array_keys(session()->get('ability'), "ADD_PIZZA")) 
                <div class="row">
                    <div class="col-md-3">
                    <button class="btn btn-primary ml-3" type="button" onclick='window.location="{{url("/AddPhizza")}}"'>Add Phizza</button>
                    </div>
                </div>
            @endif
            @if(isset($phizzas))
                <table style="width: 100%" class="mb-5; mt-3">
                    <thead>
                        <tr>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($phizzas as $phizzaIndex => $phizza)
                        @if($phizzaIndex % 3 == 0)
                            <tr class="row">
                        @endif
                            <td class="col-md-4 mb-3" style="text-align: center">
                                <table style="width: 100%; margin: 0">
                                    <tbody>
                                        <tr><td style="text-align: center; width: 100%"><a style="text-decoration: none; color: black" href="{{url('/PhizzaDetail/'.$phizza->phizza_id)}}"><img style="width: 300px !important;" src="{{asset('storage/PhizzaPicture/'.$phizza->image)}}" alt="{{$phizza->phizza_name}}"></a></td></tr>
                                        <tr><td style="text-align: center; width: 100%"><a style="text-decoration: none; color: black" href="{{url('/PhizzaDetail/'.$phizza->phizza_id)}}">{{$phizza->phizza_name}}</a></td></tr>
                                        <tr><td style="text-align: center; width: 100%"><a style="text-decoration: none; color: black" href="{{url('/PhizzaDetail/'.$phizza->phizza_id)}}">{{$phizza->price}}</a></td></tr>
                                        @if(array_keys(session()->get('ability'), "EDIT_PIZZA") && array_keys(session()->get('ability'), "DELETE_PIZZA"))
                                            <tr>
                                                <td style="display: flex; justify-content: space-around">
                                                    <button onclick="window.location='{{url("EditPhizza/".$phizza->phizza_id)}}'" class="pull-left">Update Phizza</button>
                                                    <button onclick="window.location='{{url("DeletePhizza/".$phizza->phizza_id)}}'" class="pull-right">Delete Phizza</button>
                                                </td>
                                            </tr>
                                        @endif
                                        <tr></tr>
                                    </tbody>
                                </table>
                            </td>
                        @if(($phizzaIndex == 2 || $phizzaIndex == 5))
                            </tr>
                        @endif
                        @endforeach

                    </tbody>
                </table>
                {!! $phizzas->render() !!}
            @endif
        </div>
    </div>
@endsection
