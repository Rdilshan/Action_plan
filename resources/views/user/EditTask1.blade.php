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
                                        <h4>Edit Task</h4>

                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="page-header-breadcrumb">
                                    <ul class="breadcrumb-title">
                                        <li class="breadcrumb-item">
                                            <a href="/user"> <i class="feather icon-home"></i>
                                            </a>
                                        </li>
                                        <li class="breadcrumb-item"><a href="#!">Task Manamgement </a>
                                        </li>
                                        <li class="breadcrumb-item"><a href="#!">Edit Task </a>
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
                                        <h4 class="sub-title">Edit your selection</h4>
                                        <form action="/addnewtask/first" method="GET">
                                            @csrf
                                            <div id="page1">
                                                <!-- Page 1 Content -->


                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label" for="goal">Select
                                                        Goal</label>
                                                    <div class="col-sm-10">
                                                        <select name="goal" id="goal" class="form-control" required>
                                                            <option value="opt1">{{ $goal_name }}
                                                            </option>

                                                            @foreach ($goals as $goal)
                                                                <option value="{{ $goal->id }}">{{ $goal->name }}
                                                                </option>
                                                            @endforeach

                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label" for="objective">Select
                                                        Objective</label>
                                                    <div class="col-sm-10">
                                                        <select name="objective" id="objective" class="form-control"
                                                            required>
                                                            <option value="opt1">{{ $objective_name }}
                                                            </option>

                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label" for="strategy">Select
                                                        Strategy</label>
                                                    <div class="col-sm-10">
                                                        <select name="strategy" id="strategy" class="form-control"
                                                            required>
                                                            <option value="opt1">{{ $strategy_name }}
                                                            </option>

                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label" for="action">Select
                                                        Action</label>
                                                    <div class="col-sm-10">
                                                        <select name="action" id="action" class="form-control" required>
                                                            <option value="opt1">{{ $action_name }}
                                                            </option>

                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label" for="subaction">Select
                                                        Subaction</label>
                                                    <div class="col-sm-10">
                                                        <select name="subaction" id="subaction" class="form-control"
                                                            required>
                                                            <option value="opt1">{{ $subaction_name }}
                                                            </option>

                                                        </select>
                                                    </div>
                                                </div>

                                                <hr />
                                                <h4 class="sub-title">Edit your Task Details</h4>

                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Title</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" name="title" class="form-control"
                                                            value="{{ $task->Title }}" placeholder="Enter the Title"
                                                            required>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Name</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" name="name"
                                                            value="{{ $task->name }}"
                                                            placeholder="Name of the responsible person for particular inquery."
                                                            required>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Action Plane</label>
                                                    <div class="col-sm-5">

                                                        <input type="date" class="form-control" name="start_date"
                                                            value="{{ $task->startDate }}" placeholder="Start Date"
                                                            required>
                                                        <span class="text-muted pl-2">start date</span>
                                                    </div>
                                                    <div class="col-sm-5">

                                                        <input type="date" class="form-control" name="end_date"
                                                            value="{{ $task->endDate }}" placeholder="End Date" required>
                                                        <span class="text-muted pl-2">End date</span>

                                                    </div>
                                                </div>


                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Introduction</label>
                                                    <div class="col-sm-10">
                                                        <textarea rows="5" cols="5" class="form-control" name="introduction" required
                                                            placeholder="Default textarea">{{ $task->introduction }}</textarea>
                                                    </div>
                                                </div>


                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Upload
                                                        File</label>
                                                    <div class="col-sm-10">
                                                        <input type="file" name="file" class="form-control">
                                                        @if (!empty($task->File))
                                                            <a href="{{ url('storage/' . $task->File) }}" target="_blank"
                                                                class="d-block mt-2">
                                                                View Uploaded File
                                                            </a>
                                                        @endif
                                                    </div>

                                                </div>



                                                <button type="button" class="btn btn-primary"
                                                    onclick="showPage(2)">Next</button>
                                            </div>

                                            <div id="page2" style="display:none;">


                                                <div class="card-header">
                                                    <h5>Funding Sources</h5>
                                                </div>
                                                <div class="card-block">
                                                    <div class="table-responsive">
                                                        <table class="table table-striped table-bordered"
                                                            id="Fundingtable">
                                                            <thead>
                                                                <tr>
                                                                    <th>No</th>
                                                                    <th>Item</th>
                                                                    <th>Unit</th>
                                                                    <th>Unit Charge</th>
                                                                    <th>Amount (Rs.)</th>
                                                                    <th></th>

                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($funding as $fund)
                                                                    <tr>
                                                                        <th scope="row">{{ $loop->iteration }}</th>
                                                                        <td>{{ $fund->name }}</td>
                                                                        <td>{{ $fund->unit }}</td>
                                                                        <td>{{ $fund->unit_charge }}</td>
                                                                        <td class="fundingtotalvalue">{{ $fund->amount }}
                                                                        </td>
                                                                        <td>
                                                                            <div class="btn-group btn-group-sm"
                                                                                style="float: none;">
                                                                                <button type="button"
                                                                                    class="tabledit-delete-button btn btn-danger waves-effect waves-light active"
                                                                                    style="float: none;margin: 5px;">
                                                                                    <span
                                                                                        class="icofont icofont-ui-delete"></span>
                                                                                </button>
                                                                            </div>
                                                                        </td>

                                                                    </tr>
                                                                @endforeach


                                                                <tr>
                                                                    <td></td>
                                                                    <td><input class="tabledit-input form-control input-sm"
                                                                            type="text" name="First"
                                                                            placeholder="Item"></td>
                                                                    <td><input class="tabledit-input form-control input-sm"
                                                                            type="number" name="Last"
                                                                            placeholder="Unit"></td>
                                                                    <td><input class="tabledit-input form-control input-sm"
                                                                            type="number" name="Charge"
                                                                            placeholder="Unit Charge"></td>
                                                                    <td></td>
                                                                    <td>
                                                                        <div class="btn-group btn-group-sm"
                                                                            style="float: none;">
                                                                            <button type="button"
                                                                                class="btn btn-primary add-btn"
                                                                                style="float: none;margin: 5px;background-color: #02b902;"
                                                                                onclick="addRowdata()">
                                                                                <span
                                                                                    class="icofont icofont-ui-check"></span>
                                                                            </button>

                                                                        </div>
                                                                    </td>
                                                                </tr>

                                                            </tbody>
                                                            <tfoot>
                                                                <tr>
                                                                    <td colspan="4" style="text-align: right;">
                                                                        <strong>Total:</strong>
                                                                    </td>
                                                                    <td id="Funding_totalAmount">0</td>
                                                                    <td></td>
                                                                </tr>
                                                            </tfoot>
                                                        </table>
                                                    </div>

                                                </div>

                                                <div class="card-header">
                                                    <h5>Transport Details</h5>
                                                </div>
                                                <div class="card-block">
                                                    <div class="table-responsive">
                                                        <table class="table table-striped table-bordered"
                                                            id="Transporttable">
                                                            <thead>
                                                                <tr>
                                                                    <th>No</th>
                                                                    <th>Transport</th>
                                                                    <th>No of Vehical</th>
                                                                    <th>Total KM</th>
                                                                    <th>Unit Cost</th>
                                                                    <th>Amount (Rs.)</th>
                                                                    <th></th>

                                                                </tr>
                                                            </thead>
                                                            <tbody>

                                                                @foreach ($expense as $expenseitem)
                                                                    @if (strtolower($expenseitem->Type) === 'transport')
                                                                        <tr>
                                                                            <th scope="row">{{ $loop->iteration }}</th>
                                                                            <td>{{ $expenseitem->name }}</td>
                                                                            <td>{{ $expenseitem->no_unit }}</td>
                                                                            <td>{{ $expenseitem->totalKM }}</td>
                                                                            <td class="fundingtotalvalue">
                                                                                {{ $expenseitem->unit_cost }}</td>
                                                                            <td class="fundingtotalvalue">
                                                                                {{ $expenseitem->amount }}</td>

                                                                            <td>
                                                                                <div class="btn-group btn-group-sm"
                                                                                    style="float: none;">
                                                                                    <button type="button"
                                                                                        class="tabledit-delete-button btn btn-danger waves-effect waves-light active"
                                                                                        style="float: none;margin: 5px;">
                                                                                        <span
                                                                                            class="icofont icofont-ui-delete"></span>
                                                                                    </button>
                                                                                </div>
                                                                            </td>

                                                                        </tr>
                                                                    @endif
                                                                @endforeach
                                                                <tr>
                                                                    <td></td>
                                                                    <td><input class="tabledit-input form-control input-sm"
                                                                            type="text" name="Transport"
                                                                            placeholder="Transport"></td>
                                                                    <td><input class="tabledit-input form-control input-sm"
                                                                            type="number" name="nfvehical"
                                                                            placeholder="No of Vehical"></td>
                                                                    <td><input class="tabledit-input form-control input-sm"
                                                                            type="number" name="totalkm"
                                                                            placeholder="Total KM"></td>
                                                                    <td><input class="tabledit-input form-control input-sm"
                                                                            type="number" name="unitcost"
                                                                            placeholder="Unit Cost"></td>
                                                                    <td></td>

                                                                    <td>
                                                                        <div class="btn-group btn-group-sm"
                                                                            style="float: none;">
                                                                            <button type="button"
                                                                                class="btn btn-primary add-btn"
                                                                                style="float: none;margin: 5px;background-color: #02b902;"
                                                                                onclick="TransportaddRowdata()">
                                                                                <span
                                                                                    class="icofont icofont-ui-check"></span>
                                                                            </button>

                                                                        </div>
                                                                    </td>
                                                                </tr>

                                                            </tbody>
                                                            <tfoot>
                                                                <tr>
                                                                    <td colspan="5" style="text-align: right;">
                                                                        <strong>Total:</strong>
                                                                    </td>
                                                                    <td id="Transport_totalAmount">0</td>
                                                                    <td></td>
                                                                </tr>
                                                            </tfoot>
                                                        </table>
                                                    </div>

                                                </div>

                                                <div class="card-header">
                                                    <h5>Accommodation Details</h5>
                                                </div>
                                                <div class="card-block">
                                                    <div class="table-responsive">
                                                        <table class="table table-striped table-bordered"
                                                            id="Accommodationtable">
                                                            <thead>
                                                                <tr>
                                                                    <th>No</th>
                                                                    <th>Accommodation</th>
                                                                    <th>No. of persons/Units</th>
                                                                    <th>No. of days/hours</th>
                                                                    <th>Unit Cost</th>
                                                                    <th>Total (Rs.)</th>
                                                                    <th></th>

                                                                </tr>
                                                            </thead>
                                                            <tbody>

                                                                @foreach ($expense as $expenseitem)
                                                                    @if (strtolower($expenseitem->Type) === 'accommodation')
                                                                        <tr>
                                                                            <th scope="row">{{ $loop->iteration }}</th>
                                                                            <td>{{ $expenseitem->name }}</td>
                                                                            <td>{{ $expenseitem->no_unit }}</td>
                                                                            <td>{{ $expenseitem->no_days }}</td>
                                                                            <td class="fundingtotalvalue">
                                                                                {{ $expenseitem->unit_cost }}</td>
                                                                            <td class="fundingtotalvalue">
                                                                                {{ $expenseitem->amount }}</td>

                                                                            <td>
                                                                                <div class="btn-group btn-group-sm"
                                                                                    style="float: none;">
                                                                                    <button type="button"
                                                                                        class="tabledit-delete-button btn btn-danger waves-effect waves-light active"
                                                                                        style="float: none;margin: 5px;">
                                                                                        <span
                                                                                            class="icofont icofont-ui-delete"></span>
                                                                                    </button>
                                                                                </div>
                                                                            </td>

                                                                        </tr>
                                                                    @endif
                                                                @endforeach


                                                                <tr>
                                                                    <td></td>
                                                                    <td><input class="tabledit-input form-control input-sm"
                                                                            type="text" name="Accommodation"
                                                                            placeholder="Accommodation"></td>
                                                                    <td><input class="tabledit-input form-control input-sm"
                                                                            type="number" name="unit"
                                                                            placeholder="No. of persons/Units"></td>
                                                                    <td><input class="tabledit-input form-control input-sm"
                                                                            type="number" name="noday"
                                                                            placeholder="No. of days/hours"></td>
                                                                    <td><input class="tabledit-input form-control input-sm"
                                                                            type="number" name="accunitcost"
                                                                            placeholder="Unit Cost"></td>
                                                                    <td></td>
                                                                    <td>
                                                                        <div class="btn-group btn-group-sm"
                                                                            style="float: none;">
                                                                            <button type="button"
                                                                                class="btn btn-primary add-btn"
                                                                                style="float: none;margin: 5px;background-color: #02b902;"
                                                                                onclick="AccommodationaddRowdata()">
                                                                                <span
                                                                                    class="icofont icofont-ui-check"></span>
                                                                            </button>

                                                                        </div>
                                                                    </td>
                                                                </tr>

                                                            </tbody>
                                                            <tfoot>
                                                                <tr>
                                                                    <td colspan="5" style="text-align: right;">
                                                                        <strong>Total:</strong>
                                                                    </td>
                                                                    <td id="Accommodation_totalAmount">0</td>
                                                                    <td></td>
                                                                </tr>
                                                            </tfoot>
                                                        </table>
                                                    </div>

                                                </div>



                                                <div class="card-header">
                                                    <h5>Others Details</h5>
                                                </div>
                                                <div class="card-block">
                                                    <div class="table-responsive">
                                                        <table class="table table-striped table-bordered" id="Othertable">
                                                            <thead>
                                                                <tr>
                                                                    <th>No</th>
                                                                    <th>Others</th>
                                                                    <th>Quantity</th>
                                                                    <th>No. of days/hours</th>
                                                                    <th>Unit Cost</th>
                                                                    <th>Total (Rs.)</th>

                                                                    <th></th>

                                                                </tr>
                                                            </thead>
                                                            <tbody>


                                                                @foreach ($expense as $expenseitem)
                                                                    @if (strtolower($expenseitem->Type) === 'others')
                                                                        <tr>
                                                                            <th scope="row">{{ $loop->iteration }}</th>
                                                                            <td>{{ $expenseitem->name }}</td>
                                                                            <td>{{ $expenseitem->no_unit }}</td>
                                                                            <td>{{ $expenseitem->no_days }}</td>
                                                                            <td>{{ $expenseitem->unit_cost }}</td>

                                                                            <td class="fundingtotalvalue">
                                                                                {{ $expenseitem->amount }}</td>
                                                                            <td>
                                                                                <div class="btn-group btn-group-sm"
                                                                                    style="float: none;">
                                                                                    <button type="button"
                                                                                        class="tabledit-delete-button btn btn-danger waves-effect waves-light active"
                                                                                        style="float: none;margin: 5px;">
                                                                                        <span
                                                                                            class="icofont icofont-ui-delete"></span>
                                                                                    </button>
                                                                                </div>
                                                                            </td>

                                                                        </tr>
                                                                    @endif
                                                                @endforeach

                                                                <tr>
                                                                    <td></td>
                                                                    <td><input class="tabledit-input form-control input-sm"
                                                                            type="text" name="Others"
                                                                            placeholder="Others"></td>
                                                                    <td><input class="tabledit-input form-control input-sm"
                                                                            type="text" name="Quantity"
                                                                            placeholder="Quantity"></td>
                                                                    <td><input class="tabledit-input form-control input-sm"
                                                                            type="text" name="oNfhours"
                                                                            placeholder="No. of days/hours"></td>
                                                                    <td><input class="tabledit-input form-control input-sm"
                                                                            type="text" name="oucost"
                                                                            placeholder="Unit Cost"></td>
                                                                    <td></td>
                                                                    <td>
                                                                        <div class="btn-group btn-group-sm"
                                                                            style="float: none;">
                                                                            <button type="button"
                                                                                class="btn btn-primary add-btn"
                                                                                style="float: none;margin: 5px;background-color: #02b902;"
                                                                                onclick="OtheraddRowdata()">
                                                                                <span
                                                                                    class="icofont icofont-ui-check"></span>
                                                                            </button>

                                                                        </div>
                                                                    </td>
                                                                </tr>

                                                            </tbody>
                                                            <tfoot>
                                                                <tr>
                                                                    <td colspan="5" style="text-align: right;">
                                                                        <strong>Total:</strong>
                                                                    </td>
                                                                    <td id="Others_totalAmount">0</td>
                                                                    <td></td>
                                                                </tr>
                                                            </tfoot>
                                                        </table>
                                                    </div>

                                                </div>





                                                <div class="card-block">
                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label">Total Expenditure
                                                            (Rs.)</label>
                                                        <div class="col-sm-10">
                                                            @php
                                                                $totalAmount = collect($expense)->sum('amount');
                                                            @endphp
                                                            <input type="number" class="form-control" id="totalexpend"
                                                            value="{{ $totalAmount }}" readonly>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label">Note</label>
                                                        <div class="col-sm-10">
                                                            <textarea id="noteTextarea" rows="5" cols="5" class="form-control" placeholder="Default Note">{{ $task->Note }}</textarea>
                                                        </div>
                                                    </div>



                                                </div>



                                                <button type="button" class="btn btn-inverse js-dynamic-disable m-t-10"
                                                    onclick="showPage(1)">Back</button>
                                                <button class="btn btn-primary" type="submit">Submit</button>
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


