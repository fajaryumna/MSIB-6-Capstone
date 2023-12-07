@extends('admin.components.app')

@section('contents')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </nav>
    </div>

    <section class="section dashboard">
        <div class="row">

            <!-- Left side columns -->
            <div class="col-lg-12">
                <div class="row">

                    <!-- Sales Card -->
                    <div class="col-xxl-6 col-md-6">
                        <div class="card info-card sales-card">

                            <div class="card-body">
                                <h5 class="card-title">Total Transaksi</h5>

                                <div class="d-flex align-items-center">
                                    <div
                                        class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-cart"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ $totalTransaksi }}</h6>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- End Sales Card -->

                    <!-- Revenue Card -->
                    <div class="col-xxl-6 col-md-6">
                        <div class="card info-card revenue-card">
                            <div class="card-body">
                                <h5 class="card-title">Total Paket Wisata</h5>

                                <div class="d-flex align-items-center">
                                    <div
                                        class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-image"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ $totalWisata }}</h6>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <!-- Recent Sales -->
                    <div class="col-12">
                        <div class="card recent-sales overflow-auto">

                            <div class="card-body">
                                <h5 class="card-title">Transaksi Terkini</h5>

                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Nama</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Nama Paket</th>
                                            <th scope="col">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                        $no = 1;
                                        @endphp
                                        @foreach ( $transaksiTerbaru as $transaksi )
                                            
                                        <tr>
                                            <th scope="row">{{ $no++ }}</th>
                                            <td>{{ $transaksi->name }}</td>
                                            <td>{{ $transaksi->email }}</td>
                                            <td>{{ $transaksi->tour->tour_name }}</td>
                                            <td>
                                                @if($transaksi->status == 'paid')
                                                <span class="badge bg-success">{{ $transaksi->status }}</span>
                                                @else
                                                <span class="badge bg-danger">{{ $transaksi->status }}</span>
                                                @endif
                                            </td>
                                        </tr>
                                        @endforeach
                                       
                                    </tbody>
                                </table>

                            </div>

                        </div>
                    </div><!-- End Recent Sales -->

                </div>
            </div><!-- End Left side columns -->

            

        </div>
    </section>

</main>
@endsection