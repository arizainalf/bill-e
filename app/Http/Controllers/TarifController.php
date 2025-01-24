<?php
namespace App\Http\Controllers;

use App\Models\Tarif;
use Illuminate\Http\Request;

class TarifController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tarifs = Tarif::with('user')->get();
        return view('pages.tarif.index', compact('tarifs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'daya'  => 'required',
            'tarif' => 'required',
        ]);

        $save = Tarif::create([
            'user_id' => $request->user_id,
            'daya'  => $request->daya,
            'tarif' => $request->tarif,
        ]);
        if ($save) {
            session()->flash('success', 'Data Berhasil Ditambahkan');
            return redirect()->route('tarif.index')->with('success', 'Data Berhasil Ditambahkan');
        } else {
            session()->flash('error', 'Data Gagal Ditambahkan');
            return redirect()->route('tarif.index')->with('error', 'Data Gagal Ditambahkan');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $request->validate([
            'id'    => 'required|exists:tarifs,id',
            'daya'  => 'required|numeric',
            'tarif' => 'required|numeric',
        ]);

        $tarif        = Tarif::findOrFail($request->id);
        $tarif->daya  = $request->daya;
        $tarif->tarif = $request->tarif;
        $tarif->save();

        return redirect()->back()->with('success', 'Tarif berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Tarif::find($id);
        $data->delete();
        session()->flash('success', 'Data Berhasil Dihapus');
        return redirect()->route('tarif.index')->with('success', 'Data Berhasil Dihapus');
    }
}
