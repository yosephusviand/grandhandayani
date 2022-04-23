@guest
@else
    <div id="left-sidebar" class="sidebar">
        <div class="sidebar-scroll">
            <div class="user-account">
                <img src="{{ asset('lucid') }}/assets/images/user.png" class="rounded-circle user-photo"
                    alt="User Profile Picture">
                <div class="dropdown">
                    <span>Welcome,</span>
                    <a href="javascript:void(0);" class="dropdown-toggle user-name" data-toggle="dropdown">
                        @guest
                        @else
                            <strong>
                                {{ Auth::user()->name }}
                            </strong>
                        @endguest
                    </a>
                    <ul class="dropdown-menu dropdown-menu-right account">
                        {{-- <li class="divider"></li> --}}
                        <li>
                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                                          document.getElementById('logout-form').submit();">
                                <i class="icon-power"></i>Logout</a>
                            </a>
                        </li>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </ul>
                </div>
                <hr>
            </div>
            <!-- Nav tabs -->
            <ul class="nav nav-tabs">
                <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#menu">Menu</a></li>
                {{-- <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#sub_menu"><i
                        class="icon-grid"></i></a></li>
            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Chat"><i
                        class="icon-book-open"></i></a></li>
            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#setting"><i
                        class="icon-settings"></i></a></li> --}}
            </ul>

            <!-- Tab panes -->
            <div class="tab-content p-l-0 p-r-0">
                <div class="tab-pane active" id="menu">
                    <nav class="sidebar-nav">
                        <ul class="main-menu metismenu">
                            <li class="{{ request()->is('home*') ? 'active' : '' }}">
                                <a href=" {{ route('home') }}">
                                    <i class="icon-home"></i><span>Dashboard</span></a>
                            </li>
                            <li class="{{ request()->is('rumah*') ? 'active' : '' }}">
                                <a href="{{ route('rumah') }}">
                                    <i class="icon-calendar"></i>Rumah
                                </a>
                            </li>
                            <li class="{{ request()->is('warga*') ? 'active' : '' }}">
                                <a href="{{ route('warga') }}">
                                    <i class="icon-list"></i>Warga
                                </a>
                            </li>
                            <li class="{{ request()->is('rondaa*') ? 'active' : '' }}">
                                <a href="{{ route('rondaa') }}">
                                    <i class="icon-home"></i>Ronda
                                </a>
                            </li>
                            <li class="{{ request()->is('jimpitan*') ? 'active' : '' }}">
                                <a href="{{ route('jimpitan') }}">
                                    <i class="icon-bubbles"></i>Jimpitan
                                </a>
                            </li>
                            <li class="{{ request()->is('profile*') ? 'active' : '' }}">
                                <a href="{{ route('profile') }}">
                                    <i class="icon-user-follow"></i>User
                                </a>
                            </li>

                            <li class="{{ request()->is('keuangan*') ? 'active' : '' }}">
                                <a href="javascript:void(0);" class="has-arrow"><i
                                        class="icon-wallet"></i><span>Keuangan</span> </a>
                                <ul>
                                    <li class="{{ request()->is('keuangan') ? 'active' : '' }}">
                                        <a href="{{ route('keuangan.index') }}">Jimpitan</a>
                                    </li>
                                    <li class="{{ request()->is('keuangan/pengeluaran') ? 'active' : '' }}">
                                        <a href="{{ route('pengeluaran.index') }}">Pegeluaran</a>
                                    </li>
                                    <li class="{{ request()->is('keuangan/lainlain') ? 'active' : '' }}">
                                        <a href="{{ route('lainlain.index') }}">Lain-lain</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="{{ request()->is('laporan*') ? 'active' : '' }}">
                                <a href="{{ route('laporan.index') }}">
                                    <i class="icon-layers"></i>Laporan
                                </a>
                            </li>
                            {{-- <li><a href="javascript:void(0);" class="has-arrow"><i
                                        class="icon-user-follow"></i><span>User</span> </a>
                                <ul>
                                    <li><a href="doctors-all.html">All Doctors</a></li>
                                    <li><a href="doctor-add.html">Add Doctor</a></li>
                                    <li><a href="doctor-profile.html">Doctor Profile</a></li>
                                    <li><a href="doctor-events.html">Doctor Schedule</a></li>
                                </ul>
                            </li> --}}
                            {{-- <li><a href="javascript:void(0);" class="has-arrow"><i
                                        class="icon-layers"></i><span>Laporan</span> </a>
                                <ul>
                                    <li><a href="patients-all.html">All Patients</a></li>
                                    <li><a href="patient-add.html">Add Patient</a></li>
                                    <li><a href="patient-profile.html">Patient Profile</a></li>
                                    <li><a href="patient-invoice.html">Invoice</a></li>
                                </ul>
                            </li> --}}

                            {{-- <li><a href="javascript:void(0);" class="has-arrow"><i
                                    class="icon-layers"></i><span>Departments</span> </a>
                            <ul>
                                <li><a href="depa-add.html">Add</a></li>
                                <li><a href="depa-all.html">All Departments</a></li>
                                <li><a href="javascript:void(0);">Cardiology</a></li>
                                <li><a href="javascript:void(0);">Pulmonology</a></li>
                                <li><a href="javascript:void(0);">Gynecology</a></li>
                                <li><a href="javascript:void(0);">Neurology</a></li>
                                <li><a href="javascript:void(0);">Urology</a></li>
                                <li><a href="javascript:void(0);">Gastrology</a></li>
                                <li><a href="javascript:void(0);">Pediatrician</a></li>
                                <li><a href="javascript:void(0);">Laboratory</a></li>
                            </ul>
                        </li>
                        <li><a href="our-centres.html"><i class="icon-pointer"></i>WorldWide Centres</a></li>
                        <li>
                            <a href="#Authentication" class="has-arrow"><i
                                    class="icon-lock"></i><span>Authentication</span></a>
                            <ul>
                                <li><a href="page-login.html">Login</a></li>
                                <li><a href="page-register.html">Register</a></li>
                                <li><a href="page-lockscreen.html">Lockscreen</a></li>
                                <li><a href="page-forgot-password.html">Forgot Password</a></li>
                                <li><a href="page-404.html">Page 404</a></li>
                                <li><a href="page-403.html">Page 403</a></li>
                                <li><a href="page-500.html">Page 500</a></li>
                                <li><a href="page-503.html">Page 503</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#Widgets" class="has-arrow"><i
                                    class="icon-puzzle"></i><span>Widgets</span></a>
                            <ul>
                                <li><a href="widgets-statistics.html">Statistics Widgets</a></li>
                                <li><a href="widgets-data.html">Data Widgets</a></li>
                                <li><a href="widgets-chart.html">Chart Widgets</a></li>
                                <li><a href="widgets-weather.html">Weather Widgets</a></li>
                                <li><a href="widgets-social.html">Social Widgets</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#Pages" class="has-arrow"><i class="icon-docs"></i><span>Extra
                                    Pages</span></a>
                            <ul>
                                <li><a href="page-blank.html">Blank Page</a> </li>
                                <li><a href="doctor-profile.html">Profile</a></li>
                                <li><a href="page-gallery.html">Image Gallery <span
                                            class="badge badge-default float-right">v1</span></a> </li>
                                <li><a href="page-gallery2.html">Image Gallery <span
                                            class="badge badge-warning float-right">v2</span></a> </li>
                                <li><a href="page-timeline.html">Timeline</a></li>
                                <li><a href="page-timeline-h.html">Horizontal Timeline</a></li>
                                <li><a href="page-pricing.html">Pricing</a></li>
                                <li><a href="page-search-results.html">Search Results</a></li>
                                <li><a href="page-helper-class.html">Helper Classes</a></li>
                                <li><a href="page-maintenance.html">Maintenance</a></li>
                                <li><a href="page-testimonials.html">Testimonials</a></li>
                                <li><a href="page-faq.html">FAQs</a></li>
                            </ul>
                        </li> --}}
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
@endguest
