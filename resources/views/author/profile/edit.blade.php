@extends('layouts.backend.master')
@section('title')
    Profile
@endsection
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8 ml-auto mr-auto">
                    <form action="{{route('author.store-info')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card">
                            <div class="card-header card-header-icon card-header-primary">
                                <div class="card-icon">
                                    <i class="material-icons">perm_identity</i>
                                </div>
                                <h4 class="card-title">Edit Profile -
                                    <small class="category">Complete your profile</small>
                                </h4>
                            </div>
                            <div class="card-body">
                                <form>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group bmd-form-group">
                                                <label class="bmd-label-floating">Username</label>
                                                <input type="text" class="form-control" name="userName">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group bmd-form-group">
                                                <label class="bmd-label-floating">Fist Name</label>
                                                <input type="text" class="form-control" name="firstName">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group bmd-form-group">
                                                <label class="bmd-label-floating">Last Name</label>
                                                <input type="text" class="form-control" name="lastName">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group bmd-form-group">
                                                <label class="bmd-label-floating">Address</label>
                                                <input type="text" class="form-control" name="address">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group bmd-form-group">
                                                <label class="bmd-label-floating">City</label>
                                                <input type="text" class="form-control" name="city">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group bmd-form-group">
                                                <label class="bmd-label-floating">Country</label>
                                                <input type="text" class="form-control" name="country">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group bmd-form-group">
                                                <label class="bmd-label-floating">Postal Code</label>
                                                <input type="text" class="form-control" name="postal">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                                <div class="fileinput-new thumbnail">
                                                    <img height="80px" width="120px" src="{{asset('assets/back-end/assets/img/image_placeholder.jpg')}}"
                                                         alt="img_source">
                                                </div>
                                                <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                                <div class="text-left">
                                                <span class="btn btn-primary btn-file">
                                                    <span class="fileinput-new">Upload your image</span>
                                                    <span class="fileinput-exists">Change</span>
                                                    <input type="file" name="image"/>
                                                </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label>About Me</label>
                                                <div class="form-group bmd-form-group">
                                                    <textarea class="form-control" rows="4" name="about"></textarea>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <button type="submit" class="btn btn-primary pull-right">Update Profile</button>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection


@push('scripts')
    <script>
        $(document).ready(function () {
            md.checkFullPageBackgroundImage();
        });
    </script>
@endpush