@extends('layout.layout')
@section('contend')
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
                                    <h4>List of strategy of {{ $name }}</h4>
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
                                    <li class="breadcrumb-item"><a href="#!">List of strategy </a>
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
                                <button type="button" class="btn btn-inverse btn-round waves-effect md-trigger mb-4"
                                    data-modal="modal-3">Add New Strategy </button>
                                <div class="md-modal md-effect-3" id="modal-3">
                                    <div class="md-content">
                                        <h3>Add New Strategy <button type="button"
                                                class="btn btn-primary waves-effect md-close" style="
                                                position: absolute;
                                                right: 0;
                                                top: 2px;
                                                color: #fffdfd;
                                                background-color: #0219ec;
                                            ">X</button>
                                        </h3>

                                        <div>
                                            <p>This is a modal window. You can do the following things with it:</p>
                                            <form action="">
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Name</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" name="Strategyname" id="Strategyname"
                                                            class="form-control">
                                                        <input type="hidden" name="objectiveid" id="objectiveid"
                                                            value="{{ $objective_id }}">
                                                    </div>
                                                </div>

                                                <button type="button" onclick="addStrategy()"
                                                    class="btn btn-primary waves-effect">Save</button>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                                <table id="simpletable" class="table table-striped table-bordered nowrap">
                                    <thead>
                                        <tr>
                                            <th>id</th>
                                            <th>strategy Name</th>
                                            <th>Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($strategies as $strategy)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $strategy->name }}</td>
                                                <td>{{ $strategy->created_at->format('Y/m/d') }}</td>
                                                <td>
                                                    <label class="label warning-breadcrumb "
                                                        onclick="window.location.href = '/viewstrategy/{{ $strategy->id }}/{{ $strategy->name }}'">
                                                        <i class="icofont icofont-eye-alt f-20"
                                                            style="width: 20px; height: 20px; display: inline-flex; align-items: center; justify-content: center; border-radius: 5px; margin-top: 5px;"></i>
                                                    </label>
                                                    <label class="label bg-success"
                                                        onclick="openEditModal({{ $strategy->id }}, '{{ $strategy->name }}')">
                                                        <i class="icofont icofont-pencil-alt-5"
                                                            style="width: 20px; height: 20px; display: inline-flex; align-items: center; justify-content: center; border-radius: 5px;"></i>
                                                    </label>
                                                    <span class="label label-danger"
                                                        onclick="Objectivedelete({{ $strategy->id }})">
                                                        <i class="icofont icofont-ui-delete"></i>
                                                    </span>
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
    function openModal(modalId) {
        document.getElementById(modalId).classList.add('md-show');
    }

    function closeModal(modalId) {
        document.getElementById(modalId).classList.remove('md-show');
    }

    async function addStrategy() {
        const data = {
            Strategyname: document.getElementById('Strategyname').value,
            objectiveid: document.getElementById('objectiveid').value,
        };

        const response = await fetch('/addStrategy', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify(data)
        });

        const result = await response.json();
        console.log(result)

        if (response.ok) {
            Swal.fire({
                title: 'success!',
                text: "successfully added",
                icon: 'success',
                confirmButtonColor: 'rgba(0, 146, 255, 0.8)',
                timer: 1500,
                confirmButtonText: 'Okay'
            }).then((result) => {
                const objective_id = {!! json_encode($objective_id) !!};
                const name = {!! json_encode($name) !!};

                window.location.href = `/viewstrategy/${objective_id}/${name}`;
            })
        }
    }

    async function Strategydelete(id) {
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
                const response = await fetch(`/deleteStartegy/${id}`, {
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

    function openEditModal(id, name) {
        document.getElementById('editdeleteStrategyid').value = id;
        document.getElementById('editStrategyname').value = name;
        openModal('edit-modal'); // Open the edit modal
    }

    async function editGoal() {
        const Objectivename = document.getElementById('editStrategyname').value;
        const Objectiveid = document.getElementById('editStrategyid').value;

        const data = {
            Strategyname: Strategyname
     
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
                                        <h4>List Of Strategy  Of
                                            {{ $name }}
                                        </h4>
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
                                        <li class="breadcrumb-item"><a href="#!">List of Strategy  </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Page-header end -->

                    <!-- Edit Goal Modal -->
                    <div class="md-modal md-effect-3" id="edit-modal">
                        <div class="md-content">
                            <h3>Edit Strategy
                                <button type="button" class="btn btn-primary waves-effect md-close"
                                    style="position: absolute; right: 0; top: 2px; color: #fffdfd; background-color: #0219ec;"
                                    onclick="closeModal('edit-modal')">X</button>
                            </h3>
                            <div>
                                <p>Edit the details of the Strategy :</p>
                                <form id="editGoalForm">
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Name</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="editStrategyname" id="editStrategyname"
                                                class="form-control">
                                            <input type="hidden" id="editdeleteStrategyid">
                                        </div>
                                    </div>
                                    <button type="button" onclick="editStrategy()"
                                        class="btn btn-primary waves-effect">Save</button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Page body start -->
                    <div class="page-body">

                        <div class="row">

                            <div class="col-sm-12">

                                <div class="dt-responsive table-responsive">


                                    <button type="button" class="btn btn-inverse btn-round waves-effect md-trigger mb-4"
                                        data-modal="modal-3">Add New Strategy  </button>


                                    <div class="md-modal md-effect-3" id="modal-3">
                                        <div class="md-content">
                                            <h3>Add New Strategy  <button type="button"
                                                    class="btn btn-primary waves-effect md-close"
                                                    style="
                                                position: absolute;
                                                right: 0;
                                                top: 2px;
                                                color: #fffdfd;
                                                background-color: #0219ec;
                                            ">X</button>
                                            </h3>

                                            <div>
                                                <p>This is a modal window. You can do the following things with it:</p>
                                                <form action="">
                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label">Name</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" name="strategyename" id="strategyename"
                                                                class="form-control">
                                                            <input type="hidden" name="objectiveid" id="objectiveid"
                                                                value="{{ $objective_id }}">
                                                        </div>
                                                    </div>

                                                    <button type="button" onclick="addStrategy()"
                                                        class="btn btn-primary waves-effect">Save</button>
                                                </form>

                                            </div>
                                        </div>
                                    </div>


                                    <table id="simpletable" class="table table-striped table-bordered nowrap">
                                        <thead>
                                            <tr>
                                                <th>id</th>
                                                <th>Strategy  Name</th>
                                                <th>Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($strategies as $strategie)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $strategie->name }}</td>
                                                    <td>{{ $strategie->created_at->format('Y/m/d') }}</td>
                                                    <td>
                                                        <label class="label warning-breadcrumb "
                                                            onclick="window.location.href = '/viewaction/{{ $strategie->id }}/{{ $strategie->name }}'">
                                                            <i class="icofont icofont-eye-alt f-20"
                                                                style="width: 20px; height: 20px; display: inline-flex; align-items: center; justify-content: center; border-radius: 5px; margin-top: 5px;"></i>
                                                        </label>
                                                        <label class="label bg-success"
                                                            onclick="openEditModal({{ $strategie->id }}, '{{ $strategie->name }}')">
                                                            <i class="icofont icofont-pencil-alt-5"
                                                                style="width: 20px; height: 20px; display: inline-flex; align-items: center; justify-content: center; border-radius: 5px;"></i>
                                                        </label>
                                                        <span class="label label-danger"
                                                            onclick="Strategydelete({{ $strategie->id }})">
                                                            <i class="icofont icofont-ui-delete"></i>
                                                        </span>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>

        try {
            const response = await fetch(`/editStrategy/${Strategyid}`, {
                method: 'PUT',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify(data)
     
            if (!response.ok) {
                throw new Error('Failed to edit goal');
            }

            const result = await response.json();

            Swal.fire({
                title: 'Success!',
                text: 'Successfully edited the goal',
                icon: 'success',
                confirmButtonColor: 'rgba(0, 146, 255, 0.8)',
                timer: 1500,
                confirmButtonText: 'Okay'
            }).then(() => {
                const objective_id = {!! json_encode($objective_id) !!};
                const name = {!! json_encode($name) !!};

                window.location.href = `/viewStrategy/${objective_id}/${name}`;
            });

        } catch (error) {
            Swal.fire({
                title: 'Error!',
                text: error.message || 'Unknown error occurred',
                icon: 'error',
                confirmButtonColor: 'rgba(0, 146, 255, 0.8)',
                timer: 1500,
                confirmButtonText: 'Okay'
            });
        }
    }
</script>
    <script>
        function openModal(modalId) {
            document.getElementById(modalId).classList.add('md-show');
        }

        function closeModal(modalId) {
            document.getElementById(modalId).classList.remove('md-show');
        }

        async function addStrategy() {
            const data = {
                strategyename: document.getElementById('strategyename').value,
                objectiveid: document.getElementById('objectiveid').value,
            };

            const response = await fetch('/addstrategy', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify(data)
            });

            const result = await response.json();
            console.log(result)

            if (response.ok) {
                Swal.fire({
                    title: 'success!',
                    text: "successfully added",
                    icon: 'success',
                    confirmButtonColor: 'rgba(0, 146, 255, 0.8)',
                    timer: 1500,
                    confirmButtonText: 'Okay'
                }).then((result) => {
                    const objective_id = {!! json_encode($objective_id) !!};
                    const name = {!! json_encode($name) !!};

                    window.location.href = `/viewstrategy/${objective_id}/${name}`;
                })
            }
        }

        async function Strategydelete(id) {
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
                    const response = await fetch(`/deletestrategy/${id}`, {
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

        function openEditModal(id, name) {
            document.getElementById('editdeleteStrategyid').value = id;
            document.getElementById('editStrategyname').value = name;
            openModal('edit-modal'); // Open the edit modal
        }

        async function editStrategy() {
            const Strategyname = document.getElementById('editStrategyname').value;
            const Strategyid = document.getElementById('editdeleteStrategyid').value;

            const data = {
                Strategyname: Strategyname
            };

            try {
                const response = await fetch(`/editstrategy/${Strategyid}`, {
                    method: 'PUT',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify(data)
                });

                if (!response.ok) {
                    throw new Error('Failed to edit goal');
                }

                const result = await response.json();

                Swal.fire({
                    title: 'Success!',
                    text: 'Successfully edited the goal',
                    icon: 'success',
                    confirmButtonColor: 'rgba(0, 146, 255, 0.8)',
                    timer: 1500,
                    confirmButtonText: 'Okay'
                }).then(() => {
                    const objective_id = {!! json_encode($objective_id) !!};
                    const name = {!! json_encode($name) !!};

                    window.location.href = `/viewstrategy/${objective_id}/${name}`;
                });

            } catch (error) {
                Swal.fire({
                    title: 'Error!',
                    text: error.message || 'Unknown error occurred',
                    icon: 'error',
                    confirmButtonColor: 'rgba(0, 146, 255, 0.8)',
                    timer: 1500,
                    confirmButtonText: 'Okay'
                });
            }
        }
    </script>
@endsection


@section('scriptjs')
=
    <script type="text/javascript" src="{{ url('assets\js\modalEffects.js') }}"></script>
    <script type="text/javascript" src="{{ url('assets\js\classie.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('#simpletable').DataTable();
        });
    </script>
@endsection