@extends('landingpage.layout')
@section('content')
<main id="main">
    <section id="cta" class="cta">
        <div class="container">

            <div class="row">
                <div class="col-lg-9 text-center text-lg-start">
                    <h3>Ayo pilih paket wisata yang kamu inginkan!</h3>
                    <p>Temukan paket wisata murah sesuai dengan destinasi dan harga yang kamu inginkan!</p>
                </div>
            </div>
        </div>
    </section>

    <section id="paket-wisata" class="paket-wisata">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <div class="section-head-alpha">
                        <h2>Pilih Paket Wisata 💼</h2>
                        <p>Hasil pencarian berdasarkan kota :</p>
                    </div>
                </div>
            @if (count($tours) == 0)
                <div class="row" style="margin-top: -30px;">
                    <div class="col-md-12 mb-3">
                        <div class="card">
                            <div class="card-body text-center bg-gray rounded">
                                <h5 class="card-title">Pencarian tidak ditemukan</h5>
                                <p class="card-text">Mohon maaf, paket wisata belum tersedia untuk saat ini</p>
                            </div>                            
                        </div>
                    </div>
                </div>
            @endif

            <div class="row">
                @foreach($tours as $tour)
                @php
                // Menghitung selisih hari antara start_date dan end_date
                $start_date = \Carbon\Carbon::parse($tour->start_date);
                $end_date = \Carbon\Carbon::parse($tour->end_date);
                $duration = $end_date->diffInDays($start_date);
                @endphp
                    <div class="col-lg-4 col-md-6 mb-3">
                        <div class="package-card-alpha">
                            <div class="package-thumb">
                                @if ($tour->image)
                                    <a src="{{ route('detail', $tour->tour_name) }}"><img src="{{ asset('admin/assets/img/tours/' . $tour->image) }}" alt="Tour Image"></a>
                                @endif
                                <p class="card-lavel">
                                    <i class="bi bi-clock"></i> <span>{{ $duration }} Hari &amp; {{ $duration - 1 }} Malam</span>
                                </p>
                            </div>
                            <div class="package-card-body">
                                <h3 class="p-card-title"><a href="{{ route('detail', $tour->tour_name) }}">{{ $tour->tour_name }}</a></h3>
                                <p>{{ $tour->destination }}</p>
                                <div class="p-card-bottom">
                                    <div class="book-btn">
                                        <a href="{{ route('detail', $tour->tour_name) }}">Lihat Paket <i class="bx bxs-right-arrow-alt"></i></a>
                                    </div>
                                    <div class="p-card-info">
                                        <span>Mulai dari</span>
                                        <h6>Rp{{ number_format($tour->price) }}<span>/Org</span></h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
</main>
@endsection