<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTarif;
use App\Http\Requests\UpdateTarif;
use App\Models\Tarif;
use Illuminate\Support\Facades\Session;

class TarifController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Tarif::all();
        return view('back.tarif.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('back.tarif.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTarif $request)
    {
        $data = $request->all();

        $data = [
            'daya' => $request->daya,
            'tarifperkwh' => $request->tarifperkwh,
        ];

        Tarif::create($data);
        return redirect()->to('admin/tarif');
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
    public function edit(string $id_tarif)
    {
        $data = Tarif::where('id_tarif', $id_tarif)->first();
        return view('back.tarif.index');
        Session::flash('data', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTarif $request, string $id_tarif)
    {
        $data = $request->all();
        $data = [
            'daya' => $request->daya,
            'tarifperkwh' => $request->tarifperkwh,
        ];

        Tarif::where('id_tarif', $id_tarif)->update($data);
        return redirect()->to('admin/tarif');
        Session::flash('success', 'Berhasil Melakukan Update Data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id_tarif)
    {
        Tarif::where('id_tarif', $id_tarif)->delete();
        return redirect()->to('admin/tarif');
        Session::flash('success', 'Berhasil Menghapus Data');
    }
}
