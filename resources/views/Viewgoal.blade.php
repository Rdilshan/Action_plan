@extends('layout.layout')
@section('contend')
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
                                        <h4>List of Goal</h4>
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
                                        <li class="breadcrumb-item"><a href="#!">Goal Management </a>
                                        </li>
                                        <li class="breadcrumb-item"><a href="#!">List of Goal </a>
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
                                            <th>Goal Name</th>
                                            <th>Date</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                            <tr>
                                                <td>1</td>
                                                <td>System Architect</td>

                                                <td>2011/04/25</td>
                                                <td>

                                                    <label class="label warning-breadcrumb">   <i class="icofont icofont-eye-alt f-20"></i></label>
                                                    <label class="label bg-success"> <i class="icofont icofont-pencil-alt-5"></i> </label>
                                                    <span class="label label-danger"><i class="icofont icofont-ui-delete"></i> </span>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>2</td>
                                                <td>System Architect</td>

                                                <td>2011/04/25</td>
                                                <td>

                                                    <label class="label warning-breadcrumb">   <i class="icofont icofont-eye-alt f-20"></i></label>
                                                    <label class="label bg-success"> <i class="icofont icofont-pencil-alt-5"></i> </label>
                                                    <span class="label label-danger"><i class="icofont icofont-ui-delete"></i> </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>System Architect</td>

                                                <td>2011/04/25</td>
                                                <td>

                                                    <label class="label warning-breadcrumb">   <i class="icofont icofont-eye-alt f-20"></i></label>
                                                    <label class="label bg-success"> <i class="icofont icofont-pencil-alt-5"></i> </label>
                                                    <span class="label label-danger"><i class="icofont icofont-ui-delete"></i> </span>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>4</td>
                                                <td>System Architect</td>

                                                <td>2011/04/25</td>
                                                <td>

                                                    <label class="label warning-breadcrumb">   <i class="icofont icofont-eye-alt f-20"></i></label>
                                                    <label class="label bg-success"> <i class="icofont icofont-pencil-alt-5"></i> </label>
                                                    <span class="label label-danger"><i class="icofont icofont-ui-delete"></i> </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>5</td>
                                                <td>System Architect</td>

                                                <td>2011/04/25</td>
                                                <td>

                                                    <label class="label warning-breadcrumb">   <i class="icofont icofont-eye-alt f-20"></i></label>
                                                    <label class="label bg-success"> <i class="icofont icofont-pencil-alt-5"></i> </label>
                                                    <span class="label label-danger"><i class="icofont icofont-ui-delete"></i> </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>6</td>
                                                <td>System Architect</td>

                                                <td>2011/04/25</td>
                                                <td>

                                                    <label class="label warning-breadcrumb">   <i class="icofont icofont-eye-alt f-20"></i></label>
                                                    <label class="label bg-success"> <i class="icofont icofont-pencil-alt-5"></i> </label>
                                                    <span class="label label-danger"><i class="icofont icofont-ui-delete"></i> </span>
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
<script>
    $(document).ready(function() {
            $('#simpletable').DataTable();
        });
</script>
@endsection
