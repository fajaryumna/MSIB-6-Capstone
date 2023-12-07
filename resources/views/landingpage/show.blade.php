@extends('landingpage.layout')

@section('content')
    <section id="hero">
        <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>
            <div class="carousel-inner" role="listbox">
                @php
                    $imagePath = "admin/assets/img/tours/{$tour->image}";
                @endphp
                <div class="carousel-item active" style="background-image: url('{{ asset($imagePath) }}')">
                    <div class="carousel-container">
                        <div class="container">
                            <h2 class="animate__animated animate__fadeInDown">{{ $tour->destination }}</h2>
                        </div>
                    </div>
                </div>
            </div>
    </section>

    <div class="destination_banner_wrap overlay py-5">
        <div class="destination_text text-center">
            <h1>{{ $tour->tour_name }}</h1>
        </div>
    </div>

    <div class="destination_details_info">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-9">
                    <div class="destination_info card mb-4">
                        <div class="card-body">
                            <h3 class="card-title">Deskripsi</h3>
                            <p class="card-text"><strong>Destinasi Wilayah : </strong>{{ $tour->destination }}</p>
                        </div>
                    </div>

                    <div class="bordered_1px"></div>

                    <div class="destination_info card mb-4">
                        <div class="card-body">
                            <h3 class="card-title">Details</h3>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"><strong>Harga:</strong> Rp. {{ $tour->price }}</li>
                                <li class="list-group-item"><strong>Tanggal Mulai:</strong> {{ \Carbon\Carbon::parse($tour->start_date)->isoFormat('D MMMM YYYY') }}</li>
                                <li class="list-group-item"><strong>Selesai:</strong>{{ \Carbon\Carbon::parse($tour->end_date)->isoFormat('D MMMM YYYY') }}</li>
                            </ul>
                        </div>
                    </div>

                    <div class="contact_join card mb-4">
                        <div class="card-body">
                            <h3 class="card-title text-center">Pesan Sekarang</h3>
                            <form action="/checkout/{{ $tour->id }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="name">Nama</label>
                                            <input type="text" name="name" id="name" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" name="email" id="email" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="alamat">Alamat</label>
                                            <textarea name="alamat" id="alamat" class="form-control"></textarea>
                                        </div>
                                    </div>
                                    <input type="hidden" name="tour_id" id="tour_id" value="{{ $tour->id }}">
                                    <input type="hidden" name="price" id="price" value="{{ $tour->price }}">
                                    <div class="col-lg-12 text-center py-3">
                                        <div class="submit_btn">
                                            <button type="submit" class="btn btn-success">Pesan</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
