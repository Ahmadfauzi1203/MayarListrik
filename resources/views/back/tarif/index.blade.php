@extends('layouts.back.app')

@section('title','Tarif')
@section('content')

<div class="container-fluid">
    {{-- Alert / Notifikasi --}}
    @include('alert')
    <div class="pb-3">
        <a href='{{ url("admin/tarif/create") }}' class="btn btn-primary">+ Tambah Data</a>
    </div>
    <table id="table" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>No.</th>
                <th>Daya</th>
                <th>Tarif</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; ?>
            @foreach ($data as $item)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $item->daya }} Va</td>
                <td>Rp. {{ $item->tarifperkwh }}</td>

                <td class="text-center">
                    <a href="{{ url('admin/tarif/'.$item->id_tarif.'/edit')}}" class=" btn btn-warning btn-sm"
                        data-toggle="modal" data-target="#TarifModal{{ $item->id_tarif }}">Edit</a>

                    {{--
                    <form onsubmit="return confirm('Yakin akan menghapus data?')" class='d-inline'
                        action="{{ url('admin/tarif/'.$item->id_tarif) }}" method="post">
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

<!-- Export Modal-->
@foreach ($data as $item2)
<div class="modal fade" id="TarifModal{{ $item2->id_tarif }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Data Tarif</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <form action="{{ url('admin/tarif/'. $item2->id_tarif) }}" method="POST">
                @csrf
                @method("PUT")
                <div class="modal-body">
                    <p class="mb-3"> Silahkan Masukan data yang akan diperbarui</p>
                    <div class="row align-item-center">
                        <div class="col">
                            <label for="daya" class="form-label">daya</label>
                            <input type="number" class="form-control @error('daya') is-invalid @enderror" id="daya"
                                name="daya" placeholder="Masukkan daya" value="{{ $item2->daya }}">
                            @error('daya')
                            <div class="invalid_feedback text-danger">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col">
                            <label for="tarifperkwh" class="form-label">Tarif PerKWH</label>
                            <input type="number" class="form-control @error('tarifperkwh') is-invalid @enderror"
                                id="tarifperkwh" name="tarifperkwh" placeholder="Masukkan tarif"
                                value="{{ $item2->tarifperkwh }}">
                            @error('tarifperkwh')
                            <div class="invalid_feedback text-danger">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button class="btn btn-warning" type="button" data-dismiss="modal">Cancel</button>
                    <button type="submit" name="submit" class="btn btn-success">Edit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach
{{-- @include('back.tarif.edit') --}}
@endsection