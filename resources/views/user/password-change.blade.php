@extends('layout.userlayout')
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
                                        <h4>Change Password</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="page-header-breadcrumb">
                                    <ul class="breadcrumb-title">
                                        <li class="breadcrumb-item">
                                            <a href="/user"> <i class="feather icon-home"></i>
                                            </a>
                                        </li>
                                        <li class="breadcrumb-item"><a href="#!">Settings</a>
                                        </li>
                                        <li class="breadcrumb-item"><a href="#!">Password Change</a>
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
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Update Your Password</h5>
                                        <span>Enter your current password and choose a new password</span>
                                    </div>
                                    <div class="card-block">
                                        <!-- Display error message -->
                                        @if(session('error'))
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <strong>Error!</strong> {{ session('error') }}
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        @endif

                                        <!-- Display success message -->
                                        @if(session('success'))
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            <strong>Success!</strong> {{ session('success') }}
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        @endif

                                        <form onsubmit="event.preventDefault(); changePassword();">

                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Current Password</label>
                                                <div class="col-sm-9">
                                                    <input type="password" class="form-control" name="current_password"
                                                        id="current_password" required placeholder="Enter your current password">
                                                    <small class="form-text text-muted">Enter your existing password</small>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">New Password</label>
                                                <div class="col-sm-9">
                                                    <input type="password" class="form-control" name="new_password"
                                                        id="new_password" required placeholder="Enter your new password" minlength="8">
                                                    <small class="form-text text-muted">Password must be at least 8 characters long</small>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Confirm New Password</label>
                                                <div class="col-sm-9">
                                                    <input type="password" class="form-control" name="new_password_confirmation"
                                                        id="new_password_confirmation" required placeholder="Confirm your new password" minlength="8">
                                                    <small class="form-text text-muted">Re-enter your new password</small>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-sm-9 offset-sm-3">
                                                    <button class="btn btn-primary waves-effect waves-light" type="submit" id="submitBtn">
                                                        <span id="btnText">Change Password</span>
                                                        <span id="btnSpinner" style="display: none;">
                                                            <i class="fa fa-spinner fa-spin"></i> Processing...
                                                        </span>
                                                    </button>
                                                    <button class="btn btn-secondary waves-effect" type="button" onclick="window.history.back()">
                                                        Cancel
                                                    </button>
                                                </div>
                                            </div>
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
        async function changePassword() {
            const currentPassword = document.getElementById('current_password').value;
            const newPassword = document.getElementById('new_password').value;
            const newPasswordConfirmation = document.getElementById('new_password_confirmation').value;

            // Validate passwords match
            if (newPassword !== newPasswordConfirmation) {
                Swal.fire({
                    title: 'Error!',
                    text: 'New passwords do not match',
                    icon: 'error',
                    confirmButtonColor: 'rgba(0, 146, 255, 0.8)',
                    confirmButtonText: 'Okay'
                });
                return;
            }

            // Validate password length
            if (newPassword.length < 8) {
                Swal.fire({
                    title: 'Error!',
                    text: 'Password must be at least 8 characters long',
                    icon: 'error',
                    confirmButtonColor: 'rgba(0, 146, 255, 0.8)',
                    confirmButtonText: 'Okay'
                });
                return;
            }

            const data = {
                current_password: currentPassword,
                new_password: newPassword,
                new_password_confirmation: newPasswordConfirmation
            };

            // Get button and loading elements
            const submitBtn = document.getElementById('submitBtn');
            const btnText = document.getElementById('btnText');
            const btnSpinner = document.getElementById('btnSpinner');

            // Disable button and show loading state
            submitBtn.disabled = true;
            btnText.style.display = 'none';
            btnSpinner.style.display = 'inline-block';

            try {
                const response = await fetch('/password-change', {
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
                        text: result.message,
                        icon: 'success',
                        confirmButtonColor: 'rgba(0, 146, 255, 0.8)',
                        timer: 2000,
                        confirmButtonText: 'Okay'
                    }).then(() => {
                        // Clear form
                        document.getElementById('current_password').value = '';
                        document.getElementById('new_password').value = '';
                        document.getElementById('new_password_confirmation').value = '';
                    });
                } else {
                    // Display detailed error message if available
                    let errorMessage = result.message || result.error || 'Failed to change password';

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

