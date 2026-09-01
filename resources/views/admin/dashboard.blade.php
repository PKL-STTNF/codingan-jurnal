@extends('layouts.admin')

@section('content')

{{-- =========================
     HEADER
========================= --}}

<div class="mb-4">

    <div class="card border-0 shadow-sm overflow-hidden"
         style="border-radius:18px;">

        <div class="card-body p-4"
             style="background:linear-gradient(135deg,#2563eb,#3b82f6);color:white;">

            <div class="row align-items-center">

                <div class="col-md-8">

                    <div class="mb-2"
                         style="font-size:14px;opacity:.85;">

                        {{ $greeting }} • ADMINISTRATOR

                    </div>

                    <h2 class="fw-bold mb-2">
                         Dashboard Admin
                    </h2>

                    <p class="mb-0"
                       style="opacity:.9;">

                        {{ $today }}

                    </p>

                </div>

                <div class="col-md-4 text-md-end mt-3 mt-md-0">

                    <div style="font-size:48px;">
                        📚
                    </div>

                </div>

            </div>

        </div>

    </div>

</div>


{{-- =========================
     STATISTIK
========================= --}}

<div class="row g-4 mb-4">

    {{-- TOTAL USER --}}

    <div class="col-md-6 col-xl-3">

        <div class="card border-0 shadow-sm h-100"
             style="border-radius:16px;">

            <div class="card-body p-4">

                <div class="d-flex justify-content-between align-items-start">

                    <div>

                        <p class="text-muted mb-2">
                            Total User
                        </p>

                        <h2 class="fw-bold mb-1">
                            {{ $totalUsers }}
                        </h2>

                        <small class="text-success">

                            <i class="bi bi-people"></i>

                            Pengguna terdaftar

                        </small>

                    </div>


                    <div class="rounded-3 d-flex align-items-center justify-content-center"
                         style="
                            width:52px;
                            height:52px;
                            background:#e8f0ff;
                            color:#2563eb;
                         ">

                        <i class="bi bi-people-fill fs-4"></i>

                    </div>

                </div>

            </div>

        </div>

    </div>


    {{-- TOTAL JURNAL --}}

    <div class="col-md-6 col-xl-3">

        <div class="card border-0 shadow-sm h-100"
             style="border-radius:16px;">

            <div class="card-body p-4">

                <div class="d-flex justify-content-between align-items-start">

                    <div>

                        <p class="text-muted mb-2">
                            Total Jurnal
                        </p>

                        <h2 class="fw-bold mb-1">
                            {{ $totalJournals }}
                        </h2>

                        <small class="text-success">

                            <i class="bi bi-journal-text"></i>

                            Semua jurnal

                        </small>

                    </div>


                    <div class="rounded-3 d-flex align-items-center justify-content-center"
                         style="
                            width:52px;
                            height:52px;
                            background:#e8fff2;
                            color:#198754;
                         ">

                        <i class="bi bi-journal-text fs-4"></i>

                    </div>

                </div>

            </div>

        </div>

    </div>


    {{-- TOTAL ADMIN --}}

    <div class="col-md-6 col-xl-3">

        <div class="card border-0 shadow-sm h-100"
             style="border-radius:16px;">

            <div class="card-body p-4">

                <div class="d-flex justify-content-between align-items-start">

                    <div>

                        <p class="text-muted mb-2">
                            Total Admin
                        </p>

                        <h2 class="fw-bold mb-1">
                            {{ $totalAdmins }}
                        </h2>

                        <small class="text-warning">

                            <i class="bi bi-shield-check"></i>

                            Administrator

                        </small>

                    </div>


                    <div class="rounded-3 d-flex align-items-center justify-content-center"
                         style="
                            width:52px;
                            height:52px;
                            background:#fff7df;
                            color:#f59e0b;
                         ">

                        <i class="bi bi-shield-lock-fill fs-4"></i>

                    </div>

                </div>

            </div>

        </div>

    </div>


    {{-- JURNAL HARI INI --}}

    <div class="col-md-6 col-xl-3">

        <div class="card border-0 shadow-sm h-100"
             style="border-radius:16px;">

            <div class="card-body p-4">

                <div class="d-flex justify-content-between align-items-start">

                    <div>

                        <p class="text-muted mb-2">
                            Jurnal Hari Ini
                        </p>

                        <h2 class="fw-bold mb-1">
                            {{ $journalsToday }}
                        </h2>

                        <small class="text-info">

                            <i class="bi bi-calendar-check"></i>

                            Aktivitas hari ini

                        </small>

                    </div>


                    <div class="rounded-3 d-flex align-items-center justify-content-center"
                         style="
                            width:52px;
                            height:52px;
                            background:#e6faff;
                            color:#0dcaf0;
                         ">

                        <i class="bi bi-calendar-check-fill fs-4"></i>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>


{{-- =========================
     AKTIVITAS USER + JURNAL TERBARU
========================= --}}

