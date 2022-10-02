<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>TestApp</title>
    <link rel="stylesheet" href="{{ asset('css/polished.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="{{asset('css/open-iconic-bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('fonts/open-iconic.woff')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css" integrity="sha512-xmGTNt20S0t62wHLmQec2DauG9T+owP9e6VU8GigI0anN7OXLip9i7IwEhelasml2osdxX71XcYm6BQunTQeQg==" crossorigin="anonymous" />
    <style>
        .loading {
            position: relative;
            pointer-events: none;
        }
        .loading:before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background: rgba(255,255,255,0.4);
            z-index: 99;
            background-image: url(https://i.gifer.com/origin/b4/b4d657e7ef262b88eb5f7ac021edda87.gif);
            background-size: 50px;
            background-position: center;
            background-repeat: no-repeat;
        }
        @media (max-width:768px) {
            .main-section{
                padding: unset !important;
            }
            .order-details-time{
                padding-left: unset !important;
                margin-left: unset !important;
            }
            .chery-logo{
                width: 170px;
            }
            .custom-dropdown{
                margin: 0 auto;
            }
        }
        @media only screen and (min-width: 769px) and (max-width: 1231px)  {
            .custom-dropdown{
                margin: 0 auto;
            }
        }
        </style>

    <?php
    header("Content-Security-Policy: frame-ancestors https://".\Illuminate\Support\Facades\Auth::user()->name." https://admin.shopify.com;");
    ?>

</head>
<body>
@include('inc.navbar')
<div class="container-fluid h-100 p-0">
    <div style="min-height: 100%" class="flex-row d-flex">
        <div class="col-lg-12 main-section col-md-12 p-3">
            @include('flash-message')
            @yield('content')
        </div>
    </div>
</div>
@yield('scripts')
</body>
</html>
