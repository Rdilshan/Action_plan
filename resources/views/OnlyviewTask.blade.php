@extends('layout.layout')
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
                                        <h4>View Task</h4>

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
                                        <li class="breadcrumb-item"><a href="#!">View Task </a>
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
                                        <h4 class="sub-title">View your selection</h4>
                                        <form action="/addnewtask/first" method="GET">
                                            @csrf
                                            <div id="page1">
                                                <!-- Page 1 Content -->


                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label" for="goal">Select
                                                        Goal</label>
                                                    <div class="col-sm-10">
                                                        <select name="goal" id="goal" class="form-control" disabled>
                                                            <option value="opt1">{{ $goal_name }}
                                                            </option>

                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label" for="objective">Select
                                                        Objective</label>
                                                    <div class="col-sm-10">
                                                        <select name="objective" id="objective" class="form-control"
                                                            disabled>
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
                                                            disabled>
                                                            <option value="opt1">{{ $strategy_name }}
                                                            </option>

                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label" for="action">Select
                                                        Action</label>
                                                    <div class="col-sm-10">
                                                        <select name="action" id="action" class="form-control" disabled>
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
                                                            disabled>
                                                            <option value="opt1">{{ $subaction_name }}
                                                            </option>

                                                        </select>
                                                    </div>
                                                </div>

                                                <hr />
                                                <h4 class="sub-title">View your Task Details</h4>

                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Title</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" name="title" class="form-control"
                                                            value="{{ $task->Title }}" placeholder="Enter the Title"
                                                            readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Name</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" name="name"
                                                            value="{{ $task->name }}"
                                                            placeholder="Name of the responsible person for particular inquery."
                                                            readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Action Plane</label>
                                                    <div class="col-sm-5">

                                                        <input type="date" class="form-control" name="start_date"
                                                            value="{{ $task->startDate }}" placeholder="Start Date"
                                                            readonly>
                                                        <span class="text-muted pl-2">start date</span>
                                                    </div>
                                                    <div class="col-sm-5">

                                                        <input type="date" class="form-control" name="end_date"
                                                            value="{{ $task->endDate }}" placeholder="End Date" readonly>
                                                        <span class="text-muted pl-2">End date</span>

                                                    </div>
                                                </div>


                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Introduction</label>
                                                    <div class="col-sm-10">
                                                        <textarea rows="5" cols="5" class="form-control" name="introduction" readonly
                                                            placeholder="Default textarea">{{ $task->introduction }}</textarea>
                                                    </div>
                                                </div>


                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Upload
                                                        File</label>
                                                    <div class="col-sm-10">
                                                        {{-- <input type="file" name="file" class="form-control"> --}}
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


                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @php
                                                                    $totalAmount = $funding->sum('amount');
                                                                @endphp

                                                                @foreach ($funding as $fund)
                                                                    <tr>
                                                                        <th scope="row">{{ $loop->iteration }}</th>
                                                                        <td>{{ $fund->name }}</td>
                                                                        <td>{{ $fund->unit }}</td>
                                                                        <td>{{ $fund->unit_charge }}</td>
                                                                        <td class="fundingtotalvalue">{{ $fund->amount }}
                                                                        </td>

                                                                    </tr>
                                                                @endforeach



                                                            </tbody>
                                                            <tfoot>
                                                                <tr>
                                                                    <td colspan="4" style="text-align: right;">
                                                                        <strong>Total:</strong>
                                                                    </td>
                                                                    <td id="Funding_totalAmount">{{ $totalAmount }}</td>
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


                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @php
                                                                    $i = 1;
                                                                    $totalAmount = 0;
                                                                @endphp
                                                                @foreach ($expense as $expenseitem)
                                                                    @if (strtolower($expenseitem->Type) === 'transport')
                                                                        <tr>
                                                                            <th scope="row">{{ $i }}</th>
                                                                            <td>{{ $expenseitem->name }}</td>
                                                                            <td>{{ $expenseitem->no_unit }}</td>
                                                                            <td>{{ $expenseitem->totalKM }}</td>
                                                                            <td class="fundingtotalvalue">
                                                                                {{ $expenseitem->unit_cost }}</td>
                                                                            <td class="fundingtotalvalue">
                                                                                {{ $expenseitem->amount }}</td>


                                                                            @php
                                                                                $totalAmount += $expenseitem->amount;
                                                                            @endphp
                                                                        </tr>
                                                                        @php
                                                                            $i++;
                                                                        @endphp
                                                                    @endif
                                                                @endforeach


                                                            </tbody>
                                                            <tfoot>
                                                                <tr>
                                                                    <td colspan="5" style="text-align: right;">
                                                                        <strong>Total:</strong>
                                                                    </td>
                                                                    <td id="Transport_totalAmount">{{ $totalAmount }}
                                                                    </td>
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


                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @php
                                                                    $i = 1;
                                                                    $totalAmount = 0;
                                                                @endphp
                                                                @foreach ($expense as $expenseitem)
                                                                    @if (strtolower($expenseitem->Type) === 'accommodation')
                                                                        <tr>
                                                                            <th scope="row">{{ $i }}</th>
                                                                            <td>{{ $expenseitem->name }}</td>
                                                                            <td>{{ $expenseitem->no_unit }}</td>
                                                                            <td>{{ $expenseitem->no_days }}</td>
                                                                            <td class="fundingtotalvalue">
                                                                                {{ $expenseitem->unit_cost }}</td>
                                                                            <td class="fundingtotalvalue">
                                                                                {{ $expenseitem->amount }}</td>
                                                                            @php
                                                                                $totalAmount =
                                                                                    $totalAmount + $expenseitem->amount;
                                                                            @endphp

                                                                        </tr>
                                                                        @php
                                                                            $i++;
                                                                        @endphp
                                                                    @endif
                                                                @endforeach




                                                            </tbody>
                                                            <tfoot>
                                                                <tr>
                                                                    <td colspan="5" style="text-align: right;">
                                                                        <strong>Total:</strong>
                                                                    </td>
                                                                    <td id="Accommodation_totalAmount">{{ $totalAmount }}
                                                                    </td>
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



                                                                </tr>
                                                            </thead>
                                                            <tbody>

                                                                @php
                                                                    $i = 1;
                                                                    $totalAmount = 0;
                                                                @endphp
                                                                @foreach ($expense as $expenseitem)
                                                                    @if (strtolower($expenseitem->Type) === 'others')
                                                                        <tr>
                                                                            <th scope="row">{{ $i }}</th>
                                                                            <td>{{ $expenseitem->name }}</td>
                                                                            <td>{{ $expenseitem->no_unit }}</td>
                                                                            <td>{{ $expenseitem->no_days }}</td>
                                                                            <td>{{ $expenseitem->unit_cost }}</td>

                                                                            <td class="fundingtotalvalue">
                                                                                {{ $expenseitem->amount }}</td>

                                                                            @php
                                                                                $totalAmount =
                                                                                    $totalAmount + $expenseitem->amount;
                                                                            @endphp
                                                                        </tr>
                                                                        @php
                                                                            $i++;
                                                                        @endphp
                                                                    @endif
                                                                @endforeach



                                                            </tbody>
                                                            <tfoot>
                                                                <tr>
                                                                    <td colspan="5" style="text-align: right;">
                                                                        <strong>Total:</strong>
                                                                    </td>
                                                                    <td id="Others_totalAmount">{{ $totalAmount }}</td>
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
                                                            <textarea id="noteTextarea" rows="5" cols="5" class="form-control" placeholder="Default Note" readonly>{{ $task->Note }}</textarea>
                                                        </div>
                                                    </div>



                                                </div>



                                                <button type="button" class="btn btn-inverse js-dynamic-disable m-t-10"
                                                    onclick="showPage(1)">Back</button>

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
    </script>
@endsection
