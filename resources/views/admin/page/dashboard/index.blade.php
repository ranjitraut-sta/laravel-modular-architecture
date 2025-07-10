@extends('admin.main.app')
@section('content')
    <!--page-wrapper-->
    <div class="row">

        <div class="col-12 col-lg-4">
            <div class="card radius-15 overflow-hidden">
                <div class="card-body">
                    <div class="d-flex">
                        <div>
                            <p class="mb-0 font-weight-bold">Sessions</p>
                            <h2 class="mb-0">501</h2>
                        </div>
                        <div class="ms-auto align-self-end">
                            <p class="mb-0 font-14 text-primary"><i class='bx bxs-up-arrow-circle'></i>
                                <span>1.01% 31 days ago</span>
                            </p>
                        </div>
                    </div>
                    <div id="chart1"></div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-4">
            <div class="card radius-15 overflow-hidden">
                <div class="card-body">
                    <div class="d-flex">
                        <div>
                            <p class="mb-0 font-weight-bold">Visitors</p>
                            <h2 class="mb-0">409</h2>
                        </div>
                        <div class="ms-auto align-self-end">
                            <p class="mb-0 font-14 text-success"><i class='bx bxs-up-arrow-circle'></i>
                                <span>0.49% 31 days ago</span>
                            </p>
                        </div>
                    </div>
                    <div id="chart2"></div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-4">
            <div class="card radius-15 overflow-hidden">
                <div class="card-body">
                    <div class="d-flex">
                        <div>
                            <p class="mb-0 font-weight-bold">Page Views</p>
                            <h2 class="mb-0">2,346</h2>
                        </div>
                        <div class="ms-auto align-self-end">
                            <p class="mb-0 font-14 text-danger"><i class='bx bxs-down-arrow-circle'></i>
                                <span>130.68% 31 days ago</span>
                            </p>
                        </div>
                    </div>
                    <div id="chart3"></div>
                </div>
            </div>
        </div>

        <!--end row-->
        <div class="row">
            <div class="col-12 col-lg-12 col-xl-8">
                <div class="card radius-15">
                    <div class="card-body">
                        <div class="card-title">
                            <h5 class="mb-0">Geographic</h5>
                        </div>
                        <hr />
                        <div id="geographic-map"></div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-12 col-xl-4">
                <div class="card radius-15">
                    <div class="card-body">
                        <div class="d-lg-flex align-items-center mb-4">
                            <div>
                                <h5 class="mb-0">Top countries</h5>
                            </div>
                            <div class="ms-auto">
                                <h3 class="mb-0"><span class="font-14">Total Visits:</span> 9587</h3>
                            </div>
                        </div>
                        <hr />
                        <div class="dashboard-top-countries">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item d-flex align-items-center">
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="font-20"><i class="flag-icon flag-icon-in"></i>
                                        </div>
                                        <div class="">
                                            <h6 class="mb-0">India</h6>
                                        </div>
                                    </div>
                                    <div class="ms-auto">647</div>
                                </li>
                                <li class="list-group-item d-flex align-items-center">
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="font-20"><i class="flag-icon flag-icon-us"></i>
                                        </div>
                                        <div class="media-body ml-2">
                                            <h6 class="mb-0">United States</h6>
                                        </div>
                                    </div>
                                    <div class="ms-auto">435</div>
                                </li>
                                <li class="list-group-item d-flex align-items-center">
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="font-20"><i class="flag-icon flag-icon-vn"></i>
                                        </div>
                                        <div class="">
                                            <h6 class="mb-0">Vietnam</h6>
                                        </div>
                                    </div>
                                    <div class="ms-auto">287</div>
                                </li>
                                <li class="list-group-item d-flex align-items-center">
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="font-20"><i class="flag-icon flag-icon-au"></i>
                                        </div>
                                        <div class="">
                                            <h6 class="mb-0">Australia</h6>
                                        </div>
                                    </div>
                                    <div class="ms-auto">432</div>
                                </li>
                                <li class="list-group-item d-flex align-items-center">
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="font-20"><i class="flag-icon flag-icon-dz"></i>
                                        </div>
                                        <div class="">
                                            <h6 class="mb-0">Angola</h6>
                                        </div>
                                    </div>
                                    <div class="ms-auto">345</div>
                                </li>
                                <li class="list-group-item d-flex align-items-center">
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="font-20"><i class="flag-icon flag-icon-ax"></i>
                                        </div>
                                        <div class="">
                                            <h6 class="mb-0">Aland Islands</h6>
                                        </div>
                                    </div>
                                    <div class="ms-auto">134</div>
                                </li>
                                <li class="list-group-item d-flex align-items-center">
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="font-20"><i class="flag-icon flag-icon-ar"></i>
                                        </div>
                                        <div class="">
                                            <h6 class="mb-0">Argentina</h6>
                                        </div>
                                    </div>
                                    <div class="ms-auto">147</div>
                                </li>
                                <li class="list-group-item d-flex align-items-center">
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="font-20"><i class="flag-icon flag-icon-be"></i>
                                        </div>
                                        <div class="">
                                            <h6 class="mb-0">Belgium</h6>
                                        </div>
                                    </div>
                                    <div class="ms-auto">210</div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!--end row-->

    </div>

    <!--end page-wrapper-->
@endsection
