@include('layouts.template')

@section('content')

    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
        navbar-scroll="true">
        <div class="container-fluid py-1 px-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                    <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
                    <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Ronda</li>
                </ol>
                <h6 class="font-weight-bolder mb-0">Ronda</h6>
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
        <div class="col-lg-4 col-md-12 mt-4">
            <div class="card">
                <div class="card-body p-3">
                    <form action="{{ route('rondaa.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="idedit" id="idedit" value="">
                        <div class="form-group">
                            <label for="">Warga</label>
                            <select name="warga" class="form-control select2" id="warga">
                                <option value="" disabled selected hidden>Pilih </option>
                                @foreach ($warga as $val)
                                    <option value="{{ $val->id }}">{{ $val->to_rumah->nama }}-{{ $val->norumah }}
                                        {{ $val->nama }}</option>
                                @endforeach
                            </select>
                            @error('warga') <div class="small text-danger">{{ message }}</div> @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Hari</label>
                            <select name="hari" class="form-control select2" id="hari">
                                <option value="" disabled selected hidden>Pilih </option>
                                <option value="Senin">Senin</option>
                                <option value="Selasa">Selasa</option>
                                <option value="Rabu">Rabu</option>
                                <option value="Kamis">Kamis</option>
                                <option value="Jumat">Jumat</option>
                                <option value="Sabtu">Sabtu</option>
                                <option value="Minggu">Minggu</option>
                            </select>
                            @error('hari') <div class="small text-danger">{{ message }}</div> @enderror
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn bg-gradient-info w-100 mt-4 mb-0">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-8 col-md-12">
            <div class="row">
                <div class="col-lg-6 col-md-12 mt-4">
                    <div class="card">
                        <div class="card-body p-3">
                            <h4>Senin</h4>
                            <div class="table-responsive">
                                <table class="table table-sm">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Warga</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $i => $val)
                                            @if ($val->hari == 'Senin')

                                                <tr>
                                                    <td>{{ ++$i }}</td>
                                                    <td>{{ $val->to_warga->nama }}</td>
                                                    <td>
                                                        <button type="submit"
                                                            class="btn btn-link text-dark text-gradient px-3 mb-0 editronda"
                                                            data-id="{{ $val->id }}"><i
                                                                class="fas fa-pencil-alt text-dark me-2"
                                                                aria-hidden="true"></i></button>
                                                        <a class="btn btn-link text-danger text-gradient px-3 mb-0"
                                                            href="{{ route('rumah.destroy', $val->id) }}"><i
                                                                class="far fa-trash-alt me-2"></i></a>
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 mt-4">
                    <div class="card">
                        <div class="card-body p-3">
                            <h4>Selasa</h4>
                            <div class="table-responsive">
                                <table class="table table-sm">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Warga</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $i => $val)
                                            @if ($val->hari == 'Selasa')

                                                <tr>
                                                    <td>{{ ++$i }}</td>
                                                    <td>{{ $val->to_warga->nama }}</td>
                                                    <td>
                                                        <button type="submit"
                                                            class="btn btn-link text-dark text-gradient px-3 mb-0 editronda"
                                                            data-id="{{ $val->id }}"><i
                                                                class="fas fa-pencil-alt text-dark me-2"
                                                                aria-hidden="true"></i></button>
                                                        <a class="btn btn-link text-danger text-gradient px-3 mb-0"
                                                            href="{{ route('rumah.destroy', $val->id) }}"><i
                                                                class="far fa-trash-alt me-2"></i></a>
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 mt-4">
                    <div class="card">
                        <div class="card-body p-3">
                            <h4>Rabu</h4>
                            <div class="table-responsive">
                                <table class="table table-sm">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Warga</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $i => $val)
                                            @if ($val->hari == 'Rabu')

                                                <tr>
                                                    <td>{{ ++$i }}</td>
                                                    <td>{{ $val->to_warga->nama }}</td>
                                                    <td>
                                                        <button type="submit"
                                                            class="btn btn-link text-dark text-gradient px-3 mb-0 editronda"
                                                            data-id="{{ $val->id }}"><i
                                                                class="fas fa-pencil-alt text-dark me-2"
                                                                aria-hidden="true"></i></button>
                                                        <a class="btn btn-link text-danger text-gradient px-3 mb-0"
                                                            href="{{ route('rumah.destroy', $val->id) }}"><i
                                                                class="far fa-trash-alt me-2"></i></a>
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 mt-4">
                    <div class="card">
                        <div class="card-body p-3">
                            <h4>Kamis</h4>
                            <div class="table-responsive">
                                <table class="table table-sm">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Warga</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $i => $val)
                                            @if ($val->hari == 'Kamis')

                                                <tr>
                                                    <td>{{ ++$i }}</td>
                                                    <td>{{ $val->to_warga->nama }}</td>
                                                    <td>
                                                        <button type="submit"
                                                            class="btn btn-link text-dark text-gradient px-3 mb-0 editronda"
                                                            data-id="{{ $val->id }}"><i
                                                                class="fas fa-pencil-alt text-dark me-2"
                                                                aria-hidden="true"></i></button>
                                                        <a class="btn btn-link text-danger text-gradient px-3 mb-0"
                                                            href="{{ route('rumah.destroy', $val->id) }}"><i
                                                                class="far fa-trash-alt me-2"></i></a>
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 mt-4">
                    <div class="card">
                        <div class="card-body p-3">
                            <h4>Jumat</h4>
                            <div class="table-responsive">
                                <table class="table table-sm">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Warga</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $i => $val)
                                            @if ($val->hari == 'Jumat')

                                                <tr>
                                                    <td>{{ ++$i }}</td>
                                                    <td>{{ $val->to_warga->nama }}</td>
                                                    <td>
                                                        <button type="submit"
                                                            class="btn btn-link text-dark text-gradient px-3 mb-0 editronda"
                                                            data-id="{{ $val->id }}"><i
                                                                class="fas fa-pencil-alt text-dark me-2"
                                                                aria-hidden="true"></i></button>
                                                        <a class="btn btn-link text-danger text-gradient px-3 mb-0"
                                                            href="{{ route('rumah.destroy', $val->id) }}"><i
                                                                class="far fa-trash-alt me-2"></i></a>
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 mt-4">
                    <div class="card">
                        <div class="card-body p-3">
                            <h4>Sabtu</h4>
                            <div class="table-responsive">
                                <table class="table table-sm">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Warga</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $i => $val)
                                            @if ($val->hari == 'Sabtu')

                                                <tr>
                                                    <td>{{ ++$i }}</td>
                                                    <td>{{ $val->to_warga->nama }}</td>
                                                    <td>
                                                        <button type="submit"
                                                            class="btn btn-link text-dark text-gradient px-3 mb-0 editronda"
                                                            data-id="{{ $val->id }}"><i
                                                                class="fas fa-pencil-alt text-dark me-2"
                                                                aria-hidden="true"></i></button>
                                                        <a class="btn btn-link text-danger text-gradient px-3 mb-0"
                                                            href="{{ route('rumah.destroy', $val->id) }}"><i
                                                                class="far fa-trash-alt me-2"></i></a>
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 mt-4">
                    <div class="card">
                        <div class="card-body p-3">
                            <h4>Minggu</h4>
                            <div class="table-responsive">
                                <table class="table table-sm">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Warga</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $i => $val)
                                            @if ($val->hari == 'Minggu')

                                                <tr>
                                                    <td>{{ ++$i }}</td>
                                                    <td>{{ $val->to_warga->nama }}</td>
                                                    <td>
                                                        <button type="submit"
                                                            class="btn btn-link text-dark text-gradient px-3 mb-0 editronda"
                                                            data-id="{{ $val->id }}"><i
                                                                class="fas fa-pencil-alt text-dark me-2"
                                                                aria-hidden="true"></i></button>
                                                        <a class="btn btn-link text-danger text-gradient px-3 mb-0"
                                                            href="{{ route('rumah.destroy', $val->id) }}"><i
                                                                class="far fa-trash-alt me-2"></i></a>
                                                    </td>
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
    </div>

    @include('layouts.footer')
