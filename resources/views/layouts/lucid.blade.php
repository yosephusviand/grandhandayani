<!doctype html>
<html lang="en">

<head>
    <title>GHR</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta name="description" content="Lucid Bootstrap 4.1.1 Admin Template">
    <meta name="author" content="WrapTheme, design by: ThemeMakker.com">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <!-- VENDOR CSS -->
    <link rel="stylesheet" href="{{ asset('lucid') }}/assets/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('lucid') }}/assets/vendor/font-awesome/css/font-awesome.min.css">

    <link rel="stylesheet" href="{{ asset('lucid') }}/assets/vendor/jquery-datatable/dataTables.bootstrap4.min.css">
    <link rel="stylesheet"
        href="{{ asset('lucid') }}/assets/vendor/jquery-datatable/fixedeader/dataTables.fixedcolumns.bootstrap4.min.css">
    <link rel="stylesheet"
        href="{{ asset('lucid') }}/assets/vendor/jquery-datatable/fixedeader/dataTables.fixedheader.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('lucid') }}/assets/vendor/chartist/css/chartist.min.css">
    <link rel="stylesheet"
        href="{{ asset('lucid') }}/assets/vendor/chartist-plugin-tooltip/chartist-plugin-tooltip.css">
    <link rel="stylesheet" href="{{ asset('lucid') }}/assets/vendor/toastr/toastr.min.css">

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="{{ asset('lucid/light') }}/assets/css/main.css">
    <link rel="stylesheet" href="{{ asset('lucid/light') }}/assets/css/color_skins.css">
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
        .form-container .btn:hover,
        .open-button:hover {
            opacity: 1;
        }

    </style>
</head>

<body class="theme-orange">

    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="m-t-30"><img src="{{ asset('lucid') }}/assets/images/logo-icon.svg" width="48"
                    height="48" alt="Lucid">
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- Overlay For Sidebars -->

    <div id="wrapper">

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
        <nav class="navbar navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-btn">
                    <button type="button" class="btn-toggle-offcanvas"><i class="lnr lnr-menu fa fa-bars"></i></button>
                </div>

                <div class="navbar-brand">
                    <a href="index.html"><img src="{{ asset('lucid') }}/assets/images/logo.svg" alt="Lucid Logo"
                            class="img-responsive logo"></a>
                </div>

                <div class="navbar-right">
                    <form id="navbar-search" class="navbar-form search-form">
                        <input value="" class="form-control" placeholder="Search here..." type="text">
                        <button type="button" class="btn btn-default"><i class="icon-magnifier"></i></button>
                    </form>
                </div>
            </div>
        </nav>
        $('.select2').select2();
        @include('layouts.sidebarlucid')

        <div id="main-content">
            <div class="container-fluid">
                @yield('content')
            </div>
        </div>

    </div>

    <script>
        $(document).ready(function() {
            $('.select2').select2();

            $('.btn-toastr').on('click', function() {
                $context = 'info';
                $message = $(this).data('message');
                $position = $(this).data('position');

                if ($context === '') {
                    $context = 'info';
                }

                if ($position === '') {
                    $positionClass = 'toast-bottom-right';
                } else {
                    $positionClass = 'toast-' + $position;
                }

                toastr.remove();
                toastr[$context]($message, '', {
                    positionClass: $positionClass
                });
            });
        })
    </script>


    @if (!empty(Session::get('status')) && Session::get('status') == '1')
        <script>
            $context = 'info';
            $message = "{{ Session::get('message') }}";
            $positionClass = 'toast-top-full-width';
            toastr.remove();
            toastr[$context]($message, '', {
                positionClass: $positionClass
            });
        </script>
    @endif

    @if (!empty(Session::get('status')) && Session::get('status') == '2')
        <script>
            $context = 'error';
            $message = "{{ Session::get('message') }}";
            $positionClass = 'top-full-width';
            toastr.remove();
            toastr[$context]($message, '', {
                positionClass: $positionClass
            });
        </script>
    @endif

</body>

</html>
