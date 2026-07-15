@extends('layouts.app')

@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<h3>Tambah Jurnal</h3>

<form action="{{ route('journals.store') }}" method="POST">

    @csrf

    <div class="mb-3">
        <label>Tanggal</label>
        <input type="date" name="tanggal" class="form-control">
    </div>

    <div class="mb-3">
        <label>Hari</label>
        <input type="text" name="hari" class="form-control">
    </div>

    <div class="mb-3">
        <label>Unit Kerja / Pekerjaan</label>
        <textarea name="unit_kerja" class="form-control"></textarea>
    </div>

    <div class="mb-3">
        <label>Catatan</label>
        <textarea name="catatan" class="form-control"></textarea>
    </div>
    <button class="btn btn-success">
        Simpan
    </button>

</form>

@endsection