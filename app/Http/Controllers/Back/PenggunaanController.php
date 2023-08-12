<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\Pelanggan;
use App\Models\Penggunaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PenggunaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // menampilkan data table berdasarkan id dari yang terbaru
        $data = Penggunaan::orderBy('id_penggunaan', 'desc')->get();
        return view('back.penggunaan.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = Pelanggan::all();

        return view('back.penggunaan.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $petugas = Auth::user()->nama;
        $data = [
            'id_pelanggan' => $request->id_pelanggan,
            'bulan' => $request->bulan,
            'tahun' => $request->tahun,
            'meter_awal' => $request->meter_awal,
            'meter_akhir' => $request->meter_akhir,
            'petugas' => $petugas,

        ];

        Penggunaan::create($data);
        return redirect()->to('admin/penggunaan');
        Session::flash('success', 'Berhasil Menambahkan Data');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id_penggunaan)
    {
        $data = Penggunaan::where('id_penggunaan', $id_penggunaan)->first();
        return view('back.penggunaan.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id_penggunaan)
    {

        $data = [
            'id_pelanggan' => $request->id_pelanggan,
            'bulan' => $request->bulan,
            'tahun' => $request->tahun,
            'meter_awal' => $request->meter_awal,
            'meter_akhir' => $request->meter_akhir,
            'petugas' => $request->petugas,
        ];

        Penggunaan::where('id_penggunaan', $id_penggunaan)->update($data);
        return redirect()->to('admin/penggunaan');
        Session::flash('success', 'Berhasil Melakukan Update Data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id_penggunaan)
    {
        Penggunaan::where('id_penggunaan', $id_penggunaan)->delete();
        return redirect()->to('admin/penggunaan');
        Session::flash('success', 'Berhasil Menghapus Data');
    }
}
