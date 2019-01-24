<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>@yield('title')</title>

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700%7CMuli:400,700" rel="stylesheet">

    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="{{asset('assets')}}/font-end/css/bootstrap.min.css" />

    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="{{asset('assets')}}/font-end/css/font-awesome.min.css">

    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="{{asset('assets')}}/font-end/css/style.css" />
    <!--Toaster css-->
    <link rel="stylesheet" href="https://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
<!-- HEADER -->
@include('layouts.fontend.partial.header')
<!-- /HEADER -->


<!-- SECTION -->
@include('layouts.fontend.partial.content')
<!-- /SECTION -->

<!-- Footer -->
@include('layouts.fontend.partial.footer')
<!-- Footer -->
<!-- jQuery Plugins -->
<script src="{{asset('assets')}}/font-end/js/jquery.min.js"></script>
<script src="{{asset('assets')}}/font-end/js/bootstrap.min.js"></script>
<script src="{{asset('assets')}}/font-end/js/jquery.stellar.min.js"></script>
<script src="{{asset('assets')}}/font-end/js/main.js"></script>
<!--Toaster js-->

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
</body>

</html>
