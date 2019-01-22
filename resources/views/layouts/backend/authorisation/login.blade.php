@extends('layouts.backend.master')
@section('title')
    login
@endsection()
@section('login')
<div class="wrapper wrapper-full-page">
    <div class="page-header login-page header-filter" filter-color="black" style="background-image: url('{{asset('assets/back-end')}}/assets/img/login.jpg'); background-size: cover; background-position: top center;">
        <!--   you can change the color of the filter page using: data-color="blue | purple | green | orange | red | rose " -->
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-8 ml-auto mr-auto">
                    <form class="form" method="post" action="{{route('login')}}">
                        @csrf
                        <div class="card card-login card-hidden">
                            <div class="card-header card-header-primary text-center">
                                <h4 class="card-title">Login</h4>
                            </div>
                            <div class="card-body ">
                                <span class=""></span>
                                <span class="bmd-form-group">
                                <div class="input-group">
                                <div class="input-group-prepend">
                                <span class="input-group-text">
                                  <i class="material-icons">email</i>
                                </span>
                                </div>
                                <input type="email" name="email" id="email" required autofocus class="form-control" value="{{ old('email') }}"placeholder="Email...">
                                </div>
                                  </span>
                                <span class="bmd-form-group">
                                    <div class="input-group">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text">
                                          <i class="material-icons">lock_outline</i>
                                        </span>
                                      </div>
                                      <input type="password" name="password" required class="form-control"  placeholder="Password...">
                                    </div>
                                  </span>
                            </div>
                            <div class="card-footer justify-content-center">
                                <button type="submit" class="btn btn-primary btn-sm" style="text-transform: none">Sign In</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection()
@push('scripts')
    <script>
        $(document).ready(function() {
            $('#main-body').addClass('off-canvas-sidebar');
            md.checkFullPageBackgroundImage();
            setTimeout(function() {
                // after 1000 ms we add the class animated to the login/register card
                $('.card').removeClass('card-hidden');
            }, 700);
        });
    </script>
@endpush