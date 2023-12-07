@extends('admin.components.app')

@section('contents')
<main id="main" class="main">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Detail Data Pengguna</h5>
            <form>
                <div class="row mb-3">
                    <label for="name" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" readonly
                            disabled>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}"
                            readonly disabled>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="level" class="col-sm-2 col-form-label">Level</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="level" name="level" disabled>
                            <option value="User" {{ $user->level === 'User' ? 'selected' : '' }}>User</option>
                            <option value="Admin" {{ $user->level === 'Admin' ? 'selected' : '' }}>Admin</option>
                        </select>
                    </div>
                </div>
                <div class="text-center mt-4">
                    <a href="/users" class="btn btn-primary btn-lg"><i class="fas fa-home"></i> Kembali </a>
                </div>
            </form>
        </div>
    </div>
</main>
@endsection