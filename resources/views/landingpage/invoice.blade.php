@extends('landingpage.layout')
@section('content')
    <div class="container mt-5 py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-9">
                <div class="card mb-4">
                    <div class="card-body">
                        <h3 class="card-title text-center mb-4">Detail Pesanan</h3>
                        <p class="text-center"><strong>{{ $transaksi->no_pemesanan }}</strong></p>
                        <hr>

                        <div class="row mb-3">
                            <div class="col-lg-6">
                                <i class="fas fa-user fa-lg text-primary"></i>
                                <strong>Nama:</strong> {{ $transaksi->name }}
                            </div>
                            <div class="col-lg-6">
                                <i class="fas fa-envelope fa-lg text-primary"></i>
                                <strong>Email:</strong> {{ $transaksi->email }}
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-lg-12">
                                <i class="fas fa-map-marker-alt fa-lg text-primary"></i>
                                <strong>Alamat:</strong> {{ $transaksi->alamat }}
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-lg-12">
                                <i class="fas fa-globe fa-lg text-primary"></i>
                                <strong>Nama Paket Wisata:</strong> {{ $transaksi->tour->tour_name }}
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-lg-12">
                                <i class="fas fa-globe fa-lg text-primary"></i>
                                <strong>Destinasi Wisata:</strong> {{ $transaksi->tour->destination }}
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-lg-6">
                                <i class="fas fa-money-bill-wave fa-lg text-primary"></i>
                                <strong>Harga:</strong> Rp. {{ number_format($transaksi->tour->price, 0, ',', '.') }}
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <div class="col-lg-6">
                                <i class="far fa-calendar-alt fa-lg text-primary"></i>
                                <strong>Tanggal Mulai:</strong> {{ \Carbon\Carbon::parse($transaksi->tour->start_date)->isoFormat('D MMMM YYYY') }}
                            </div>
                            <div class="col-lg-6">
                                <i class="far fa-calendar-alt fa-lg text-primary"></i>
                                <strong>Tanggal Selesai:</strong> {{ \Carbon\Carbon::parse($transaksi->tour->end_date)->isoFormat('D MMMM YYYY') }}
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-lg-12">
                                <strong>Status Pembayaran:</strong> 
                                @if($transaksi->status == 'paid')
                                    <span class="badge bg-success">{{ $transaksi->status }}</span>
                                @elseif($transaksi->status == 'unpaid')
                                    <span class="badge bg-danger">{{ $transaksi->status }}</span>
                                @else
                                    <span class="badge bg-warning">{{ $transaksi->status }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="text-center mt-4">
                            <a href="/" class="btn btn-primary btn-lg"><i class="fas fa-home"></i> Kembali ke Beranda</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
