<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login()
    {
        return view('pages.login');
    }
    public function register(Request $request)
    {
        $register =  Pengguna::create([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'no_telp' => $request->no_telp,
            'no_sim' => $request->no_sim,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        if ($register) {
            $data = [
                'email' => $request->email,
                'password' => $request->password
            ];

            if (Auth::attempt($data)) {
                return redirect()->route('profile')->with('success', 'Selamat Datang!');
            }
        }
    }
    public function postlogin(Request $request)
    {
        $data = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (Auth::attempt($data)) {
            return redirect()->route('profile')->with('success', 'Selamat Datang!');
        }
    }
    public function logout(){
        if(Auth::check()){
            Auth::logout();
        }
        return redirect()->route('login');
    }
}
