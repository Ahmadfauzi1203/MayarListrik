<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\Pembayaran;
use App\Models\Tagihan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class PembayaranController extends Controller
{
    /**
     * 
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Pembayaran::with('tagihan')->get();

        return view('back.pembayaran.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(string $id_tagihan)
    {
        $data = Tagihan::with('pelanggan', 'penggunaan')->where('id_tagihan', $id_tagihan)->first();
        return view('back.tagihan.konfirmasi', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // untuk mengupdate data status berdasarkan id
        $id = $request->id_tagihan;
        $status = $request->status;
        $tagihan = Tagihan::find($id);
        $tagihan->update(['status' => $status]);

        $user = Auth::user()->id_level;

        $file = $request->file('bukti'); //req file foto
        $ekstensi = $file->extension(); //ekstensi file
        $fn_bkt = 'bukti' . '_'  . $request->id_tagihan .  '.' . $ekstensi; //pembuatan nama file
        $file->move(public_path('img/bukti'), $fn_bkt); //lokasi file



        $data = [
            'id_tagihan' => $request->id_tagihan,
            'id_pelanggan' => $request->id_pelanggan,
            'bulan_bayar' => $request->bulan_bayar,
            'tanggal_pembayaran' => $request->tanggal_pembayaran,
            'biaya_admin' => $request->biaya_admin,
            'total_bayar' => $request->total_bayar,
            'bukti' => $fn_bkt,
            'id_user' => $user
        ];

        Pembayaran::create($data);
        return redirect()->to('admin/pembayaran');
        Session::flash('success', 'Berhasil Menambahkan Data');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id_tagihan)
    {
        $status = $request->status;
        $tagihan = Tagihan::find($id_tagihan);
        $tagihan->update(['status' => $status]);


        return redirect()->to('admin/pembayaran');
        Session::flash('success', 'Berhasil Melakukan Update Data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id_pembayaran)
    {
        // Mendelete file berdasarkan id_pembayaran
        $data = Pembayaran::where('id_pembayaran', $id_pembayaran)->first();
        File::delete(public_path('img/bukti') . '/' . $data->bukti);
        Pembayaran::where('id_pembayaran', $id_pembayaran)->delete();

        return redirect()->to('admin/pembayaran');
        Session::flash('success', 'Berhasil Menghapus Data');
    }
}
