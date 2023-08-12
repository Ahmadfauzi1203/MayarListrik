@extends('layouts.back.app')

@section('title', 'Input Penggunaan')
@section('content')

<!-- START FORM -->


<form action='{{ url("admin/penggunaan") }}' method='post'>
    @csrf

    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <a href="{{ url("admin/penggunaan") }}" class="btn btn-secondary mb-3"><i
                class="nav-icon fas fa-angle-left"></i>
            KEMBALI</a>


        <div class="mb-3 row">
            <label for="inputState" class="col-sm-2 form-label">Nomor Pelanggan/Meter</label>
            <div class="col-sm-10">
                <select id="inputState" class="form-select @error('id_pelanggan') is-invalid @enderror"
                    name="id_pelanggan" value="{{ old('id_pelanggan') }}">
                    <option value="">Pilih...</option>
                    @foreach ($data as $item)
                    <option value="{{ $item->id_pelanggan }}">{{ $item->nomor_kwh }} / {{ $item->nama_pelanggan }}
                    </option>

                    @endforeach
                </select>
                @error('id_pelanggan')
                <div class="invalid_feedback text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>

        <div class="row mb-3 ">
            <label for="inputState" class="col-sm-2 form-label">Bulan</label>
            <div class="col-sm-10">
                <select id="inputState" class="form-select @error('bulan') is-invalid @enderror" name="bulan"
                    value="{{ old('bulan') }}">
                    <option value="">Pilih...</option>
                    <option value="Januari">Januari</option>
                    <option value="Febuari">Febuari</option>
                    <option value="Maret">Maret</option>
                    <option value="April">April</option>
                    <option value="Mei">Mei</option>
                    <option value="Juni">Juni</option>
                    <option value="Juli">Juli</option>
                    <option value="Agustus">Agustus</option>
                    <option value="September">September</option>
                    <option value="Oktober">Oktober</option>
                    <option value="November">November</option>
                    <option value="Desember">Desember</option>
                </select>
                @error('bulan')
                <div class="invalid_feedback text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>

        <div class="mb-3 row">
            <label for="tahun" class="col-sm-2 form-label">Tahun</label>
            <div class="col-sm-10">
                <input type="number" class="form-control @error('tahun') is-invalid @enderror" name='tahun'
                    value="{{ old('tahun') }}" id="tahun">
                @error('tahun')
                <div class="invalid_feedback text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>



        <div class="mb-3 row">
            <label for="meter_awal" class="col-sm-2 col-form-label">Meter Awal</label>
            <div class="col-sm-10">
                <input type="number" class="form-control @error('meter_awal') is-invalid @enderror" name='meter_awal'
                    value="{{ old('meter_awal') }}" id="meter_awal">
                @error('meter_awal')
                <div class="invalid_feedback text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="mb-3 row">
            <label for="meter_akhir" class="col-sm-2 col-form-label">Meter Akhir</label>
            <div class="col-sm-10">
                <input type="number" class="form-control @error('meter_akhir') is-invalid @enderror" name='meter_akhir'
                    value="{{ old('meter_akhir') }}" id="meter_akhir">
                @error('meter_akhir')
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