<?php

namespace App\Http\Controllers;

use App\Models\Tarif;
use App\Models\Tagihan;
use App\Models\Pelanggan;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $tagihan = Tagihan::count();
        $pelanggan = Pelanggan::count();
        $tarif = Tarif::count();
        return view('pages.dashboard.index', compact('tagihan', 'pelanggan', 'tarif'));
    }
}
