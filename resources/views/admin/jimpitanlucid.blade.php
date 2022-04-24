@extends('layouts.lucid')

@section('content')
    <div class="block-header">
        <div class="row">
            <div class="col-lg-6 col-md-8 col-sm-12">
                <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i
                            class="fa fa-arrow-left"></i></a> Jimpitan</h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="icon-home"></i></a>
                    </li>
                    <li class="breadcrumb-item active">Jimpitan</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="body">
                    <div class="row clearfix">
                        <div class="col-lg-6 col-md-12">
                            <div class="body bg-success text-light">
                                <h4><i class="icon-wallet"></i> Rp.
                                    {{ number_format(Jimpitan::sumhari(), 0, ',', '.') }}
                                </h4>
                                <span>Pemasukan Tanggal {{ date('d-m-Y') }}</span>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="body bg-warning text-light">
                                <h4><i class="icon-wallet"></i> Rp.
                                    {{ number_format(Jimpitan::sumbulan(), 0, ',', '.') }}
                                </h4>
                                <span>Pemasukan Bulan Ini </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row clearfix">
        <div class="col-lg-4 col-md-12">
            <div class="card">
                <div class="body">
                    <form action="{{ route('jimpitan.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="idedit" id="idedit" value="">
                        <div class="form-group">
                            @csrf
                            <label for="">Tanggal</label>
                            <input type="date" name="tanggal" class="form-control" id="tanggal" placeholder="Tuliskan "
                                value="{{ $tanggal }}" autocomplete="off" required>
                            @error('tanggal')
                                <div class="small text-danger">{{ message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="">Warga</label>
                            <select name="warga" class="form-control select2" id="warga" required>
                                <option value="" disabled selected hidden>Pilih </option>
                                @foreach ($warga as $blok)
                                    <option value="{{ $blok->id }}">{{ $blok->to_rumah->nama }}-{{ $blok->norumah }}
                                        {{ $blok->nama }}</option>
                                @endforeach
                            </select>
                            @error('warga')
                                <div class="small text-danger">{{ message }}</div>
                            @enderror
                        </div>
                        <div class="postnominal"></div>
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
                                    <th>Rumah</th>
                                    <th>Nama</th>
                                    <th>Tanggal</th>
                                    <th>Nominal</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($jimpitan as $i => $val)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $val->to_warga->to_rumah->nama ?? '' }} -
                                            {{ $val->to_warga->norumah ?? '' }}</td>
                                        <td>{{ $val->to_warga->nama ?? '' }}</td>
                                        <td>{{ $val->tanggal }}</td>
                                        <td>{{ $val->nominal }}</td>
                                        <td>
                                            {{-- <button type="submit" class="btn btn-warning btn-sm editjimpitan"
                                                data-id="{{ $val->id }}">Edit</button> --}}
                                            <a class="btn btn-danger btn-sm"
                                                href="{{ route('jimpitan.destroy', $val->id) }}">Hapus</a>
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
    <script>
        $('#tanggal').change(function() {
            var tanggal = $(this).val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{ route('jimpitan.tgljimpitan') }}",
                method: "POST",
                data: {
                    tanggal: tanggal
                },
                async: true,
                dataType: 'json',
                success: function(data) {

                    var html = '';
                    var i;
                    html = '<option value="" disabled selected hidden>Pilih </option>';
                    for (i = 0; i < data.length; i++) {
                        html += '<option value=' + data[i].id + '>' + data[i].nama +
                            '</option>';
                    }
                    $('#warga').html(html);
                }
            });
            return false;
        });

        $(document).on('click', '.editjimpitan', function() {
            var id = $(this).data('id');

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: "{{ route('jimpitan.edit') }}",
                method: "POST",
                data: {
                    id: id
                },
                success: function(data) {
                    var konten = $('.postnominal');
                    konten.empty();
                    $('[name="idedit"]').val(data.id);
                    $('[name="warga"]').val(data.warga);
                    $('[name="tanggal"]').val(data.tanggal);
                    konten.append('<div class="form-group">' +
                        '<label for="" >Nominal</label>' +
                        '<input type="text" name="nominal" class="form-control" id="nominal" value="' +
                        data.nominal +
                        '" placeholder="Nominal" >' +
                        '</div>');
                }
            });
        });
    </script>
@endsection

@include('layouts.lucidfooter')
