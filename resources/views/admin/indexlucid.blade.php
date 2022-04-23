@extends('layouts.lucid')

@section('content')
    <div class="block-header">
        <div class="row">
            <div class="col-lg-6 col-md-8 col-sm-12">
                <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i
                            class="fa fa-arrow-left"></i></a> Dashboard</h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="icon-home"></i></a>
                    </li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ul>
            </div>
        </div>
    </div>

    @php
    $bln = date('m');
    $bulan = '';
    if ($bln == 1) {
        $bulan = 'Januari';
    } elseif ($bln == 2) {
        $bulan = 'Februari';
    } elseif ($bln == 3) {
        $bulan = 'Maret';
    } elseif ($bln == 4) {
        $bulan = 'April';
    } elseif ($bln == 5) {
        $bulan = 'Mei';
    } elseif ($bln == 6) {
        $bulan = 'Juni';
    } elseif ($bln == 7) {
        $bulan = 'Juli';
    } elseif ($bln == 8) {
        $bulan = 'Agustus';
    } elseif ($bln == 9) {
        $bulan = 'September';
    } elseif ($bln == 10) {
        $bulan = 'Oktober';
    } elseif ($bln == 11) {
        $bulan = 'November';
    } elseif ($bln == 12) {
        $bulan = 'Desember';
    }
    @endphp

    <div class="row clearfix">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="body">
                    <div class="row clearfix">
                        <div class="col-lg-3 col-md-12">
                            <div class="body bg-success text-light">
                                <h4><i class="icon-wallet"></i> Rp.
                                    {{ number_format(Jimpitan::sumhari(), 0, ',', '.') }}</h4>
                                <span>Pemasukan Tanggal {{ date('d-m-Y') }}</span>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-12">
                            <div class="body bg-warning text-light">
                                <h4><i class="icon-wallet"></i> Rp.
                                    {{ number_format(Jimpitan::sumbulan(), 0, ',', '.') }}</h4>
                                <span>Pemasukan Bulan {{ $bulan }}</span>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-12">
                            <div class="body bg-danger text-light">
                                <h4><i class="icon-wallet"></i> Rp.
                                    {{ number_format(Jimpitan::sumtahun(), 0, ',', '.') }} </h4>
                                <span>Pemasukan Tahun {{ date('Y') }}</span>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-12">
                            <div class="body bg-info text-light">
                                <h4><i class="icon-wallet"></i> Rp.
                                    {{ number_format(Jimpitan::sumtotal(), 0, ',', '.') }}</h4>
                                <span>Total Pemasukan</span>
                            </div>
                        </div>
                    </div>
                    </br>
                    <div class="row clearfix">
                        <div class="col-lg-3 col-md-12">
                            <div class="body bg-success text-light">
                                <h4><i class="icon-wallet"></i> 0 </h4>
                                <span>Pengeluaran Bulan {{ $bulan }}</span>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-12">
                            <div class="body bg-warning text-light">
                                <h4><i class="icon-wallet"></i> 0 </h4>
                                <span>Pengeluaran Tahun {{ date('Y') }}</span>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-12">
                            <div class="body bg-danger text-light">
                                <h4><i class="icon-wallet"></i> 0</h4>
                                <span>Total Pengeluaran</span>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-12">
                            <div class="body bg-info text-light">
                                <h4><i class="icon-wallet"></i> {{ Warga::count() }} </h4>
                                <span>Total Warga</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row clearfix">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="body">
                    <div class="form-group">
                        <h3>Harian</h3>
                    </div>
                    <div id="harian" class="ct-chart m-t-20"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="row clearfix">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="body">
                    <div class="form-group">
                        <h3>Bulanan</h3>
                    </div>
                    <div id="bulan" class="ct-chart m-t-20"></div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: "{{ route('jimpitan.chart') }}",
            method: "POST",
            dataType: "JSON",
            success: function(data) {
                var tanggal = [];
                var nominal = [];
                for (var i in data) {
                    tanggal.push(data[i].tanggal);
                    nominal.push(data[i].sumnom);
                }
                var options;
                var datas = {
                    labels: tanggal,
                    series: [nominal],
                    borderColor: "#fff",
                };

                options = {
                    height: "354px",
                    showPoint: true,
                    axisX: {
                        showGrid: false
                    },
                    axisY: {
                        labelInterpolationFnc: function(value) {
                            return (value / 1000) + 'K';
                        }
                    },
                    lineSmooth: true,
                    plugins: [
                        Chartist.plugins.tooltip({
                            appendToBody: true
                        }),
                    ]
                };
                new Chartist.Bar('#harian', datas, options)
            }
        });

        $.ajax({
            url: "{{ route('jimpitan.chartbulan') }}",
            method: "POST",
            dataType: "JSON",
            success: function(data) {

                var bulan = [];
                var nominal = [];
                var bln = [];
                for (var i in data) {
                    // bulan.push(data[i].bulan);
                    nominal.push(data[i].sumnom);

                    if (data[i].bulan == 1) {
                        bln = ['Januari'];
                        bulan.push(bln);
                    } else if (data[i].bulan == 2) {
                        bln = ['Februari'];
                        bulan.push(bln);
                    } else if (data[i].bulan == 3) {
                        bln = ['Maret'];
                        bulan.push(bln);
                    } else if (data[i].bulan == 4) {
                        bln = ['April'];
                        bulan.push(bln);
                    } else if (data[i].bulan == 5) {
                        bln = ['Mei'];
                        bulan.push(bln);
                    } else if (data[i].bulan == 6) {
                        bln = ['Juni'];
                        bulan.push(bln);
                    } else if (data[i].bulan == 7) {
                        bln = ['Juli'];
                        bulan.push(bln);
                    } else if (data[i].bulan == 8) {
                        bln = ['Agustus'];
                        bulan.push(bln);
                    } else if (data[i].bulan == 9) {
                        bln = ['September'];
                        bulan.push(bln);
                    } else if (data[i].bulan == 10) {
                        bln = ['Oktober'];
                        bulan.push(bln);
                    } else if (data[i].bulan == 11) {
                        bln = ['November'];
                        bulan.push(bln);
                    } else if (data[i].bulan == 12) {
                        bln = ['Desember'];
                        bulan.push(bln);
                    }
                }

                var options;
                var datas = {
                    labels: bulan,
                    series: [nominal],
                    borderColor: "#fff",
                };

                options = {
                    height: "354px",
                    showPoint: true,
                    axisX: {
                        showGrid: false
                    },
                    axisY: {
                        labelInterpolationFnc: function(value) {
                            return (value / 1000) + 'K';
                        }
                    },
                    lineSmooth: true,
                    plugins: [
                        Chartist.plugins.tooltip({
                            appendToBody: true
                        }),
                    ]
                };
                new Chartist.Line('#bulan', datas, options)
            }
        });
    </script>
@endsection


@include('layouts.lucidfooter')
