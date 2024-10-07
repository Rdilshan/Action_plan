@extends('layout.userlayout')
@section('contend')
    <!-- animation nifty modal window effects css -->
    <link rel="stylesheet" type="text/css" href="{{ url('assets\css\component.css') }}" />
    <!-- Treeview css -->
    <link rel="stylesheet" type="text/css" href="{{ url('bower_components\jstree\css\style.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('assets\pages\treeview\treeview.css') }}">

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
                                        <h4>Summary of Tasks</h4>
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
                                        <li class="breadcrumb-item"><a href="#!">Summary of Tasks </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="page-body">
                        <div class="row">
                            <div class="col-sm-12">


                                <div class="modal fade" id="large-Modal" tabindex="-1" role="dialog"
                                    style="z-index: 1050; display: none;" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Modal title</h4>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">


                                                <div class="card-block">
                                                    <div class="table-responsive">
                                                        <table class="table table-xl">
                                                            <thead>
                                                                <tr>
                                                                    <th>#</th>
                                                                    <th>First Name</th>
                                                                    <th>Last Name</th>
                                                                    <th>Username</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <th scope="row">1</th>
                                                                    <td>Mark</td>
                                                                    <td>Otto</td>
                                                                    <td>@mdo</td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">2</th>
                                                                    <td>Jacob</td>
                                                                    <td>Thornton</td>
                                                                    <td>@fat</td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">3</th>
                                                                    <td>Larry</td>
                                                                    <td>the Bird</td>
                                                                    <td>@twitter</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default waves-effect "
                                                    data-dismiss="modal">Close</button>
                                                {{-- <button type="button"
                                                    class="btn btn-primary waves-effect waves-light ">Save
                                                    changes</button> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-block">
                                    <div class="card-block tree-view">
                                        <div id="basicTree">

                                            <ul>
                                                <li>Goals
                                                    <ul>
                                                        @foreach ($dataset as $goal)
                                                            <li>{{ $goal['name'] }}
                                                                <ul>
                                                                    @foreach ($goal['objectives'] as $objective)
                                                                        <li>{{ $objective['name'] }}
                                                                            <ul>

                                                                                @foreach ($objective['strategies'] as $strategy)
                                                                                    <li>{{ $strategy['name'] }}
                                                                                        <ul>
                                                                                            @foreach ($strategy['actions'] as $action)
                                                                                                <li>{{ $action['name'] }}
                                                                                                    <ul>
                                                                                                        @foreach ($action['subactions'] as $subaction)
                                                                                                            <li>{{ $subaction['name'] }}
                                                                                                                <ul>

                                                                                                                    @foreach ($subaction['tasks'] as $task)
                                                                                                                        <li
                                                                                                                            onclick="loadmodeldata({{ $task['id'] }})"
                                                                                                                            data-jstree='{"type":"file"}'>
                                                                                                                            <b>{{ $task['title'] }}
                                                                                                                            </b>
                                                                                                                        </li>
                                                                                                                    @endforeach

                                                                                                                </ul>
                                                                                                            </li>
                                                                                                        @endforeach


                                                                                                    </ul>
                                                                                                </li>
                                                                                            @endforeach

                                                                                        </ul>
                                                                                    </li>
                                                                                @endforeach

                                                                            </ul>
                                                                        </li>
                                                                    @endforeach

                                                                </ul>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </li>


                                            </ul>

                                        </div>
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


@section('scriptjs')
    <!-- Tree view js -->
    <script type="text/javascript" src="{{ url('bower_components\jstree\js\jstree.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('assets\pages\treeview\jquery.tree.js') }}"></script>


    <script>
        async function loadmodeldata(id) {
            try {
                const response = await fetch(`/load_data_into_model`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        id
                    })
                });

                if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }

                const data = await response.json();
                console.log(data);

                const modalTriggerElement = document.getElementById('large-Modal');


                modalTriggerElement.setAttribute('data-toggle', 'modal');
                modalTriggerElement.setAttribute('data-target', '#large-Modal');

                $('#large-Modal').modal('show');

            } catch (error) {
                console.error('Error loading data:', error);
            }
        }
    </script>
@endsection
