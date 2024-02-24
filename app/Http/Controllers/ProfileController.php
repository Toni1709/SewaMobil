<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        $data['data'] = Pengguna::find(Auth::user()->id);
        return view('pages.profile', $data);
    }
    public function update(Request $request, $id)
    {
        $data = Pengguna::find($id);

        $foto = $request->file('foto');
        $pass = $request->password;

        if ($foto) {
            File::delete(public_path('img/' . $data->foto));

            $fotoName = $request->nama . '_' . uniqid() . '.' . $foto->getClientOriginalExtension();
            $foto->move('img', $fotoName);

            if ($pass) {
                Pengguna::find($id)->update([
                    'nama' => $request->nama,
                    'email' => $request->email,
                    'password' => Hash::make($pass),
                    'foto' => $fotoName
                ]);
            } else {
                Pengguna::find($id)->update([
                    'nama' => $request->nama,
                    'email' => $request->email,
                    'foto' => $fotoName
                ]);
            }
        } else {
            if ($pass) {
                Pengguna::find($id)->update([
                    'nama' => $request->nama,
                    'email' => $request->email,
                    'password' => Hash::make($pass),
                ]);
            } else {
                Pengguna::find($id)->update([
                    'nama' => $request->nama,
                    'email' => $request->email,
                ]);
            }
        }
        return redirect()->back()->with('success', 'Profile Berhasil Disimpan!');
    }
}
