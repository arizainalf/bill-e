<?php
namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Models\Tagihan;
use Illuminate\Http\Request;

class TagihanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pelanggans = Pelanggan::all();
        $tagihans   = Tagihan::with('pelanggan', 'pelanggan.tarif')->get();
        return view('pages.tagihan.index', compact('tagihans', 'pelanggans'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'pelanggan_id' => 'required',
            'bulan'        => 'required',
            'pemakaian'    => 'required',
        ]);

        $pelanggan  = Pelanggan::findOrFail($request->pelanggan_id);
        $daya       = $pelanggan->tarif->daya;
        $tarif      = $pelanggan->tarif->tarif;
        $bulanTahun = explode('-', $request->bulan);
        $tahun      = $bulanTahun[0];
        $bulan      = $bulanTahun[1];
        $pemakaian  = $request->pemakaian;

        $tagihan = $tarif * $pemakaian;

        $save = Tagihan::create([
            'pelanggan_id' => $request->pelanggan_id,
            'bulan'        => $bulan,
            'tahun'        => $tahun,
            'pemakaian'    => $request->pemakaian,
            'tagihan'      => $tagihan,
        ]);

        if ($save) {
            session()->flash('success', 'Data Berhasil Ditambahkan');
            return redirect()->route('tagihan.index')->with('success', 'Data Berhasil Ditambahkan');
        } else {
            session()->flash('error', 'Data Gagal Ditambahkan');
            return redirect()->route('tagihan.index')->with('error', 'Data Gagal Ditambahkan');
        }
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $request->validate([
            'pelanggan_id' => 'required',
            'bulan'        => 'required',
            'pemakaian'    => 'required',
        ]);

        $pelanggan  = Pelanggan::findOrFail($request->pelanggan_id);
        $daya       = $pelanggan->tarif->daya;
        $tarif      = $pelanggan->tarif->tarif;
        $bulanTahun = explode('-', $request->bulan);
        $tahun      = $bulanTahun[0];
        $bulan      = $bulanTahun[1];
        $pemakaian  = $request->pemakaian;

        $tagihan = $tarif * $pemakaian;

        $update = Tagihan::where('id', $request->id)->update([
            'pelanggan_id' => $request->pelanggan_id,
            'bulan'        => $bulan,
            'tahun'        => $tahun,
            'pemakaian'    => $request->pemakaian,
            'tagihan'      => $tagihan,
        ]);

        if ($update) {
            session()->flash('success', 'Data Berhasil Diubah');
            return redirect()->route('tagihan.index')->with('success', 'Data Berhasil Diubah');
        } else {
            session()->flash('error', 'Data Gagal Diubah');
            return redirect()->route('tagihan.index')->with('error', 'Data Gagal Diubah');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $delete = Tagihan::find($id)->delete();
        if ($delete) {
            session()->flash('success', 'Data Berhasil Dihapus');
            return redirect()->route('tagihan.index')->with('success', 'Data Berhasil Dihapus');
        } else {
            session()->flash('error', 'Data Gagal Dihapus');
            return redirect()->route('tagihan.index')->with('error', 'Data Gagal Dihapus');
        }
    }
}
