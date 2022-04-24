@extends('layouts.lucid')

@section('content')
    <div class="block-header">
        <div class="row">
            <div class="col-lg-6 col-md-8 col-sm-12">
                <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i
                            class="fa fa-arrow-left"></i></a> Jimpitan Bulanan</h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="icon-home"></i></a>
                    </li>
                    <li class="breadcrumb-item active">Jimpitan Bulanan</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="row clearfix">
        <div class="col-lg-4 col-md-12">
            <div class="card">
                <div class="body">
                    <form action="{{ route('keuangan.storejimpitan') }}" method="POST">
                        @csrf
                        <input type="hidden" name="idedit" id="idedit" value="">
                        <div class="form-group">
                            <label for="">Bulan</label>
                            <select name="bulan" class="form-control" id="bulan" required>
                                <option value="" disabled selected hidden>Pilih </option>
                                <option value="1">Januari</option>
                                <option value="2">Februari</option>
                                <option value="3">Maret</option>
                                <option value="4">April</option>
                                <option value="5">Mei</option>
                                <option value="6">Juni</option>
                                <option value="7">Juli</option>
                                <option value="8">Agustus</option>
                                <option value="9">September</option>
                                <option value="10">Oktober</option>
                                <option value="11">November</option>
                                <option value="12">Desember</option>
                            </select>
                            @error('bulan')
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
                        <div class="form-group">
                            <label for="">Nominal</label>
                            <input type="number" name="nominal" class="form-control" id="nominal" placeholder="Tuliskan "
                                value="" autocomplete="off" required>
                            @error('nominal')
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
            <div class="card">
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-hover js-basic-example dataTable table-custom">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Rumah</th>
                                    <th>Nama</th>
                                    <th>Bulan</th>
                                    <th>Tahun</th>
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
                                        <td>{{ $val->bulan }}</td>
                                        <td>{{ $val->tahun }}</td>
                                        <td>{{ $val->nominal }}</td>
                                        <td>
                                            {{-- <button type="submit" class="btn btn-warning btn-sm editbulan"
                                                data-id="{{ $val->id }}">Edit</button> --}}
                                            <a class="btn btn-danger btn-sm"
                                                href="{{ route('keuangan.deletejimpitan', $val->id) }}">Hapus</a>
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
        $('#bulan').change(function() {
            var bulan = $(this).val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{ route('keuangan.bulanjimpitan') }}",
                method: "POST",
                data: {
                    bulan: bulan
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

        $(document).on('click', '.editbulan', function() {
            var id = $(this).data('id');

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: "{{ route('keuangan.bulanedit') }}",
                method: "POST",
                data: {
                    id: id
                },
                success: function(data) {
                    $('[name="idedit"]').val(data.id);
                    $('[name="warga"]').val(data.idwarga);
                    $('[name="bulan"]').val(data.bulan);
                    $('[name="nominal"]').val(data.nominal);
                }
            });
        });
    </script>
@endsection
@include('layouts.lucidfooter')
