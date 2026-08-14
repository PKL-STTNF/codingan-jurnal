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

    <!-- EXCEL -->
    <div class="col-md-6 col-lg-4">

        <div class="card border-0 shadow-sm h-100">

            <div class="card-body p-4">

                <div class="mb-3">
                    <i class="bi bi-file-earmark-excel-fill text-success"
                       style="font-size:45px;"></i>
                </div>

                <h4>Export ke Excel</h4>

                <p class="text-muted">
                    Download seluruh jurnal Anda dalam format Excel.
                </p>

                <a href="{{ route('export.excel') }}"
                   class="btn btn-success">

                    <i class="bi bi-download"></i>
                    Download Excel

                </a>

            </div>

        </div>

    </div>


    <!-- PDF -->
    <div class="col-md-6 col-lg-4">

        <div class="card border-0 shadow-sm h-100">

            <div class="card-body p-4">

                <div class="mb-3">
                    <i class="bi bi-file-earmark-pdf-fill text-danger"
                       style="font-size:45px;"></i>
                </div>

                <h4>Export ke PDF</h4>

                <p class="text-muted">
                    Download seluruh jurnal Anda dalam format PDF.
                </p>

                <a href="{{ route('export.pdf') }}"
                   class="btn btn-danger">

                    <i class="bi bi-download"></i>
                    Download PDF

                </a>

            </div>

        </div>

    </div>


    <!-- WORD -->
    <div class="col-md-6 col-lg-4">

        <div class="card border-0 shadow-sm h-100">

            <div class="card-body p-4">

                <div class="mb-3">
                    <i class="bi bi-file-earmark-word-fill text-primary"
                       style="font-size:45px;"></i>
                </div>

                <h4>Export ke Word</h4>

                <p class="text-muted">
                    Download seluruh jurnal Anda dalam format Word.
                </p>

                <a href="{{ route('export.word') }}"
                   class="btn btn-primary">

                    <i class="bi bi-download"></i>
                    Download Word

                </a>

            </div>

        </div>

    </div>

</div>

@endsection