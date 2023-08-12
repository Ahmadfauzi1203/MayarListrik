@extends('layouts.back.app')

@section('title','Tagihan')
@section('content')
<div class="container-fluid">
    {{-- Alert / Notifikasi --}}
    @include('alert')
    <div class="pb-3">
        <a href='{{ url("admin/tagihan/create") }}' class="btn btn-primary" data-toggle="modal"
            data-target="#InputTag">+ Tambah Data</a>
    </div>
    <table id="table" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>No.</th>
                <th>Nomor Meter</th>
                <th>Nama Pelanggan</th>
                <th>Bulan Tagihan</th>
                <th>Jumlah Pemakaian</th>
                <th>Harga Pemakaian</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;?>{{-- Menampilkan No urut data --}}
            @foreach ($data as $item)
            <tr>
                <td>{{ $no++}}</td>
                <td>{{ $item->pelanggan->nomor_kwh}}</td>
                <td>{{ $item->pelanggan->nama_pelanggan}}</td>
                <td>{{ $item->bulan }} {{ $item->tahun }}</td>
                <td>{{ $item->jumlah_meter }}kWh</td>
                <td>Rp. {{ $item->jumlah_meter * $item->pelanggan->tarif->tarifperkwh}}</td>
                <td>{{ $item->status }}</td>
                <td class="text-center">
                    <a href='{{ url("admin/tagihan/".$item->id_tagihan."/cetak") }}'
                        class="btn btn-info btn-sm">Cetak</a>

                    @if ($item->status == 'Menunggu Pembayaran')
                    <a href='{{ url("admin/tagihan/".$item->id_tagihan."/edit") }}'
                        class="btn btn-warning btn-sm">Edit</a>

                    <a href='{{ url("admin/pembayaran/".$item->id_tagihan."/konfirmasi") }}'
                        class="btn btn-primary btn-sm">Konfirmasi Pembayaran</a>

                    @endif
                    {{-- <form onsubmit="return confirm('Yakin akan menghapus data?')" class='d-inline'
                        action="{{ url('admin/tagihan/'.$item->id_tagihan) }}" method="post">
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



<div class="modal fade" id="InputTag">
    <div class="modal-dialog modal-sm">
        <form id="urlForm" action="{{ url('admin/tagihan/create') }}" method="get">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Pilih Data</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body bg-info">
                    <label for="id_penggunaan" class="form-label">ID Penggunaan</label>
                    <div class="col-md-6">
                        <select id="id_penggunaan" class=" form-select @error('id_penggunaan') is-invalid @enderror"
                            name="id_penggunaan">
                            <option selected disabled>Pilih...</option>
                            @foreach ($datam as $item)
                            <option value="{{$item->id_penggunaan}}">{{ $item->pelanggan->nomor_kwh }} /
                                {{ $item->pelanggan->nama_pelanggan }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>

        </form>
    </div>
    <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<script>
    // Mendapatkan elemen select berdasarkan ID
    var selectElement = document.getElementById("id_penggunaan");

// Menambahkan event listener ketika elemen select berubah
selectElement.addEventListener("change", function() {
    // Dapatkan nilai yang dipilih dari elemen select
    var selectedValue = selectElement.value;

    // Periksa apakah nilai yang dipilih tidak kosong
    if (selectedValue !== "") {
        // Konstruksi URL berdasarkan nilai yang dipilih
        var url = "{{ url('admin/tagihan') }}" + "/" + selectedValue + "/create";

        // Arahkan pengguna ke URL yang sesuai
        window.location.href = url;
    } else {
        // Jika nilai yang dipilih kosong, munculkan pesan peringatan
        alert("Pilih penggunaan terlebih dahulu.");
    }
});    
</script>
@endsection