@extends('layouts.main')

@section('content')

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

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

                                <td>
                                    {{ \Carbon\Carbon::parse($journal->tanggal)->translatedFormat('d M Y') }}
                                </td>

                                <td>
                                    {{ $journal->hari }}
                                </td>

                                <td>
                                    {!! nl2br(e($journal->unit_kerja)) !!}
                                </td>

                                <td>
                                    {{ $journal->catatan }}
                                </td>

                                <td>

                                    <a href="{{ route('journals.edit', $journal->id) }}"
                                        class="btn btn-outline-warning btn-sm">

                                        <i class="bi bi-pencil"></i>

                                    </a>

                                    <button
                                        type="button"
                                        class="btn btn-outline-danger btn-sm"
                                        data-bs-toggle="modal"
                                        data-bs-target="#deleteModal"
                                        data-delete-url="{{ route('journals.destroy', $journal->id) }}"
                                        data-delete-date="{{ \Carbon\Carbon::parse($journal->tanggal)->translatedFormat('d M Y') }}">

                                        <i class="bi bi-trash"></i>

                                    </button>

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

    {{-- =========================
        MODAL KONFIRMASI DELETE
    ========================= --}}

    <div
        class="modal fade"
        id="deleteModal"
        tabindex="-1"
        aria-labelledby="deleteModalLabel"
        aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered">

            <div
                class="modal-content border-0 shadow"
                style="border-radius: 18px; overflow:hidden;">

                {{-- HEADER --}}

                <div class="modal-body p-4 text-center">

                    {{-- ICON --}}

                    <div
                        class="mx-auto mb-3 d-flex align-items-center justify-content-center"
                        style="
                            width:70px;
                            height:70px;
                            border-radius:50%;
                            background:#fff1f2;
                            color:#dc3545;
                            font-size:32px;
                        ">

                        <i class="bi bi-trash3-fill"></i>

                    </div>

                    {{-- JUDUL --}}

                    <h4 class="fw-bold mb-2">
                        Hapus Jurnal?
                    </h4>

                    {{-- DESKRIPSI --}}

                    <p class="text-muted mb-2">
                        Apakah Anda yakin ingin menghapus jurnal ini?
                    </p>

                    <p class="text-muted small mb-4">
                        Data yang sudah dihapus tidak dapat dikembalikan.
                    </p>

                    {{-- FORM DELETE --}}

                    <form id="deleteForm" method="POST">

                        @csrf
                        @method('DELETE')

                        <div class="d-flex justify-content-center gap-2">

                            {{-- BATAL --}}

                            <button
                                type="button"
                                class="btn btn-light px-4"
                                data-bs-dismiss="modal"
                                style="border-radius:10px;">

                                Batal

                            </button>

                            {{-- HAPUS --}}

                            <button
                                type="submit"
                                class="btn btn-danger px-4"
                                style="border-radius:10px;">

                                <i class="bi bi-trash3 me-1"></i>

                                Ya, Hapus

                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

    {{-- =========================
        SCRIPT MODAL DELETE
    ========================= --}}

    <script>

        document.addEventListener('DOMContentLoaded', function () {

            const deleteModal = document.getElementById('deleteModal');

            const deleteForm = document.getElementById('deleteForm');

            deleteModal.addEventListener('show.bs.modal', function (event) {

                const button = event.relatedTarget;

                const deleteUrl = button.getAttribute('data-delete-url');

                deleteForm.setAttribute('action', deleteUrl);

            });

        });

    </script>

@endsection