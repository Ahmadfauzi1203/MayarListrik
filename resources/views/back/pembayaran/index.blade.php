@extends('layouts.back.app')

@section('title','Daftar Pembayaran')
@section('content')
<div class="container-fluid">
    {{-- Alert / Notifikasi --}}
    @include('alert')
    <table id="table" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>No.</th>
                <th>Nomor Tagihan</th>
                <th>Nama Pelanggan</th>
                <th>Tanggal Bayar</th>
                <th>Total Bayar</th>
                <th>Status</th>
                <th>Aksi</th>

        </thead>
        <tbody>
            <?php $no = 1;?>{{-- Menampilkan No urut data --}}
            @foreach ($data as $item)
            <tr>
                <td>{{ $no++}}</td>
                <td>{{ $item->tagihan->id_tagihan }}</td>
                <td>{{ $item->pelanggan->nama_pelanggan }}</td>
                <td>{{ $item->tanggal_pembayaran }}</td>
                <td>Rp. {{ number_format($item->total_bayar, 0, ",", ".")}}</td>
                <td>{{ $item->tagihan->status }}</td>

                <td class="text-center">
                    @if ($item->tagihan->status == 'Lunas')
                    <a href='{{ url("admin/pembayaran/".$item->id_pembayaran) }}' class="btn btn-info btn-sm"
                        data-toggle="modal" data-target="#PembayaranModal{{ $item->id_pembayaran }}">Lihat</a>
                    @else
                    <a href='{{ url("admin/pembayaran/".$item->id_pembayaran) }}' class="btn btn-success btn-sm"
                        data-toggle="modal" data-target="#PembayaranModal{{ $item->id_pembayaran }}">Konfirmasi
                        Pembayaran</a>
                    @endif

                    {{-- <form onsubmit="return confirm('Yakin akan menghapus data?')" class='d-inline'
                        action="{{ url('admin/pembayaran/'.$item->id_pembayaran) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" name="submit" class="btn btn-danger btn-sm">Del</button>
                    </form> --}}

                </td>
            </tr>

            @endforeach
        </tbody>

    </table>
</div>

{{-- Modal Tagihan --}}
@foreach ($data as $item)
<div class="modal fade" id="PembayaranModal{{ $item->id_pembayaran }}">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="{{ url('admin/pembayaran/'.$item->id_tagihan) }}" method="post">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h4 class="modal-title">Detail Pembayaran</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="mb-3 row">
                        <ul class="col-sm-4 confirm">
                            <li>ID Tagihan</li>
                            <p>{{ $item->id_tagihan }}</p>
                            <li>Tanggal Bayar</li>
                            <p>{{ $item->tanggal_pembayaran }}</p>
                            <li>Total Bayar</li>
                            <p>Rp. {{ number_format($item->total_bayar, 0, ",", ".")}}</p>
                        </ul>
                        <ul class="col-sm-4 confirm">
                            <li>Bukti Pembayaran</li>
                            <img src="{{ url('/img/bukti').'/'.$item->bukti }}" alt="bukti pembayaran"
                                style="width: 120px; height:150px;">
                            <li>Status</li>
                            <p class="text-bold text-success">{{ $item->tagihan->status }}</p>
                        </ul>
                        @if ($item->tagihan->status == 'Menunggu Konfirmasi')
                        <ul class="col-sm-4">
                            <li>Set status Pembayaran</li>
                            <span> <input class="form-check-input" type="checkbox" value="Lunas" name="status"
                                    id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault"> Lunas
                            </span>
                        </ul>
                        @endif
                    </div>

                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                        @if ($item->tagihan->status == 'Menunggu Konfirmasi')
                        <button type="submit" class="btn btn-primary" name="submit">Simpan</button>
                        @endif
                    </div>

                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
@endforeach
<!-- /.modal -->
@endsection

@push('styles')
<style>
    ul>li {
        font-weight: 600;
        list-style: none;
    }
</style>
@endpush