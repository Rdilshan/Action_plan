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

                                                    <div class="form-group row mt-3">
                                                        <label class="col-sm-2 col-form-label">Responsible</label>
                                                        <div class="col-10">
                                                            <input type="text" name="responsible" style="width: 100%;"
                                                                id="responsible" readonly>
                                                        </div>
                                                    </div>


                                                    <div class="table-responsive">
                                                        <table class="table table-xl">
                                                            <thead>
                                                                <tr>

                                                                    <th>KPI</th>

                                                                    <th>2024</th>
                                                                    <th>2025</th>
                                                                    <th>2026</th>
                                                                    <th>2027</th>
                                                                    <th>2028</th>
                                                                    <th>Evidences</th>




                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                {{-- <tr>
                                                                    <td id="kpi"></td>
                                                                    <td id="2024"> </td>
                                                                    <td id="2025"></td>
                                                                    <th id="2026"></th>
                                                                    <td id="2027"></td>
                                                                    <td id="2028"></td>
                                                                    <td id="completion"></td>
                                                                    <td id="evidences"></td>

                                                                </tr> --}}

                                                            </tbody>
                                                        </table>

                                                        <input type="hidden" name="taskid" id="taskid">

                                                    </div>

                                                    <div class="form-group row mt-3">
                                                        <label class="col-sm-2 col-form-label">completion (%)</label>
                                                        <div class="col-10">
                                                            <input type="text" name="completion" style="width: 100%;"
                                                                id="completion" readonly>
                                                        </div>
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

            const newRows = document.querySelectorAll('tr.new-row');
            newRows.forEach(row => {
                row.remove();
            });

            $('#large-Modal textarea').val('');
            $('#taskid').val('');
            $('#responsible').val('');



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
                // console.log(data);

                document.getElementById('responsible').value = data[0][0].name;
                document.getElementById('taskid').value = data[0][0].id;


                if (data[1].length > 0) {

                    var compitedcount = 0;
                    var files = [];
                    var totalcount = 0;
                    for (let i = 0; i < data[1].length; i++) {
                        const valuedata = data[1][i];
                        const yearofupdate = valuedata.year;
                        const percentage = valuedata.percentage;
                        totalcount += parseInt(percentage);
                        const filesArray = JSON.parse(valuedata.files);

                        // Create a new row
                        const newRow = document.createElement('tr');
                        newRow.classList.add('new-row');

                        const kpiCell = document.createElement('td');
                        kpiCell.textContent = valuedata.KPI;

                        const year2024Cell = document.createElement('td');
                        year2024Cell.id = "2024";
                        year2024Cell.textContent = (yearofupdate == 2024) ? percentage : "";

                        const year2025Cell = document.createElement('td');
                        year2025Cell.id = "2025";
                        year2025Cell.textContent = (yearofupdate == 2025) ? percentage : "";

                        const year2026Cell = document.createElement('th');
                        year2026Cell.id = "2026";
                        year2026Cell.textContent = (yearofupdate == 2026) ? percentage : "";

                        const year2027Cell = document.createElement('td');
                        year2027Cell.id = "2027";
                        year2027Cell.textContent = (yearofupdate == 2027) ? percentage : "";

                        const year2028Cell = document.createElement('td');
                        year2028Cell.id = "2028";
                        year2028Cell.textContent = (yearofupdate == 2028) ? percentage : "";



                        const evidencesCell = document.createElement('td');
                        evidencesCell.id = "evidences";


                        const fileList = document.createElement('ul');

                        filesArray.forEach(file => {

                            const listItem = document.createElement('li');

                            const fileLink = document.createElement('a');
                            fileLink.href =
                                `{{ url('storage/uploads/') }}/${file}`;
                            fileLink.target = "_blank";
                            fileLink.classList.add('d-block', 'mt-2');
                            fileLink.textContent = file.replace(/^\d+_/, '');


                            listItem.appendChild(fileLink);
                            fileList.appendChild(listItem);
                        });


                        evidencesCell.appendChild(fileList);

                        newRow.appendChild(kpiCell);
                        newRow.appendChild(year2024Cell);
                        newRow.appendChild(year2025Cell);
                        newRow.appendChild(year2026Cell);
                        newRow.appendChild(year2027Cell);
                        newRow.appendChild(year2028Cell);
                        newRow.appendChild(evidencesCell);

                        // Append the new row to the table's tbody
                        document.querySelector('tbody').appendChild(newRow);
                    }
                } else {
                    const newRow = document.createElement('tr');
                    newRow.classList.add('new-row');

                    const kpiCell = document.createElement('td');
                    kpiCell.textContent = "No Data Found";
                    newRow.appendChild(kpiCell);
                    document.querySelector('tbody').appendChild(newRow);
                }

                const modalTriggerElement = document.getElementById('large-Modal');
                document.getElementById("completion").value = totalcount / data[1].length + " %";

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
