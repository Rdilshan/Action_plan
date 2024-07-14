
@extends('layout.userlayout')
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
                                    <h4>Add New Task</h4>

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
                                    <li class="breadcrumb-item"><a href="#!">Task Manamgement </a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#!">Add  Task </a>
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

                                <div class="card-block">
                                    <h4 class="sub-title">Frist select your selection</h4>
                                    <form>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Select
                                                Goal</label>
                                            <div class="col-sm-10">
                                                <select name="select" class="form-control">
                                                    <option value="opt1">Select One Value Only
                                                    </option>
                                                    <option value="opt2">Type 2</option>
                                                    <option value="opt3">Type 3</option>
                                                    <option value="opt4">Type 4</option>
                                                    <option value="opt5">Type 5</option>
                                                    <option value="opt6">Type 6</option>
                                                    <option value="opt7">Type 7</option>
                                                    <option value="opt8">Type 8</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Select
                                                Objective</label>
                                            <div class="col-sm-10">
                                                <select name="select" class="form-control">
                                                    <option value="opt1">Select One Value Only
                                                    </option>
                                                    <option value="opt2">Type 2</option>
                                                    <option value="opt3">Type 3</option>
                                                    <option value="opt4">Type 4</option>
                                                    <option value="opt5">Type 5</option>
                                                    <option value="opt6">Type 6</option>
                                                    <option value="opt7">Type 7</option>
                                                    <option value="opt8">Type 8</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Select
                                                Strategy</label>
                                            <div class="col-sm-10">
                                                <select name="select" class="form-control">
                                                    <option value="opt1">Select One Value Only
                                                    </option>
                                                    <option value="opt2">Type 2</option>
                                                    <option value="opt3">Type 3</option>
                                                    <option value="opt4">Type 4</option>
                                                    <option value="opt5">Type 5</option>
                                                    <option value="opt6">Type 6</option>
                                                    <option value="opt7">Type 7</option>
                                                    <option value="opt8">Type 8</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Select
                                                Action</label>
                                            <div class="col-sm-10">
                                                <select name="select" class="form-control">
                                                    <option value="opt1">Select One Value Only
                                                    </option>
                                                    <option value="opt2">Type 2</option>
                                                    <option value="opt3">Type 3</option>
                                                    <option value="opt4">Type 4</option>
                                                    <option value="opt5">Type 5</option>
                                                    <option value="opt6">Type 6</option>
                                                    <option value="opt7">Type 7</option>
                                                    <option value="opt8">Type 8</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Select
                                                Subaction</label>
                                            <div class="col-sm-10">
                                                <select name="select" class="form-control">
                                                    <option value="opt1">Select One Value Only
                                                    </option>
                                                    <option value="opt2">Type 2</option>
                                                    <option value="opt3">Type 3</option>
                                                    <option value="opt4">Type 4</option>
                                                    <option value="opt5">Type 5</option>
                                                    <option value="opt6">Type 6</option>
                                                    <option value="opt7">Type 7</option>
                                                    <option value="opt8">Type 8</option>
                                                </select>
                                            </div>
                                        </div>

                                        <button class="btn btn-primary" type="submit">Submit</button>
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
