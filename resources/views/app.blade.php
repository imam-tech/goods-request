<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>GOODS REQUEST @yield('title')</title>

    <!-- Custom fonts for this template-->
    {{--<link href="{{ asset('assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet"--}}
          {{--type="text/css">--}}
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
    <link
            href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
            rel="stylesheet">

    <link type="text/css" rel="stylesheet" href="//unpkg.com/bootstrap@4.5.3/dist/css/bootstrap.css" />

    <!-- Custom styles for this template-->
    <link href="{{ asset('assets/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <style media="screen">

        @keyframes fade-in {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        @keyframes fade-out {
            from {
                opacity: 1;
            }
            to {
                opacity: 0;
            }
        }

        @keyframes lds-rolling {
            0% {
                -webkit-transform: translate(-50%, -50%) rotate(0deg);
                transform: translate(-50%, -50%) rotate(0deg);
            }
            100% {
                -webkit-transform: translate(-50%, -50%) rotate(360deg);
                transform: translate(-50%, -50%) rotate(360deg);
            }
        }
        @-webkit-keyframes lds-rolling {
            0% {
                -webkit-transform: translate(-50%, -50%) rotate(0deg);
                transform: translate(-50%, -50%) rotate(0deg);
            }
            100% {
                -webkit-transform: translate(-50%, -50%) rotate(360deg);
                transform: translate(-50%, -50%) rotate(360deg);
            }
        }
        .lds-css{
            display: none;
            position: fixed;
            z-index: 10329;
            top: 0;
            left: 0;
            width: 100%;
            height: 100vh;
            background-color: rgba(0,0,0,0.3)
        }

        .lds-css.show{
            display: block;
        }
        .lds-rolling {
            position: relative;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
        .lds-rolling div, .lds-rolling div:after {
            position: absolute;
            width: 80px;
            height: 80px;
            border: 4px solid #fff;
            border-top-color: transparent;
            border-radius: 50%;
            top: 50%;
            left: 50%;
        }
        .lds-rolling div {
            -webkit-animation: lds-rolling 1s linear infinite;
            animation: lds-rolling 1s linear infinite;

        }
        .lds-rolling div:after {
            -webkit-transform: rotate(90deg);
            transform: rotate(90deg);
        }
        .lds-rolling {
            width: 100px !important;
            height: 100px !important;

        }
    </style>

</head>

<body id="page-top">

<noscript>
    <strong>We're sorry but Dr Bear - Template doesn't work properly without JavaScript enabled. Please enable it to
        continue.</strong>
</noscript>
<div class="app" id="app"></div>

<script src="{{ mix('js/app.js') }}"></script>

<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet"/>

<!-- Bootstrap core JavaScript-->
<script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- Core plugin JavaScript-->
<script src="{{ asset('assets/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

<!-- Custom scripts for all pages-->
<script src="{{ asset('assets/js/sb-admin-2.min.js') }}"></script>

</body>

</html>
