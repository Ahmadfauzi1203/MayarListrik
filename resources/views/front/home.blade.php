@extends('layouts.front.app')
@section('title', 'Home')
@section('content')
<div class="row px-5 py-5 ">
    {{-- Alert / Notifikasi --}}
    @include('alert')

    <div class="card mb-3">
        <div class="card-header bg-warning">
            <h5 class="card-title">Check Tagihan</h5>
        </div>


        <div class="card-body row">
            <form class="d-flex gap-3 mb-3" href=" {{ url('/') }}" method="get">
                <input class="form-control" type="search" name="katakunci" value="{{ Request::get('katakunci') }}"
                    placeholder="Masukkan No Pelanggan" aria-label="Search">

                <button class="btn btn-success" type="submit"><i class="fas fa-search"></i></button>
            </form>

            <table id="table" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>No.</th>
                        @if (Auth::check())
                        <th>Nama Pelanggan</th>
                        <th>Nomor KWH</th>
                        @endif
                        <th>Daya Listrik</th>
                        <th>Bulan Tagihan</th>
                        <th>Jumlah Pemakaian</th>
                        <th>Harga Pemakaian</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no =1; ?>
                    @foreach ($data as $item)
                    <tr>
                        <td>{{ $no++ }}</td>
                        @if (Auth::check())
                        <td> {{ $item->pelanggan->nama_pelanggan }}</td>
                        <td> {{ $item->pelanggan->nomor_kwh }}</td>
                        @endif
                        <td> {{ $item->pelanggan->tarif->daya }}Va / Rp. {{
                            number_format($item->pelanggan->tarif->tarifperkwh, 0, ",",
                            ".")}}</td>
                        <td> {{ $item->bulan }} {{ $item->tahun }}</td>
                        <td> {{ $item->jumlah_meter}} kWh</td>
                        <td> Rp. {{ number_format($item->jumlah_meter * $item->pelanggan->tarif->tarifperkwh, 0, ",",
                            ".")}}</td>
                        <td> {{ $item->status }}</td>

                        <td class="text-center">
                            <a href='{{ url("/cetak"."/".$item->id_tagihan) }}' class="btn btn-info btn-sm">Cetak</a>
                            @if ($item->status == 'Menunggu Pembayaran' && Auth::check())
                            <a href='{{ url("/konfirmasi"."/".$item->id_tagihan) }}' class="btn btn-success
                                btn-sm">konfirmasi Tagihan</a>
                            @endif
                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>


@endsection