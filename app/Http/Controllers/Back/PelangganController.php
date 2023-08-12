<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePelanggan;
use App\Http\Requests\UpdatePelanggan;
use App\Models\Pelanggan;
use App\Models\Tarif;
use Illuminate\Support\Facades\Session;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Pelanggan::with('tarif')->orderBy('id_pelanggan', 'desc')->get();
        return view('back.pelanggan.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = Tarif::all();
        return view('back.pelanggan.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePelanggan $request)
    {
        $data = $request->all();

        $data = [
            'nama_pelanggan' => $request->nama_pelanggan,
            'nomor_kwh' => $request->nomor_kwh,
            'alamat' => $request->alamat,
            'id_tarif' => $request->id_tarif,
        ];

        Pelanggan::create($data);
        return redirect()->to('admin/pelanggan');
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
    public function edit(string $id_pelanggan)
    {
        $data = Pelanggan::where('id_pelanggan', $id_pelanggan)->first();
        $data2 = Tarif::all();
        return view('back.pelanggan.edit')->with('data', $data)->with('data2', $data2);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePelanggan $request, string $id_pelanggan)
    {
        $data = $request->all();
        $data = [
            'nama_pelanggan' => $request->nama_pelanggan,
            'nomor_kwh' => $request->nomor_kwh,
            'username' => $request->username,
            'password' => $request->password,
            'alamat' => $request->alamat,
            'id_tarif' => $request->id_tarif,
        ];

        Pelanggan::where('id_pelanggan', $id_pelanggan)->update($data);
        return redirect()->to('admin/pelanggan');
        Session::flash('success', 'Berhasil Melakukan Update Data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id_pelanggan)
    {
        Pelanggan::where('id_pelanggan', $id_pelanggan)->delete();
        return redirect()->to('admin/pelanggan');
        Session::flash('success', 'Berhasil Menghapus Data');
    }
}
