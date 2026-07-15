@extends('layouts.app')

@section('content')

<div class="container mt-4">

    <h2>Edit Profil PKL</h2>

    <form action="{{ route('profiles.update', $profile->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control"
                value="{{ $profile->nama }}">
        </div>

        <div class="mb-3">
            <label>Sekolah</label>
            <input type="text" name="sekolah" class="form-control"
                value="{{ $profile->sekolah }}">
        </div>

        <div class="mb-3">
            <label>Tempat PKL</label>
            <input type="text" name="tempat_pkl" class="form-control"
                value="{{ $profile->tempat_pkl }}">
        </div>

        <div class="mb-3">
            <label>Guru Pembimbing</label>
            <input type="text" name="guru_pembimbing" class="form-control"
                value="{{ $profile->guru_pembimbing }}">
        </div>

        <div class="mb-3">
            <label>Instruktur</label>
            <input type="text" name="instruktur" class="form-control"
                value="{{ $profile->instruktur }}">
        </div>

        <div class="mb-3">
            <label>Periode</label>
            <input type="text" name="periode" class="form-control"
                value="{{ $profile->periode }}">
        </div>

        <button class="btn btn-warning">
            Update Profil
        </button>

        <a href="{{ route('profiles.index') }}" class="btn btn-secondary">
            Batal
        </a>

    </form>

</div>

@endsection