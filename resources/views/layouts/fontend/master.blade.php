<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('assets/font-end')}}/assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="{{asset('assets/font-end')}}/assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
        Blog
    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <!-- CSS Files -->
    <link href="{{asset('assets/font-end')}}/assets/css/material-kit.min1036.css?v=2.1.1" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">


</head>

<body class="blog-posts sidebar-collapse">

<nav class="navbar navbar-color-on-scroll navbar-transparent fixed-top  navbar-expand-lg " color-on-scroll="100" id="sectionsNav">
    <div class="container">
        <div class="navbar-translate">
            <a class="navbar-brand" href="{{route('home')}}">
               BlogSite </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="sr-only">Toggle navigation</span>
                <span class="navbar-toggler-icon"></span>
                <span class="navbar-toggler-icon"></span>
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ml-auto">
                <li class=" nav-item">
                    <a href="#" class=" nav-link">
                        <i class="material-icons">apps</i>Home
                    </a>

                </li>
                <li class=" nav-item">
                    <a href="#" class="nav-link">
                        <i class="material-icons">fingerprint</i>Login
                    </a>

                </li>
                <li class=" nav-item">
                    <a href="#" class="nav-link">
                        <i class="material-icons">person_add</i>Register
                    </a>

                </li>
                <li class=" nav-item">
                    <a href="#contactus" class="nav-link">
                        <i class="material-icons">perm_contact_calendar </i>Contact us
                    </a>

                </li>
            </ul>
        </div>
    </div>
</nav>
@yield('header-section')
<div class="main main-raised">
    <div class="container">
        @yield('body-section')
    </div>

    <div class="cd-section" id="contactus" >
        <!--     *********    CONTACT US 1     *********      -->
        @include('layouts.fontend.partial.contractUs')
        <!--     *********    END CONTACT US 1      *********      -->

    </div>
    <div class="subscribe-line subscribe-line-image" style="background-image: url('{{asset('assets/font-end')}}/assets/img/bg7.jpg');">
        @include('layouts.fontend.partial.subscriber')
    </div>
</div>
<footer class="footer">
   @include('layouts.fontend.partial.footer')
</footer>
<!--   Core JS Files   -->
<script src="{{asset('assets/font-end')}}/assets/js/core/jquery.min.js" type="text/javascript"></script>
<script src="{{asset('assets/font-end')}}/assets/js/core/popper.min.js" type="text/javascript"></script>
<script src="{{asset('assets/font-end')}}/assets/js/core/bootstrap-material-design.min.js" type="text/javascript"></script>
<script src="{{asset('assets/font-end')}}/assets/js/plugins/moment.min.js"></script>
<!--	Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker -->
<script src="{{asset('assets/font-end')}}/assets/js/plugins/bootstrap-datetimepicker.js" type="text/javascript"></script>
<!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
<script src="{{asset('assets/font-end')}}/assets/js/plugins/nouislider.min.js" type="text/javascript"></script>
<!--  Google Maps Plugin    -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDGat1sgDZ-3y6fFe6HD7QUziVC6jlJNog"></script>
<!-- Place this tag in your head or just before your close body tag. -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
<!--	Plugin for Sharrre btn -->
<script src="{{asset('assets/font-end')}}/assets/js/plugins/jquery.sharrre.js" type="text/javascript"></script>
<!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
<script src="{{asset('assets/font-end')}}/assets/js/plugins/bootstrap-tagsinput.js"></script>
<!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
<script src="{{asset('assets/font-end')}}/assets/js/plugins/bootstrap-selectpicker.js" type="text/javascript"></script>
<!--	Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
<script src="{{asset('assets/font-end')}}/assets/js/plugins/jasny-bootstrap.min.js" type="text/javascript"></script>
<!--	Plugin for Small Gallery in Product Page -->
<script src="{{asset('assets/font-end')}}/assets/js/plugins/jquery.flexisel.js" type="text/javascript"></script>
<!-- Plugins for presentation and navigation  -->
<script src="{{asset('assets/font-end')}}/assets/demo/modernizr.js" type="text/javascript"></script>
<script src="{{asset('assets/font-end')}}/assets/demo/vertical-nav.js" type="text/javascript"></script>
<!-- Place this tag in your head or just before your close body tag. -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
<!-- Js With initialisations For Demo Purpose, Don't Include it in Your Project -->
<script src="{{asset('assets/font-end')}}/assets/demo/demo.js" type="text/javascript"></script>
<!-- Control Center for Material Kit: parallax effects, scripts for the example pages etc -->
<script src="{{asset('assets/font-end')}}/assets/js/material-kit.min1036.js?v=2.1.1" type="text/javascript"></script>
<script src="https://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
<script src="https://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
{!! Toastr::message() !!}
<script>
    @if($errors->any())
    @forEach($errors->all() as $error)
    toastr.error('{{$error}}','Error',{
        closeButton:true,
        progressBar: true

    });
    @endforeach

    @endif
</script>


@stack('scripts')
</body>
</html>