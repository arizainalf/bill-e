<?php
namespace App\Http\Controllers;

use App\Models\Tarif;
use App\Models\Pelanggan;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tarifs = Tarif::all();
        $pelanggans = Pelanggan::with('tarif')->get();
        return view('pages.pelanggan.index', compact('pelanggans', 'tarifs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tarif_id' => 'required',
            'nama'     => 'required',
            'no_hp'     => 'required',
            'alamat'   => 'required',
        ]);

        $save = Pelanggan::create([
            'tarif_id' => $request->tarif_id,
            'nama'     => $request->nama,
            'no_hp'     => $request->no_hp,
            'alamat'   => $request->alamat,
        ]);

        if ($save) {
            session()->flash('success', 'Data Berhasil Ditambahkan');
            return redirect()->route('pelanggan.index')->with('success', 'Data Berhasil Ditambahkan');
        } else {
            session()->flash('error', 'Data Gagal Ditambahkan');
            return redirect()->route('pelanggan.index')->with('error', 'Data Gagal Ditambahkan');
        }

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $request->validate([
            'tarif_id' => 'required',
            'nama'     => 'required',
            'no_hp'     => 'required',
            'alamat'   => 'required',
        ]);

        $pelanggan           = Pelanggan::findOrFail($request->id);
        $pelanggan->tarif_id = $request->tarif_id;
        $pelanggan->nama     = $request->nama;
        $pelanggan->no_hp     = $request->no_hp;
        $pelanggan->alamat   = $request->alamat;
        $pelanggan->save();

        return redirect()->back()->with('success', 'Tarif berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Pelanggan::find($id);
        $data->delete();
        session()->flash('success', 'Data Berhasil Dihapus');
        return redirect()->route('pelanggan.index')->with('success', 'Data Berhasil Dihapus');

    }
}
