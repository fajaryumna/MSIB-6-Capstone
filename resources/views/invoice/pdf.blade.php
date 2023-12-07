<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Invoice</title>
</head>
<body>
    <h2 class="text-center">Invoice Detail</h2>

    <main id="main" class="main">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12 ">
                    <div class="card my-5">
                        <div class="card-body">
                            <h3 class="card-title text-center">Detail Pesanan</h3>
                            <h6 class="text-center mb-4">{{ $invoice->no_pemesanan }}</h6>
                            <p><strong>Status </strong>{{ $invoice->status }}</p>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
