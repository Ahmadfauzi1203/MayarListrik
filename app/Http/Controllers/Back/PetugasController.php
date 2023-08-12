<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\Level;
use App\Models\Pelanggan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class PetugasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = User::whereIn('id_level', [1, 2])->get();
        return view('back.petugas.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = Level::all();
        return view('back.petugas.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data2 = User::create([
            'nama' => $request->nama,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'id_level' => $request->id_level,
        ]);
        Session::flash('success', 'Pendaftaran Berhasil.');
        return redirect('admin/petugas');
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
    public function edit(string $id_user)
    {
        $data = User::where('id_user', $id_user)->first();
        $data2 = Level::all();
        return view('back.petugas.edit')->with('data', $data)->with('data2', $data2);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id_user)
    {
        $data = [
            'nama' => $request->nama,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'id_level' => $request->id_level,
        ];
        User::where('id_user', $id_user)->update($data);
        return redirect()->to('admin/petugas');
        Session::flash('success', 'Berhasil Melakukan Update Data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id_user)
    {
        User::where('id_user', $id_user)->delete();
        return redirect()->to('admin/petugas');
        Session::flash('success', 'Berhasil Menghapus Data');
    }
}
