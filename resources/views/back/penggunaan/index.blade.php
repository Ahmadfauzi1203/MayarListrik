@extends('layouts.back.app')

@section('title','Penggunaan')
@section('content')
<div class="container-fluid">
    {{-- Alert / Notifikasi --}}
    @include('alert')
    <div class="pb-3">
        <a href='{{ url("admin/penggunaan/create") }}' class="btn btn-primary">+ Tambah Data</a>
    </div>
    <table id="table" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>No.</th>
                <th>Nomor Meter</th>
                <th>Nama</th>
                <th>Bulan</th>
                <th>Meter Awal</th>
                <th>Meter Akhir</th>
                <th>Petugas</th>
                <th>Aksi</th>

        </thead>
        <tbody>
            <?php $no =1; ?>
            @foreach ($data as $item)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $item->pelanggan->nomor_kwh }}</td>
                <td>{{ $item->pelanggan->nama_pelanggan }}</td>
                <td>{{ $item->bulan }} {{ $item->tahun }}</td>
                <td>{{ $item->meter_awal }}</td>
                <td>{{ $item->meter_akhir }}</td>
                <td>{{ $item->petugas }}</td>
                <td class="text-center">
                    <a href='{{ url("admin/penggunaan/".$item->id_penggunaan."/edit") }}'
                        class="btn btn-warning btn-sm">Edit</a>

                    {{-- <form onsubmit="return confirm('Yakin akan menghapus data?')" class='d-inline'
                        action="{{ url('admin/penggunaan/'.$item->id_penggunaan) }}" method="post">
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
@endsection