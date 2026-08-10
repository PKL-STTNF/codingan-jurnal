@extends('layouts.main')

@section('content')

@if ($errors->any())

    <div class="alert alert-danger">

        <strong>
            <i class="bi bi-exclamation-triangle-fill"></i>
            Terjadi Kesalahan
        </strong>

        <ul class="mt-2 mb-0">

            @foreach ($errors->all() as $error)

                <li>{{ $error }}</li>

            @endforeach

        </ul>

    </div>

@endif

<div class="d-flex justify-content-between align-items-center mb-4">

    <div>

        <h2 class="page-title">
            Tambah Jurnal
        </h2>

        <p class="page-subtitle">
            Tambahkan kegiatan PKL harian.
        </p>

    </div>

    <a href="{{ route('journals.index') }}" class="btn btn-secondary">

        <i class="bi bi-arrow-left"></i>

        Kembali

    </a>

</div>

<form action="{{ route('journals.store') }}" method="POST">

    @csrf

    <div class="row">

        <div class="col-md-6 mb-3">

            <label class="form-label fw-bold">

                <i class="bi bi-calendar-event"></i>

                Tanggal

            </label>

            <input
                type="date"
                name="tanggal"
                id="tanggal"
                class="form-control search-box"
                value="{{ old('tanggal') }}"
                required>

        </div>

        <div class="col-md-6 mb-3">

            <label class="form-label fw-bold">

                <i class="bi bi-calendar-week"></i>

                Hari

            </label>

            <input
                type="text"
                name="hari"
                id="hari"
                class="form-control search-box"
                placeholder="Otomatis terisi dari tanggal"
                value="{{ old('hari') }}"
                readonly
                required>

            <div class="form-text">Hari terisi otomatis saat tanggal dipilih.</div>

        </div>

    </div>

    <div class="mb-3">

        <label class="form-label fw-bold">

            <i class="bi bi-briefcase-fill"></i>

            Unit Kerja / Pekerjaan

        </label>

        <textarea
            name="unit_kerja"
            rows="5"
            class="form-control"
            placeholder="Masukkan kegiatan yang dilakukan..."
            required>{{ old('unit_kerja') }}</textarea>

    </div>

    <div class="mb-4">

        <label class="form-label fw-bold">

            <i class="bi bi-card-text"></i>

            Catatan

        </label>

        <textarea
            name="catatan"
            rows="4"
            class="form-control"
            placeholder="Catatan tambahan (Opsional)">{{ old('catatan') }}</textarea>

    </div>

    <div class="text-end">

        <button class="btn btn-success">

            <i class="bi bi-check-circle"></i>

            Simpan Jurnal

        </button>

    </div>

</form>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const tanggal = document.getElementById("tanggal");
    const hari = document.getElementById("hari");

    const namaHari = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"];

    function setHari() {
        if (tanggal.value) {
            const d = new Date(tanggal.value + "T00:00:00");
            hari.value = namaHari[d.getDay()];
        }
    }

    tanggal.addEventListener("change", setHari);

    if (tanggal.value) setHari();
});
</script>

@endsection