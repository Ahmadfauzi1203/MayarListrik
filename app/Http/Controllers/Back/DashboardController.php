<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\Pelanggan;
use App\Models\Tagihan;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * 
     * Display a listing of the resource.
     */
    public function index()
    {
        // Menampikan data Tagihan berdasarkan status dan berurutan mulai dari yg terbaru
        $data = Tagihan::with('pelanggan', 'penggunaan')
            ->orderBy('id_tagihan', 'desc')->whereIn('status', ['Menunggu Pembayaran', 'Menunggu Konfirmasi'])->get();

        // query untuk mengambil jumlah user
        $jml_petugas = User::where('id_level', '2')->count();
        // menampikan jumlah id data pelanggan
        $jml_pelanggan = Pelanggan::count();
        // menampikan jumlah data status dengan ketentuan sebuah array []
        $jml_tagihan = Tagihan::whereIn('status', ['Menunggu Pembayaran', 'Menunggu Konfirmasi'])->count();
        return view('back.home', compact('jml_petugas', 'jml_pelanggan', 'jml_tagihan', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
