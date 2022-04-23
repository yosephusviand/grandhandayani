@extends('layouts.lucid')

@section('content')
    <div class="block-header">
        <div class="row">
            <div class="col-lg-6 col-md-8 col-sm-12">
                <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i
                            class="fa fa-arrow-left"></i></a> Rumah</h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="icon-home"></i></a>
                    </li>
                    <li class="breadcrumb-item active">Rumah</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="row clearfix">
        <div class="col-lg-4 col-md-12">
            <div class="card">
                <div class="body">
                    <form action="{{ route('rumah.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="idedit" id="idedit" value="">
                        <div class="form-group">
                            <label for="">Nama Blok Rumah</label>
                            <input type="text" name="nama" class="form-control" id="nama" placeholder="Tuliskan " value=""
                                autocomplete="off">
                            @error('blok')
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
                        {{-- <table class="table table-sm table-bordered" id="rumah"> --}}
                        <table class="table table-hover js-basic-example dataTable table-custom">
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
                                            <button type="submit" class="btn btn-warning btn-sm editrumah"
                                                data-id="{{ $val->id }}">Edit</button>
                                            <a class="btn btn-danger btn-sm"
                                                href="{{ route('rumah.destroy', $val->id) }}">Hapus</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <script>
            $(document).on('click', '.editrumah', function() {
                var id = $(this).data('id');

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: "{{ route('rumah.edit') }}",
                    method: "POST",
                    data: {
                        id: id
                    },
                    success: function(data) {

                        $('[name="idedit"]').val(data.id);
                        $('[name="nama"]').val(data.nama);
                    }
                });
            });
        </script>
    @endsection

    @include('layouts.lucidfooter')
