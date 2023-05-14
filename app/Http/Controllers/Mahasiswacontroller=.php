<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\mahasiswa;
use Illuminate\Http\Request;

class Mahasiswacontroller extends Controller
{
    public function index() {
        // $data = mahasiswa::all();
        $data = mahasiswa::orderBy('nim_mhs', 'desc')->paginate(1);

        return view('mahasiswa.index')->with('data', $data);
    }

    public function detail($id) {
        // return "<h1>Saya Mahasiswa dari STMIK dengan NIM $id</h1>";
        $data = mahasiswa::where('nim_mhs', $id)->first();

        return view('mahasiswa.show')->with('data', $data);
    }
}
