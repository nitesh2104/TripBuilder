<html>
<head>
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
    <style>
        .main_table {
            border: 1px solid black;
            width: 100%;
        }

        .main_thead {
            background-color: #202e78;
            color: white;
            font-size: 2em;
        }

        .tr_main {
            background-color: #202e780f;
            transition: 0.3s ease-in;
        }

        .tr_main:hover {
            background-color: #202e785c;
        }
    </style>
</head>
<body>
<!-- Navigation -->
<nav class="navbar navbar-light bg-light static-top">
    <div class="container">
        <a class="navbar-brand" href="/"><img src="{{asset("images/favicon.png")}}" class="icon_main" alt="">&nbsp;TripBuilder</a>
        <a class="btn btn-primary" href="{{url('main')}}">Back</a>
    </div>
</nav>

<table class="main_table">
    <thead class="main_thead">
    <tr>
        <th>
            Airport Names
        </th>
    </tr>
    </thead>
    <tbody>
    @foreach ($name as $user)
        <tr class="tr_main">
            <td>{{ $user->airport_name }}</td>
        </tr>
    @endforeach


    </tbody>
</table>
</body>
</html>
