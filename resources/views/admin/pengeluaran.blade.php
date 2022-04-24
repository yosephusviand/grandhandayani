@extends('layouts.lucid')

@section('content')
    <div class="block-header">
        <div class="row">
            <div class="col-lg-6 col-md-8 col-sm-12">
                <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i
                            class="fa fa-arrow-left"></i></a> Pengeluaran</h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="icon-home"></i></a>
                    </li>
                    <li class="breadcrumb-item active">Pengeluaran</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="row clearfix">
        <div class="col-lg-4 col-md-12">
            <div class="card">
                <div class="body">
                    <form action="{{ route('keuangan.storepengeluaran') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="">Tanggal Nota</label>
                            <input type="date" name="tanggal" class="form-control" id="tanggal" placeholder="Tuliskan "
                                value="" autocomplete="off" required>
                            @error('tanggal')
                                <div class="small text-danger">{{ message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="">Kegiatan</label>
                            <input type="text" name="kegiatan" class="form-control" id="kegiatan" placeholder="Tuliskan "
                                value="" autocomplete="off" required>
                            @error('kegiatan')
                                <div class="small text-danger">{{ message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Nominal</label>
                            <input type="number" name="nominal" class="form-control" id="nominal" placeholder="Tuliskan "
                                value="" autocomplete="off" required>
                            @error('nominal')
                                <div class="small text-danger">{{ message }}</div>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <div class="form-group">
                                        <input type="file" class="dropify " name="gambar[]"
                                            data-allowed-file-extensions="png jpg jpeg">
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <div class="form-group">
                                        <input type="file" class="dropify " name="gambar[]"
                                            data-allowed-file-extensions="png jpg jpeg">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <div class="form-group">
                                        <input type="file" class="dropify " name="gambar[]"
                                            data-allowed-file-extensions="png jpg jpeg">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <div class="form-group">
                                        <input type="file" class="dropify " name="gambar[]"
                                            data-allowed-file-extensions="png jpg jpeg">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <div class="form-group">
                                        <input type="file" class="dropify " name="gambar[]"
                                            data-allowed-file-extensions="png jpg jpeg">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <div class="form-group">
                                        <input type="file" class="dropify " name="gambar[]"
                                            data-allowed-file-extensions="png jpg jpeg">
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-8 col-md-12">
            <div class="card">
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-hover js-basic-example dataTable table-custom">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kegiatan</th>
                                    <th>Tanggal</th>
                                    <th>Bulan</th>
                                    <th>Tahun</th>
                                    <th>Gambar</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $i => $val)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $val->kegiatan }}</td>
                                        <td>{{ $val->tanggal }}</td>
                                        <td>{{ $val->bulan }}</td>
                                        <td>{{ $val->tahun }}</td>
                                        <td>
                                            <img src="{{ route('keuangan.foto', $val->id ?? '') }}" alt="" title=""
                                                width="100px">
                                        </td>
                                        <td>
                                            <a href="{{ route('keuangan.deletepengeluaran', $val->id) }}"
                                                class="btn btn-danger btn-sm"> Hapus</a>
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
@endsection
@include('layouts.lucidfooter')
