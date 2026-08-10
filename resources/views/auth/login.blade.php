@extends('layouts.main')

@section('content')

<div class="row justify-content-center">

    <div class="col-lg-5">

        <div class="card border-0 shadow-lg rounded-4 p-4">

            <div class="text-center mb-4">

                <i class="bi bi-journal-bookmark-fill text-primary"
                   style="font-size:55px;"></i>

                <h2 class="fw-bold mt-3">
                    Selamat Datang 
                </h2>

                <p class="text-muted">
                    Silakan masuk untuk melanjutkan ke akun Anda
                </p>

            </div>

            @if(session('status'))

                <div class="alert alert-success">

                    {{ session('status') }}

                </div>

            @endif

            <form method="POST" action="{{ route('login') }}">

                @csrf

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
                               value="{{ old('email') }}"
                               class="form-control"
                               placeholder="Masukkan email Anda"
                               required>

                    </div>

                    @error('email')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror

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

                        <button class="btn btn-outline-secondary"
                                type="button"
                                onclick="togglePassword()">

                            <i id="eyeIcon" class="bi bi-eye"></i>

                        </button>

                    </div>

                    @error('password')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror

                </div>

                <div class="d-flex justify-content-between mb-4">

                    <div class="form-check">

                        <input class="form-check-input"
                               type="checkbox"
                               name="remember">

                        <label class="form-check-label">

                            Ingat Saya

                        </label>

                    </div>

                    @if (Route::has('password.request'))

                        <a href="{{ route('password.request') }}"
                           class="text-decoration-none">

                            Lupa Password?

                        </a>

                    @endif

                </div>

                <button class="btn btn-primary w-100 py-2">

                    Login

                </button>

            </form>

            <div class="text-center mt-4">

                Belum punya akun?

                <a href="{{ route('register') }}"
                   class="text-decoration-none fw-bold">

                    Daftar Sekarang

                </a>

            </div>

        </div>

    </div>

</div>

<script>

function togglePassword(){

    let password=document.getElementById('password');
    let eye=document.getElementById('eyeIcon');

    if(password.type==="password"){

        password.type="text";
        eye.classList.replace("bi-eye","bi-eye-slash");

    }else{

        password.type="password";
        eye.classList.replace("bi-eye-slash","bi-eye");

    }

}

</script>

@endsection