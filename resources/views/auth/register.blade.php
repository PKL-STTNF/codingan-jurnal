@extends('layouts.main')

@section('content')

<div class="row justify-content-center">

    <div class="col-lg-5">

        <div class="card border-0 shadow-lg rounded-4 p-4">

            <div class="text-center mb-4">

                <i class="bi bi-journal-bookmark-fill text-primary"
                   style="font-size:55px;"></i>

                <h2 class="fw-bold mt-3">
                    Buat Akun Baru
                </h2>

                <p class="text-muted">
                    Silakan lengkapi data untuk membuat akun.
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

            <form method="POST" action="{{ route('register') }}">

                @csrf

                <div class="mb-3">

                    <label class="form-label fw-semibold">

                        Nama Lengkap

                    </label>

                    <div class="input-group">

                        <span class="input-group-text">
                            <i class="bi bi-person"></i>
                        </span>

                        <input type="text"
                               name="name"
                               class="form-control"
                               value="{{ old('name') }}"
                               placeholder="Masukkan nama lengkap"
                               required>

                    </div>

                </div>

                <div class="mb-3">

                    <label class="form-label fw-semibold">

                        Email

                    </label>

                    <div class="input-group">

                        <span class="input-group-text">
                            <i class="bi bi-envelope"></i>
                        </span>

                        <input type="email"
                               name="email"
                               class="form-control"
                               value="{{ old('email') }}"
                               placeholder="Masukkan email"
                               required>

                    </div>

                </div>

                <div class="mb-3">

                    <label class="form-label fw-semibold">

                        Password

                    </label>

                    <div class="input-group">

                        <span class="input-group-text">
                            <i class="bi bi-lock"></i>
                        </span>

                        <input type="password"
                               id="password"
                               name="password"
                               class="form-control"
                               placeholder="Masukkan password"
                               required>

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

                        <input type="password"
                               id="password_confirmation"
                               name="password_confirmation"
                               class="form-control"
                               placeholder="Konfirmasi password"
                               required>

                        <button type="button"
                                class="btn btn-outline-secondary"
                                onclick="togglePassword('password_confirmation','eye2')">

                            <i id="eye2" class="bi bi-eye"></i>

                        </button>

                    </div>

                </div>

                <button class="btn btn-primary w-100 py-2">

                    Daftar

                </button>

            </form>

            <div class="text-center mt-4">

                Sudah punya akun?

                <a href="{{ route('login') }}"
                   class="text-decoration-none fw-bold">

                    Login sekarang

                </a>

            </div>

        </div>

    </div>

</div>

<script>

function togglePassword(id,icon){

    let input=document.getElementById(id);
    let eye=document.getElementById(icon);

    if(input.type==="password"){

        input.type="text";
        eye.classList.replace("bi-eye","bi-eye-slash");

    }else{

        input.type="password";
        eye.classList.replace("bi-eye-slash","bi-eye");

    }

}

</script>

@endsection