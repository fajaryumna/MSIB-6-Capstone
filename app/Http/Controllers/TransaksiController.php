<?php

namespace App\Http\Controllers;

use App\Models\Tour;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function checkout(Request $request){
        // Contoh menggunakan timestamp dan uniqid
        $nomor_pesanan = 'INV-' . time() . '-' . uniqid();

        $request->request->add(['status' => 'unpaid', 'no_pemesanan' => $nomor_pesanan]);
        $transaksi = Transaksi::create($request->all());

        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => $transaksi->id,
                'gross_amount' => $transaksi->tour->price,
            ),
            'customer_details' => array(
                'first_name' => $request->name,
                'last_name' => '',
                'email' => $request->email,
                
            ),
        );

        $snapToken = \Midtrans\Snap::getSnapToken($params);
        // dd($snapToken);
        return view('landingpage.checkout', compact('snapToken', 'transaksi'));
    }

    public function callback(Request $request){
        $serverKey = config('midtrans.server_key');
        $hashed = hash("sha512", $request->order_id.$request->status_code.$request->gross_amount.$serverKey);
        if($hashed == $request->signature_key){
            if($request->transaction_status == 'capture'){
                $transaksi = Transaksi::find($request->order_id);
                $transaksi->update(['status' => 'paid']);
            }
        }        
    }

    public function pemesanan($id){
        $transaksi = Transaksi::find($id);
        return view('landingpage.invoice', compact('transaksi'));
    }
    
    public function index(){
        $riwayat = Transaksi::orderBy('created_at', 'DESC')->get();
        return view('admin.transaksi', compact('riwayat'));
    }

    public function destroy(string $id)
    {
        $riwayat = Transaksi::find($id);
        $riwayat->delete();
        return redirect()->route('riwayat')->with('success', 'Transaksi berhasil dihapus');
    }

    public function show($id){
        $riwayat = Transaksi::find($id);
        return view('admin.transaksiview', compact('riwayat'));
    }
}
