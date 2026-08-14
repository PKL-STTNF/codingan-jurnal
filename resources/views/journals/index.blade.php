@extends('layouts.main')

@section('content')

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="container mt-4">

    <div class="content-card">

        <div class="header-journal d-md-flex justify-content-between align-items-center mb-4">

            <div>

                <h1 class="page-title">
                    📖 Data Jurnal
                </h1>

                <p class="page-subtitle">
                    Kelola kegiatan PKL harian Anda
                </p>

            </div>

            <a href="{{ route('journals.create') }}"
                class="btn btn-primary">

                <i class="bi bi-plus-circle"></i>

                Tambah Jurnal

            </a>

        </div>

        <form action="{{ route('journals.index') }}" method="GET" class="search-area row mb-4">

            <div class="col-md-5">

                <input
                    type="text"
                    name="search"
                    class="form-control search-box"
                    placeholder="Cari kegiatan..."
                    value="{{ request('search') }}">

            </div>

            <div class="col-md-2">

                <button class="btn btn-primary w-100 h-100">

                    <i class="bi bi-search"></i>

                    Cari

                </button>

            </div>

        </form>

        <div class="table-responsive">

            <table class="table table-bordered table-hover">
                
            <thead>

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

                @if($journals->isEmpty())

                    <tr>

                        <td colspan="6" class="text-center py-4">
                            Belum ada data jurnal.
                        </td>

                    </tr>

                @else

                    @foreach($journals as $journal)

                        <tr>

                            <td>{{ $loop->iteration }}</td>
                            <td>{{ \Carbon\Carbon::parse($journal->tanggal)->translatedFormat('d M Y') }}</td>
                            <td>{{ $journal->hari }}</td>
                            <td>{!! nl2br(e($journal->unit_kerja)) !!}</td>
                            <td>{{ $journal->catatan }}</td>

                            <td>

                                <a href="{{ route('journals.edit', $journal->id) }}"
                                    class="btn btn-outline-warning btn-sm">

                                    <i class="bi bi-pencil"></i>

                                </a>

                                <form action="{{ route('journals.destroy', $journal->id) }}"
                                    method="POST"
                                    class="d-inline">

                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-outline-danger btn-sm"
                                        onclick="return confirm('Yakin ingin menghapus?')">

                                        <i class="bi bi-trash"></i>

                                    </button>

                                </form>

                            </td>

                        </tr>

                    @endforeach

                @endif

            </tbody>

        </table>

    </div>

    <div class="mt-4">
        {{ $journals->links('pagination::bootstrap-5') }}
    </div>

</div>

@endsection