<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>@yield('title')</title>
</head>
<body>
    @section('navbar')
        <div class="row">
            <div class="col-md-12" id="navbar">
                <div class="row">
                    <div class="col-md-9">
                        <div><span></span></div>
                        <h3>Phizza Hut</h3>
                    </div>
                    <div class="col-md-3">
                        <span style="border-right: 1px solid black"><a style="padding: 5px" href="Login">Login</a></span><a style="padding: 5px" href="Register">Register</a>
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