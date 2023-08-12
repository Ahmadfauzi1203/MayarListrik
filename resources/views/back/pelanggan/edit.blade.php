@extends('layouts.back.app')

@section('title', 'Edit Pelanggan')
@section('content')

<!-- START FORM -->



<form action='{{ url("admin/pelanggan/".$data->id_pelanggan) }}' method='post'>
    @csrf
    @method('PUT')

    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <a href="{{ url("admin/pelanggan") }}" class="btn btn-secondary mb-3"><i
                class="nav-icon fas fa-angle-left"></i>
            KEMBALI</a>


        <div class="mb-3 row">
            <label for="nama_pelanggan" class="col-sm-2 col-form-label">Nama Pelanggan</label>
            <div class="col-sm-10">
                <input type="text" class="form-control @error('nama_pelanggan') is-invalid @enderror"
                    name='nama_pelanggan' value="{{ $data->nama_pelanggan }}" id="nama_pelanggan">
                @error('nama_pelanggan')
                <div class="invalid_feedback text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="mb-3 row">
            <label for="nomor_kwh" class="col-sm-2 col-form-label">Nomor KWH</label>
            <div class="col-sm-10">
                <input type="text" class="form-control @error('nomor_kwh') is-invalid @enderror" name='nomor_kwh'
                    value="{{$data->nomor_kwh }}" id="nomor_kwh">
                @error('nomor_kwh')
                <div class="invalid_feedback text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="mb-3 row">
            <label for="username" class="col-sm-2 col-form-label">Username</label>
            <div class="col-sm-10">
                <input type="text" class="form-control @error('username') is-invalid @enderror" name='username'
                    value="{{ $data->username }}" id="username">
                @error('username')
                <div class="invalid_feedback text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="mb-3 row">
            <label for="password" class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-10">
                <input type="text" class="form-control @error('password') is-invalid @enderror" name='password'
                    value="{{ $data->password }}" id="password">
                @error('password')
                <div class="invalid_feedback text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="mb-3 row">
            <label for="inputState" class="col-sm-2 form-label">Daya</label>
            <div class="col-sm-10">
                <select id="inputState" class=" form-select @error('id_tarif') is-invalid @enderror" name="id_tarif">
                    <option value="{{ $data->tarif->id_tarif }}">{{ $data->tarif->daya }}Va / Rp.{{
                        $data->tarif->tarifperkwh
                        }}
                    </option>
                    <option value="">Pilih...</option>
                    @foreach ($data2 as $item)

                    <option value="{{ $item->id_tarif }}">{{ $item->daya }}Va / Rp.{{ $item->tarifperkwh
                        }}
                    </option>
                    @endforeach

                </select>
            </div>
            @error('id_tarif')
            <div class="invalid_feedback text-danger">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="mb-3 row">
            <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
            <div class="col-sm-10">
                <textarea class="form-control @error('alamat') is-invalid @enderror" name='alamat'
                    id="alamat">{{ $data->alamat }}</textarea>
                @error('alamat')
                <div class="invalid_feedback text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
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