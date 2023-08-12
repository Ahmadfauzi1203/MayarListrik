@extends('layouts.back.app')

@section('title', 'Edit Petugas')
@section('content')

<!-- START FORM -->



<form action='{{ url("admin/petugas/".$data->id_user) }}' method='post'>
    @csrf
    @method('PUT')

    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <a href="{{ url("admin/petugas") }}" class="btn btn-secondary mb-3"><i class="nav-icon fas fa-angle-left"></i>
            KEMBALI</a>


        <div class="mb-3 row">
            <label for="nama" class="col-sm-2 col-form-label">Nama petugas</label>
            <div class="col-sm-10">
                <input type="text" class="form-control @error('nama') is-invalid @enderror" name='nama'
                    value="{{ $data->nama }}" id="nama">
                @error('nama')
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
                    value="{{$data->username }}" id="username">
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
            <label for="inputState" class="col-sm-2 form-label">Level</label>
            <div class="col-sm-10">
                <select id="inputState" class=" form-select @error('id_level') is-invalid @enderror" name="id_level">
                    <option value="{{ $data->id_level }}">{{ $data->level->nama_level }}
                    </option>
                    <option value="">Pilih...</option>
                    @foreach ($data2 as $item)

                    <option value="{{ $item->id_level }}">{{ $item->nama_level }}
                    </option>
                    @endforeach

                </select>
            </div>
            @error('id_level')
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