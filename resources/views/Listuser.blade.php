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
                                        <h4>List of User</h4>
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
                                        <li class="breadcrumb-item"><a href="#!">User Management </a>
                                        </li>
                                        <li class="breadcrumb-item"><a href="#!">List of User </a>
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
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <th>User Name</th>
                                                <th>Email</th>
                                                <th>Role</th>

                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($users as $user)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $user->fname }}</td>
                                                    <td>{{ $user->lname }}</td>
                                                    <td>{{ $user->Username }}</td>
                                                    <td>{{ $user->email }}</td>
                                                    <td>
                                                        @if($user->role == 1)
                                                            admin
                                                        @elseif($user->role == 0)
                                                            user
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <span class="label label-danger"><i
                                                                class="icofont icofont-ui-delete"
                                                                onclick="userdelete({{ $user->id }})"></i> </span>
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

    <script>
        async function userdelete(id) {
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
                    const response = await fetch(`/listuser/${id}`, {
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

@endsection


@section('scriptjs')
    <script>
        $(document).ready(function() {
            $('#simpletable').DataTable();
        });
    </script>
@endsection
