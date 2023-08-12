@extends('layouts.back.app')

@section('content')

<!-- START FORM -->



<form action='{{ url("admin/tarif") }}' method='post'>
    @csrf

    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <a href="{{ url("admin/tarif") }}" class="btn btn-secondary mb-3"><i class="nav-icon fas fa-angle-left"></i>
            KEMBALI</a>


        <div class="mb-3 row">
            <label for="daya" class="col-sm-2 col-form-label">Daya</label>
            <div class="col-sm-10">
                <input type="number" class="form-control @error('daya') is-invalid @enderror" name='daya'
                    value="{{ old('daya') }}" id="daya">
                @error('daya')
                <div class="invalid_feedback text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="mb-3 row">
            <label for="tarifperkwh" class="col-sm-2 col-form-label">Tarif KWH</label>
            <div class="col-sm-10">
                <input type="number" class="form-control @error('tarifperkwh') is-invalid @enderror" name='tarifperkwh'
                    value="{{ old('tarifperkwh') }}" id="tarifperkwh">
                @error('tarifperkwh')
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