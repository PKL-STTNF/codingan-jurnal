@extends('layouts.app')

@section('content')

@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<div class="d-flex justify-content-between align-items-center mb-4">

<h2>

<i class="bi bi-book"></i>

Data Jurnal PKL

</h2>

<a href="{{ route('journals.create') }}" class="btn btn-primary">

<i class="bi bi-plus-circle"></i>

Tambah Jurnal 

</a>

</div>

<form action="{{ route('journals.index') }}" method="GET" class="mb-3">

    <div class="row">

        <div class="col-md-4">

            <input
                type="text"
                name="search"
                class="form-control"
                placeholder="Cari pekerjaan atau hari..."
                value="{{ request('search') }}">

        </div>

        <div class="col-md-2">

            <button class="btn btn-primary">
                Cari
            </button>

        </div>

    </div>

</form>

</div>

<table class="table table-bordered table-hover">

    <thead class="table-primary">

        <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>Hari</th>
            <th>Unit Kerja</th>
            <th>Catatan</th>
            <th>Aksi</th>
        </tr>

    </thead>

<tbody>

@foreach($journals as $journal)

<tr>

<td>{{ $loop->iteration }}</td>
<td>{{ $journal->tanggal }}</td>
<td>{{ $journal->hari }}</td>
<td>{!! nl2br(e($journal->unit_kerja)) !!}</td>
<td>{{ $journal->catatan }}</td>

<td>

<a href="{{ route('journals.edit',$journal->id) }}" class="btn btn-warning btn-sm">

<i class="bi bi-pencil-square"></i>

</a>

<form action="{{ route('journals.destroy',$journal->id) }}"
      method="POST"
      class="d-inline">

    @csrf
    @method('DELETE')

    <button class="btn btn-danger btn-sm"
            onclick="return confirm('Yakin ingin menghapus?')">
        <i class="bi bi-trash"></i>
    </button>

</form>

</td>

</tr>

@endforeach

</tbody>

</table>

@endsection