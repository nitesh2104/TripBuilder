<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>TripBuilder</title>
    <!-- Bootstrap core CSS -->
    <link  rel="stylesheet" type="text/css" href="{{ URL::asset('css/bootstrap.min.css') }}">
    <!-- Custom fonts for this template -->
    <link  rel="stylesheet" type="text/css" href="{{URL::asset('css/font-awesome.min.css')}}">
    <link  rel="stylesheet" type="text/css" href="{{URL::asset('css/simple-line-icons.css')}}">
    <!-- Custom styles for this template -->
    <link  rel="stylesheet" type="text/css" href="{{URL::asset('css/landing-page.css')}}">
    <!-- Import Fonts-->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic">
</head>
<body>
<!-- Navigation -->
<nav class="navbar navbar-light bg-light static-top">
    <div class="container">
        <a class="navbar-brand" href="#">TripBuilder</a>
        <a class="btn btn-primary" href="#">Sign In</a>
    </div>
</nav>
<!-- Masthead -->
<header class="masthead text-white text-center">
    <div class="overlay"></div>
    <div class="search_box_div">
        <div class="row">
            <h2><i class="fa fa-plane"></i>Flights</h2>
            <div class="col-md-19 col-lg-22 col-xl-24">
                <form>
                    <div class="form-row">
                        <div class="col-6 col-md-9 mb-2 mb-md-0">
                            <input type="text" class="form-control form-control-lg" placeholder="Leaving From">
                        </div>
                        <div class="col-6 col-md-9 mb-2 mb-md-0">
                            <input type="text" class="form-control form-control-lg" placeholder="Going To">
                        </div>
                        <div class="col-6 col-md-9 mb-2 mb-md-0">
                            <input type="date" class="form-control form-control-lg" placeholder="Depart">
                        </div>
                        <div class="col-6 col-md-9 mb-2 mb-md-0">
                            <input type="date" class="form-control form-control-lg" placeholder="Return">
                        </div>
                        <div class="dropdown show col-6 col-md-9 mb-2 mb-md-0">
                            <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Select Class
                            </a>

                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</header>

<!-- Icons Grid -->
<section class="features-icons bg-light text-center">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
                    <div class="features-icons-icon d-flex">
                        <i class="icon-screen-desktop m-auto text-primary"></i>
                    </div>
                    <h3>Fully Responsive</h3>
                    <p class="lead mb-0">This theme will look great on any device, no matter the size!</p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
                    <div class="features-icons-icon d-flex">
                        <i class="icon-layers m-auto text-primary"></i>
                    </div>
                    <h3>Bootstrap 4 Ready</h3>
                    <p class="lead mb-0">Featuring the latest build of the new Bootstrap 4 framework!</p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="features-icons-item mx-auto mb-0 mb-lg-3">
                    <div class="features-icons-icon d-flex">
                        <i class="icon-check m-auto text-primary"></i>
                    </div>
                    <h3>Easy to Use</h3>
                    <p class="lead mb-0">Ready to use with your own content, or customize the source files!</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Footer -->
<footer class="footer bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 h-100 text-center text-lg-left my-auto">
                <ul class="list-inline mb-2">
                    <li class="list-inline-item">
                        <a href="#">About</a>
                    </li>
                    <li class="list-inline-item">&sdot;</li>
                    <li class="list-inline-item">
                        <a href="#">Contact</a>
                    </li>
                    <li class="list-inline-item">&sdot;</li>
                    <li class="list-inline-item">
                        <a href="#">Terms of Use</a>
                    </li>
                    <li class="list-inline-item">&sdot;</li>
                    <li class="list-inline-item">
                        <a href="#">Privacy Policy</a>
                    </li>
                </ul>
                <p class="text-muted small mb-4 mb-lg-0">&copy; Your Website 2018. All Rights Reserved.</p>
            </div>
            <div class="col-lg-6 h-100 text-center text-lg-right my-auto">
                <ul class="list-inline mb-0">
                    <li class="list-inline-item mr-3">
                        <a href="#">
                            <i class="fa fa-facebook fa-2x fa-fw"></i>
                        </a>
                    </li>
                    <li class="list-inline-item mr-3">
                        <a href="#">
                            <i class="fa fa-twitter fa-2x fa-fw"></i>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="#">
                            <i class="fa fa-instagram fa-2x fa-fw"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>

<!-- Bootstrap core JavaScript -->
<script src="{{URL::asset('js/jquery/jquery.min.js')}}"></script>
<script src="{{URL::asset('js/bootstrap.bundle.min.js')}}"></script>
</body>
</html>
