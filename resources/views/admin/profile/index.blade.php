@extends('layouts.backend.master')
@section('title')
        my-profile
@endsection
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8 ml-auto mr-auto">
                    <div class="card ">
                        <div class="card-header ">
                            <h4 class="card-title">User Info
                                <small class="description"></small>
                            </h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-4 col-md-6">
                                    <!--
                                              color-classes: "nav-pills-primary", "nav-pills-info", "nav-pills-success", "nav-pills-warning","nav-pills-danger"
                                          -->
                                    <ul class="nav nav-pills nav-pills-primary nav-pills-icons flex-column" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active show" data-toggle="tab" href="#link1" role="tablist">
                                                <i class="material-icons">account_circle</i>Profile
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#link2" role="tablist">
                                                <i class="material-icons">error</i> Personal Info
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#link3" role="tablist">
                                                <i class="material-icons">schedule</i> Account Info
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-md-8">
                                    <div class="tab-content">
                                        <div class="tab-pane active show" id="link1">
                                            <div class="row">
                                                <div class="col-md-8 ml-auto mr-auto">
                                                    <div class="card card-profile">
                                                        <div class="card-avatar">
                                                            <a href="#pablo">
                                                                <img class="img" src="{{asset('assets/back-end')}}/assets/img/faces/marc.jpg">
                                                            </a>
                                                        </div>
                                                        <div class="card-body">
                                                            <h6 class="card-category text-gray"></h6>
                                                            <h4 class="card-title">Alec Thompson</h4>
                                                            <p class="card-description">
                                                                Don't be scared of the truth because we need to restart the human foundation in truth And I love you like Kanye loves Kanye I love Rick Owens’ bed design but the back is...
                                                            </p>
                                                            <a href="#pablo" class="btn btn-rose btn-round">Follow</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="tab-pane" id="link2">
                                            2
                                        </div>

                                        <div class="tab-pane" id="link3">
                                            3
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