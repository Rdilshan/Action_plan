
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
                                        <a href="index-1.htm"> <i class="feather icon-home"></i>
                                        </a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#!">Task Manamgement </a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#!">Add Task </a>
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
                                    <h4 class="sub-title">Filling this information for adding new task</h4>
                                    <form>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Title</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" placeholder="Enter the Title">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label
                                                class="col-sm-2 col-form-label">Name</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control"
                                                    placeholder="Name of the responsible person for particular inquery.">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Action Plane</label>
                                            <div class="col-sm-5">

                                                <input type="date" class="form-control"
                                                    placeholder="Start Date">
                                                <span class="text-muted pl-2">start date</span>
                                            </div>
                                            <div class="col-sm-5">

                                                <input type="date" class="form-control"
                                                    placeholder="End Date">
                                                <span class="text-muted pl-2">End date</span>

                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Introduction</label>
                                            <div class="col-sm-10">
                                                <textarea rows="5" cols="5" class="form-control"
                                                    placeholder="Default textarea"></textarea>
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Upload
                                                File</label>
                                            <div class="col-sm-10">
                                                <input type="file" class="form-control">
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

@endsection
