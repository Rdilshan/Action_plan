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
                    <!-- Page-header end -->


                    <!-- Page body start -->
                    <div class="page-body">

                        <div class="row">

                            <div class="col-sm-12">

                                <div class="card-block">
                                    <div class="card-block tree-view">
                                        <div id="basicTree">



                                            <ul>
                                                <li>Goals
                                                    <ul>
                                                        @foreach($dataset as $goal)
                                                        <li >{{ $goal['name'] }}
                                                            <ul>
                                                                @foreach($goal['objectives'] as $objective)
                                                                <li>{{ $objective['name'] }}
                                                                    <ul>

                                                                        @foreach($objective['strategies'] as $strategy)
                                                                        <li >{{ $strategy['name'] }}
                                                                            <ul>
                                                                                @foreach($strategy['actions'] as $action)
                                                                                <li >{{$action['name']}}
                                                                                    <ul>
                                                                                        @foreach($action['subactions'] as $subaction)
                                                                                        <li >{{$subaction['name']}}
                                                                                            <ul>

                                                                                                @foreach($subaction['tasks'] as $task)
                                                                                                    <li data-jstree='{"type":"file"}'>
                                                                                                        <b>{{ $task}}</b>
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


                                                {{-- <li data-jstree='{"opened":true}'>Email Template
                                                    <ul>
                                                        <li data-jstree='{"type":"file"}'>Email one</li>
                                                        <li data-jstree='{"type":"file"}'>Email two</li>
                                                    </ul>
                                                </li> --}}
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
@endsection
