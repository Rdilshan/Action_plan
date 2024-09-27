@extends('layout.userlayout')
@section('contend')
    <!-- animation nifty modal window effects css -->
    <link rel="stylesheet" type="text/css" href="{{ url('assets\css\component.css') }}" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <div class="pcoded-content" style="height: 92vh !important;">
        <div class="pcoded-inner-content" style="height: 100%;overflow-y: scroll;">
            <div class="main-body">
                <div class="page-wrapper">
                    <!-- Page-header start -->
                    <div class="page-header">
                        <div class="row align-items-end">
                            <div class="col-lg-8">
                                <div class="page-header-title">
                                    <div class="d-inline">
                                        <h4>List of Tasks</h4>
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
                                        <li class="breadcrumb-item"><a href="#!">List of Task </a>
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

                                <div class="dt-responsive table-responsive">



                                    <table id="simpletable" class="table table-striped table-bordered nowrap">
                                        <thead>
                                            <tr>
                                                <th>id</th>
                                                <th>Name</th>
                                                <th>Responsible Person</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <tr>
                                                <td>1</td>
                                                <td>12</td>
                                                <td>12</td>
                                                <td>

                                                    <label class="label bg-success"
                                                        style="display: inline-flex; align-items: center; justify-content: center; width: 20px; height: 20px; border-radius: 5px; margin: 5px; cursor: pointer; text-align: center; background-color: green;">
                                                        <i class="icofont icofont-pencil-alt-5"
                                                            style="font-size: 20px; color: white;"></i>
                                                    </label>
                                                    <span class="label label-danger"
                                                        style="display: inline-flex; align-items: center; justify-content: center; width: 20px; height: 20px; border-radius: 5px; margin: 5px; cursor: pointer; text-align: center; background-color: red;">
                                                        <i class="icofont icofont-ui-delete"
                                                            style="font-size: 20px; color: white;"></i>
                                                    </span>
                                                </td>
                                            </tr>

                                        </tbody>

                                    </table>
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


@section('scriptjs')
    <script type="text/javascript" src="{{ url('assets\js\modalEffects.js') }}"></script>
    <script type="text/javascript" src="{{ url('assets\js\classie.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('#simpletable').DataTable();
        });
    </script>
@endsection
