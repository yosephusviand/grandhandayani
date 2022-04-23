@extends('layouts.lucid')

@section('content')
    <div class="block-header">
        <div class="row">
            <div class="col-lg-6 col-md-8 col-sm-12">
                <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i
                            class="fa fa-arrow-left"></i></a> Warga</h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="icon-home"></i></a>
                    </li>
                    <li class="breadcrumb-item active">Warga</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="row clearfix">
        <div class="col-lg-4 col-md-12">
            <div class="card">
                <div class="body">
                    <form action="{{ route('warga.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="idedit" id="idedit" value="">
                        <div class="form-group">
                            <label for="">Blok</label>
                            <select name="block" class="form-control select2" id="block" required>
                                <option value="" disabled selected hidden>Pilih </option>
                                @foreach ($block as $blok)
                                    <option value="{{ $blok->id }}">{{ $blok->nama }}</option>
                                @endforeach
                            </select>
                            @error('blok')
                                <div class="small text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Status</label>
                            <select name="status" class="form-control" id="status" required>
                                <option value="" disabled selected hidden>Pilih </option>
                                <option value="1">Aktif</option>
                                <option value="2">Non Aktif</option>
                            </select>
                            @error('status')
                                <div class="small text-danger">{{ message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="">No. Rumah</label>
                            <input type="text" name="norumah" class="form-control" id="norumah" placeholder="Tuliskan "
                                value="" autocomplete="off" required>
                            @error('norumah')
                                <div class="small text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Nama</label>
                            <input type="text" name="nama" class="form-control" id="nama" placeholder="Tuliskan " value=""
                                autocomplete="off" required>
                            @error('nama')
                                <div class="small text-danger">{{ $message }}</div>
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
            <div class="card">
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-hover js-basic-example dataTable table-custom">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Block Rumah</th>
                                    <th>No Rumah</th>
                                    <th>Nama</th>
                                    <th>Status</th>
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
                                            @if ($val->status == 1)
                                                <span class="badge badge-warning">Aktif</span>
                                            @else
                                                <span class="badge badge-danger">Non Aktif</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="#defaultModal" class="btn btn-info btn-sm" data-toggle="modal"
                                                data-target="#modal{{ $val->id }}">
                                                Show
                                            </a>
                                            <button type="submit" class="btn btn-warning btn-sm editwarga"
                                                data-id="{{ $val->id }}">Edit</button>
                                            <a class="btn btn-danger btn-sm"
                                                href="{{ route('warga.destroy', $val->id) }}">Hapus</a>
                                        </td>
                                    </tr>
                                    <div class="modal fade" id="modal{{ $val->id }}" tabindex="-1" role="dialog">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="title" id="defaultModalLabel">QR Code</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form-group text-center">
                                                        {!! QrCode::size(300)->generate($val->id) !!}
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger"
                                                        data-dismiss="modal">CLOSE</button>
                                                    <a href="{{ route('pdf', $val->id) }}" target="_blank"
                                                        class="btn btn-primary">Download</a>
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
    </div>
    <script>
        $(document).on('click', '.editwarga', function() {
            var id = $(this).data('id');

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: "{{ route('warga.edit') }}",
                method: "POST",
                data: {
                    id: id
                },
                success: function(data) {

                    $('[name="idedit"]').val(data.id);
                    $('[name="nama"]').val(data.nama);
                    $('[name="block"]').val(data.block);
                    $('[name="norumah"]').val(data.norumah);
                }
            });
        });
    </script>
@endsection

@include('layouts.lucidfooter')
