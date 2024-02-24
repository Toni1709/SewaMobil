<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PeminjamanMobilController extends Controller
{
    public function index(){
        return view('pages.peminjaman-mobil');
    }
    public function formPeminjaman(){
        return view('pages.form.form-peminjaman-mobil');
    }
}
