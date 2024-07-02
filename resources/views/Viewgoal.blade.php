@extends('layout.layout')
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


                                    <button type="button"
                                        class="btn btn-inverse btn-round waves-effect md-trigger mb-4"
                                        data-modal="modal-3">Add New Goal</button>


                                    <div class="md-modal md-effect-3" id="modal-3">
                                        <div class="md-content">
                                            <h3>Add New Goal  <button type="button"
                                                class="btn btn-primary waves-effect md-close" style="
                                                position: absolute;
                                                right: 0;
                                                top: 2px;
                                                color: #fffdfd;
                                                background-color: #0219ec;
                                            ">X</button></h3>

                                            <div>
                                                <p>This is a modal window. You can do the following things with it:</p>
                                                <form action="">
                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label">Name</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" name="goalname" id="goalname" class="form-control">
                                                        </div>
                                                    </div>

                                                    <button type="Submit" class="btn btn-primary waves-effect">Save</button>
                                                </form>

                                            </div>
                                        </div>
                                    </div>


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

                                                    <label class="label warning-breadcrumb"> <i
                                                            class="icofont icofont-eye-alt f-20"
                                                            style="width: 20px; height: 20px; display: inline-flex; align-items: center; justify-content: center; border-radius: 5px; margin-top: 5px;"></i></label>
                                                    <label class="label bg-success"> <i class="icofont icofont-pencil-alt-5"
                                                            style="width: 20px; height: 20px; display: inline-flex; align-items: center; justify-content: center; border-radius: 5px;"></i>
                                                    </label>
                                                    <span class="label label-danger"><i
                                                            class="icofont icofont-ui-delete"></i> </span>
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

    <script>
        async function addGoal() {
            const data = {
                goalname: document.getElementById('goalname').value,

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

            if (response.ok) {
                Swal.fire({
                    title: 'success!',
                    text: "successfully add the user",
                    icon: 'success',
                    confirmButtonColor: 'rgba(0, 146, 255, 0.8)',
                    timer: 1500,
                    confirmButtonText: 'Okay'
                }).then((result) => {
                    window.location.href = "/";
                })
            } else {

                Swal.fire({
                    title: 'Errror!',
                    text: JSON.stringify(result.error),
                    icon: 'error',
                    confirmButtonColor: 'rgba(0, 146, 255, 0.8)',
                    timer: 1500,
                    confirmButtonText: 'Okay'
                }).then((result) => {
                    window.location.href = "/useradding";

                })
            }
        }
    </script>

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
