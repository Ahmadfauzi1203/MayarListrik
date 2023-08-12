@extends('layouts.back.app')

@section('title', 'Edit Penggunaan')
@section('content')

<!-- START FORM -->



<form action='{{ url("admin/penggunaan/".$data->id_penggunaan) }}' method='post'>
    @csrf
    @method('PUT')

    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <a href="{{ url("admin/penggunaan") }}" class="btn btn-secondary mb-3"><i
                class="nav-icon fas fa-angle-left"></i>
            KEMBALI</a>


        <input type="hidden" name="id_pelanggan" value="{{ $data->id_pelanggan }}">
        <div class="mb-3 row">
            <label for="bulan" class="col-sm-2 col-form-label">Bulan</label>
            <div class="col-sm-10">
                <input type="text" class="form-control @error('bulan') is-invalid @enderror" name='bulan'
                    value="{{$data->bulan }}" id="bulan">
                @error('bulan')
                <div class="invalid_feedback text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="mb-3 row">
            <label for="tahun" class="col-sm-2 col-form-label">tahun</label>
            <div class="col-sm-10">
                <input type="number" class="form-control @error('tahun') is-invalid @enderror" name='tahun'
                    value="{{$data->tahun }}" id="tahun">
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
                <input type="text" class="form-control @error('meter_awal') is-invalid @enderror" name='meter_awal'
                    value="{{ $data->meter_awal }}" id="meter_awal">
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
                <input type="text" class="form-control @error('meter_akhir') is-invalid @enderror" name='meter_akhir'
                    value="{{ $data->meter_akhir }}" id="meter_akhir">
                @error('meter_akhir')
                <div class="invalid_feedback text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="mb-3 row">
            <label for="petugas" class="col-sm-2 col-form-label">Petugas</label>
            <div class="col-sm-10">
                <input type="text" class="form-control @error('petugas') is-invalid @enderror" name='petugas'
                    value="{{ $data->petugas }}" id="petugas">
                @error('petugas')
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