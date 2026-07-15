@extends('layouts.app')

@section('content')

<h3>Edit Jurnal</h3>

<form action="{{ route('journals.update', $journal->id) }}" method="POST">

    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>Tanggal</label>
        <input type="date" name="tanggal" class="form-control"
        value="{{ $journal->tanggal }}">
    </div>

    <div class="mb-3">
        <label>Hari</label>
        <input type="text" name="hari" class="form-control"
        value="{{ $journal->hari }}">
    </div>

    <div class="mb-3">
        <label>Unit Kerja / Pekerjaan</label>
        <textarea name="unit_kerja" class="form-control">{{ $journal->unit_kerja }}</textarea>
    </div>

    <div class="mb-3">
        <label>Catatan</label>
        <textarea name="catatan" class="form-control">{{ $journal->catatan }}</textarea>
    </div>

    <button type="submit" class="btn btn-success">
        <i class="bi bi-check-circle"></i>
        Update
    </button>
    <a href="{{ route('journals.index') }}" class="btn btn-secondary">
        Kembali
    </a>

</form>

@endsection