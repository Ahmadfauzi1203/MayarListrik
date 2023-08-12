<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Pelanggan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class RegisterController extends Controller
{
    /**Function Untuk Mengakses halaman Register */
    public function index()
    {
        return view('Auth.register');
    }

    /**
     * Function Untuk Mengolah data input Registrasi
     */
    public function actionregister(Request $request)
    {
        //  Memeriksa apakah "nomor_kwh" sudah ada dalam database
        $checknomor = Pelanggan::where('nomor_kwh', $request->nomor_kwh)->first();

        if ($checknomor) {

            // Jika pengguna dengan "nomor_kwh" ditemukan, perbarui data dengan username dan password yang baru
            $data = [
                'nomor_kwh' => $request->nomor_kwh,
                'username' => $request->username,
                'password' => Hash::make($request->password),
            ];

            $data2 = User::create([
                'nama' => $request->nama,
                'username' => $request->username,
                'password' => Hash::make($request->password),
                'id_level' => 3,
            ]);

            Pelanggan::where('nomor_kwh', $request->nomor_kwh)->update($data);

            Session::flash('success', 'Pendaftaran Berhasil. Akun Anda sudah aktif. Silakan masuk menggunakan username dan password Anda.');
            return redirect('login');
        } else {

            /**
             * Jika tidak ada pengguna dengan "nomor_kwh" tersebut, tampilkan pesan error 
             * */

            Session::flash('error', 'Nomor KWH belum terdaftar. Silakan periksa kembali.');
            return redirect('register');
        }
    }
}
