<?php

namespace App\Http\Controllers;

use App\Models\Tour;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $totalTransaksi = Transaksi::count();
        $totalWisata = Tour::count();
         // Mengambil data transaksi terbaru (misalnya, 5 transaksi terbaru)
        $transaksiTerbaru = Transaksi::latest()->take(5)->get();
        
        // Pass data ke view 'admin.dashboard'
        return view('admin.dashboard', compact('totalTransaksi', 'totalWisata', 'transaksiTerbaru'));
        
    }
}
