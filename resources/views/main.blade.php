<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>TripBuilder</title>
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
    <!-- Custom fonts for this template -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/simple-line-icons.css')}}">
    <!-- Custom styles for this template -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/landing-page.css')}}">
    <link rel="shortcut icon" type="image/png" href="{{asset('images/favicon.png')}}"/>
    <!-- Import Fonts-->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic">
</head>
<body>
<!-- Navigation -->
<nav class="navbar navbar-light bg-light static-top">
    <div class="container">
        <a class="navbar-brand" href="#"><img src="{{asset("images/favicon.png")}}" class="icon_main" alt="">&nbsp;TripBuilder</a>
        <a class="btn btn-primary" href="{{url('airports')}}">See Airports</a>
    </div>
</nav>
<!-- Masthead -->
<header class="masthead text-white text-center">
    <div class="overlay"></div>
    <div class="search_box_div">
        <div class="row">
            <div class="col-md-12">
                <form role="form" method="post" action="/search">
                    <div class="form-group input-group">
                <span class="input-group-addon">
                    <span class='fas fa-arrow-circle-right'></span>
                </span>
                        <input type="text" name="from" class="search form-control" placeholder="Departing City or Airport">
                    </div>

                    <div class="form-group input-group">
                <span class="input-group-addon">
                    <span class='fas fa-arrow-circle-left'></span>
                </span>
                        <input type="text" name="to" class="search form-control" placeholder="Returning City or Airport">
                    </div>
                    <button type="submit" class="btn btn-default">Lets Go!</button>
                </form>

            </div>
        </div>
    </div>
</header>

<!-- Bootstrap core JavaScript -->
<script src="{{asset('js/jquery/jquery.min.js')}}"></script>
<script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
</body>
</html>
