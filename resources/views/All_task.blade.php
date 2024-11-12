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
                                        <h4>All List of Tasks</h4>
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
                                        <li class="breadcrumb-item"><a href="#!">All List of Task </a>
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
                                            @foreach ($tasks as $task)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $task->Title }}</td>
                                                    <td>{{ $task->name }}</td>

                                                    <td>

                                                        <label class="label bg-success"
                                                            onclick="TaskEdit({{ $task->id }})"
                                                            style="display: inline-flex; align-items: center; justify-content: center; width: 20px; height: 20px; border-radius: 5px; margin: 5px; cursor: pointer; text-align: center; background-color: green;">
                                                            <i class="icofont icofont-eye-alt"
                                                                style="font-size: 20px; color: white;"></i>
                                                        </label>

                                                        <label class="label " onclick="Createword({{ $task->id }})"
                                                            style="display: inline-flex; align-items: center; justify-content: center; width: 20px; height: 20px; border-radius: 5px; margin: 5px; cursor: pointer; text-align: center; background-color: rgb(97, 97, 204);">
                                                            <i class="icofont icofont-file-word"
                                                                style="font-size: 20px; color: white;"></i>
                                                        </label>


                                                        <label class="label bg-success" onclick="TaskEditing({{ $task->id }})"
                                                            style="display: inline-flex; align-items: center; justify-content: center; width: 20px; height: 20px; border-radius: 5px; margin: 5px; cursor: pointer; text-align: center; background-color: green;">
                                                            <i class="icofont icofont-pencil-alt-5"
                                                                style="font-size: 20px; color: white;"></i>
                                                        </label>

                                                        <span class="label label-danger" onclick="Taskdelete({{ $task->id }})"
                                                            style="display: inline-flex; align-items: center; justify-content: center; width: 20px; height: 20px; border-radius: 5px; margin: 5px; cursor: pointer; text-align: center; background-color: red;">
                                                            <i class="icofont icofont-ui-delete"
                                                                style="font-size: 20px; color: white;"></i>
                                                        </span>

                                                        <label class="label" onclick="TaskUpdate({{ $task->id }})"
                                                            style="display: inline-flex; align-items: center; justify-content: center; width: 20px; height: 20px; border-radius: 5px; margin: 5px; cursor: pointer; text-align: center; background-color: rgb(79, 79, 245);">
                                                            <i class="icofont icofont-recycle"
                                                                style="font-size: 20px; color: white;"></i>
                                                        </label>

                                                    </td>
                                                </tr>
                                            @endforeach
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

<script>
    async function Taskdelete(id) {
    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!"
    }).then(async (result) => { // Make this callback async
        if (result.isConfirmed) {
            const response = await fetch(`/deletetask/${id}`, {
                method: 'DELETE',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            });

            if (response.ok) {
                Swal.fire({
                    title: "Deleted!",
                    text: "The user has been deleted.",
                    icon: "success"
                }).then(() => {
                    location.reload(); // Reload the page to reflect the changes
                });
            } else {
                const result = await response.json();
                Swal.fire({
                    title: 'Error!',
                    text: result.error || 'Failed to delete the user',
                    icon: 'error',
                    confirmButtonColor: '#3085d6',
                    timer: 1500,
                    confirmButtonText: 'Okay'
                });
            }
        }
    });
}


</script>

@section('scriptjs')
    <script type="text/javascript" src="{{ url('assets\js\modalEffects.js') }}"></script>
    <script type="text/javascript" src="{{ url('assets\js\classie.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('#simpletable').DataTable();
        });

        async function TaskEdit(id) {
            window.location.href = `/admin/view/user/task/${id}`;
        }

        async function Createword(id) {
            window.open(`/word/${id}`, '_blank');
        }

        async function TaskEditing(id) {
            window.location.href = `/admin/edit/task/${id}`;
        }
    </script>
@endsection
