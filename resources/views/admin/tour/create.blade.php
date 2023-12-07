@extends('admin.components.app')

@section('contents')
<main id="main" class="main">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Tambahkan Paket Wisata</h5>

            <!-- Horizontal Form -->
            <form action="{{ route('store_tour') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <!-- Laravel CSRF token -->
                <div class="row mb-3">
                    <label for="tour_name" class="col-sm-2 col-form-label">Nama Paket</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="tour_name" name="tour_name">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="destination" class="col-sm-2 col-form-label">Destinasi</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="destination" name="destination">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="price" class="col-sm-2 col-form-label">Harga</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="price" name="price">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="image" class="col-sm-2 col-form-label">Gambar</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="file" id="image" name="image">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="start_date" class="col-sm-2 col-form-label">Tanggal Mulai</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" id="start_date" name="start_date">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="end_date" class="col-sm-2 col-form-label">Tanggal Selesai</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" id="end_date" name="end_date">
                    </div>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Tambah</button>
                    <button type="reset" class="btn btn-secondary">Reset</button>
                </div>
            </form><!-- End Horizontal Form -->

        </div>
    </div>
</main><!-- End #main -->
@endsection