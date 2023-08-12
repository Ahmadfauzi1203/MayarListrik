<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Pembayaran;
use App\Models\Tagihan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


/**
 * PageController
 */
class PageController extends Controller
{
    /**
     * main
     *
     * @param  mixed $request
     * @return void
     */
    public function main(Request $request)
    {
        $katakunci = $request->katakunci;

        if (strlen($katakunci)) {

            $data = Tagihan::whereHas('pelanggan', function ($query) use ($katakunci) {
                $query->where('nomor_kwh', 'like', "%$katakunci%");
            })->get();
            return view('front.home')->with('data', $data);
            // membuat parameter pencarian 
        } elseif (Auth::check()) {
            $data = Tagihan::with('penggunaan', 'pelanggan')
                ->join('pelanggan', 'tagihan.id_pelanggan', '=', 'pelanggan.id_pelanggan')
                ->where('pelanggan.username', Auth::user()->username)
                ->get();
            // menekan akses tampilan data Table
        } else {
            $data = Tagihan::with('pelanggan', 'penggunaan')->get();
        }
        return view('front.home', compact('data'));
    }

    /**
     * konfirmasi
     *
     * @param  mixed $id_tagihan
     * @return void
     */
    public function konfirmasi(string $id_tagihan)
    {
        $data = Tagihan::where('id_tagihan', $id_tagihan)->with('pelanggan', 'penggunaan')->first();
        return view('front.pelanggan.konfirmasi', compact('data'));
    }

    // function untuk mencetak berbagai macam Struk Tagihan
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
     * store
     *
     * @param  mixed $request
     * @return void
     */
    public function store(Request $request)
    {

        // Mengupdate Data status Tagihan
        $id = $request->id_tagihan;
        $status = $request->status;
        $tagihan = Tagihan::find($id);
        $tagihan->update(['status' => $status]);

        // mengambil id_level dari user yang sedang aktif
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
        return redirect()->to('/');
        Session::flash('success', 'Terima Kasih Telah Mengkonfirmasi Pembayaran');
    }
}
