@extends('layouts.app')

@section('content')

<div class="container mt-4">

    <h2>Tambah Profil PKL</h2>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <form action="{{ route('profiles.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control">
        </div>

        <div class="mb-3">
            <label>Sekolah</label>
            <input type="text" name="sekolah" class="form-control">
        </div>

        <div class="mb-3">
            <label>Tempat PKL</label>
            <input type="text" name="tempat_pkl" class="form-control">
        </div>

        <div class="mb-3">
            <label>Guru Pembimbing</label>
            <input type="text" name="guru_pembimbing" class="form-control">
        </div>

        <div class="mb-3">
            <label>Instruktur</label>
            <input type="text" name="instruktur" class="form-control">
        </div>

        <div class="mb-3">
            <label>Periode</label>
            <input type="text" name="periode" class="form-control">
        </div>

        <button class="btn btn-primary">
            Simpan
        </button>

    </form>

</div>

@endsection