@extends('layouts.main')

@section('content')

<div class="row justify-content-center">

    <div class="col-lg-5">

        <div class="card border-0 shadow-lg rounded-4 p-4">

            <div class="text-center mb-4">

                <i class="bi bi-key-fill text-primary" style="font-size:55px;"></i>

                <h2 class="fw-bold mt-3">
                    Reset Password
                </h2>

                <p class="text-muted">
                    Buat kata sandi baru untuk akun Anda.
                </p>

            </div>

            @if ($errors->any())

                <div class="alert alert-danger">

                    <ul class="mb-0">

                        @foreach ($errors->all() as $error)

                            <li>{{ $error }}</li>

                        @endforeach

                    </ul>

                </div>

            @endif

            <form method="POST" action="{{ route('password.store') }}">

                @csrf

                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                <div class="mb-3">

                    <label class="form-label fw-semibold">
                        Email
                    </label>

                    <div class="input-group">

                        <span class="input-group-text">
                            <i class="bi bi-envelope"></i>
                        </span>

                        <input
                            type="email"
                            name="email"
                            value="{{ old('email', $request->email) }}"
                            class="form-control"
                            placeholder="Masukkan email Anda"
                            required
                            autofocus
                            autocomplete="username">

                    </div>

                </div>

                <div class="mb-3">

                    <label class="form-label fw-semibold">
                        Password Baru
                    </label>

                    <div class="input-group">

                        <span class="input-group-text">
                            <i class="bi bi-lock"></i>
                        </span>

                        <input
                            type="password"
                            name="password"
                            id="password"
                            class="form-control"
                            placeholder="Masukkan password baru"
                            required
                            autocomplete="new-password">

                        <button type="button"
                                class="btn btn-outline-secondary"
                                onclick="togglePassword('password','eye1')">

                            <i id="eye1" class="bi bi-eye"></i>

                        </button>

                    </div>

                </div>

                <div class="mb-4">

                    <label class="form-label fw-semibold">
                        Konfirmasi Password
                    </label>

                    <div class="input-group">

                        <span class="input-group-text">
                            <i class="bi bi-lock-fill"></i>
                        </span>

                        <input
                            type="password"
                            name="password_confirmation"
                            id="password_confirmation"
                            class="form-control"
                            placeholder="Ulangi password baru"
                            required
                            autocomplete="new-password">

                        <button type="button"
                                class="btn btn-outline-secondary"
                                onclick="togglePassword('password_confirmation','eye2')">

                            <i id="eye2" class="bi bi-eye"></i>

                        </button>

                    </div>

                </div>

                <button class="btn btn-primary w-100 py-2">
                    <i class="bi bi-check-circle"></i>
                    Reset Password
                </button>

            </form>

        </div>

    </div>

</div>

<script>

function togglePassword(id, icon) {

    const input = document.getElementById(id);
    const eye = document.getElementById(icon);

    if (input.type === "password") {

        input.type = "text";
        eye.classList.replace("bi-eye", "bi-eye-slash");

    } else {

        input.type = "password";
        eye.classList.replace("bi-eye-slash", "bi-eye");

    }

}

</script>

@endsection