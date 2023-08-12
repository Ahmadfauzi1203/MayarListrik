<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    /**
     * Function index menampilkan hlm Login 
     */
    public function index()
    {
        if (Auth::check()) {
            return redirect('/dashboard');
        } else {
            return view('Auth.login');
        }
    }
    /**
     * Function memvalidasi inputan user
     */
    public function actionlogin(Request $request)
    {

        $data = [
            'username' => $request->input('username'),
            'password' => $request->input('password'),
        ];
        /**
         * Membagi beberapa akses berdasakan id Level, 1 = admin, 2 = petugas dan 3 = Pelanggan
         */
        if (Auth::Attempt($data)) {

            if (Auth::user()->id_level == 1) {
                Session::flash('success', Auth::user()->nama);
                return redirect('/dashboard');
            } elseif (Auth::user()->id_level == 2) {
                Session::flash('success', Auth::user()->nama);
                return redirect('/dashboard');
            } else {
                Session::flash('success', Auth::user()->nama);
                return redirect('/');
            }
        } else {
            Session::flash('error', 'Email atau Password Salah');
            return redirect('login');
        }
    }
    /**
     * Function Logout dan mengakses hlm home
     */
    public function actionlogout()
    {
        Auth::logout();
        return redirect('/');
    }
}
