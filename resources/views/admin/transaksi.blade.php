@extends("admin.components.app")

@section('contents')
<main id="main" class="main">
<div class="pagetitle">
    <h1>Riwayat Transaksi</h1>
</div>
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
                                <th scope="col">Email</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">Status</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $no = 1;
                            @endphp
                            @foreach ($riwayat as $show)
                            <tr>
                                <th scope="row">{{ $no++ }}</th>
                                <td>{{ $show->name }}</td>
                                <td>{{ $show->email }}</td>
                                <td>{{ $show->alamat }}</td>
                                <td>
                                    @if($show->status == 'paid')
                                    <span class="badge bg-success">{{ $show->status }}</span>
                                    @elseif($show->status == 'unpaid')
                                        <span class="badge bg-danger">{{ $show->status }}</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('show_transaksi', ['id' => $show->id]) }}"
                                        class="btn btn-info btn-sm">
                                        <i class="fa fa-eye"></i> View
                                    </a>
                                    {{-- <a href="{{ route('edit_tour', ['id' => $tour->id]) }}"
                                        class="btn btn-warning btn-sm">
                                        <i class="fa fa-pencil"></i> Edit
                                    </a> --}}
                                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#hapusModal{{ $show->id }}">Delete<i
                                            class="fa fa-trash"></i>
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="hapusModal{{ $show->id }}" tabindex="-1"
                                        aria-labelledby="hapusModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="hapusModalLabel">Konfirmasi</h5>
                                                    <button type="button" class="btn-close"
                                                        data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <form method="POST"
                                                    action="{{ route('destroy_riwayat', $show->id) }}">
                                                    @csrf
                                                    <div class="modal-body">
                                                        Apakah Anda yakin ingin menghapus transaksi
                                                        {{$show->name }}?
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