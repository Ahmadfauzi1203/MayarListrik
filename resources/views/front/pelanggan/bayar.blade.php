@extends('layouts.front.app')

@section('title', 'Pembayaran')
@section('content')

<!-- START FORM -->
<div class="col-sm-6 px-5 py-3 ">
    <div class="card">
        <div class="card-header bg-success">
            <h5 class="card-title fw-bold">Pembayaran</h5>
        </div>
        <form action="#" method="get" enctype="multipart/form-data">
            @csrf
            <div class="card-body ">
                <div class="row">
                    <div class="col-sm-6">
                        <ul>
                            <li>ID Tagihan</li>
                            <li>Nama Pelanggan</li>
                            <li>Nomor Meter</li>
                            <li>Bulan Tagihan</li>
                            <li>Jumlah Pemakaian</li>
                            <li>Harga Pemakaian</li>
                            <li>Biaya Admin</li>
                            <li>Total Bayar</li>

                        </ul>
                    </div>
                    <div class="col-sm-6">
                        <ul>


                            <li>: {{ $data->id_tagihan }}</li>
                            <li>: {{ $data->pelanggan->nama_pelanggan }}</li>
                            <li>: {{ $data->pelanggan->nomor_kwh }}</li>
                            <li>: {{ $data->bulan }} {{ $data->tahun }}</li>
                            <li>: {{ $data->jumlah_meter }} kWh</li>
                            <li>: Rp. {{ $data->jumlah_meter * $data->pelanggan->tarif->tarifperkwh }}</li>
                            <li>: Rp. 2500 </li>
                            <li>: Rp. {{ $data->jumlah_meter * $data->pelanggan->tarif->tarifperkwh + 2500}}</li>


                        </ul>
                    </div>
                </div>
            </div>
            <div class="card-footer text-end">
                <a href="{{ url("/") }}" class="btn btn-secondary"><i class="nav-icon fas fa-angle-left"></i>
                    KEMBALI</a>
                <button type="button" class="btn btn-success fw-bold" data-toggle="modal"
                    data-target="#CekModal">Bayar</button>
            </div>
        </form>
    </div>
</div>

<!-- AKHIR FORM -->
@endsection