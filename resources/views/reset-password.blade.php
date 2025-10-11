<!DOCTYPE html>
<html lang="en">

<head>
    <title>Reset Password</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="#">
    <meta name="keywords" content="Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
    <meta name="author" content="#">

    <link rel="icon" href="{{url('assets\images\favicon.ico')}}" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,800" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{url('bower_components\bootstrap\css\bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('assets\icon\themify-icons\themify-icons.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('assets\icon\icofont\css\icofont.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('assets\css\style.css')}}">
</head>

<body class="fix-menu">

    <section class="login-block">

        <div class="container">
            <div class="row">
                <div class="col-sm-12">

                    <form method="POST" action="/update-password" class="md-float-material form-material">
                        @csrf
                        <div class="text-center">
                            <img src="{{url('assets\images\logo.png')}}" alt="logo.png">
                        </div>
                        <div class="auth-box card">
                            <div class="card-block">
                                <div class="row m-b-20">
                                    <div class="col-md-12">
                                        <h3 class="text-center">Reset Password</h3>
                                        <p class="text-center text-muted">Enter your new password</p>
                                    </div>
                                </div>
                                 <!-- Display error message -->
                                @if(session('error'))
                                <div class="alert alert-danger" role="alert">
                                    {{ session('error') }}
                                </div>
                                @endif

                                <!-- Display success message -->
                                @if(session('success'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('success') }}
                                </div>
                                @endif

                                <div class="form-group form-primary">
                                    <input type="email" name="email" class="form-control" required="" placeholder="Your Email Address" readonly value="{{ session('email') }}">
                                    <span class="form-bar"></span>
                                </div>
                                <div class="form-group form-primary">
                                    <input type="password" name="password" id="password" class="form-control" required="" placeholder="New Password" minlength="8">
                                    <span class="form-bar"></span>
                                </div>
                                <div class="form-group form-primary">
                                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required="" placeholder="Confirm New Password" minlength="8">
                                    <span class="form-bar"></span>
                                </div>
                                <div class="row m-t-25">
                                    <div class="col-12">
                                        <p class="text-muted text-center">
                                            <small>
                                                <i class="icofont icofont-info-circle"></i>
                                                Password must be at least 8 characters long
                                            </small>
                                        </p>
                                    </div>
                                </div>
                                <div class="row m-t-30">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary btn-md btn-block waves-effect waves-light text-center m-b-20">Reset Password</button>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <a href="/login" class="text-primary f-w-600">Back to Login</a>
                                    </div>
                                </div>
                                <hr>

                            </div>
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </section>

</body>

</html>

