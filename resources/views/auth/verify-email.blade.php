@extends('layouts.main')

@section('content')

<div class="row justify-content-center">

    <div class="col-lg-5">

        <div class="card border-0 shadow-lg rounded-4 p-4">

            <div class="text-center mb-4">

                <i class="bi bi-envelope-check-fill text-primary" style="font-size:55px;"></i>

                <h2 class="fw-bold mt-3">
                    Verifikasi Email
                </h2>

                <p class="text-muted">
                    Terima kasih telah mendaftar! Sebelum memulai, mohon verifikasi alamat email Anda
                    dengan mengklik tautan yang baru saja kami kirimkan ke email Anda.
                </p>

            </div>

            @if (session('status') == 'verification-link-sent')

                <div class="alert alert-success">

                    <i class="bi bi-check-circle"></i>

                    Tautan verifikasi baru telah dikirim ke alamat email yang Anda berikan saat pendaftaran.

                </div>

            @endif

            <form method="POST" action="{{ route('verification.send') }}">

                @csrf

                <button class="btn btn-primary w-100 py-2">

                    <i class="bi bi-send"></i>

                    Kirim Ulang Email Verifikasi

                </button>

            </form>

            <div class="text-center mt-3">

                <form method="POST" action="{{ route('logout') }}">

                    @csrf

                    <button type="submit" class="btn btn-link text-muted text-decoration-none">

                        <i class="bi bi-box-arrow-right"></i>

                        Keluar

                    </button>

                </form>

            </div>

        </div>

    </div>

</div>

@endsection