@extends('layouts.back.app')

@section('content')

<!-- START FORM -->



<form action='{{ url("admin/pelanggan") }}' method='post'>
    @csrf

    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <a href="{{ url("admin/pelanggan") }}" class="btn btn-secondary mb-3"><i
                class="nav-icon fas fa-angle-left"></i>
            KEMBALI</a>


        <div class="mb-3 row">
            <label for="nama_pelanggan" class="col-sm-2 col-form-label">Nama Pelanggan</label>
            <div class="col-sm-10">
                <input type="text" class="form-control @error('nama_pelanggan') is-invalid @enderror"
                    name='nama_pelanggan' value="{{ old('nama_pelanggan') }}" id="nama_pelanggan">
                @error('nama_pelanggan')
                <div class="invalid_feedback text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="mb-3 row">
            <label for="no_kwh" class="col-sm-2 col-form-label">Nomor KWH</label>
            <div class="col-sm-10">
                <input type="text" class="form-control @error('no_kwh') is-invalid @enderror" name='no_kwh'
                    value="{{ old('no_kwh') }}" id="no_kwh">
                @error('no_kwh')
                <div class="invalid_feedback text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="mb-3 row">
            <label for="inputState" class="col-sm-2 form-label">Daya</label>
            <div class="col-sm-10">
                <select id="inputState" class=" form-select @error('id_tarif') is-invalid @enderror" name="id_tarif"
                    value="{{ old('id_tarif') }}">
                    <option value="">Pilih...</option>
                    @foreach ($data as $item)
                    <option value="{{ $item->id_tarif }}">{{ $item->id_tarif }}</option>
                    @endforeach
                </select>
            </div>
            @error('id_tarif')
            <div class="invalid_feedback text-danger">
                {{ $message }}
            </div>
            @enderror
        </div>


        <div class="mb-3 row">
            <label for="telepon" class="col-sm-2 col-form-label">Telepon</label>
            <div class="col-sm-10">
                <input type="text" class="form-control @error('telepon') is-invalid @enderror" name='telepon'
                    value="{{ old('telepon') }}" id="telepon">
                @error('telepon')
                <div class="invalid_feedback text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>

        <div class="mb-3 row">
            <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
            <div class="col-sm-10">
                <textarea class="form-control @error('alamat') is-invalid @enderror" name='alamat'
                    value="{{ old('alamat') }}" id="alamat"></textarea>
                @error('alamat')
                <div class="invalid_feedback text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>


        <div class="mb-3 row">
            <label for="simpan" class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button>
            </div>
        </div>
    </div>
</form>

<!-- AKHIR FORM -->
@endsection