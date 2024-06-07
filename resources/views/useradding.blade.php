@extends('layout.layout')
@section('contend')

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
                                    <form  method="POST" action="/useradding" >
                                        @csrf

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">First
                                                Name</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="fname"
                                                    placeholder="Enter your first name">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Last
                                                Name</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="lname"
                                                    placeholder="Enter your last name">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">User
                                                Name</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="username"
                                                    placeholder="Enter your user name">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Email</label>
                                            <div class="col-sm-10">
                                                <input type="email" class="form-control" name="email"
                                                    placeholder="Enter your email address">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Role</label>
                                            <div class="col-sm-10">
                                                <select name="selectrole" class="form-control form-control-primary">
                                                    <option value="opt1">Select One Value Only</option>
                                                    @foreach($roles as $role)
                                                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Password</label>
                                            <div class="col-sm-10">
                                                <input type="password" class="form-control" name="password"
                                                    placeholder="Enter your password">
                                            </div>
                                        </div>
                                        <button class="btn btn-primary" type="submit"
                                            style="position: absolute; right: 0; margin: 10px 20px 20px 25px;">Sign
                                            Up</button>
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

@endsection
