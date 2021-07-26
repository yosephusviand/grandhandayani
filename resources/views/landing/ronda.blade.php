@include('layouts.landing')

@section('content')

    <section id="hero" class="hero d-flex align-items-center counts">

        <div class="container data-aos=" fade-up"">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="row">
                        <div class="col-lg-4 col-md-12 mt-4">
                            <div class="card">
                                <div class="card-body p-3">
                                    <h4>Senin</h4>
                                    <div class="table-responsive">
                                        <table class="table table-sm">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($data as $i => $val)
                                                    @if ($val->hari == 'Senin')

                                                        <tr>
                                                            <td>{{ ++$i }}</td>
                                                            <td>{{ $val->to_warga->nama }}</td>
                                                           
                                                        </tr>
                                                    @endif
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12 mt-4">
                            <div class="card">
                                <div class="card-body p-3">
                                    <h4>Selasa</h4>
                                    <div class="table-responsive">
                                        <table class="table table-sm">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($data as $i => $val)
                                                    @if ($val->hari == 'Selasa')

                                                        <tr>
                                                            <td>{{ ++$i }}</td>
                                                            <td>{{ $val->to_warga->nama }}</td>
                                                           
                                                        </tr>
                                                    @endif
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12 mt-4">
                            <div class="card">
                                <div class="card-body p-3">
                                    <h4>Rabu</h4>
                                    <div class="table-responsive">
                                        <table class="table table-sm">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($data as $i => $val)
                                                    @if ($val->hari == 'Rabu')

                                                        <tr>
                                                            <td>{{ ++$i }}</td>
                                                            <td>{{ $val->to_warga->nama }}</td>
                                                           
                                                        </tr>
                                                    @endif
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12 mt-4">
                            <div class="card">
                                <div class="card-body p-3">
                                    <h4>Kamis</h4>
                                    <div class="table-responsive">
                                        <table class="table table-sm">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($data as $i => $val)
                                                    @if ($val->hari == 'Kamis')

                                                        <tr>
                                                            <td>{{ ++$i }}</td>
                                                            <td>{{ $val->to_warga->nama }}</td>
                                                           
                                                        </tr>
                                                    @endif
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12 mt-4">
                            <div class="card">
                                <div class="card-body p-3">
                                    <h4>Jumat</h4>
                                    <div class="table-responsive">
                                        <table class="table table-sm">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($data as $i => $val)
                                                    @if ($val->hari == 'Jumat')

                                                        <tr>
                                                            <td>{{ ++$i }}</td>
                                                            <td>{{ $val->to_warga->nama }}</td>
                                                           
                                                        </tr>
                                                    @endif
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12 mt-4">
                            <div class="card">
                                <div class="card-body p-3">
                                    <h4>Sabtu</h4>
                                    <div class="table-responsive">
                                        <table class="table table-sm">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($data as $i => $val)
                                                    @if ($val->hari == 'Sabtu')

                                                        <tr>
                                                            <td>{{ ++$i }}</td>
                                                            <td>{{ $val->to_warga->nama }}</td>
                                                           
                                                        </tr>
                                                    @endif
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12 mt-4">
                            <div class="card">
                                <div class="card-body p-3">
                                    <h4>Minggu</h4>
                                    <div class="table-responsive">
                                        <table class="table table-sm">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($data as $i => $val)
                                                    @if ($val->hari == 'Minggu')

                                                        <tr>
                                                            <td>{{ ++$i }}</td>
                                                            <td>{{ $val->to_warga->nama }}</td>
                                                           
                                                        </tr>
                                                    @endif
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    </section>

    @include('layouts.landingfooter')
