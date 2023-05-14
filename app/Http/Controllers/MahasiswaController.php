<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\mahasiswa;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $data = mahasiswa::all();
        $data = mahasiswa::orderBy('nim_mhs', 'desc')->paginate(1);

        return view('mahasiswa.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('mahasiswa.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nim_mhs' => 'required|numeric|unique:mahasiswa,nim_mhs',
            'nama_mhs' => 'required',
            'ttl_mhs' => 'required',
            'alamat' => 'required',
            'telpon_mhs' => 'required',
            'email_mhs' => 'required|email',
            'kota_mhs' => 'required',
            'agama_mhs' => 'required',
        ], [
            'nim_mhs.required' => 'Nomor NIM wajib diisi',
            'nim_mhs.numeric' => 'Nomor NIM wajib diisi dalam angka',
            'nama_mhs.required' => 'Nama wajib diisi',
            'ttl_mhs.required' => 'Ttl wajib diisi',
            'alamat.required' => 'Alamat wajib diisi',
            'telpon_mhs.required' => 'Telepon wajib diisi',
            'email_mhs.required' => 'Email wajib diisi',
            'kota_mhs.required' => 'Kota wajib diisi',
            'agama_mhs.required' => 'Agama wajib diisi',
        ]);

        $foto_file = $request->file('gambar');
        $foto_ekstensi = $foto_file->extension();
        $gambar_nama = date('ymdhis'). ".". $foto_ekstensi;
        $foto_file->move(public_path('gambar'), $gambar_nama);

        $data = [
            'nim_mhs' => $request->input('nim_mhs'),
            'nama_mhs' => $request->input('nama_mhs'),
            'ttl_mhs' => $request->input('ttl_mhs'),
            'alamat' => $request->input('alamat'),
            'telpon_mhs' => $request->input('telpon_mhs'),
            'email_mhs' => $request->input('email_mhs'),
            'kota_mhs' => $request->input('kota_mhs'),
            'agama_mhs' => $request->input('agama_mhs'),
            'gambar' => $gambar_nama,
        ];

        mahasiswa::create($data);

        return redirect('mahasiswa')->with('success', 'Berhasil memasukan data');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // return "<h1>Saya Mahasiswa dari STMIK dengan NIM $id</h1>";
        $data = mahasiswa::where('nim_mhs', $id)->first();

        return view('mahasiswa.show')->with('data', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = mahasiswa::where('nim_mhs', $id)->first();
        return view('mahasiswa.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_mhs' => 'required',
            'ttl_mhs' => 'required',
            'alamat' => 'required',
            'telpon_mhs' => 'required',
            'email_mhs' => 'required|email',
            'kota_mhs' => 'required',
            'agama_mhs' => 'required',
        ], [
            'nim_mhs.numeric' => 'Nomor NIM wajib diisi dalam angka',
            'nama_mhs.required' => 'Nama wajib diisi',
            'ttl_mhs.required' => 'Ttl wajib diisi',
            'alamat.required' => 'Alamat wajib diisi',
            'telpon_mhs.required' => 'Telepon wajib diisi',
            'email_mhs.required' => 'Email wajib diisi',
            'kota_mhs.required' => 'Kota wajib diisi',
            'agama_mhs.required' => 'Agama wajib diisi',
        ]);

        $data = [
            // 'nim_mhs' => $request->input('nim_mhs'),
            'nama_mhs' => $request->input('nama_mhs'),
            'ttl_mhs' => $request->input('ttl_mhs'),
            'alamat' => $request->input('alamat'),
            'telpon_mhs' => $request->input('telpon_mhs'),
            'email_mhs' => $request->input('email_mhs'),
            'kota_mhs' => $request->input('kota_mhs'),
            'agama_mhs' => $request->input('agama_mhs'),
        ];

        if ($request->hasFile('gambar')) {
            $request->validate([
                'gambar' => 'mimes:jpeg,jpg,png,gif'
            ], [
                'gambar.mimes' => 'Gambar hanya diperbolehkan berekstensi JPEG, JPG, PNG atau GIF'
            ]);

            $foto_file = $request->file('gambar');
            $foto_ekstensi = $foto_file->extension();
            $gambar_nama = date('ymdhis'). ".". $foto_ekstensi;
            $foto_file->move(public_path('gambar'), $gambar_nama);

            $data = mahasiswa::where('nim_mhs', $id)->first();

            File::delete(public_path('gambar').'/'.$data->gambar);

            $data['gambar'] = $gambar_nama;
        }

        mahasiswa::where('nim_mhs', $id)->update($data);

        return redirect('/mahasiswa')->with('success', 'Berhasil melakukan update data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = mahasiswa::where('nim_mhs', $id)->first();
        File::delete(public_path('gambar').'/'.$data->gambar);

        $data->delete();

        return redirect('/mahasiswa')->with('success', 'Berhasil hapus data');
    }
}
