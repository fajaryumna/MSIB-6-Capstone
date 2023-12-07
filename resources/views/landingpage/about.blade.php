@extends('landingpage.layout')
@section('content')
<main id="main">
    <section id="about" class="about">
        <div class="container">

            <div class="section-title">
                <h2>Selamat Datang di HafaaTour</h2>
                <p>Menemukan keindahan dunia bersama kami adalah pengalaman tak terlupakan. HafaaTour
                    hadir dengan komitmen untuk memberikan perjalanan terbaik dan menjelajahi destinasi menakjubkan
                    bersama Anda.</p>
            </div>

            <div class="row mt-3">
                <div class="col-lg-6">
                    <h4>Visi Kami</h4>
                    <p>Visi kami adalah menjadi agen perjalanan terkemuka yang memimpin dengan standar kualitas
                        tinggi, memberikan inspirasi untuk menjelajahi keindahan dunia.</p>
                    <p>Dengan staf berpengalaman dan pengetahuan mendalam tentang setiap destinasi, kami bertekad untuk
                        membawa Anda pada perjalanan yang tidak hanya memuaskan keinginan petualangan Anda tetapi juga
                        memberikan wawasan mendalam tentang budaya dan keajaiban alam.</p>
                </div>
                <div class="col-lg-6">
                    <h4>Misi Kami</h4>
                    <p>Misi kami adalah menyediakan paket wisata berkualitas tinggi, dengan layanan ramah dan
                        pengalaman tak terlupakan untuk setiap perjalanan Anda bersama HafaaTour.</p>
                    <p>Kami berkomitmen untuk memberikan pengalaman pelanggan yang luar biasa dengan memberikan paket
                        wisata yang dirancang khusus sesuai dengan kebutuhan dan keinginan Anda. Dengan fokus pada
                        kepuasan pelanggan, kami menghadirkan layanan yang memenuhi standar tertinggi.</p>
                </div>
            </div>

            <div class="section-title mt-4">
                <h4>Kenapa Memilih HafaaTour?</h4>
                <p>Kami bangga menjadi pilihan utama para pelanggan kami karena:</p>
            </div>

            <ul class="list-unstyled">
                <li><i class="bx bx-check-circle"></i> Layanan pelanggan 24/7 untuk mendukung perjalanan Anda.</li>
                <li><i class="bx bx-check-circle"></i> Paket wisata yang dirancang khusus untuk segala jenis
                    petualangan.</li>
                <li><i class="bx bx-check-circle"></i> Staf berpengalaman dengan pengetahuan mendalam tentang
                    destinasi.</li>
                <li><i class="bx bx-check-circle"></i> Kualitas layanan tinggi dengan harga yang kompetitif.</li>
            </ul>

            <div class="section-title mt-4">
                <h4>Paket Wisata Unggulan Kami</h4>
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
