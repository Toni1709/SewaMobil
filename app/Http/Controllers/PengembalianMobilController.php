<?php

namespace App\Http\Controllers;

use App\Models\ManajemenMobil;
use App\Models\PeminjamanMobil;
use App\Models\PengembalianMobil;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengembalianMobilController extends Controller
{
    public function index()
    {
        $data['pengembalian'] = PengembalianMobil::with('mobil', 'pengguna')
            ->where('pengguna_id', Auth::user()->id)
            ->get();
        return view('pages.pengembalian-mobil', $data);
    }
    public function formPengembalian()
    {
        return view('pages.form.form-pengembalian-mobil');
    }
    public function add(Request $request)
    {
        PengembalianMobil::create([
            'tanggal' => date('Y-m-d'),
            'pengguna_id' => Auth::user()->id,
            'mobil_id' => $request->mobil_id,
            'tgl_mulai_sewa' => $request->tgl_mulai,
            'tgl_selesai_sewa' => $request->tgl_selesai,
            'total_harga' => $request->total_harga,
            'lama_sewa' => $request->lama_sewa,
        ]);

        return redirect()->route('pengembalian')->with('success', 'Pengembalian Berhasil!');
    }

    // Ajax
    public function cariData(Request $request)
    {
        // cari data mobil
        $mobil = ManajemenMobil::where('no_plat', $request->noPlat)
            ->get()
            ->first();

        // cari data peminjaman mobil
        $peminjaman = PeminjamanMobil::with('mobil', 'pengguna')
            ->where('pengguna_id', Auth::user()->id)
            ->where('mobil_id', $mobil->id)
            ->get()
            ->first();

        // cari lama minjam
        $start = new DateTime($peminjaman->tgl_mulai_sewa);
        $end = new DateTime($peminjaman->tgl_selesai_sewa);
        $selisih = $start->diff($end);
        $lama_pinjam = $selisih->d;

        $data['mobil'] = $mobil;
        $data['peminjaman'] = $peminjaman;
        $data['lamaSewa'] = $lama_pinjam;

        return response()->json($data);
    }
}
