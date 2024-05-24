<!DOCTYPE html>
<html lang="en">

<head>
    <title>Project</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="#">
    <meta name="keywords"
        content="Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
    <meta name="author" content="#">
    <!-- Favicon icon -->

    <link rel="icon" href="{{url('assets\images\favicon.ico')}}" type="image/x-icon">

    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600" rel="stylesheet">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="{{url('bower_components\bootstrap\css\bootstrap.min.css')}}">
    <!-- feather Awesome -->
    <link rel="stylesheet" type="text/css" href="{{url('assets\icon\feather\css\feather.css')}}">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="{{url('assets\css\style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('assets\css\jquery.mCustomScrollbar.css')}}">
</head>

<body>
    <!-- Pre-loader start -->
    <div class="theme-loader">
        <div class="ball-scale">
            <div class='contain'>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- Pre-loader end -->
    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">

            @include('compoment.navbar')

            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">
                    <nav class="pcoded-navbar">
                        @include('compoment.sidenavbar')

                    </nav>
                    @yield('contend')
                </div>
            </div>
        </div>
    </div>


    <script type="text/javascript" src="{{url('bower_components\jquery\js\jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{url('bower_components\jquery-ui\js\jquery-ui.min.js')}}"></script>
    <script type="text/javascript" src="{{url('bower_components\popper.js\js\popper.min.js')}}"></script>
    <script type="text/javascript" src="{{url('bower_components\bootstrap\js\bootstrap.min.js')}}"></script>
    <!-- jquery slimscroll js -->
    <script type="text/javascript" src="{{url('bower_components\jquery-slimscroll\js\jquery.slimscroll.js')}}"></script>
    <!-- modernizr js -->
    <script type="text/javascript" src="{{url('bower_components\modernizr\js\modernizr.js')}}"></script>

    <!-- amchart js -->
    <script src="{{url('assets\pages\widget\amchart\amcharts.js')}}"></script>
    <script src="{{url('assets\pages\widget\amchart\serial.js')}}"></script>
    <script src="{{url('assets\pages\widget\amchart\light.js')}}"></script>
    <script src="{{url('assets\js\jquery.mCustomScrollbar.concat.min.js')}}"></script>
    <script type="text/javascript" src="{{url('assets\js\SmoothScroll.js')}}"></script>
    <script src="{{url('assets\js\pcoded.min.js')}}"></script>
    <!-- custom js -->
    <script src="{{url('assets\js\vartical-layout.min.js')}}"></script>
    <script type="text/javascript" src="{{url('assets\pages\dashboard\custom-dashboard.js')}}"></script>
    <script type="text/javascript" src="{{url('assets\js\script.min.js')}}"></script>

</body>

</html>
