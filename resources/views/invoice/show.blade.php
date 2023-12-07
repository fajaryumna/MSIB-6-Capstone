@extends('landingpage.layout')
@section('content')
<main id="main" class="main">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12 ">
                <div class="card my-5">
                    <div class="card-body">
                        <h3 class="card-title text-center">Detail Pesanan</h3>
                        <h6 class="text-center mb-4">{{ $invoice->no_pemesanan }}</h6>
                        <p><strong>Status</strong> @if($invoice->status == 'paid')
                            <span class="badge bg-success">{{ $invoice->status }}</span>
                            @elseif($invoice->status == 'unpaid')
                            <span class="badge bg-danger">{{ $invoice->status }}</span>
                            @endif</p>
                        <hr>

                        <div class="row mb-3">
                            <div class="col-lg-6">
                                <i class="fas fa-user fa-lg text-primary"></i>
                                <strong>Nama:</strong> {{ $invoice->name }}
                            </div>
                            <div class="col-lg-6">
                                <i class="fas fa-envelope fa-lg text-primary"></i>
                                <strong>Email:</strong> {{ $invoice->email }}
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-lg-12">
                                <i class="fas fa-map-marker-alt fa-lg text-primary"></i>
                                <strong>Alamat:</strong> {{ $invoice->alamat }}
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-lg-12">
                                <i class="fas fa-globe fa-lg text-primary"></i>
                                <strong>Nama Paket Wisata:</strong> {{ $invoice->tour->tour_name }}
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-lg-12">
                                <i class="fas fa-globe fa-lg text-primary"></i>
                                <strong>Destinasi Wisata:</strong> {{ $invoice->tour->destination }}
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-lg-6">
                                <i class="fas fa-money-bill-wave fa-lg text-primary"></i>
                                <strong>Harga:</strong> Rp. {{ number_format($invoice->tour->price, 0, ',', '.') }}
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <div class="col-lg-6">
                                <i class="far fa-calendar-alt fa-lg text-primary"></i>
                                <strong>Tanggal Mulai:</strong> {{ \Carbon\Carbon::parse($invoice->tour->start_date)->isoFormat('D MMMM YYYY') }}
                            </div>
                            <div class="col-lg-6">
                                <i class="far fa-calendar-alt fa-lg text-primary"></i>
                                <strong>Tanggal Selesai:</strong> {{ \Carbon\Carbon::parse($invoice->tour->end_date)->isoFormat('D MMMM YYYY') }}
                            </div>
                        </div>

                        <div class="text-center mt-4">
                            <a href="{{ route('invoice.pdf', $invoice->no_pemesanan) }}" class="btn btn-danger btn-lg"><i class="far fa-file-pdf"></i> Unduh PDF </a>
                            <a href="{{ route('invoice.index') }}" class="btn btn-primary btn-lg"><i class="fas fa-home"></i> Kembali </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection