<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>TripBuilder</title>
    <meta name="_token" content="{{csrf_token()}}"/>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
    <!-- Custom fonts for this template -->
    <link rel="stylesheet" href="{{asset('css/fontawesome.min.css')}}">
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
        <a class="btn btn-primary" href="{{url('airports')}}">See Airports</a>
    </div>
</nav>
<!-- Masthead -->
<header class="masthead text-white text-center">
    <div class="overlay"></div>
    <div class="search_box_div">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group input-group">
                    <input type="text" name="from" class="search form-control"
                           placeholder="Departing City or Airport">
                </div>

                <div class="form-group input-group">
                    <input type="text" name="to" class="search form-control"
                           placeholder="Returning City or Airport">
                </div>

                <button class="btn btn-primary searches"><i
                            class="fas fa-telegram-plane"></i>&nbsp;Lets Go!
                </button>&emsp;
                <button class="btn btn-primary"><i
                            class="fas fa-plus-square"></i>&nbsp;Add Trip
                </button>&emsp;
                <button class="btn btn-primary"><i
                            class="fas fa-minus-circle"></i>&nbsp;Delete Trip
                </button>
            </div>
        </div>
    </div>
</header>

<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/jquery-ui.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script>
    var base_url = window.location.origin;
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
    $(".searches").click(function (event) {
        var formData = {
            'from': $('input[name=from]').val(),
            'to': $('input[name=to]').val()
        };
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        alert(base_url + "/airports/search/");
        $.ajax({
            type: 'POST',
            url: base_url + "/airports/search",
            data: formData
        });
        event.preventDefault();
    });
</script>
</body>
</html>
