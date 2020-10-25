@extends('MasterView.app')

@section('title', 'Home Page')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Our Freshly Made Pizza</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h3>Order it Now</h3>
            </div>
        </div>
        @if(array_keys(session()->get('ability'), "ADD_PIZZA"))
            <div class="row">
                <div class="col-md-3">
                <button type="button" onclick='window.location="{{url("/AddPhizza")}}"'>Add Phizza</button>
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
                        <td class="col-md-4">
                            <table>
                                <tbody>
                                    <tr><td><img style="width: 300px !important" src="{{asset('storage/PhizzaPicture/'.$phizza->image)}}" alt="{{$phizza->image}}"></td></tr>
                                    <tr><td style="text-align: center">{{$phizza->phizza_name}}</td></tr>
                                    <tr><td style="text-align: center">{{$phizza->price}}</td></tr>
                                    @if(array_keys(session()->get('ability'), "EDIT_PIZZA") && array_keys(session()->get('ability'), "DELETE_PIZZA"))
                                        <tr>
                                            <td style="display: flex; justify-content: space-around">
                                                <button class="pull-left" onclick='window.location="{{url("/UpdatePhizza/".$phizza->phizza_id)}}"'>Update Phizza</button>
                                                <button class="pull-right">Delete Phizza</button>
                                            </td>
                                        </tr>
                                    @endif
                                    <tr></tr>
                                </tbody>
                            </table>
                        </td>
                        {{-- <td>{{$phizza->phizza_name}}</td>
                        <td>{{$phizza->price}}</td> --}}
                    @if(($phizzaIndex == 2 || $phizzaIndex == 5))
                        </tr>
                    @endif
                    @endforeach

                </tbody>
            </table>
            {!! $phizzas->render() !!}
        @endif
    </div>
    @if(array_keys(session()->get('ability') , "ADD_PIZZA"))
        Hai Admin
    @elseif(array_keys(session()->get('ability') , "VIEW_CART"))
        Hai Member
    @else
        Hai Guest
    @endif
@endsection
