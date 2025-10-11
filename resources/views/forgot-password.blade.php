<!DOCTYPE html>
<html lang="en">

<head>
    <title>Forgot Password - Enter OTP</title>

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

                    <form method="POST" action="/verify-otp" id="otpForm" class="md-float-material form-material">
                        @csrf
                        <div class="text-center">
                            <img src="{{url('assets\images\logo.png')}}" alt="logo.png">
                        </div>
                        <div class="auth-box card">
                            <div class="card-block">
                                <div class="row m-b-20">
                                    <div class="col-md-12">
                                        <h3 class="text-center" id="pageTitle">Forgot Password</h3>
                                        <p class="text-center text-muted" id="pageSubtitle">Enter your email to receive OTP</p>
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

                                <!-- Alert placeholder for dynamic messages -->
                                <div id="alertBox" style="display: none;"></div>

                                <div class="form-group form-primary">
                                    <input type="email" name="email" id="email" class="form-control" required="" placeholder="Your Email Address" value="{{ old('email') }}">
                                    <span class="form-bar"></span>
                                </div>

                                <!-- OTP input field (hidden initially) -->
                                <div class="form-group form-primary" id="otpGroup" style="display: none;">
                                    <input type="text" name="otp" id="otp" class="form-control" placeholder="Enter 6-Digit OTP Code" maxlength="6" pattern="[0-9]{6}">
                                    <span class="form-bar"></span>
                                </div>

                                <div class="row m-t-25 text-left">
                                    <div class="col-12">
                                        <div class="forgot-phone text-right f-right">
                                            <a href="/login" class="text-right f-w-600"> Back to Login</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="row m-t-30">
                                    <div class="col-md-12">
                                        <!-- Send OTP Button -->
                                        <button type="button" id="sendOtpBtn" onclick="sendOtp()" class="btn btn-primary btn-md btn-block waves-effect waves-light text-center m-b-20">
                                            <span id="sendOtpText">Send OTP</span>
                                            <span id="sendOtpSpinner" style="display: none;">
                                                <i class="fa fa-spinner fa-spin"></i> Sending...
                                            </span>
                                        </button>

                                        <!-- Verify OTP Button (hidden initially) -->
                                        <button type="submit" id="verifyOtpBtn" style="display: none;" class="btn btn-primary btn-md btn-block waves-effect waves-light text-center m-b-20">
                                            <span id="verifyOtpText">Verify OTP</span>
                                            <span id="verifyOtpSpinner" style="display: none;">
                                                <i class="fa fa-spinner fa-spin"></i> Verifying...
                                            </span>
                                        </button>
                                    </div>
                                </div>

                                <div class="row" id="resendSection" style="display: none;">
                                    <div class="col-md-12 text-center">
                                        <p class="text-muted">Didn't receive the code? <a href="#" onclick="resendOtp(); return false;" class="text-primary f-w-600">Resend OTP</a></p>
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

    <script>
        let otpSent = false;

        async function sendOtp() {
            const email = document.getElementById('email').value;
            const sendOtpBtn = document.getElementById('sendOtpBtn');
            const sendOtpText = document.getElementById('sendOtpText');
            const sendOtpSpinner = document.getElementById('sendOtpSpinner');
            const alertBox = document.getElementById('alertBox');

            if (!email) {
                showAlert('Please enter your email address.', 'danger');
                return;
            }

            // Disable button and show loading
            sendOtpBtn.disabled = true;
            sendOtpText.style.display = 'none';
            sendOtpSpinner.style.display = 'inline-block';

            try {
                const response = await fetch('/send-otp', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({ email: email })
                });

                const result = await response.json();

                // Reset button state
                sendOtpBtn.disabled = false;
                sendOtpText.style.display = 'inline-block';
                sendOtpSpinner.style.display = 'none';

                if (response.ok) {
                    otpSent = true;
                    showAlert(result.message);

                    // Update UI to show OTP input
                    document.getElementById('pageTitle').textContent = 'Verify OTP';
                    document.getElementById('pageSubtitle').textContent = 'Enter the OTP code sent to your email';
                    document.getElementById('email').readOnly = true;
                    document.getElementById('otpGroup').style.display = 'block';
                    document.getElementById('otp').required = true;
                    document.getElementById('sendOtpBtn').style.display = 'none';
                    document.getElementById('verifyOtpBtn').style.display = 'block';
                    document.getElementById('resendSection').style.display = 'block';
                } else {
                    showAlert(result.error || 'Failed to send OTP', 'danger');
                }
            } catch (error) {
                // Reset button state
                sendOtpBtn.disabled = false;
                sendOtpText.style.display = 'inline-block';
                sendOtpSpinner.style.display = 'none';

                showAlert('Network error occurred. Please try again.', 'danger');
            }
        }

        async function resendOtp() {
            await sendOtp();
        }

        function showAlert(message, type) {
            const alertBox = document.getElementById('alertBox');
            alertBox.innerHTML = `<div class="alert alert-${type}" role="alert">${message}</div>`;
            alertBox.style.display = 'block';

            // Auto-hide after 5 seconds
            setTimeout(() => {
                alertBox.style.display = 'none';
            }, 5000);
        }

        // Add loading state to verify button on submit
        document.getElementById('otpForm').addEventListener('submit', function() {
            const verifyOtpBtn = document.getElementById('verifyOtpBtn');
            const verifyOtpText = document.getElementById('verifyOtpText');
            const verifyOtpSpinner = document.getElementById('verifyOtpSpinner');

            verifyOtpBtn.disabled = true;
            verifyOtpText.style.display = 'none';
            verifyOtpSpinner.style.display = 'inline-block';
        });
    </script>

</body>

</html>

