@extends('layouts.back.app')

@section('title','Input Tagihan')
@section('content')

<div class="container-fluid">


    <form action="{{ url('admin/tagihan') }}" method="POST">
        @csrf
        <div class="my-3 p-3 bg-body rounded shadow-sm">
            <a href="{{ url("admin/tagihan") }}" class="btn btn-secondary mb-3"><i
                    class="nav-icon fas fa-angle-left"></i>
                KEMBALI</a>

            <input type="hidden" name="id_pelanggan" value="{{ $data->id_pelanggan }}">
            <div class="mb-3 row">
                <label for="id_penggunaan" class="col-sm-2 col-form-label">ID Penggunaan</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control @error('id_penggunaan') is-invalid @enderror"
                        name='id_penggunaan' value="{{ $data->id_penggunaan }}" id="id_penggunaan" readonly>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="bulan" class="col-sm-2 col-form-label">Bulan Tagihan</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control @error('bulan') is-invalid @enderror" name='bulan'
                        value="{{ $data->bulan }}" id="bulan" readonly>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="tahun" class="col-sm-2 col-form-label">Tahun Tagihan</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control @error('tahun') is-invalid @enderror" name='tahun'
                        value="{{ $data->tahun }}" id="tahun" readonly>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="jumlah_meter" class="col-sm-2 col-form-label">Jumlah Meteran</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control @error('jumlah_meter') is-invalid @enderror"
                        name='jumlah_meter' value="{{ $data->meter_akhir - $data->meter_awal}}" id="jumlah_meter"
                        readonly>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="simpan" class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button>
                </div>
            </div>
    </form>
</div>




@endsection