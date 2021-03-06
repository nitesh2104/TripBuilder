<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>TripBuilder</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
    <!-- Custom fonts for this template -->
    <link rel="stylesheet" href="{{asset('font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/simple-line-icons.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/jquery-ui.min.css')}}">
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
        <a class="navbar-brand" href="/"><img src="{{asset("images/favicon.png")}}" class="icon_main" alt="">&nbsp;TripBuilder</a>

        <div>
            <a class="btn btn-primary" href="{{url('recreateAirports')}}">Fetch Airport Data</a>
            <a class="btn btn-primary" href="{{url('viewTrips')}}" target="_blank">View Trips</a>
            <a class="btn btn-primary" href="{{url('airports')}}" target="_blank">See Airports</a></div>
    </div>
</nav>
<!-- Masthead -->
<header class="masthead text-white text-center">
    <div class="overlay"></div>
    <div class="search_box_div">
        <div class="row">
            <div class="col-md-12">
                <form id="inputs" action="#"><input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group input-group">
                        <span><i class="fa fa-chevron-circle-right fa-2x search_input_icons" aria-hidden="true"></i></span>
                        <input type="text" name="from" class="search form-control"
                               placeholder="Departing City or Airport" required>
                    </div>

                    <div class="form-group input-group">
                        <span><i class="fa fa-chevron-circle-right fa-2x search_input_icons" aria-hidden="true"></i></span>
                        <input type="text" name="to" class="search form-control"
                               placeholder="Returning City or Airport" required>
                    </div>

                    <button class="btn btn-primary searches"><i class="fa fa-plane" aria-hidden="true"></i>&nbsp;Lets Go!
                    </button>&emsp;
                    <button class="btn btn-primary addTrip"><i class="fa fa-plus-circle" aria-hidden="true"></i>&nbsp;Add Trip
                    </button>&emsp;
                    <button class="btn btn-primary deleteTrip"><i class="fa fa-minus-circle" aria-hidden="true"></i>
                        &nbsp;Delete Trip
                    </button>
                </form>
            </div>
        </div>
    </div>
</header>
<!-- Footer -->
<footer class="footer bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 h-100 text-center text-lg-left my-auto">
                <p class="text-muted small mb-4 mb-lg-0">&copy; Nitesh Arora 2018. All Rights Reserved.</p>
            </div>
            <div class="col-lg-6 h-100 text-center text-lg-right my-auto">
            </div>
        </div>
    </div>
</footer>


<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/jquery-ui.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script>
    var base_url = window.location.origin;
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('.search').autocomplete({
        source: function (request, response) {
            $.ajax({
                url: base_url + "/airports/autocomplete/" + request.term,
                dataType: 'json',
                success: function (data) {
                    response(data.map(function (value) {
                        return {
                            'label': '' + value.airport_name + ' (' + value.airport_code + ') - ' + value.airport_city + '',
                            'value': value.code
                        };
                    }));
                }
            });
        },
        minLength: 1
    });
    $(document).ready(function () {
        $(".searches").click(function (event) {
            event.preventDefault();
            post_ajax('search');
        });
        $(".addTrip").click(function (event) {
            event.preventDefault();
            post_ajax('addTrip');
        });
        $(".deleteTrip").click(function (event) {
            event.preventDefault();
            post_ajax('deleteTrip');
        });
    });
    function post_ajax(action) {
        var formData = {
            'from': $('input[name=from]').val(),
            'to': $('input[name=to]').val()

        };
        $.post(action, formData, function (data) {
            if (data.length >=1){
                alert('Trip Found! Go to View Trips')
            }
            else if (data.length == 0){
                alert('No Trips found sorry! Try Again Later!')
            }
        });
    }
</script>
</body>
</html>
