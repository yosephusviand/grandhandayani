@extends('layouts.lucid')

@section('content')
    <div class="block-header">
        <div class="row">
            <div class="col-lg-6 col-md-8 col-sm-12">
                <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i
                            class="fa fa-arrow-left"></i></a> Profile</h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="icon-home"></i></a>
                    </li>
                    <li class="breadcrumb-item active">Profile</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="row clearfix">
        <div class="col-lg-4 col-md-12">
            <div class="card">
                <div class="body">
                    <form action="{{ route('profile.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="idedit" id="idedit" value="">
                        <div class="form-group wargaa">
                            <label for="">Warga</label>
                            <select name="warga" class="form-control select2" id="warga" required>
                                <option value="" disabled selected hidden>Pilih </option>
                                @foreach ($warga as $val)
                                    <option value="{{ $val->id }}">{{ $val->to_rumah->nama }}-{{ $val->norumah }}
                                        {{ $val->nama }}
                                    </option>
                                @endforeach
                            </select>
                            @error('warga')
                                <div class="small text-danger">{{ message }}</div>
                            @enderror
                        </div>
                        <div class="form-group role">
                            <label for="">Role</label>
                            <select name="account" class="form-control" id="account" required>
                                <option value="" disabled selected hidden>Pilih </option>
                                <option value="superadmin">Admin</option>
                                <option value="user">Pengguna</option>
                            </select>
                            @error('account')
                                <div class="small text-danger">{{ message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="email" name="email" class="form-control" id="email" placeholder="Tuliskan "
                                value="" autocomplete="off" required>
                            @error('email')
                                <div class="small text-danger">{{ message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="password" name="password" class="form-control" id="password"
                                placeholder="Tuliskan " value="" autocomplete="off" required>
                            @error('password')
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
                                    <th>Warga</th>
                                    <th>Email</th>
                                    <th>Rule</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $i => $val)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $val->name }}</td>
                                        <td>{{ $val->email }}</td>
                                        <td>{{ $val->account_role }}</td>
                                        <td>
                                            <button type="submit" class="btn btn-warning btn-sm editprofile"
                                                data-id="{{ $val->id }}">Edit</button>
                                            <a class="btn btn-danger btn-sm"
                                                href="{{ route('profile.delete', $val->id) }}">Hapus</a>
                                        </td>
                                    </tr>
                                @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).on('click', '.editprofile', function() {
            var id = $(this).data('id');

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: "{{ route('profile.edit') }}",
                method: "POST",
                data: {
                    id: id
                },
                success: function(data) {
                    $('.wargaa').hide();
                    // $('.role').hide();
                    $('[name="idedit"]').val(data.id);
                    $('[name="email"]').val(data.email);
                    $('[name="account"]').val(data.account_role);
                }
            });
        });
    </script>
@endsection
@include('layouts.lucidfooter')
