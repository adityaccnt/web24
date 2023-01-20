<?php

namespace App\Http\Controllers;

use App\Models\Mutasi;

class MutasiController extends Controller
{
    public function index()
    {
        $mutasis = Mutasi::orderBy('rombel','desc')->orderBy('nama_peserta','asc')->get();
        return view('auth.mutasi', [
            'mutasis' => $mutasis,
        ]);
    }
}
