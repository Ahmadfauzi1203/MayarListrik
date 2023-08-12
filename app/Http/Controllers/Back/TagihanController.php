<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTagihan;
use App\Models\Pelanggan;
use App\Models\Penggunaan;
use App\Models\Tagihan;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TagihanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $datam = Penggunaan::get();

        $data = Tagihan::with('pelanggan', 'penggunaan')->orderBy('id_tagihan', 'desc')->get();
        return view('back.tagihan.index', compact('data', 'datam'));
    }



    public function cetak(string $id_tagihan)
    {

        $data = Tagihan::where('id_tagihan', $id_tagihan)->first();
        if ($data->status == 'Lunas') {
            return view('invoice.lunas', compact('data'));
        } elseif ($data->status == 'Menunggu Pembayaran') {

            return view('invoice.belumbayar', compact('data'));
        } else {
            return view('invoice.konfirmasi', compact('data'));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(string $id_penggunaan)
    {

        $data = Penggunaan::where('id_penggunaan', $id_penggunaan)->first();
        return view('back.tagihan.create', compact('data'));
    }

    // public function konfirmasi(String $id_tagihan)
    // {
    //     $data = Tagihan::where('id_tagihan', $id_tagihan)->first();
    //     return view('back.tagihan.konfirmasi', compact('data'));
    // }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $hasil = $request->jumlah_meter / 10; // Hasil konversi meteran KWH
        $data = [
            'id_penggunaan' => $request->id_penggunaan,
            'id_pelanggan' => $request->id_pelanggan,
            'bulan' => $request->bulan,
            'tahun' => $request->tahun,
            'status' => 'Menunggu Pembayaran',
            'jumlah_meter' => $hasil,
        ];

        Tagihan::create($data);
        return redirect()->to('admin/tagihan');
        Session::flash('success', 'Berhasil Menambahkan Data');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id_penggunaan)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id_tagihan)
    {
        $data = Tagihan::where('id_tagihan', $id_tagihan)->first();
        return view('back.tagihan.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id_tagihan)
    {
        $data = [
            'id_penggunaan' => $request->id_penggunaan,
            'bulan' => $request->bulan,
            'tahun' => $request->tahun,
            'status' => $request->status,
            'jumlah_meter' => $request->jumlah_meter,
        ];


        Tagihan::where('id_tagihan', $id_tagihan)->update($data);
        return redirect()->to('admin/tagihan');
        Session::flash('success', 'Berhasil Melakukan Update Data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id_tagihan)
    {
        Tagihan::where('id_tagihan', $id_tagihan)->delete();
        return redirect()->to('admin/tagihan');
        Session::flash('success', 'Berhasil Menghapus Data');
    }
}