@section('scriptjs')
    <script>
        function showPage(pageNumber) {
            document.getElementById('page1').style.display = (pageNumber === 1) ? 'block' : 'none';
            document.getElementById('page2').style.display = (pageNumber === 2) ? 'block' : 'none';
        }

        $(document).ready(function() {
            $('#goal').change(function() {
                var goalId = $(this).val();
                if (goalId) {
                    $.ajax({
                        url: '/getObjectives/' + goalId,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            $('#objective').empty();
                            $('#objective').append(
                                '<option value="">Select One Value Only</option>');
                            $.each(data, function(key, value) {
                                $('#objective').append('<option value="' + key + '">' +
                                    value + '</option>');
                            });
                        }
                    });
                } else {
                    $('#objective').empty();
                    $('#objective').append('<option value="">Select One Value Only</option>');
                }
            });
        });


        $(document).ready(function() {
            $('#objective').change(function() {
                var objective = $(this).val();
                if (objective) {
                    $.ajax({
                        url: '/getStrategy/' + objective,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            $('#strategy').empty();
                            $('#strategy').append(
                                '<option value="">Select One Value Only</option>');
                            $.each(data, function(key, value) {
                                $('#strategy').append('<option value="' + key + '">' +
                                    value + '</option>');
                            });
                        }
                    });
                } else {
                    $('#strategy').empty();
                    $('#strategy').append('<option value="">Select One Value Only</option>');
                }
            });
        });

        $(document).ready(function() {
            $('#strategy').change(function() {
                var strategy = $(this).val();
                if (strategy) {
                    $.ajax({
                        url: '/getAction/' + strategy,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            $('#action').empty();
                            $('#action').append(
                                '<option value="">Select One Value Only</option>');
                            $.each(data, function(key, value) {
                                $('#action').append('<option value="' + key + '">' +
                                    value + '</option>');
                            });
                        }
                    });
                } else {
                    $('#action').empty();
                    $('#action').append('<option value="">Select One Value Only</option>');
                }
            });
        });


        $(document).ready(function() {
            $('#action').change(function() {
                var action = $(this).val();
                if (action) {
                    $.ajax({
                        url: '/getSubAction/' + action,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            $('#subaction').empty();
                            $('#subaction').append(
                                '<option value="">Select One Value Only</option>');
                            $.each(data, function(key, value) {
                                $('#subaction').append('<option value="' + key + '">' +
                                    value + '</option>');
                            });
                        }
                    });
                } else {
                    $('#subaction').empty();
                    $('#subaction').append('<option value="">Select One Value Only</option>');
                }
            });
        });
    </script>

    {{-- table functionalty --}}
    <script>
        //Funding Sources
        function addRowdata() {
            var table = document.getElementById("Fundingtable");
            var t1 = table.rows.length;

            var newItem = $('input[name="First"]').val();
            var newUnit = $('input[name="Last"]').val();
            var newCharge = $('input[name="Charge"]').val();
            // var newAmount = $('input[name="Amount"]').val();
            var newAmount = newUnit * newCharge;




            var newRow = table.insertRow(t1 - 2);
            newRow.insertCell(0).innerText = t1 - 2;
            newRow.insertCell(1).innerText = newItem;
            newRow.insertCell(2).innerText = newUnit;
            newRow.insertCell(3).innerText = newCharge;

            var amountCell = newRow.insertCell(4);
            amountCell.innerText = newAmount;
            amountCell.classList.add("fundingtotalvalue");


            newRow.insertCell(5).innerHTML = '<div class="btn-group btn-group-sm" style="float: none;">' +
                '<button type="button" class="tabledit-delete-button btn btn-danger waves-effect waves-light active" style="float: none;margin: 5px;" onclick="deleteRow(this,`fundingtotalvalue`,`Funding_totalAmount`)">' +
                '<span class="icofont icofont-ui-delete"></span></button></div>';



            $('input[name="First"]').val('');
            $('input[name="Last"]').val('');
            $('input[name="Charge"]').val('');
            $('input[name="Amount"]').val('');
            updateTotal("fundingtotalvalue", "Funding_totalAmount");
        }

        function deleteRow(btn, name, valueadd) {
            var row = btn.closest('tr');
            row.parentNode.removeChild(row);
            updateTotal(name, valueadd);
        }

        function updateTotal(name, valueadd) {
            var total = 0;
            var amountCells = document.querySelectorAll('.' + name);
            amountCells.forEach(function(cell) {
                var value = parseFloat(cell.innerText);
                console.log(value)
                if (!isNaN(value)) {
                    total += value;
                }
            });
            document.getElementById(valueadd).innerText = total;
            totalexpendics();
        }

        //Transport Details

        function TransportaddRowdata() {

            var table = document.getElementById("Transporttable");
            var t1 = table.rows.length;

            var Transport = $('input[name="Transport"]').val();
            var nfvehical = $('input[name="nfvehical"]').val();
            var totalkm = $('input[name="totalkm"]').val();
            var unitcost = $('input[name="unitcost"]').val();

            // var newAmount = $('input[name="Amount"]').val();
            var newAmount = totalkm * unitcost;



            var newRow = table.insertRow(t1 - 2);
            newRow.insertCell(0).innerText = t1 - 2;
            newRow.insertCell(1).innerText = Transport;
            newRow.insertCell(2).innerText = nfvehical;
            newRow.insertCell(3).innerText = totalkm;
            newRow.insertCell(4).innerText = unitcost;


            var amountCell = newRow.insertCell(5);
            amountCell.innerText = newAmount;
            amountCell.classList.add("Transporttabletotalvalue");


            newRow.insertCell(6).innerHTML = '<div class="btn-group btn-group-sm" style="float: none;">' +
                '<button type="button" class="tabledit-delete-button btn btn-danger waves-effect waves-light active" style="float: none;margin: 5px;" onclick="deleteRow(this,`Transporttabletotalvalue`,`Transport_totalAmount`)">' +
                '<span class="icofont icofont-ui-delete"></span></button></div>';



            $('input[name="Transport"]').val('');
            $('input[name="nfvehical"]').val('');
            $('input[name="totalkm"]').val('');
            $('input[name="unitcost"]').val('');

            updateTotal("Transporttabletotalvalue", "Transport_totalAmount");
            totalexpendics();

        }


        //Accommodation Details

        function AccommodationaddRowdata() {

            var table = document.getElementById("Accommodationtable");
            var t1 = table.rows.length;

            var Accommodation = $('input[name="Accommodation"]').val();
            var unit = $('input[name="unit"]').val();
            var noday = $('input[name="noday"]').val();
            var unitcost = $('input[name="accunitcost"]').val();


            // var newAmount = $('input[name="Amount"]').val();
            var newAmount = noday * unitcost;



            var newRow = table.insertRow(t1 - 2);
            newRow.insertCell(0).innerText = t1 - 2;
            newRow.insertCell(1).innerText = Accommodation;
            newRow.insertCell(2).innerText = unit;
            newRow.insertCell(3).innerText = noday;
            newRow.insertCell(4).innerText = unitcost;


            var amountCell = newRow.insertCell(5);
            amountCell.innerText = newAmount;
            amountCell.classList.add("Accommodationtabletotalvalue");


            newRow.insertCell(6).innerHTML = '<div class="btn-group btn-group-sm" style="float: none;">' +
                '<button type="button" class="tabledit-delete-button btn btn-danger waves-effect waves-light active" style="float: none;margin: 5px;" onclick="deleteRow(this,`Accommodationtabletotalvalue`,`Accommodation_totalAmount`)">' +
                '<span class="icofont icofont-ui-delete"></span></button></div>';



            $('input[name="Accommodation"]').val('');
            $('input[name="unit"]').val('');
            $('input[name="noday"]').val('');
            $('input[name="accunitcost"]').val('');

            updateTotal("Accommodationtabletotalvalue", "Accommodation_totalAmount");
            totalexpendics();

        }


        //Other Details

        function OtheraddRowdata() {

            var table = document.getElementById("Othertable");
            var t1 = table.rows.length;

            var Others = $('input[name="Others"]').val();
            var Quantity = $('input[name="Quantity"]').val();
            var oNfhours = $('input[name="oNfhours"]').val();
            var oucost = $('input[name="oucost"]').val();


            // var newAmount = $('input[name="Amount"]').val();
            var newAmount = oNfhours * oucost;



            var newRow = table.insertRow(t1 - 2);
            newRow.insertCell(0).innerText = t1 - 2;
            newRow.insertCell(1).innerText = Others;
            newRow.insertCell(2).innerText = Quantity;
            newRow.insertCell(3).innerText = oNfhours;
            newRow.insertCell(4).innerText = oucost;


            var amountCell = newRow.insertCell(5);
            amountCell.innerText = newAmount;
            amountCell.classList.add("othertabletotalvalue");


            newRow.insertCell(6).innerHTML = '<div class="btn-group btn-group-sm" style="float: none;">' +
                '<button type="button" class="tabledit-delete-button btn btn-danger waves-effect waves-light active" style="float: none;margin: 5px;" onclick="deleteRow(this,`othertabletotalvalue`,`Others_totalAmount`)">' +
                '<span class="icofont icofont-ui-delete"></span></button></div>';



            $('input[name="Others"]').val('');
            $('input[name="Quantity"]').val('');
            $('input[name="oNfhours"]').val('');
            $('input[name="oucost"]').val('');

            updateTotal("othertabletotalvalue", "Others_totalAmount");
            totalexpendics();

        }


        function totalexpendics() {
            var Transport_totalAmount = document.getElementById("Transport_totalAmount").innerText;
            var Accommodation_totalAmount = document.getElementById("Accommodation_totalAmount").innerText;
            var Others_totalAmount = document.getElementById("Others_totalAmount").innerText;


            var totalExpend = parseInt(Transport_totalAmount) + parseInt(Accommodation_totalAmount) + parseInt(
                Others_totalAmount);
            document.getElementById("totalexpend").value = totalExpend;
        }
    </script>
@endsection
