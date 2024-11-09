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
                                                <h4 class="modal-title">Task Details</h4>

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
                                                                    <th>Responsible</th>
                                                                    <th>KPI</th>

                                                                    <th>2024</th>
                                                                    <th>2025</th>
                                                                    <th>2026</th>
                                                                    <th>2027</th>
                                                                    <th>2028</th>


                                                                    <th>Completion(%)</th>
                                                                    <th>Evidences</th>




                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <th id="responsible"></th>
                                                                    <td id="kpi"></td>
                                                                    <td id="2024"> </td>
                                                                    <td id="2025"></td>
                                                                    <th id="2026"></th>
                                                                    <td id="2027"></td>
                                                                    <td id="2028"></td>
                                                                    <td id="completion"></td>
                                                                    <td id="evidences"></td>

                                                                </tr>

                                                            </tbody>
                                                        </table>

                                                        <input type="hidden" name="taskid" id="taskid">

                                                    </div>

                                                    <div class="form-group row mt-3">
                                                        <label class="col-sm-2 col-form-label">Review</label>
                                                        <div class="col-sm-10">
                                                            <textarea id="myTextarea" rows="5" cols="5" class="form-control" placeholder="Default textarea"></textarea>
                                                        </div>
                                                    </div>

                                                    {{-- <button class="btn btn-primary" type="button">Submit</button> --}}

                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default waves-effect "
                                                    data-dismiss="modal">Close</button>
                                                <button type="button" onclick="updateReviewadd()"
                                                    class="btn btn-primary waves-effect waves-light ">Save
                                                    changes</button>
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
                                                                                                                        <li onclick="loadmodeldata({{ $task['id'] }})"
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
        $('#large-Modal textarea').on('click', function(event) {
            event.stopPropagation();
        });

        $('#large-Modal').on('hidden.bs.modal', function() {

            $('#large-Modal #responsible').text('');
            $('#large-Modal #kpi').text('');
            $('#large-Modal #2024').text('');
            $('#large-Modal #2025').text('');
            $('#large-Modal #2026').text('');
            $('#large-Modal #2027').text('');
            $('#large-Modal #2028').text('');
            $('#large-Modal #completion').text('');
            $('#large-Modal #evidences').text('');
            $('#large-Modal textarea').val('');
            $('#taskid').val('');


        });

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

                document.getElementById('responsible').innerHTML = data[0][0].name;
                document.getElementById('taskid').value = data[0][0].id;


                if (data[1].length > 0) {
                    var compitedcount = 0;
                    var files = [];
                    for (let i = 0; i < data[1].length; i++) {

                        const valuedata = data[1][i];
                        const yearofupdate = valuedata.year;
                        compitedcount = compitedcount + parseFloat(valuedata.percentage);
                        document.getElementById(yearofupdate).innerHTML = valuedata.percentage;

                        let filesArray = JSON.parse(valuedata.files);

                        filesArray.forEach(file => {
                            files.push(file);
                        });

                    }
                    console.log(files)

                    document.getElementById("completion").innerHTML = compitedcount;

                    let listHTML = files.map(file => {
                        let cleanedFile = file.replace(/^\d+_/, '');
                        return `<li><a href="{{ url('storage/uploads/') }}/${file}" target="_blank" class="d-block mt-2">${cleanedFile}</a></li>`;
                    }).join('');

                    // Set the innerHTML of the #evidences element
                    document.getElementById("evidences").innerHTML = listHTML;

                    ;
                }
                // document.getElementById('2024').innerHTML = data[1][0].name;

                const modalTriggerElement = document.getElementById('large-Modal');


                modalTriggerElement.setAttribute('data-toggle', 'modal');
                modalTriggerElement.setAttribute('data-target', '#large-Modal');

                $('#large-Modal').modal('show');

            } catch (error) {
                console.error('Error loading data:', error);
            }
        }

        async function updateReviewadd() {


            const id = document.getElementById('taskid').value;
            const review = document.getElementById('myTextarea').value;

            const response = await fetch(`/updateReviewintask/${id}`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    review: review
                })
            });


        }
    </script>
@endsection
