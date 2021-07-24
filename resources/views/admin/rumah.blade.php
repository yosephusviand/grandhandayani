@include('layouts.template')

@section('content')

    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
        navbar-scroll="true">
        <div class="container-fluid py-1 px-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                    <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
                    <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Blok</li>
                </ol>
                <h6 class="font-weight-bolder mb-0">Blok</h6>
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
                    <form action="{{ route('rumah.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="idedit" id="idedit" value="">
                        <div class="form-group">
                            <label for="">Nama Block Rumah</label>
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
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $i => $val)

                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $val->nama }}</td>
                                        <td>
                                            <button type="submit"
                                                class="btn btn-link text-dark text-gradient px-3 mb-0 editrumah"
                                                data-id="{{ $val->id }}"><i class="fas fa-pencil-alt text-dark me-2"
                                                    aria-hidden="true"></i></button>
                                            <a class="btn btn-link text-danger text-gradient px-3 mb-0"
                                                href="{{ route('rumah.destroy', $val->id) }}"><i
                                                    class="far fa-trash-alt me-2"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('layouts.footer')
