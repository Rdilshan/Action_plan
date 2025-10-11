@extends('layout.layout')
@section('contend')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <div class="pcoded-content">
        <div class="pcoded-inner-content">
            <div class="main-body">
                <div class="page-wrapper">
                    <!-- Page-header start -->
                    <div class="page-header">
                        <div class="row align-items-end">
                            <div class="col-lg-8">
                                <div class="page-header-title">
                                    <div class="d-inline">
                                        <h4>Add User</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="page-header-breadcrumb">
                                    <ul class="breadcrumb-title">
                                        <li class="breadcrumb-item">
                                            <a href="index-1.htm"> <i class="feather icon-home"></i>
                                            </a>
                                        </li>
                                        <li class="breadcrumb-item"><a href="#!">Form </a>
                                        </li>
                                        <li class="breadcrumb-item"><a href="#!">Form </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Page-header end -->

                    <!-- Page body start -->
                    <div class="page-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <!-- Basic Form Inputs card start -->
                                <div class="card" style="height: 400px;">

                                    <div class="card-block">
                                        <!-- <h4 class="sub-title">Basic Inputs</h4> -->
                                        <form onsubmit="event.preventDefault(); addUser();">

                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">First
                                                    Name</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" name="fname" id="fname"
                                                        required placeholder="Enter your first name">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Last
                                                    Name</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" name="lname" id="lname"
                                                        required placeholder="Enter your last name">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">User
                                                    Name</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" name="username"
                                                        id="username" required placeholder="Enter your user name">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Email</label>
                                                <div class="col-sm-10">
                                                    <input type="email" class="form-control" name="email" id="email"
                                                        required placeholder="Enter your email address">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Role</label>
                                                <div class="col-sm-10">
                                                    <select name="selectrole" id="selectrole"
                                                        class="form-control form-control-primary">
                                                        <option value="opt1">Select One Value Only</option>
                                                        @foreach ($roles as $role)
                                                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Password</label>
                                                <div class="col-sm-10">
                                                    <input type="password" id="password" class="form-control"
                                                        name="password" required placeholder="Enter your password">
                                                </div>
                                            </div>
                                            <button class="btn btn-primary" type="submit" id="submitBtn"
                                                style="position: absolute; right: 0; margin: 10px 20px 20px 25px;">
                                                <span id="btnText">Sign Up</span>
                                                <span id="btnSpinner" style="display: none;">
                                                    <i class="fa fa-spinner fa-spin"></i> Processing...
                                                </span>
                                            </button>
                                        </form>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- Page body end -->
                </div>
            </div>
        </div>
    </div>

    <script>
        async function addUser() {
            // Get button and loading elements
            const submitBtn = document.getElementById('submitBtn');
            const btnText = document.getElementById('btnText');
            const btnSpinner = document.getElementById('btnSpinner');

            // Disable button and show loading state
            submitBtn.disabled = true;
            btnText.style.display = 'none';
            btnSpinner.style.display = 'inline-block';

            try {
                const data = {
                    fname: document.getElementById('fname').value,
                    lname: document.getElementById('lname').value,
                    username: document.getElementById('username').value,
                    email: document.getElementById('email').value,
                    selectrole: document.getElementById('selectrole').value,
                    password: document.getElementById('password').value,
                };

                const response = await fetch('/useradding', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify(data)
                });

                const result = await response.json();

                // Reset button state
                submitBtn.disabled = false;
                btnText.style.display = 'inline-block';
                btnSpinner.style.display = 'none';

                if (response.ok) {
                    Swal.fire({
                        title: 'Success!',
                        text: "Successfully added the user",
                        icon: 'success',
                        confirmButtonColor: 'rgba(0, 146, 255, 0.8)',
                        timer: 1500,
                        confirmButtonText: 'Okay'
                    }).then((result) => {
                        window.location.href = "/";
                    })
                } else {
                    // Display detailed error message if available
                    let errorMessage = result.message || JSON.stringify(result.error);

                    Swal.fire({
                        title: 'Error!',
                        text: errorMessage,
                        icon: 'error',
                        confirmButtonColor: 'rgba(0, 146, 255, 0.8)',
                        confirmButtonText: 'Okay'
                    });
                }
            } catch (error) {
                // Reset button state on network error
                submitBtn.disabled = false;
                btnText.style.display = 'inline-block';
                btnSpinner.style.display = 'none';

                Swal.fire({
                    title: 'Error!',
                    text: 'Network error occurred. Please try again.',
                    icon: 'error',
                    confirmButtonColor: 'rgba(0, 146, 255, 0.8)',
                    confirmButtonText: 'Okay'
                });
            }
        }
    </script>
@endsection
