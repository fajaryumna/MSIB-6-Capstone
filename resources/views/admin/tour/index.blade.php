@extends("admin.components.app")

@section('contents')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Paket Wisata</h1>
            {{-- <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active">Data</li>
                </ol>
            </nav> --}}
        </div><!-- End Page Title -->
        {{-- <div>
            <button type="button" class="btn btn-primary mb-3">+ New</button>
        </div> --}}
        <a href="{{ route('create_tour') }}" class="btn btn-primary mb-3">+ Tambah Paket    </a>

        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            {{-- <h5 class="card-title">Datatables</h5>
                            <p>Add lightweight datatables to your project with using the <a
                                    href="https://github.com/fiduswriter/Simple-DataTables" target="_blank">Simple
                                    DataTables</a> library. Just add <code>.datatable</code> class name to any table you
                                wish to conver to a datatable</p> --}}

                            <!-- Table with stripped rows -->
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Destinasi</th>
                                        <th scope="col">Harga</th>
                                        <th scope="col">Mulai</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $no = 1;
                                    @endphp
                                    @foreach ($tours as $tour)
                                    <tr>
                                        <th scope="row">{{ $no++ }}</th>
                                        <td>{{ $tour->tour_name }}</td>
                                        <td>{{ $tour->destination }}</td>
                                        <td>@currency($tour->price)</td>
                                        <td>{{ \Carbon\Carbon::parse($tour->start_date)->format('j M Y') }}</td>
                                        <td>
                                            <a href="{{ route('show_tour', ['id' => $tour->id]) }}"
                                                class="btn btn-info btn-sm">
                                                <i class="fa fa-eye"></i> View
                                            </a>
                                            <a href="{{ route('edit_tour', ['id' => $tour->id]) }}"
                                                class="btn btn-warning btn-sm">
                                                <i class="fa fa-pencil"></i> Edit
                                            </a>
                                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#hapusModal{{ $tour->id }}">Delete<i
                                                    class="fa fa-trash"></i>
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="hapusModal{{ $tour->id }}" tabindex="-1"
                                                aria-labelledby="hapusModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="hapusModalLabel">Konfirmasi</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <form method="POST"
                                                            action="{{ route('destroy_tour', $tour->id) }}">
                                                            @csrf
                                                            <div class="modal-body">
                                                                Apakah Anda yakin ingin menghapus paket
                                                                {{$tour->tour_name }}?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Tidak</button>
                                                                <button type="submit" class="btn btn-danger">Ya</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <!-- End Table with stripped rows -->
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </main><!-- End #main -->
@endsection