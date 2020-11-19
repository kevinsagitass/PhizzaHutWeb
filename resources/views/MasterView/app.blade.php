<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('style.css')}}" crossorigin="anonymous">
    <title>@yield('title')</title>
</head>
<body>
    @section('navbar')
        <div class="row">
            <div class="col-md-12" id="navbar">
                <div class="row">
                    <div class="col-md-6">
                        <a href="{{url('/Home')}}"><h3>Phizza Hut</h3></a>
                    </div>
                    <div class="col-md-6" style="text-align: right;">
                        @if(!Auth::check())
                            <span style="border-right: 1px solid white"><a style="padding: 5px" href="Login">Login</a></span>
                            <a style="padding: 5px" href="Register">Register</a>
                        @elseif(Auth::check() && Auth::user() != null)
                            @if(array_keys(session()->get('ability'), "VIEW_ALL_USER_TRANSACTION"))
                                <span style="border-right: 1px solid white"><a style="padding: 5px" href="{{url('/AllUserTransaction')}}">View All User Transaction</a></span>
                            @endif
                            @if(array_keys(session()->get('ability'), "VIEW_ALL_USER"))
                                <span style="border-right: 1px solid white"><a style="padding: 5px" href="{{url('/AllUser')}}">View All User</a></span>
                            @endif
                            @if(array_keys(session()->get('ability'), "VIEW_TRANSACTION_HISTORY"))
                                <span style="border-right: 1px solid white"><a style="padding: 5px" href="{{url('/UserTransaction')}}">View Transaction History</a></span>
                            @endif
                            @if(array_keys(session()->get('ability'), "VIEW_CART"))
                                <span style="border-right: 1px solid white"><a style="padding: 5px" href="{{url('/UserCart')}}">View Cart</a></span>
                            @endif
                            <span><a style="padding: 5px" href="{{url('/Logout')}}">Logout</a></span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @show

    <div class="container-fluid">
        @yield('content')
    </div>
</body>
</html>