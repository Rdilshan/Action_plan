
@extends('layout.userlayout')
@section('contend')

<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">


                <div class="page-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <!-- Basic Form Inputs card start -->
                            <div class="row">

                                <div class="col-xl-3 col-md-6">
                                    <div class="card bg-c-yellow update-card">
                                        <div class="card-block">
                                            <div class="row align-items-end">
                                                <div class="col-8">
                                                    <h4 class="text-white">$30200</h4>
                                                    <h6 class="text-white m-b-0">Number of Goals</h6>
                                                </div>
                                                <div class="col-4 text-right"><iframe class="chartjs-hidden-iframe" tabindex="-1" style="display: block; overflow: hidden; border: 0px; margin: 0px; inset: 0px; height: 100%; width: 100%; position: absolute; pointer-events: none; z-index: -1;"></iframe>
                                                    <canvas id="update-chart-1" height="62" style="display: block; height: 50px; width: 88px;" width="110"></canvas>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <p class="text-white m-b-0"><i class="feather icon-clock text-white f-14 m-r-10"></i>update : 2:15 am</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-md-6">
                                    <div class="card bg-c-green update-card">
                                        <div class="card-block">
                                            <div class="row align-items-end">
                                                <div class="col-8">
                                                    <h4 class="text-white">290+</h4>
                                                    <h6 class="text-white m-b-0">All Tasks</h6>
                                                </div>
                                                <div class="col-4 text-right"><iframe class="chartjs-hidden-iframe" tabindex="-1" style="display: block; overflow: hidden; border: 0px; margin: 0px; inset: 0px; height: 100%; width: 100%; position: absolute; pointer-events: none; z-index: -1;"></iframe>
                                                    <canvas id="update-chart-2" height="62" width="110" style="display: block; height: 50px; width: 88px;"></canvas>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <p class="text-white m-b-0"><i class="feather icon-clock text-white f-14 m-r-10"></i>update : 2:15 am</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-md-6">
                                    <div class="card bg-c-pink update-card">
                                        <div class="card-block">
                                            <div class="row align-items-end">
                                                <div class="col-8">
                                                    <h4 class="text-white">145</h4>
                                                    <h6 class="text-white m-b-0">Your Tasks</h6>
                                                </div>
                                                <div class="col-4 text-right"><iframe class="chartjs-hidden-iframe" tabindex="-1" style="display: block; overflow: hidden; border: 0px; margin: 0px; inset: 0px; height: 100%; width: 100%; position: absolute; pointer-events: none; z-index: -1;"></iframe>
                                                    <canvas id="update-chart-3" height="62" width="110" style="display: block; height: 50px; width: 88px;"></canvas>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <p class="text-white m-b-0"><i class="feather icon-clock text-white f-14 m-r-10"></i>update : 2:15 am</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-md-6">
                                    <div class="card bg-c-lite-green update-card">
                                        <div class="card-block">
                                            <div class="row align-items-end">
                                                <div class="col-8">
                                                    <h4 class="text-white">500</h4>
                                                    <h6 class="text-white m-b-0">Compeleted Tasks</h6>
                                                </div>
                                                <div class="col-4 text-right"><iframe class="chartjs-hidden-iframe" tabindex="-1" style="display: block; overflow: hidden; border: 0px; margin: 0px; inset: 0px; height: 100%; width: 100%; position: absolute; pointer-events: none; z-index: -1;"></iframe>
                                                    <canvas id="update-chart-4" height="62" width="110" style="display: block; height: 50px; width: 88px;"></canvas>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <p class="text-white m-b-0"><i class="feather icon-clock text-white f-14 m-r-10"></i>update : 2:15 am</p>
                                        </div>
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
