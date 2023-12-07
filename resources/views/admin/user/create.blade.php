@extends('admin.components.app')

@section('contents')
<main id="main" class="main">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Tambahkan Pengguna Baru</h5>

            <!-- Display validation errors if any -->
            @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <!-- Horizontal Form -->
            <form action="{{ route('store_user') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row mb-3">
                    <label for="name" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="level" class="col-sm-2 col-form-label">Level</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="level" name="level">
                            <option selected>Pilih level pengguna</option>
                            <option value="User" {{ old('level')=='User' ? 'selected' : '' }}>User</option>
                            <option value="Admin" {{ old('level')=='Admin' ? 'selected' : '' }}>Admin</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="password" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <input type="password" class="form-control" id="password" name="password">
                            <button type="button" class="btn btn-outline-secondary" id="togglePassword">
                                <i class="bi bi-eye"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="password_confirmation" class="col-sm-2 col-form-label">Konfirmasi Password</label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <input type="password" class="form-control" id="password_confirmation"
                                name="password_confirmation">
                            <button type="button" class="btn btn-outline-secondary" id="togglePasswordconfirmation">
                                <i class="bi bi-eye"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="reset" class="btn btn-secondary">Reset</button>
                </div>
            </form><!-- End Horizontal Form -->

        </div>
    </div>
</main><!-- End #main -->

<script>
    document.getElementById('togglePassword').addEventListener('click', function () {
        var passwordInput = document.getElementById('password');
        if (passwordInput.type === 'password' ) {
            passwordInput.type = 'text';
        } else {
            passwordInput.type = 'password';
        }
    });
    document.getElementById('togglePasswordconfirmation').addEventListener('click', function () {
        var confirmationInput = document.getElementById('password_confirmation');
        if (confirmationInput.type === 'password') {
            confirmationInput.type = 'text';
        } else {
            confirmationInput.type = 'password';
        }
    });
</script>
@endsection