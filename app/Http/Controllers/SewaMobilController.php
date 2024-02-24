<?php

namespace App\Http\Controllers;

use App\Models\ManajemenMobil;
use Illuminate\Http\Request;

class SewaMobilController extends Controller
{
    public function index(){
        $data['manajemenMobil'] = ManajemenMobil::with('pengguna')->get();
        return view('pages.sewa-mobil', $data);
    }
}
