@include('layouts.template')

@section('content')

    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
        navbar-scroll="true">
        <div class="container-fluid py-1 px-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                    <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
                    <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Warga</li>
                </ol>
                <h6 class="font-weight-bolder mb-0">Warga</h6>
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
                    <form action="{{ route('warga.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="idedit" id="idedit" value="">
                        <div class="form-group">
                            <label for="">Block</label>
                            <select name="block" class="form-control select2" id="block">
                                <option value="" disabled selected hidden>Pilih </option>
                                @foreach ($block as $blok)
                                    <option value="{{ $blok->id }}">{{ $blok->nama }}</option>
                                @endforeach
                            </select>
                            @error('block') <div class="small text-danger">{{ message }}</div> @enderror
                        </div>
                        <div class="form-group">
                            <label for="">No. Rumah</label>
                            <input type="number" name="norumah" class="form-control" id="norumah" placeholder="Tuliskan "
                                value="" min="0" autocomplete="off">
                            @error('norumah') <div class="small text-danger">{{ message }}</div> @enderror
                        </div>

                        <div class="form-group">
                            <label for="">Nama</label>
                            <input type="text" name="nama" class="form-control" id="nama" placeholder="Tuliskan " value=""
                                autocomplete="off">
                            @error('nama') <div class="small text-danger">{{ message }}</div> @enderror
                        </div>


                        <div class="form-group">
                            <button type="submit" class="btn bg-gradient-info w-100 mt-4 mb-0">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-8 col-md-12 mt-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="table-responsive">
                        <table class="table table-sm" id="rumah">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Block Rumah</th>
                                    <th>No Rumah</th>
                                    <th>Nama</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($warga as $i => $val)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $val->to_rumah->nama }}</td>
                                        <td>{{ $val->norumah }}</td>
                                        <td>{{ $val->nama }}</td>
                                        <td>
                                            <button type="button" class="btn btn-link text-dark text-gradient px-3 mb-0" data-bs-toggle="modal" data-bs-target="#modal{{ $val->id }}">
                                                <i class="fas fa-eye text-dark me-2"
                                                    aria-hidden="true"></i>
                                            </button>
                                            <button type="submit"
                                                class="btn btn-link text-dark text-gradient px-3 mb-0 editwarga"
                                                data-id="{{ $val->id }}"><i class="fas fa-pencil-alt text-dark me-2"
                                                    aria-hidden="true"></i></button>
                                            <a class="btn btn-link text-danger text-gradient px-3 mb-0"
                                                href="{{ route('warga.destroy', $val->id) }}"><i
                                                    class="far fa-trash-alt me-2"></i></a>
                                        </td>
                                    </tr>
                                    <div class="modal fade" id="modal{{ $val->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">QR Code</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form-group text-center">
                                                        @php
                                                            $link = '{{ url("/api/jimpitan", ["warga" => $val->id]) }}';

                                                        @endphp
                                                        {!! QrCode::size(200)->generate('http://ghr.mervia.my.id/api/jimpitan/'.$val->id.'') !!}
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <a href="{{ route('pdf', $val->id) }}" class="btn btn-primary">Download</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    @include('layouts.footer')
