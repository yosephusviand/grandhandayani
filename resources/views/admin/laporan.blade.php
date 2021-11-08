@include('layouts.template')

@section('content')

    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
        navbar-scroll="true">
        <div class="container-fluid py-1 px-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                    <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
                    <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Dashboard</li>
                </ol>
                <h6 class="font-weight-bolder mb-0">Dashboard</h6>
            </nav>
            <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                <div class="ms-md-auto pe-md-3 d-flex align-items-center">

                </div>
                <ul class="navbar-nav  justify-content-end">
                    <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                        <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                            <div class="sidenav-toggler-inner">
                                <i class="sidenav-toggler-line"></i>
                                <i class="sidenav-toggler-line"></i>
                                <i class="sidenav-toggler-line"></i>
                            </div>
                        </a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>

    <div class="row">
        <div class="card">
            <div class="card-body p-3">
                <div class="accordion" id="accordionPanelsStayOpenExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true"
                                aria-controls="panelsStayOpen-collapseOne">
                                Cetak QRCODE
                            </button>
                        </h2>
                        <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse "
                            aria-labelledby="panelsStayOpen-headingOne">
                            <div class="accordion-body">
                                <form action="{{ route('laporan.qrcode') }}" method="GET" target="_blank">

                                    <div class="form-group">
                                        <button type="submit" class="btn bg-gradient-info w-10">Cetak</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false"
                                aria-controls="panelsStayOpen-collapseTwo">
                                Cetak Jimpitan Kosong
                            </button>
                        </h2>
                        <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse"
                            aria-labelledby="panelsStayOpen-headingTwo">
                            <div class="accordion-body">
                                <form action="{{ route('laporan.kosong') }}" method="POST" target="_blank">
                                    @csrf
                                    <div class="row">
                                        <div class="col-2">
                                            <div class="form-group">

                                                <select name="tahun" class="form-control " id="tahun" required>
                                                    <option value="">Pilih Tahun</option>
                                                    @for ($i = date('Y'); $i >= date('Y') - 3; $i--)
                                                        <option value="{{ $i }}">{{ $i }}</option>
                                                    @endfor
                                                </select>
                                                @error('tahun') <div class="small text-danger">{{ message }}</div>
                                                @enderror
                                            </div>

                                        </div>
                                        <div class="col-2">
                                            <div class="form-group">
                                                @php
                                                    $bulan = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
                                                @endphp
                                                <select name="bulan" class="form-control " id="bulan" required>
                                                    <option value="">Pilih Bulan</option>
                                                    @for ($j = 0; $j < count($bulan); $j++)
                                                        <option value="{{ $j + 1 }}">{{ $bulan[$j] }}</option>
                                                    @endfor
                                                </select>
                                                @error('bulan') <div class="small text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <button type="submit" class="btn bg-gradient-info">Pdf</button>
                                            </div>

                                        </div>

                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                    {{-- <div class="accordion-item">
                        <h2 class="accordion-header" id="panelsStayOpen-headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false"
                                aria-controls="panelsStayOpen-collapseThree">
                                Accordion Item #3
                            </button>
                        </h2>
                        <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse"
                            aria-labelledby="panelsStayOpen-headingThree">
                            <div class="accordion-body">
                                <strong>This is the third item's accordion body.</strong> It is hidden by default, until the
                                collapse plugin adds the appropriate classes that we use to style each element. These
                                classes control the overall appearance, as well as the showing and hiding via CSS
                                transitions. You can modify any of this with custom CSS or overriding our default variables.
                                It's also worth noting that just about any HTML can go within the
                                <code>.accordion-body</code>, though the transition does limit overflow.
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>


    @include('layouts.footer')
