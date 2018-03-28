<html>
<head>
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
    <!-- Custom fonts for this template -->
    <link rel="stylesheet" href="{{asset('font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/simple-line-icons.css')}}">
    <!-- Custom styles for this template -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/landing-page.css')}}">
    <link rel="shortcut icon" type="image/png" href="{{asset('images/favicon.png')}}"/>
    <!-- Import Fonts-->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#data_table').DataTable({
                "order": [ 1, 'asc' ]
            });
        });
    </script>
    <style>
        .main_table {
            border: 1px solid black;
            width: 100%;
        }

        .main_thead {
            background-color: #202e78;
            color: white;
            font-size: 1em;
        }

        .tr_main {
            background-color: #202e780f;
            transition: 0.3s ease-in;
            line-height: 2em;
        }

        .tr_main:hover {
            background-color: #202e785c;
            box-shadow: 0 0 9px 1px black;
        }

        td {
            border: 1px solid black;
        }
    </style>
</head>
<body>
<!-- Navigation -->
<nav class="navbar navbar-light bg-light static-top">
    <div class="container">
        <a class="navbar-brand" href="/"><img src="{{asset("images/favicon.png")}}" class="icon_main" alt="">&nbsp;TripBuilder</a>
        <div><a class="btn btn-primary" href="{{url('recreateAirports')}}">Fetch Updates</a>
        <a class="btn btn-primary" href="{{url('main')}}">Back</a></div>
    </div>
</nav>

<table class="main_table" id="data_table">
    <thead class="main_thead">
    <tr>
        <th>#</th>
        <th>
            Airport Names
        </th>
        <th>
            Airport Code
        </th>
        <th>
            City
        </th>
        <th>
            State
        </th>
        <th>
            Country
        </th>
    </tr>
    </thead>
    <tbody>
    @foreach ($name as $key=>$user)
        <tr class="tr_main">
            <td>{{ ++$key }}</td>
            <td>
                @if ($user->airport_name == "")
                    None
                @else
                    {{ $user->airport_name }}
                @endif
            </td>
            <td>{{ $user->airport_code }}</td>
            <td>{{ $user->city }}</td>
            <td>
                @if ($user->state=="")
                    None
                @else
                    {{ $user->state }}
                @endif
            </td>
            <td>{{ $user->country }}</td>
        </tr>
    @endforeach


    </tbody>

</table>
</body>

</html>
