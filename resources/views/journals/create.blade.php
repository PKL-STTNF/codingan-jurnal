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
            📘 Tambah Jurnal
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

<form
    action="{{ route('journals.store') }}"
    method="POST"
    enctype="multipart/form-data">

    @csrf

    {{-- TANGGAL & HARI --}}
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
                readonly>

            <div class="form-text">
                Hari terisi otomatis saat tanggal dipilih.
            </div>

        </div>

    </div>

    {{-- UNIT KERJA --}}
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

    {{-- CATATAN --}}
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

    {{-- DOKUMENTASI --}}
    <div class="mb-4">

        <label class="form-label fw-bold">
            <i class="bi bi-camera-fill"></i>
            Dokumentasi Kegiatan
        </label>

        <input
            type="file"
            name="dokumentasi"
            id="dokumentasi"
            class="form-control"
            accept="image/jpeg,image/png,image/webp">

        <div class="form-text">
            Upload foto dokumentasi kegiatan PKL.
            Format JPG, JPEG, PNG, atau WEBP. Maksimal 5 MB.
        </div>

        {{-- PREVIEW FOTO --}}
        <div
            id="preview-container"
            class="mt-3"
            style="display: none;">

            <p class="fw-bold mb-2">
                <i class="bi bi-image"></i>
                Preview Foto
            </p>

            <img
                id="preview-image"
                src="#"
                alt="Preview dokumentasi"
                class="img-fluid rounded border shadow-sm"
                style="
                    max-height: 300px;
                    width: auto;
                    object-fit: contain;
                ">

        </div>

    </div>

    {{-- BUTTON --}}
    <div class="text-end">

        <button
            type="submit"
            class="btn btn-success">

            <i class="bi bi-check-circle"></i>
            Simpan Jurnal

        </button>

    </div>

</form>

{{-- SCRIPT --}}
<script>

document.addEventListener("DOMContentLoaded", function () {

    // =========================
    // AUTO HARI
    // =========================

    const tanggal = document.getElementById("tanggal");
    const hari = document.getElementById("hari");

    const namaHari = [
        "Minggu",
        "Senin",
        "Selasa",
        "Rabu",
        "Kamis",
        "Jumat",
        "Sabtu"
    ];

    function setHari() {

        if (tanggal.value) {

            const d = new Date(
                tanggal.value + "T00:00:00"
            );

            hari.value = namaHari[d.getDay()];

        }

    }

    tanggal.addEventListener("change", setHari);

    if (tanggal.value) {
        setHari();
    }


    // =========================
    // PREVIEW FOTO
    // =========================

    const dokumentasi =
        document.getElementById("dokumentasi");

    const previewContainer =
        document.getElementById("preview-container");

    const previewImage =
        document.getElementById("preview-image");

    dokumentasi.addEventListener("change", function () {

        const file = this.files[0];

        if (!file) {

            previewContainer.style.display = "none";
            previewImage.src = "#";

            return;
        }

        // Cek tipe file
        if (!file.type.startsWith("image/")) {

            alert("File yang dipilih harus berupa gambar.");

            this.value = "";
            previewContainer.style.display = "none";

            return;
        }

        // Cek ukuran maksimal 5 MB
        if (file.size > 5 * 1024 * 1024) {

            alert("Ukuran foto maksimal 5 MB.");

            this.value = "";
            previewContainer.style.display = "none";

            return;
        }

        const reader = new FileReader();

        reader.onload = function (e) {

            previewImage.src = e.target.result;

            previewContainer.style.display = "block";

        };

        reader.readAsDataURL(file);

    });

});

</script>

@endsection