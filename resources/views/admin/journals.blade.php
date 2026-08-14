@extends('layouts.admin')

@section('content')

<div class="mb-4">

    <h2 class="page-title">
        📘 Semua Jurnal
    </h2>

    <p class="page-subtitle">
        Menampilkan seluruh jurnal dari semua pengguna.
    </p>

</div>


{{-- =========================
     SEARCH
========================= --}}

<form action="{{ route('admin.journals') }}"
      method="GET"
      class="row g-2 mb-4">

    <div class="col-md-6">

        <input
            type="text"
            name="search"
            class="form-control search-box"
            placeholder="Cari nama user, hari, pekerjaan, atau catatan..."
            value="{{ request('search') }}">

    </div>

    <div class="col-md-2">

        <button class="btn btn-primary w-100">

            <i class="bi bi-search"></i>
            Cari

        </button>

    </div>

    @if(request('search'))

        <div class="col-md-2">

            <a href="{{ route('admin.journals') }}"
               class="btn btn-outline-secondary w-100">

                Reset

            </a>

        </div>

    @endif

</form>


{{-- =========================
     TABLE
========================= --}}

<div class="table-responsive">

    <table class="table table-bordered table-hover align-middle">

        <thead>

            <tr>

                <th>No</th>

                <th>Pengguna</th>

                <th>Tanggal</th>

                <th>Hari</th>

                <th>Unit Kerja</th>

                <th>Catatan</th>

            </tr>

        </thead>

        <tbody>

            @forelse($journals as $journal)

                <tr>

                    <td>
                        {{ $journals->firstItem() + $loop->index }}
                    </td>

                    <td>

                        <div class="d-flex align-items-center">

                            <div class="rounded-circle bg-primary text-white
                                        d-flex justify-content-center
                                        align-items-center me-2"
                                 style="width:35px;height:35px;">

                                {{ strtoupper(substr($journal->user->name ?? '?', 0, 1)) }}

                            </div>

                            <strong>
                                {{ $journal->user->name ?? 'User tidak ditemukan' }}
                            </strong>

                        </div>

                    </td>

                    <td>
                        {{ $journal->tanggal }}
                    </td>

                    <td>
                        {{ $journal->hari }}
                    </td>

                    <td>
                        {!! nl2br(e($journal->unit_kerja)) !!}
                    </td>

                    <td>
                        {{ $journal->catatan ?: '-' }}
                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="6"
                        class="text-center text-muted py-5">

                        <i class="bi bi-journal-x fs-1 d-block mb-2"></i>

                        Tidak ada jurnal yang ditemukan.

                    </td>

                </tr>

            @endforelse

        </tbody>

    </table>

</div>


{{-- =========================
     PAGINATION
========================= --}}

@if($journals->hasPages())

   <div class="d-flex justify-content-center mt-4">
    <ul class="pagination mb-0">

        {{-- Previous --}}
        @if ($journals->onFirstPage())
            <li class="page-item disabled">
                <span class="page-link">‹</span>
            </li>
        @else
            <li class="page-item">
                <a class="page-link" href="{{ $journals->previousPageUrl() }}">‹</a>
            </li>
        @endif

        {{-- Nomor halaman --}}
        @foreach ($journals->getUrlRange(1, $journals->lastPage()) as $page => $url)
            <li class="page-item {{ $page == $journals->currentPage() ? 'active' : '' }}">
                <a class="page-link" href="{{ $url }}">{{ $page }}</a>
            </li>
        @endforeach

        {{-- Next --}}
        @if ($journals->hasMorePages())
            <li class="page-item">
                <a class="page-link" href="{{ $journals->nextPageUrl() }}">›</a>
            </li>
        @else
            <li class="page-item disabled">
                <span class="page-link">›</span>
            </li>
        @endif

    </ul>
</div>

@endif

@endsection