<div class="row g-4 mb-4">


    {{-- =========================
         AKTIVITAS USER
    ========================= --}}

    <div class="col-lg-5">

        <div class="card border-0 shadow-sm h-100"
             style="border-radius:16px;">

            <div class="card-body p-4">

                <div class="mb-4">

                    <h5 class="fw-bold mb-1">
                        Aktivitas User
                    </h5>

                    <p class="text-muted small mb-0">
                        User dengan jumlah jurnal terbanyak
                    </p>

                </div>


                @forelse($topUsers as $user)

                    <div class="d-flex align-items-center mb-3">

                        {{-- AVATAR --}}

                        <div class="rounded-circle d-flex align-items-center justify-content-center me-3"
                             style="
                                width:42px;
                                height:42px;
                                min-width:42px;
                                background:#e8f0ff;
                                color:#2563eb;
                                font-weight:bold;
                             ">

                            {{ strtoupper(mb_substr($user->name, 0, 1)) }}

                        </div>


                        {{-- USER INFO --}}

                        <div class="flex-grow-1"
                             style="min-width:0;">

                            <div class="fw-semibold text-truncate">

                                {{ $user->name }}

                            </div>

                            <small class="text-muted text-truncate d-block">

                                {{ $user->email }}

                            </small>

                        </div>


                        {{-- JUMLAH JURNAL --}}

                        <span class="badge bg-primary ms-2">

                            {{ $user->journals_count }} jurnal

                        </span>

                    </div>

                @empty

                    <div class="text-center py-4">

                        <div style="font-size:35px;">
                            👤
                        </div>

                        <p class="text-muted mb-0 mt-2">

                            Belum ada data user.

                        </p>

                    </div>

                @endforelse

            </div>

        </div>

    </div>


    {{-- =========================
         JURNAL TERBARU
    ========================= --}}

    <div class="col-lg-7">

        <div class="card border-0 shadow-sm h-100"
             style="border-radius:16px;">

            <div class="card-body p-4">

                {{-- HEADER TABEL --}}

                <div class="d-flex justify-content-between align-items-center mb-4">

                    <div>

                        <h5 class="fw-bold mb-1">
                            Jurnal Terbaru
                        </h5>

                        <p class="text-muted small mb-0">

                            Jurnal terbaru dari seluruh user

                        </p>

                    </div>


                    <a href="{{ route('admin.journals') }}"
                       class="btn btn-sm btn-primary">

                        Lihat Semua

                        <i class="bi bi-arrow-right"></i>

                    </a>

                </div>


                {{-- TABEL --}}

                <div class="table-responsive">

                    <table class="table align-middle mb-0">

                        <thead>

                            <tr>

                                <th>
                                    User
                                </th>

                                <th>
                                    Pekerjaan
                                </th>

                                <th>
                                    Tanggal
                                </th>

                                <th>
                                    Hari
                                </th>

                            </tr>

                        </thead>


                        <tbody>

                            @forelse($recentJournals as $journal)

                                <tr>

                                    {{-- USER --}}

                                    <td>

                                        <div class="d-flex align-items-center">

                                            <div class="rounded-circle d-flex align-items-center justify-content-center me-2"
                                                 style="
                                                    width:34px;
                                                    height:34px;
                                                    min-width:34px;
                                                    background:#eef4ff;
                                                    color:#2563eb;
                                                    font-weight:bold;
                                                    font-size:13px;
                                                 ">

                                                {{ strtoupper(mb_substr($journal->user->name ?? 'U', 0, 1)) }}

                                            </div>


                                            <div style="min-width:0;">

                                                <div class="fw-semibold text-truncate"
                                                     style="font-size:13px;">

                                                    {{ $journal->user->name ?? 'User' }}

                                                </div>

                                                <small class="text-muted text-truncate d-block">

                                                    {{ $journal->user->email ?? '-' }}

                                                </small>

                                            </div>

                                        </div>

                                    </td>


                                    {{-- PEKERJAAN --}}

                                    <td>

                                        <span class="fw-semibold"
                                              style="font-size:13px;">

                                            {{ $journal->unit_kerja }}

                                        </span>

                                    </td>


                                    {{-- TANGGAL --}}

                                    <td>

                                        <span style="font-size:13px;">

                                            {{ \Carbon\Carbon::parse($journal->tanggal)->translatedFormat('d M Y') }}

                                        </span>

                                    </td>


                                    {{-- HARI --}}

                                    <td>

                                        <span class="badge bg-light text-primary">

                                            {{ $journal->hari }}

                                        </span>

                                    </td>

                                </tr>

                            @empty

                                <tr>

                                    <td colspan="4"
                                        class="text-center py-5">

                                        <div style="font-size:35px;">
                                            📭
                                        </div>

                                        <p class="text-muted mb-0 mt-2">

                                            Belum ada jurnal.

                                        </p>

                                    </td>

                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection