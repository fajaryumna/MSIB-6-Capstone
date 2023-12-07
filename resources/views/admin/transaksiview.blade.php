@extends('admin.components.app')

@section('contents')
<main id="main" class="main">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12 ">
                <div class="card mb-4">
                    <div class="card-body">
                        <h3 class="card-title text-center">Detail Pesanan</h3>
                        <p class="text-center">{{ $riwayat->no_pemesanan }}</p>
                        <p><strong>Status</strong> @if($riwayat->status == 'paid')
                            <span class="badge bg-success">{{ $riwayat->status }}</span>
                            @elseif($riwayat->status == 'unpaid')
                            <span class="badge bg-danger">{{ $riwayat->status }}</span>
                            @endif</p>
                        <hr>

                        <div class="row mb-3">
                            <div class="col-lg-6">
                                <i class="fas fa-user fa-lg text-primary"></i>
                                <strong>Nama:</strong> {{ $riwayat->name }}
                            </div>
                            <div class="col-lg-6">
                                <i class="fas fa-envelope fa-lg text-primary"></i>
                                <strong>Email:</strong> {{ $riwayat->email }}
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-lg-12">
                                <i class="fas fa-map-marker-alt fa-lg text-primary"></i>
                                <strong>Alamat:</strong> {{ $riwayat->alamat }}
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-lg-12">
                                <i class="fas fa-globe fa-lg text-primary"></i>
                                <strong>Nama Paket Wisata:</strong> {{ $riwayat->tour->tour_name }}
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-lg-12">
                                <i class="fas fa-globe fa-lg text-primary"></i>
                                <strong>Destinasi Wisata:</strong> {{ $riwayat->tour->destination }}
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-lg-6">
                                <i class="fas fa-money-bill-wave fa-lg text-primary"></i>
                                <strong>Harga:</strong> Rp. {{ number_format($riwayat->tour->price, 0, ',', '.') }}
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <div class="col-lg-6">
                                <i class="far fa-calendar-alt fa-lg text-primary"></i>
                                <strong>Tanggal Mulai:</strong> {{ \Carbon\Carbon::parse($riwayat->tour->start_date)->isoFormat('D MMMM YYYY') }}
                            </div>
                            <div class="col-lg-6">
                                <i class="far fa-calendar-alt fa-lg text-primary"></i>
                                <strong>Tanggal Selesai:</strong> {{ \Carbon\Carbon::parse($riwayat->tour->end_date)->isoFormat('D MMMM YYYY') }}
                            </div>
                        </div>

                        <div class="text-center mt-4">
                            <a href="/transaksi" class="btn btn-primary btn-lg"><i class="fas fa-home"></i> Kembali </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection