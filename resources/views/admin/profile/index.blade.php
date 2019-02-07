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
                                <div class="col-lg-8 col-md-6">
                                    <div class="tab-content">
                                        <div class="tab-pane active show" id="link1">
                                            <div class="row">
                                                <div class="col-md-8 ml-auto mr-auto">
                                                    <div class="card card-profile" style="background-color: #fbe9e7">
                                                        <div class="card-avatar">
                                                            <a>
                                                                @if(isset($user->profilePhoto))
                                                                <img class="img" src="{{ asset('storage/userImage/'.$user->profilePhoto)}}">
                                                                @else
                                                                <img class="img" src="{{ asset('storage/userImage/default.png')}}">
                                                                @endif
                                                            </a>
                                                        </div>
                                                        <div class="card-body" >
                                                            <h6 class="card-category text-black-50"></h6>
                                                            <h4 class="card-title">  {{$user->name ?? ''}}</h4>
                                                            <p class="card-description text-black-50">
                                                                {{ $user->about ?? ''}}
                                                            </p>

                                                            <a  class="btn btn-primary text-white">{{ Auth::user()->role_id == 1 ? 'admin':'author'}}</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="tab-pane" id="link2">
                                            <div class="row">
                                                <div class="col-md-8 ml-auto mr-auto">
                                                    <div class="card card-profile" style="background-color: #fbe9e7">
                                                        <div class="card-body text-justify">
                                                            <h4 class="card-title">User Name</h4>
                                                            <p class="card-category">{{$user->userName ?? ''}}</p>
                                                            <h4 class="card-title">First Name</h4>
                                                            <p class="card-category">{{$user->firstName ?? ''}}</p>
                                                            <h4 class="card-title">Last Name</h4>
                                                            <p class="card-category">{{$user->lastName ?? ''}}</p>
                                                            <h4 class="card-title">Address</h4>
                                                            <p class="card-category">{{$user->address ?? ''}}</p>
                                                            <h4 class="card-title">City</h4>
                                                            <p class="card-category">{{$user->city ?? ''}}</p>
                                                            <h4 class="card-title">Postal Code</h4>
                                                            <p class="card-category">{{$user->postal ?? ''}}</p>
                                                            <h4 class="card-title">Country</h4>
                                                            <p class="card-category">{{$user->country ?? '' }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="tab-pane" id="link3">
                                            <div class="row">
                                                <div class="col-md-8 ml-auto mr-auto">
                                                    <div class="card card-profile" style="background-color: #fbe9e7">
                                                        <div class="card-body text-justify text-white">
                                                            <h4 class="card-title">User Email </h4>
                                                            <p class="card-category">{{$user->userName ?? ''}}</p>
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
                </div>
            </div>
        </div>
    </div>

@endsection