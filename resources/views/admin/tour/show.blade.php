@extends('admin.components.app')

@section('contents')
<main id="main" class="main">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Detail Paket Wisata</h5>
            <!-- Horizontal Form -->
            <form>
                <!-- Laravel CSRF token -->
                <div class="mb-3">
                    @php
                    $imagePath = "admin/assets/img/tours/{$tour->image}";
                    @endphp
                    <img src="{{ asset($imagePath) }}" alt="Tour Image" class="custom-image" style="height: 200px">
                </div>

                <div class="row mb-3">
                    <label for="tour_name" class="col-sm-2 col-form-label">Nama Paket</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="tour_name" name="tour_name"
                            value="{{ $tour->tour_name }}" disabled>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="destination" class="col-sm-2 col-form-label">Destinasi</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="destination" name="destination"
                            value="{{ $tour->destination }}" disabled>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="price" class="col-sm-2 col-form-label">Harga</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="price" name="price" value="@currency($tour->price)"
                            disabled>
                    </div>
                </div>

                 <div class="row mb-3">
                    <label for="start_date" class="col-sm-2 col-form-label">Tanggal Mulai</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="start_date" name="start_date"
                            value="{{ \Carbon\Carbon::parse($tour->start_date)->isoFormat('D MMMM YYYY') }}" readonly>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="end_date" class="col-sm-2 col-form-label">Tanggal Selesai</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="end_date" name="end_date"
                            value="{{ \Carbon\Carbon::parse($tour->end_date)->isoFormat('D MMMM YYYY') }}" readonly>
                    </div>
                </div>
                <div class="text-center mt-4">
                    <a href="/tours" class="btn btn-primary btn-lg"><i class="fas fa-home"></i> Kembali </a>
                </div>
            </form><!-- End Horizontal Form -->
        </div>
    </div>
</main><!-- End #main -->
@endsection