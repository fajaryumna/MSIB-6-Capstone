<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade as PDF;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function index()
    {
        return view('invoice.index');
    }

    public function show($no_pemesanan)
    {
        $invoice = Transaksi::where('no_pemesanan', $no_pemesanan)->first();

        return view('invoice.show', compact('invoice'));
    }

    public function search(Request $request)
    {
        $no_pemesanan = $request->input('no_pemesanan');
        $invoice = Transaksi::where('no_pemesanan', $no_pemesanan)->first();

        if ($invoice) {
            return redirect()->route('invoice.show', $no_pemesanan);
        } else {
            return redirect()->route('invoice.index')->with('error', 'Invoice tidak ditemukan.');
        }
    }

    public function generatePDF($no_pemesanan)
    {
        $invoice = Transaksi::where('no_pemesanan', $no_pemesanan)->first();

        if (!$invoice) {
            return redirect()->route('invoice.index')->with('error', 'Invoice tidak ditemukan.');
        }

        $pdf = app('dompdf.wrapper')->loadView('invoice.pdf', compact('invoice'));
        return $pdf->download('invoice_' . $no_pemesanan . '.pdf');
    }
}
