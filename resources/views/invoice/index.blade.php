@extends('landingpage.layout')
@section('content')
<main id="main" class="main">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12 ">
            <div class="card my-5">
                <div class="card-header">
                    <h2 class="card-title">Mencari Invoice</h2>
                </div>

                <div class="card-body">
                    @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    <form action="{{ route('invoice.search') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="no_pemesanan">Nomor Pemesanan:</label>
                            <input type="text" name="no_pemesanan" id="no_pemesanan" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-primary my-3">Cari Invoice</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</main>
@endsection
