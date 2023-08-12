@extends('layouts.back.app')

@section('title', 'Edit Tagihan')
@section('content')

<!-- START FORM -->



<form action='{{ url("admin/tagihan/".$data->id_tagihan) }}' method='post'>
    @csrf
    @method('PUT')

    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <a href="{{ url("admin/tagihan") }}" class="btn btn-secondary mb-3"><i class="nav-icon fas fa-angle-left"></i>
            KEMBALI</a>


        <div class="mb-3 row">
            <label for="id_tagihan" class="col-sm-2 col-form-label">ID Tagihan</label>
            <div class="col-sm-10">
                <input type="text" class="form-control @error('id_penggunaan') is-invalid @enderror"
                    name='id_penggunaan' value="{{ $data->id_penggunaan }}" id="id_tagihan" readonly>

            </div>
        </div>
        <div class="mb-3 row">
            <label for="tahun" class="col-sm-2 col-form-label">Tahun</label>
            <div class="col-sm-10">
                <input type="number" class="form-control @error('tahun') is-invalid @enderror" name='tahun'
                    value="{{ $data->tahun }}" id="tahun">
                @error('tahun')
                <div class="invalid_feedback text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="mb-3 row">
            <label for="bulan" class="col-sm-2 col-form-label">Bulan</label>
            <div class="col-sm-10">
                <input type="text" class="form-control @error('bulan') is-invalid @enderror" name='bulan'
                    value="{{ $data->bulan }}" id="bulan">
                @error('bulan')
                <div class="invalid_feedback text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="mb-3 row">
            <label for="jumlah_meter" class="col-sm-2 col-form-label">Jumlah Pemakaian</label>
            <div class="col-sm-10">
                <input type="number" class="form-control @error('jumlah_meter') is-invalid @enderror"
                    name='jumlah_meter' value="{{ $data->jumlah_meter }}" id="jumlah_meter">
                @error('jumlah_meter')
                <div class="invalid_feedback text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="mb-3 row">
            <label for="inputState" class="col-sm-2 form-label">Status</label>
            <div class="col-sm-10">
                <select id="inputState" class=" form-select @error('status') is-invalid @enderror" name="status">
                    <option value="{{ $data->status }}">{{ $data->status }}
                    </option>
                    <option value="">Pilih...</option>
                    <option value="Lunas">Lunas
                    <option value="Menunggu Pembayaran">Menunggu Pembayaran
                    <option value="Menunggu Konfirmasi">Menunggu Konfirmasi
                    </option>


                </select>
            </div>
            @error('status')
            <div class="invalid_feedback text-danger">
                {{ $message }}
            </div>
            @enderror
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