<?php

namespace App\Http\Controllers;

use App\Models\ManajemenMobil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class ManajemenMobilController extends Controller
{
    public function index()
    {
        $data['manajemenMobil'] = ManajemenMobil::with('pengguna')
            ->where('pengguna_id', Auth::user()->id)
            ->get();
        return view('pages.manajemen-mobil', $data);
    }
    public function add(Request $request)
    {
        $foto = $request->file('foto');
        if ($foto) {
            $fotoName = uniqid() . '.' . $foto->getClientOriginalExtension();
            $foto->move('img', $fotoName);
        } else {
            $fotoName = null;
        }

        ManajemenMobil::create([
            'pengguna_id' => Auth::user()->id,
            'merek' => $request->merek,
            'model' => $request->model,
            'no_plat' => $request->no_plat,
            'tarif' => $request->tarif,
            'foto' => $fotoName,
            'status' => 'Tersedia',
        ]);

        return redirect()->back()->with('success', 'Data Berhasil Disimpan!');
    }
    public function update(Request $request, $id)
    {
        $data = ManajemenMobil::find($id);
        $foto = $request->file('foto');
        if ($foto) {
            File::delete(public_path('img/' . $data->foto));
            $fotoName = uniqid() . '.' . $foto->getClientOriginalExtension();
            $foto->move('img', $fotoName);
            ManajemenMobil::find($id)->update([
                'merek' => $request->merek,
                'model' => $request->model,
                'no_plat' => $request->no_plat,
                'tarif' => $request->tarif,
                'foto' => $fotoName,
            ]);
        } else {
            ManajemenMobil::find($id)->update([
                'merek' => $request->merek,
                'model' => $request->model,
                'no_plat' => $request->no_plat,
                'tarif' => $request->tarif,
            ]);
        }
        return redirect()->back()->with('success', 'Data Berhasil Diperbarui!');
    }
    public function delete($id)
    {
        $data = ManajemenMobil::find($id);
        File::delete(public_path('img/' . $data->foto));
        ManajemenMobil::find($id)->delete();
        return redirect()->back()->with('success', 'Data Berhasil Dihapus!');
    }
}
