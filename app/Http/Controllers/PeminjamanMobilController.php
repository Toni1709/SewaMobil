<?php

namespace App\Http\Controllers;

use App\Models\ManajemenMobil;
use App\Models\PeminjamanMobil;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PeminjamanMobilController extends Controller
{
    public function index()
    {
        $data['peminjaman'] = PeminjamanMobil::with('pengguna', 'mobil')
            ->where('pengguna_id', Auth::user()->id)
            ->get();
        return view('pages.peminjaman-mobil', $data);
    }
    public function formPeminjaman()
    {
        $data['mobil'] = ManajemenMobil::where('status', 'Tersedia')->get();
        return view('pages.form.form-peminjaman-mobil', $data);
    }
    public function add(Request $request)
    {
        // Ambil tarif perhari
        $mobil = ManajemenMobil::find($request->mobil_id);
        $tarif = $mobil->tarif;

        // Cari selisih hari
        $start = new DateTime($request->tgl_mulai_sewa);
        $end = new DateTime($request->tgl_selesai_sewa);
        $selisih = $start->diff($end);
        $jml_hari = $selisih->d;

        PeminjamanMobil::create([
            'pengguna_id' => Auth::user()->id,
            'mobil_id' => $request->mobil_id,
            'tgl_mulai_sewa' => $request->tgl_mulai_sewa,
            'tgl_selesai_sewa' => $request->tgl_selesai_sewa,
            'total_sewa' => ($tarif * $jml_hari)
        ]);

        return redirect()->route('peminjaman')->with('success', 'Peminjaman Berhasil!');
    }

    public function cekStatusMobil(Request $request)
    {
        $start = $request->start;
        $end = $request->end;

        // Ambil Data Mobil
        $mobil = ManajemenMobil::find($request->id);

        // Cek status mobil
        if ($request->start != null && $request->end != null) {
            $status = PeminjamanMobil::where('mobil_id', $request->id)
                ->whereBetween('tgl_mulai_sewa', [$request->start, $request->end])
                ->orWhere(function ($query) use ($start, $end) {
                    $query->whereBetween('tgl_selesai_sewa', [$start, $end]);
                })
                ->count('id');

            if ($status == '0') {
                $pesan = 'Tersedia';
            } else {
                $pesan = 'Tidak Tersedia';
            }
        } else {
            $pesan = 'Silahkan Pilih Tanggalnya!';
        }

        $data['mobil'] = $mobil;
        $data['pesan'] = $pesan;

        return response()->json($data);
    }
}
