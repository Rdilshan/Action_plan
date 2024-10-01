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
                                        <h4>Add New Task</h4>

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
                                        <li class="breadcrumb-item"><a href="#!">Add Task </a>
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
                                        <h4 class="sub-title">Frist select your selection</h4>
                                        <form action="/addnewtask" method="GET">
                                            @csrf
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label" for="goal">Select
                                                    Goal</label>
                                                <div class="col-sm-10">
                                                    <select name="goal" id="goal" class="form-control" required>
                                                        <option value="opt1">Select One Value Only
                                                        </option>

                                                        @foreach ($goals as $goal)
                                                            <option value="{{ $goal->id }}">{{ $goal->name }}</option>
                                                        @endforeach

                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label" for="objective">Select
                                                    Objective</label>
                                                <div class="col-sm-10">
                                                    <select name="objective" id="objective" class="form-control" required>
                                                        <option value="opt1">Select One Value Only
                                                        </option>

                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label" for="strategy">Select
                                                    Strategy</label>
                                                <div class="col-sm-10">
                                                    <select name="strategy" id="strategy" class="form-control" required>
                                                        <option value="opt1">Select One Value Only
                                                        </option>

                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label" for="action">Select
                                                    Action</label>
                                                <div class="col-sm-10">
                                                    <select name="action" id="action" class="form-control" required>
                                                        <option value="opt1">Select One Value Only
                                                        </option>

                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label"  for="subaction">Select
                                                    Subaction</label>
                                                <div class="col-sm-10">
                                                    <select name="subaction" id="subaction" class="form-control" required>
                                                        <option value="opt1">Select One Value Only
                                                        </option>

                                                    </select>
                                                </div>
                                            </div>

                                            <button class="btn btn-primary" type="submit">Next</button>
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

@endsection
