<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\PesantrenTerdekat;
use Illuminate\Http\Request;

class PesantrenTerdekatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = PesantrenTerdekat::query();

        if ($request->search) {
            $query->where('nama_lembaga', 'like', "%".$query->search."%")
            ->orWhere('no_statistik', 'like', "%".$query->search."%")
            ->orWhere('alamat', 'like', "%".$query->search."%");
        }

        $limit = $request->per_page ?? 5;

        $data = PesantrenTerdekat::paginate($limit);

        return view('pesantren-terdekat.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pesantren-terdekat.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'no_statistik' => 'required|string|unique:pesantren_terdekat,no_statistik',
            'nama_lembaga' => 'required|string',
            'no_telepon' => 'string|nullable',
            'alamat' => 'required|string|min:10',
        ], [
            'no_statistik.required' => 'No Statistik tidak boleh kosong !',
            'no_statistik.string' => 'No Statistik harus berupa string !',
            'no_statistik.unique' => 'No Statistik harus unik !',
            'nama_lembaga.required' => 'Nama Lembaga tidak boleh kosong !',
            'nama_lembaga.string' => 'Nama Lembaga harus berupa string !',
            'no_telepon.string' => 'No Telepon harus berupa string !',
            'alamat.min' => 'Alamat minimal 10 character !',
            'alamat.string' => 'Alamat harus berupa string !',
            'alamat.required' => 'Alamat tidak boleh kosong !',
        ]);

        PesantrenTerdekat::create([
            'no_statistik' => $request->no_statistik,
            'nama_lembaga' => $request->nama_lembaga,
            'no_telepon' => $request->no_telepon,
            'alamat' => $request->alamat
        ]);

        return redirect()->route('pesantren-terdekat.index')->with(['success' => 'Data berhasil disimpan !']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = PesantrenTerdekat::findOrFail($id);

        return view('pesantren-terdekat.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = PesantrenTerdekat::findOrFail($id);

        return view('pesantren-terdekat.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'no_statistik' => 'required|string|unique:pesantren_terdekat,no_statistik,'. $id,
            'nama_lembaga' => 'required|string',
            'no_telepon' => 'string|nullable',
            'alamat' => 'required|string|min:10',
        ], [
            'no_statistik.required' => 'No Statistik tidak boleh kosong !',
            'no_statistik.string' => 'No Statistik harus berupa string !',
            'no_statistik.unique' => 'No Statistik harus unik !',
            'nama_lembaga.required' => 'Nama Lembaga tidak boleh kosong !',
            'nama_lembaga.string' => 'Nama Lembaga harus berupa string !',
            'no_telepon.string' => 'No Telepon harus berupa string !',
            'alamat.min' => 'Alamat minimal 10 character !',
            'alamat.string' => 'Alamat harus berupa string !',
            'alamat.required' => 'Alamat tidak boleh kosong !',
        ]);

        $data = PesantrenTerdekat::findOrFail($id);

        $data->update([
            'no_statistik' => $request->no_statistik,
            'nama_lembaga' => $request->nama_lembaga,
            'no_telepon' => $request->no_telepon,
            'alamat' => $request->alamat
        ]);

        return redirect()->route('pesantren-terdekat.index')->with(['success' => 'Data berhasil diupdate !']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        PesantrenTerdekat::findOrFail($id)->delete();

        return redirect()->route('pesantren-terdekat.index')->with(['success' => 'Data berhasil dihapus !']);
    }
}
