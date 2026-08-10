@extends('layouts.main')

@section('content')

<h1 class="page-title">
    👤 Profil Saya
</h1>

<p class="page-subtitle">
    Kelola informasi akun Anda.
</p>

<div class="row">

    <div class="col-lg-8">

        <div class="card border-0 shadow-sm">

            <div class="card-body">

                <h4 class="mb-4">
                    Informasi Akun
                </h4>

                <form method="POST" action="{{ route('profile.update') }}">

                    @csrf
                    @method('PATCH')

                    <div class="mb-3">

                        <label class="form-label">
                            Nama
                        </label>

                        <input
                            type="text"
                            name="name"
                            class="form-control"
                            value="{{ old('name', auth()->user()->name) }}">

                    </div>

                    <div class="mb-4">

                        <label class="form-label">
                            Email
                        </label>

                        <input
                            type="email"
                            name="email"
                            class="form-control"
                            value="{{ old('email', auth()->user()->email) }}">

                    </div>

                    <button class="btn btn-primary">

                        <i class="bi bi-save"></i>

                        Simpan Perubahan

                    </button>

                </form>

            </div>

        </div>

    </div>

    <div class="col-lg-4">

        <div class="card border-0 shadow-sm">

            <div class="card-body text-center">

                <div
                    class="rounded-circle bg-primary text-white mx-auto d-flex justify-content-center align-items-center"
                    style="width:90px;height:90px;font-size:36px;">

                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}

                </div>

                <h4 class="mt-3">
                    {{ Auth::user()->name }}
                </h4>

                <p class="text-muted">
                    {{ Auth::user()->email }}
                </p>

                <hr>

                <p>
                    Jumlah Jurnal
                </p>

                <h2>
                    {{ Auth::user()->journals()->count() }}
                </h2>

            </div>

        </div>

    </div>

</div>

@endsection