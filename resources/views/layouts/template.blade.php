<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta name="description" content="Contact Person : 0823-2000-3832">
    <meta name="author" content="Yosephus Wahyu Eko Novianto, S.Kom">
    <meta name="csrf-token" content="{{ csrf_token() }}"
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="{{ asset('softui') }}/assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="{{ asset('softui') }}/assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>

    <!-- CSS Files -->
    <link id="pagestyle" href="{{ asset('softui') }}/assets/css/soft-ui-dashboard.css?v=1.0.3" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="{{ asset('DataTables') }}/datatables.min.css"/>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

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
        .form-container .btn:hover, .open-button:hover {
            opacity: 1;
        }
    </style>

</head>

<body class="g-sidenav-show  bg-gray-100">
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
    <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 "
        id="sidenav-main">
        <div class="sidenav-header">
            <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
                aria-hidden="true" id="iconSidenav"></i>
            <a class="navbar-brand m-0" href="{{ route('home') }}" >
                <img src="{{ asset('softui') }}/assets/img/logo-ct.png" class="navbar-brand-img h-100"
                    alt="main_logo">
                <span class="ms-1 font-weight-bold">G H R</span>
            </a>
        </div>
        <hr class="horizontal dark mt-0">
        @include('layouts.sidebar')
    </aside>
    <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
        <div class="container-fluid py-4">

            @yield('content')


</body>

</html>
