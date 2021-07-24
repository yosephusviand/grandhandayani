<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta name="description" content="Contact Person : 0823-2000-3832">
    <meta name="author" content="Yosephus Wahyu Eko Novianto, S.Kom">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('flexstart') }}/assets/img/favicon.png" rel="icon">
    <link href="{{ asset('flexstart') }}/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('flexstart') }}/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('flexstart') }}/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="{{ asset('flexstart') }}/assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="{{ asset('flexstart') }}/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="{{ asset('flexstart') }}/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="{{ asset('flexstart') }}/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('flexstart') }}/assets/css/style.css" rel="stylesheet">


    <style>
        #topbar-notification {
            display: none;
            position: fixed;
            z-index: 99999;
            background: #05ab08;
            color: #fff;
            padding: 15px;
            left: 0;
            right: 0;
            top: 0;
            text-align: center;
        }

        #alert-notification {
            display: none;
            position: fixed;
            z-index: 99999;
            background: #e3342f;
            color: #fff;
            padding: 15px;
            left: 0;
            right: 0;
            top: 0;
            text-align: center;
        }

        .open-button {
            background-color: #2c61a5;
            color: white;
            padding: 8px 20px;
            border: none;
            cursor: pointer;
            opacity: 0.9;
            position: fixed;
            z-index: 999;
            bottom: 0;
            right: 20px;
            width: 150px;
        }

        /* The popup chat - hidden by default */
        .chat-popup {
            display: none;
            position: fixed;
            bottom: 0;
            right: 15px;
            width: 300px;
            border: 5px solid #f1f1f1;
            z-index: 99999;
        }

        /* Add styles to the form container */
        .form-container {
            max-width: 300px;
            height: 350px;
            overflow-y: scroll;
            padding: 10px;
            background-color: white;
        }

        /* Full-width textarea */
        .form-container textarea {
            width: 100%;
            padding: 15px;
            margin: 5px 0 22px 0;
            border: none;
            background: #fff;
            border: 1px solid #ccc;
            resize: none;
            min-height: 100px;
        }

        /* Add some hover effects to buttons */
        .form-container .btn:hover,
        .open-button:hover {
            opacity: 1;
        }

    </style>
</head>

<body>

    <div id="topbar-notification">
        <div class="container">
            <div id="text-notif">
                My awesome top bar
            </div>
        </div>
    </div>

    <div id="alert-notification">
        <div class="container">
            <div id="alert-notif">
                My awesome top bar
            </div>
        </div>
    </div>
    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top">
        <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

            <a href="index.html" class="logo d-flex align-items-center">
                <img src="{{ asset('flexstart') }}/assets/img/logo.png" alt="">
                <span>G H R</span>
            </a>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto active" href="{{ url('/') }}">Home</a></li>
                    <li><a class="nav-link scrollto" href="#">Warga</a></li>
                    <li><a class="nav-link scrollto" href="#">Kegiatan</a></li>
                    <li><a class="nav-link scrollto" href="{{ route('ronda') }}">Ronda</a></li>
                    <li><a class="nav-link scrollto" href="{{ route('login') }}">Login</a></li>
                    <li><a class="nav-link scrollto" href="{{ route('register') }}">Register</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->


    <!-- ======= Hero Section ======= -->
    @yield('content')
