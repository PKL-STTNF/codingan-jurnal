@extends('layouts.main')

@section('content')

<div class="mb-4">
    <h2 class="page-title">
        📤 Export Jurnal
    </h2>

    <p class="page-subtitle">
        Export data jurnal PKL Anda ke dalam format Excel, PDF, atau Word.
    </p>
</div>


<div class="row g-4">

    {{-- ========================= --}}
    {{-- EXCEL --}}
    {{-- ========================= --}}
    <div class="col-md-6 col-lg-4">

        <div class="card border-0 shadow-sm h-100 export-card">

            <div class="card-body p-4">

                <div class="mb-3 export-icon">
                    <i class="bi bi-file-earmark-excel-fill text-success"></i>
                </div>

                <h4>
                    Export ke Excel
                </h4>

                <p class="text-muted">
                    Download seluruh jurnal Anda dalam format Excel.
                </p>

                <a href="{{ route('export.excel') }}"
                   class="btn btn-success export-button">

                    <i class="bi bi-download"></i>
                    Download Excel

                </a>

            </div>

        </div>

    </div>


    {{-- ========================= --}}
    {{-- PDF --}}
    {{-- ========================= --}}
    <div class="col-md-6 col-lg-4">

        <div class="card border-0 shadow-sm h-100 export-card">

            <div class="card-body p-4">

                <div class="mb-3 export-icon">
                    <i class="bi bi-file-earmark-pdf-fill text-danger"></i>
                </div>

                <h4>
                    Export ke PDF
                </h4>

                <p class="text-muted">
                    Download seluruh jurnal Anda dalam format PDF.
                </p>

                <a href="{{ route('export.pdf') }}"
                   class="btn btn-danger export-button">

                    <i class="bi bi-download"></i>
                    Download PDF

                </a>

            </div>

        </div>

    </div>


    {{-- ========================= --}}
    {{-- WORD --}}
    {{-- ========================= --}}
    <div class="col-md-6 col-lg-4">

        <div class="card border-0 shadow-sm h-100 export-card">

            <div class="card-body p-4">

                <div class="mb-3 export-icon">
                    <i class="bi bi-file-earmark-word-fill text-primary"></i>
                </div>

                <h4>
                    Export ke Word
                </h4>

                <p class="text-muted">
                    Download seluruh jurnal Anda dalam format Word.
                </p>

                <a href="{{ route('export.word') }}"
                   class="btn btn-primary export-button">

                    <i class="bi bi-download"></i>
                    Download Word

                </a>

            </div>

        </div>

    </div>

</div>


{{-- ========================= --}}
{{-- ANIMASI EXPORT --}}
{{-- ========================= --}}
<style>

    /* CARD EXPORT */
    .export-card {
        border-radius: 18px;
        background: #ffffff;

        transition:
            transform 0.2s ease,
            box-shadow 0.2s ease;
    }


    /* CARD SAAT MOUSE DIARAHKAN */
    .export-card:hover {
        transform: translateY(-6px);

        box-shadow:
            0 12px 30px rgba(0, 0, 0, 0.08) !important;
    }


    /* CARD SAAT DIKLIK */
    .export-card:active {
        transform: translateY(-2px) scale(0.99);

        box-shadow:
            0 6px 15px rgba(0, 0, 0, 0.08) !important;
    }


    /* ICON FILE */
    .export-icon {
        transition:
            transform 0.2s ease;
    }


    /* ICON IKUT NAIK SEDIKIT */
    .export-card:hover .export-icon {
        transform: translateY(-2px);
    }


    /* UKURAN ICON */
    .export-icon i {
        font-size: 45px;
    }


    /* TOMBOL DOWNLOAD */
    .export-button {
        transition:
            transform 0.15s ease,
            box-shadow 0.15s ease;
    }


    /* TOMBOL SAAT MOUSE DIARAHKAN */
    .export-button:hover {
        transform: translateY(-2px);

        box-shadow:
            0 5px 12px rgba(0, 0, 0, 0.12);
    }


    /* TOMBOL SAAT DIKLIK */
    .export-button:active {
        transform: translateY(2px) scale(0.97);

        box-shadow: none;
    }

</style>

@endsection