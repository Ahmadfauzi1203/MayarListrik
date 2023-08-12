@extends('layouts.back.app')

@section('title','Pelanggan')
@section('content')
<div class="container-fluid">
    {{-- Alert / Notifikasi --}}
    @include('alert')
    <div class="pb-3">
        <a href='{{ url("admin/pelanggan/create") }}' class="btn btn-primary">+ Tambah Data</a>
    </div>
    <table id="table" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>No.</th>
                <th>Nomor Meter</th>
                <th>Daya/Tarif</th>
                <th>Nama</th>
                <th>Username</th>
                <th>Password</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no =1; ?>
            @foreach ($data as $item)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $item->nomor_kwh }}</td>
                <td>{{ $item->tarif->daya }}Va / Rp.{{ $item->tarif->tarifperkwh }}</td>
                <td>{{ $item->nama_pelanggan }}</td>
                <td>{{ $item->username }}</td>
                <td>{{ $item->password }}</td>
                <td>{{ $item->alamat }}</td>
                <td class="text-center">
                    <a href='{{ url("admin/pelanggan/".$item->id_pelanggan."/edit") }}'
                        class="btn btn-warning btn-sm">Edit</a>

                    {{-- <form onsubmit="return confirm('Yakin akan menghapus data?')" class='d-inline'
                        action="{{ url('admin/pelanggan/'.$item->id_pelanggan) }}" method="post">
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