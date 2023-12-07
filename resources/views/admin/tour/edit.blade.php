@extends('admin.components.app')


@section('contents')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <main id="main" class="main">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Edit Paket Wisata</h5>

                <!-- Horizontal Form -->
                <form action="{{ route('update_tour', $tour->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                        <label for="tour_name" class="col-sm-2 col-form-label">Nama Paket</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="tour_name" name="tour_name"
                                value="{{ $tour->tour_name }}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="destination" class="col-sm-2 col-form-label">Destinasi</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="destination" name="destination"
                                value="{{ $tour->destination }}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="price" class="col-sm-2 col-form-label">Harga</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="price" name="price"
                                value="{{ $tour->price }}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputNumber" class="col-sm-2 col-form-label">Gambar</label>
                        <div class="col-sm-10">
                            @if($tour->image)
                            <img src="{{ asset('admin/assets/img/tours/' . $tour->image) }}" alt="Old Tour Image"
                                style="max-height: 200px;">
                            @else
                            <p>Tidak ada gambar</p>
                            @endif
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="image" class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control" id="image" name="image">
                        </div>
                    </div>

                    <div class=" row mb-3">
                        <label for="start_date" class="col-sm-2 col-form-label">Tanggal Mulai</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" id="start_date" name="start_date"
                                value="{{ $tour->start_date }}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="end_date" class="col-sm-2 col-form-label">Tanggal Selesai</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" id="end_date" name="end_date"
                                value="{{ $tour->end_date }}">
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <button type="reset" class="btn btn-secondary">Cancel</button>
                    </div>
                </form><!-- End Horizontal Form -->
            </div>
        </div>
    </main><!-- End #main -->
</body>

</html>
@endsection