@extends('layouts.lucid')

@section('content')
    <div class="block-header">
        <div class="row">
            <div class="col-lg-6 col-md-8 col-sm-12">
                <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i
                            class="fa fa-arrow-left"></i></a> Ronda</h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="icon-home"></i></a>
                    </li>
                    <li class="breadcrumb-item active">Ronda</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="row clearfix">
        <div class="col-lg-4 col-md-12">
            <div class="card">
                <div class="body">
                    <form action="{{ route('rondaa.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="idedit" id="idedit" value="">
                        <div class="form-group">
                            <label for="">Warga</label>
                            <select name="warga" class="form-control select2" id="warga" required>
                                <option value="" disabled selected hidden>Pilih </option>
                                @foreach ($warga as $val)
                                    <option value="{{ $val->id }}">{{ $val->to_rumah->nama }}-{{ $val->norumah }}
                                        {{ $val->nama }}</option>
                                @endforeach
                            </select>
                            @error('warga')
                                <div class="small text-danger">{{ message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Hari</label>
                            <select name="hari" class="form-control select2" id="hari" required>
                                <option value="" disabled selected hidden>Pilih </option>
                                <option value="Senin">Senin</option>
                                <option value="Selasa">Selasa</option>
                                <option value="Rabu">Rabu</option>
                                <option value="Kamis">Kamis</option>
                                <option value="Jumat">Jumat</option>
                                <option value="Sabtu">Sabtu</option>
                                <option value="Minggu">Minggu</option>
                            </select>
                            @error('hari')
                                <div class="small text-danger">{{ message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-8 col-md-12">
            <div class="row">
                <div class="col-lg-6 col-md-12">
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
                                                        {{-- <button type="submit"
                                                                    class="btn btn-link text-dark text-gradient px-3 mb-0 editronda"
                                                                    data-id="{{ $val->id }}"><i
                                                                        class="fas fa-pencil-alt text-dark me-2"
                                                                        aria-hidden="true"></i></button> --}}
                                                        <a class="btn btn-danger btn-sm"
                                                            href="{{ route('rondaa.destroy', $val->id) }}">Hapus</i></a>
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
                <div class="col-lg-6 col-md-12">
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
                                                        {{-- <button type="submit"
                                                                    class="btn btn-link text-dark text-gradient px-3 mb-0 editronda"
                                                                    data-id="{{ $val->id }}"><i
                                                                        class="fas fa-pencil-alt text-dark me-2"
                                                                        aria-hidden="true"></i></button> --}}
                                                        <a class="btn btn-danger btn-sm"
                                                            href="{{ route('rondaa.destroy', $val->id) }}">Hapus</i></a>
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
                <div class="col-lg-6 col-md-12 ">
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
                                                        {{-- <button type="submit"
                                                                    class="btn btn-link text-dark text-gradient px-3 mb-0 editronda"
                                                                    data-id="{{ $val->id }}"><i
                                                                        class="fas fa-pencil-alt text-dark me-2"
                                                                        aria-hidden="true"></i></button> --}}
                                                        <a class="btn btn-danger btn-sm"
                                                            href="{{ route('rondaa.destroy', $val->id) }}">Hapus</i></a>
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
                <div class="col-lg-6 col-md-12 ">
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
                                                        {{-- <button type="submit"
                                                                    class="btn btn-link text-dark text-gradient px-3 mb-0 editronda"
                                                                    data-id="{{ $val->id }}"><i
                                                                        class="fas fa-pencil-alt text-dark me-2"
                                                                        aria-hidden="true"></i></button> --}}
                                                        <a class="btn btn-danger btn-sm"
                                                            href="{{ route('rondaa.destroy', $val->id) }}">Hapus</i></a>
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
                <div class="col-lg-6 col-md-12 ">
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
                                                        {{-- <button type="submit"
                                                                    class="btn btn-link text-dark text-gradient px-3 mb-0 editronda"
                                                                    data-id="{{ $val->id }}"><i
                                                                        class="fas fa-pencil-alt text-dark me-2"
                                                                        aria-hidden="true"></i></button> --}}
                                                        <a class="btn btn-danger btn-sm"
                                                            href="{{ route('rondaa.destroy', $val->id) }}">Hapus</i></a>
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
                <div class="col-lg-6 col-md-12 ">
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
                                                        {{-- <button type="submit"
                                                                    class="btn btn-link text-dark text-gradient px-3 mb-0 editronda"
                                                                    data-id="{{ $val->id }}"><i
                                                                        class="fas fa-pencil-alt text-dark me-2"
                                                                        aria-hidden="true"></i></button> --}}
                                                        <a class="btn btn-danger btn-sm"
                                                            href="{{ route('rondaa.destroy', $val->id) }}">Hapus</i></a>
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
                <div class="col-lg-6 col-md-12 ">
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
                                                        <a class="btn btn-danger btn-sm"
                                                            href="{{ route('rondaa.destroy', $val->id) }}">Hapus</i></a>
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
@endsection

@include('layouts.lucidfooter')
