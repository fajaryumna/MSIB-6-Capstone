@extends('landingpage.layout')
@section('content')
<!-- @TODO: replace SET_YOUR_CLIENT_KEY_HERE with your client key -->
<script type="text/javascript"
src="https://app.sandbox.midtrans.com/snap/snap.js"
data-client-key="{{ config('midtrans.client_key') }}"></script>
<!-- Note: replace with src="https://app.midtrans.com/snap/snap.js" for Production environment -->
    <div class="container mt-5 py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-9">
                <div class="card mb-4">
                    <div class="card-body">
                        <h3 class="card-title text-center mb-4">Detail Pesanan</h3>
                        <hr>

                        <div class="row mb-3">
                            <div class="col-lg-6">
                                <i class="fas fa-user fa-lg text-primary"></i>
                                <strong>Nama:</strong> {{ $transaksi->name }}
                            </div>
                            <div class="col-lg-6">
                                <i class="fas fa-envelope fa-lg text-primary"></i>
                                <strong>Email:</strong> {{ $transaksi->email }}
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-lg-12">
                                <i class="fas fa-map-marker-alt fa-lg text-primary"></i>
                                <strong>No Pemesanan:</strong> {{ $transaksi->no_pemesanan }}
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-lg-12">
                                <i class="fas fa-map-marker-alt fa-lg text-primary"></i>
                                <strong>Alamat:</strong> {{ $transaksi->alamat }}
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-lg-12">
                                <i class="fas fa-globe fa-lg text-primary"></i>
                                <strong>Nama Paket Wisata:</strong> {{ $transaksi->tour->tour_name }}
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-lg-12">
                                <i class="fas fa-globe fa-lg text-primary"></i>
                                <strong>Destinasi Wisata:</strong> {{ $transaksi->tour->destination }}
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-lg-6">
                                <i class="fas fa-money-bill-wave fa-lg text-primary"></i>
                                <strong>Harga:</strong> Rp. {{ number_format($transaksi->tour->price, 0, ',', '.') }}
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <div class="col-lg-6">
                                <i class="far fa-calendar-alt fa-lg text-primary"></i>
                                <strong>Tanggal Mulai:</strong> {{ \Carbon\Carbon::parse($transaksi->tour->start_date)->isoFormat('D MMMM YYYY') }}
                            </div>
                            <div class="col-lg-6">
                                <i class="far fa-calendar-alt fa-lg text-primary"></i>
                                <strong>Tanggal Selesai:</strong> {{ \Carbon\Carbon::parse($transaksi->tour->end_date)->isoFormat('D MMMM YYYY') }}
                            </div>
                        </div>

                        <div class="text-center mt-4">
                            <button class="btn btn-success btn-lg" id="pay-button">Bayar Sekarang</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="snap-container"></div>

    <script type="text/javascript">
        // For example trigger on button clicked, or any time you need
        var payButton = document.getElementById('pay-button');
        payButton.addEventListener('click', function () {
          // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
          window.snap.pay('{{ $snapToken }}', {
            onSuccess: function(result){
              /* You may add your own implementation here */
            //   alert("payment success!"); 
              window.location.href = "/pemesanan/{{ $transaksi->id }}"
              console.log(result);
            },
            onPending: function(result){
              /* You may add your own implementation here */
              alert("wating your payment!"); console.log(result);
            },
            onError: function(result){
              /* You may add your own implementation here */
              alert("payment failed!"); console.log(result);
            },
            onClose: function(){
              /* You may add your own implementation here */
              alert('you closed the popup without finishing the payment');
            }
          })
        });
      </script>
    
@endsection
