@extends('layouts.admin')

@section('content')

<div class="mb-4">

    <h2 class="page-title">
        🕐 Jurnal Terbaru
    </h2>

    <p class="page-subtitle">
        Daftar jurnal yang dibuat hari ini.
    </p>

</div>


<div class="card border-0 shadow-sm"
     style="border-radius:16px;">

    <div class="card-body p-4">

        {{-- HEADER --}}
        <div class="d-flex justify-content-between align-items-center mb-4">

            <div>
                <h5 class="fw-bold mb-1">
                    {{ now()->translatedFormat('l, d F Y') }}
                </h5>

                <p class="text-muted small mb-0">
                    Jurnal terbaru seluruh pengguna
                </p>
            </div>

            <span class="badge bg-primary px-3 py-2">
                {{ $journals->count() }} Jurnal
            </span>

        </div>


        {{-- TABEL --}}
        <div class="table-responsive">

            <table class="table table-bordered align-middle mb-0">

                <thead style="background:#2563eb; color:white;">

                    <tr>

                        <th style="width:60px;">
                            No
                        </th>

                        <th>
                            Pengguna
                        </th>

                        <th>
                            Tanggal
                        </th>

                        <th>
                            Hari
                        </th>

                        <th>
                            Unit Kerja
                        </th>

                        <th>
                            Catatan
                        </th>

                    </tr>

                </thead>


                <tbody>

                    @forelse($journals as $index => $journal)

                        <tr>

                            {{-- NO --}}
                            <td>
                                {{ $index + 1 }}
                            </td>


                            {{-- PENGGUNA --}}
                            <td>

                                <div class="d-flex align-items-center gap-2">

                                    <div
                                        style="
                                            width:30px;
                                            height:30px;
                                            border-radius:50%;
                                            background:#2563eb;
                                            color:white;
                                            display:flex;
                                            align-items:center;
                                            justify-content:center;
                                            font-weight:600;
                                            font-size:13px;
                                        "
                                    >
                                        {{ strtoupper(substr($journal->user->name ?? 'U', 0, 1)) }}
                                    </div>

                                    <strong>
                                        {{ $journal->user->name ?? 'User' }}
                                    </strong>

                                </div>

                            </td>


                            {{-- TANGGAL --}}
                            <td>

                                {{ \Carbon\Carbon::parse($journal->tanggal)->format('Y-m-d') }}

                            </td>


                            {{-- HARI --}}
                            <td>

                                {{ $journal->hari }}

                            </td>


                            {{-- UNIT KERJA --}}
                            <td>

                                {{ $journal->unit_kerja }}

                            </td>


                            {{-- CATATAN --}}
                            <td>

                                {{ $journal->catatan ?: '-' }}

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="6"
                                class="text-center py-5">

                                <div style="font-size:45px;"> 
                                </div>

                                <h5 class="fw-bold mt-3">
                                    Belum Ada Jurnal Hari Ini
                                </h5>

                                <p class="text-muted mb-0">
                                    Belum ada pengguna yang menambahkan jurnal untuk hari ini.
                                </p>

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection