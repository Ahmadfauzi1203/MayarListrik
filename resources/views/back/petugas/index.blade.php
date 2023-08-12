@extends('layouts.back.app')

@section('title','Petugas')
@section('content')
<div class="container-fluid">
    {{-- Alert / Notifikasi --}}
    @include('alert')
    <div class="pb-3">
        <a href='{{ url("admin/petugas/create") }}' class="btn btn-primary">+ Tambah Data</a>
    </div>
    <table id="table" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama</th>
                <th>Username</th>
                <th>Password</th>
                <th>Level</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no =1; ?>
            @foreach ($data as $item)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->username }}</td>
                <td>{{ $item->password }}</td>
                <td>{{ $item->level->nama_level }}</td>
                <td class="text-center">
                    <a href='{{ url("admin/petugas/".$item->id_user."/edit") }}' class="btn btn-warning btn-sm">Edit</a>

                    {{-- <form onsubmit="return confirm('Yakin akan menghapus data?')" class='d-inline'
                        action="{{ url('admin/petugas/'.$item->id_user) }}" method="post">
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