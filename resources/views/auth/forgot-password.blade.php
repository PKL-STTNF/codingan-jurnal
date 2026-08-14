@extends('layouts.main')

@section('content')

<div class="row justify-content-center">

    <div class="col-lg-5">

        <div class="card border-0 shadow-lg rounded-4 p-4">

            <div class="text-center mb-4">

                <i class="bi bi-shield-lock-fill text-primary" style="font-size:55px;"></i>

                <h2 class="fw-bold mt-3">
                    Lupa Password?
                </h2>

                <p class="text-muted">
                    Tenang, kami akan membantu kamu mendapatkan kembali akses ke akun Jurnal PKL.
                </p>

            </div>

            @if (session('status'))

                <div class="alert alert-success">

                    {{ session('status') }}

                </div>

            @endif

            <form method="POST" action="{{ route('password.email') }}">

                @csrf

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
                            value="{{ old('email') }}"
                            class="form-control"
                            placeholder="Masukkan email akun kamu"
                            required
                            autofocus>

                    </div>

                    @error('email')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror

                </div>

                <button class="btn btn-primary w-100 py-2">
                    <i class="bi bi-send-fill"></i>
                    Kirim Link Reset Password
                </button>

                <div class="text-center mt-4">

                    <a href="{{ route('login') }}" class="text-decoration-none fw-bold">
                        <i class="bi bi-arrow-left"></i>
                        Kembali ke Login
                    </a>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection