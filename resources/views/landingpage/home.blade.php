@extends('landingpage.layout')
@section('content')
<section id="hero">
    <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">
        <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>
        <div class="carousel-inner" role="listbox">

            <div class="carousel-item active" style="background-image: url('assets/img/slide/slide-1.jpeg')">
                <div class="carousel-container">
                    <div class="container">
                        <h2 class="animate__animated animate__fadeInDown">Ayo temukan destinasi menarik dari kami
                        </h2>
                        <p class="animate__animated animate__fadeInUp">Temukan keindahan dunia bersama kami. Setiap langkah adalah petualangan baru, penuh keajaiban alam dan kebudayaan. Nikmati momen-momen berharga dan temukan keunikan destinasi menarik. Ayo jelajahi dunia, buat kenangan indah yang tak terlupakan!</p>
                        <a href="#paket-wisata" class="btn-get-started animate__animated animate__fadeInUp scrollto">Lihat
                            Paket Wisata</a>
                    </div>
                </div>
            </div>

            <!-- Slide 2 -->
            <div class="carousel-item" style="background-image: url('assets/img/slide/slide-2.jpeg')">
                <div class="carousel-container">
                    <div class="container">
                        <h2 class="animate__animated animate__fadeInDown">Indahnya Alam Indonesia</h2>
                        <p class="animate__animated animate__fadeInUp">Nikmati setiap detiknya, temukan pesona di setiap sudut dunia yang menanti untuk dijelajahi. Buatlah cerita tak terlupakan dalam setiap langkah petualanganmu bersama kami.</p>
                        {{-- <a href="" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read
                            More</a> --}}
                    </div>
                </div>
            </div>

            <!-- Slide 3 -->
            <div class="carousel-item" style="background-image: url('assets/img/slide/slide-3.jpeg')">
                <div class="carousel-container">
                    <div class="container">
                        <h2 class="animate__animated animate__fadeInDown">Jelajahi dan Rasakan Keajaiban!</h2>
                        <p class="animate__animated animate__fadeInUp">Setiap destinasi adalah pintu menuju kisah seru dan keindahan yang menggoda. Bergabunglah dengan kami dan rasakan sensasi petualangan yang tak terlupakan!</p>
                        {{-- <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read
                            More</a> --}}
                    </div>
                </div>
            </div>
        </div>

        <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
            <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
        </a>

        <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
            <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
        </a>
    </div>
</section>

<main id="main">
    <section id="cta" class="cta">
        <div class="container">

            <div class="row">
                <div class="col-lg-9 text-center text-lg-start">
                    <h3>Ayo pilih paket wisata yang kamu inginkan!</h3>
                    <p>Temukan paket wisata murah sesuai dengan destinasi dan harga yang kamu inginkan!</p>
                </div>
                <div class="col-lg-3 cta-btn-container text-center">
                    <a class="cta-btn align-middle scrollto" href="{{ route('package') }}">Lihat Paket</a>
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
                        <p>Ayo pilih dan tentukan tempat wisata favorit sesuai keinginanmu!</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="package-btn text-lg-end">
                        <a href="{{ route('package') }}" class="button-fill-primary">Lihat Keseluruhan Paket</a>
                    </div>
                </div>
            </div>

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