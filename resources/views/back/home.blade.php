@extends('layouts.back.app')
@section('title','Dashboard')

@section('content')


<div class="container-fluid">
    <!-- Small boxes (Stat box) -->
    <div class="row justify-content-between px-5">
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $jml_tagihan }}</h3>

                    <p>Jumlah Tagihan</p>
                </div>
                <div class="icon">
                    <i class="fas fa-file-invoice-dollar"></i>
                </div>
                @if (Auth::user()->id_level == 1)
                <a href="admin/tagihan" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                @endif

            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ $jml_petugas }}</sup></h3>

                    <p>Jumlah Petugas</p>
                </div>
                <div class="icon">
                    <i class="nav-icon 	fas fa-users"></i>
                </div>
                @if (Auth::user()->id_level == 1)
                <a href="admin/petugas" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                @endif
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{ $jml_pelanggan }}</h3>

                    <p>Jumlah Pelanggan</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                @if (Auth::user()->id_level == 1)
                <a href="admin/pelanggan" class="small-box-footer">More info <i
                        class="fas fa-arrow-circle-right"></i></a>
                @endif
            </div>
        </div>

    </div>
    <!-- /.row -->
    <!-- Main row -->
    <h3 class="mt-3">Quick View</h3>
    <table class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>No.</th>
                <th>Nomor Meter</th>
                <th>Nama Pelanggan</th>
                <th>Bulan Tagihan</th>
                <th>Jumlah Pemakaian</th>
                <th>Harga Pemakaian</th>
                <th>Status</th>

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


                </td>
            </tr>

            @endforeach
        </tbody>

    </table>
    <!-- /.row (main row) -->
</div>
<!-- /.container-fluid -->

@endsection