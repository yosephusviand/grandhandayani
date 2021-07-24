@include('layouts.landing')

@section('content')

    <section id="hero" class="hero d-flex align-items-center counts">

        <div class="container data-aos=" fade-up"">
            <div class="row">
                <div class="card-body p-3">
                    <form action="{{ route('ronda.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="">Tanggal</label>
                            <input type="date" name="tanggal" class="form-control" id="tanggal" placeholder="Tuliskan "
                                value="{{ $tanggal }}" autocomplete="off">
                            @error('tanggal') <div class="small text-danger">{{ message }}</div> @enderror
                        </div>

                        <div class="form-group mt-4">
                            <label for="">Warga</label>
                            <select name="warga" class="form-control select2" id="warga">
                                <option value="" disabled selected hidden>Pilih </option>
                                @foreach ($warga as $blok)
                                    <option value="{{ $blok->id }}">{{ $blok->to_rumah->nama }}-{{ $blok->norumah }}
                                        {{ $blok->nama }}</option>
                                @endforeach
                            </select>
                            @error('warga') <div class="small text-danger">{{ message }}</div> @enderror
                        </div>


                        <div class="postnominal"></div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary w-100 mt-4 mb-0">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    @include('layouts.landingfooter')
