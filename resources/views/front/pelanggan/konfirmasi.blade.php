@extends('layouts.front.app')

@section('title', 'Konfirmasi Pembayaran')
@section('content')

<!-- START FORM -->
<div class="row px-5 py-5 ">
    <div class="card">
        <div class="card-header bg-success mb-3">
            <h5 class="card-title">Konfirmasi Pembayaran</h5>
        </div>

        <form action="{{ url('/store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id_pelanggan" value="{{ $data->id_pelanggan }}">
            <input type="hidden" name="status" value="Menunggu Konfirmasi">

            <div class="mb-3 row">
                <label for="id_tagihan" class="col-sm-2 col-form-label">Nomor Tagihan</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control @error('id_tagihan') is-invalid @enderror" name='id_tagihan'
                        value="{{ $data->id_tagihan }}" id="id_tagihan" readonly>
                    @error('id_tagihan')
                    <div class="invalid_feedback text-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
            <div class="mb-3 row">

                <label for="bulan_bayar" class="col-sm-2 col-form-label">Tagihan Bulan</label>
                <div class="col-sm-2 d-flex ">
                    <input type="text" class=" form-control" name='bulan_bayar' value="{{ $data->bulan }}" readonly>
                    <label for="#" class="col-form-label ml-5">{{
                        $data->tahun
                        }}</label>

                </div>
            </div>
            <div class="mb-3 row">
                <label for="tanggal_pembayaran" class="col-sm-2 col-form-label">Tanggal Bayar</label>
                <div class="col-sm-8">
                    <input type="date" class="form-control @error('tanggal_pembayaran') is-invalid @enderror"
                        name='tanggal_pembayaran' value="{{ old('tanggal_pembayaran') }}" id="tanggal_pembayaran">
                    @error('tanggal_pembayaran')
                    <div class="invalid_feedback text-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
            <div class="mb-3 row">
                <label for="biaya_admin" class="col-sm-2 col-form-label">Biaya Admin</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control @error('biaya_admin') is-invalid @enderror"
                        name='biaya_admin' required value=" 2500 " id="biaya_admin" readonly>
                    @error('biaya_admin')
                    <div class="invalid_feedback text-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
            <div class="mb-3 row">
                <label for="total_bayar" class="col-sm-2 col-form-label">Jumlah Tagihan</label>
                <div class="col-sm-8">
                    <input type="number" class="form-control @error('total_bayar') is-invalid @enderror"
                        name='total_bayar'
                        value="{{  $data->jumlah_meter * $data->pelanggan->tarif->tarifperkwh + 2500}}" id="total_bayar"
                        readonly>
                    @error('total_bayar')
                    <div class="invalid_feedback text-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>


            <div class="mb-3 row">
                <label for="bukti" class="col-sm-2 col-form-label">Bukti Pembayaran</label>
                <div class="col-sm-8">
                    <input type="file" class="form-control @error('bukti') is-invalid @enderror" name='bukti'
                        value="{{ old('bukti')}}" id="bukti">
                    @error('bukti')
                    <div class="invalid_feedback text-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>


            <div class="card-footer text-end">
                <a href="{{ url("/") }}" class="btn btn-secondary"><i class="nav-icon fas fa-angle-left"></i>
                    KEMBALI</a>
                <button type="submit" class="btn btn-success fw-bold" name="submit">Submit</button>
            </div>
        </form>
    </div>
</div>

<!-- AKHIR FORM -->
@endsection