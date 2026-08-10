@extends('layouts.main')

@section('content')

<div class="mb-4">

    <h2 class="page-title">
        📘 Panduan Penggunaan
    </h2>

    <p class="page-subtitle">
        Berikut panduan penggunaan Website Jurnal PKL.
    </p>

</div>

<div class="row">

    <!-- MENU -->
    <div class="col-lg-3 mb-3">

        <div class="list-group shadow-sm">

            <a href="#"
                class="list-group-item list-group-item-action active menu-item"
                data-target="tambah">

                1. Cara Menambah Jurnal

            </a>

            <a href="#"
                class="list-group-item list-group-item-action menu-item"
                data-target="edit">

                2. Cara Mengedit Jurnal

            </a>

            <a href="#"
                class="list-group-item list-group-item-action menu-item"
                data-target="hapus">

                3. Cara Menghapus Jurnal

            </a>

            <a href="#"
                class="list-group-item list-group-item-action menu-item"
                data-target="filter">

                4. Filter Data

            </a>

        </div>

    </div>

    <div class="col-lg-9">

        <div class="card shadow-sm border-0">

            <div class="card-body">

                <!-- ===================== 1 ===================== -->

                <div id="tambah" class="content-section">

                    <h4>1. Cara Menambah Jurnal</h4>

                    <p>
                        Ikuti langkah-langkah berikut untuk menambahkan jurnal baru.
                    </p>

                    <ol>

                        <li>Klik menu <b>Data Jurnal</b>.</li>

                        <li>Klik tombol <b>Tambah Jurnal</b> di pojok kanan atas.</li>

                        <li>
                            Isi seluruh data jurnal meliputi :

                            <ul>
                                <li>Tanggal kegiatan.</li>
                                <li>Hari.</li>
                                <li>Unit Kerja / Pekerjaan.</li>
                                <li>Catatan (Opsional).</li>
                            </ul>

                        </li>

                        <li>Pastikan seluruh data sudah benar.</li>

                        <li>Klik tombol <b>Simpan Jurnal</b>.</li>

                        <li>Data otomatis muncul pada tabel jurnal.</li>

                    </ol>

                    <div class="alert alert-info">

                        <b>Tips :</b>

                        Apabila dalam satu hari terdapat lebih dari satu pekerjaan,
                        tuliskan seluruh kegiatan pada kolom Unit Kerja dengan
                        memisahkan setiap kegiatan menggunakan baris baru.

                    </div>

                    <img src="{{ asset('images/panduan/tambah.png') }}"
                        class="img-fluid rounded border">

                </div>

                <!-- ===================== 2 ===================== -->

                <div id="edit" class="content-section d-none">

                    <h4>2. Cara Mengedit Jurnal</h4>

                    <ol>

                        <li>Buka halaman Data Jurnal.</li>

                        <li>Cari jurnal yang ingin diperbarui.</li>

                        <li>Tekan tombol <b>Edit</b>.</li>

                        <li>Ubah data yang diperlukan.</li>

                        <li>Klik <b>Update Jurnal</b>.</li>

                    </ol>

                    <div class="alert alert-warning">

                        Perubahan akan langsung tersimpan setelah tombol Update ditekan.

                    </div>

                    <img src="{{ asset('images/panduan/edit.png') }}"
                        class="img-fluid rounded border">

                </div>

                <!-- ===================== 3 ===================== -->

                <div id="hapus" class="content-section d-none">

                    <h4>3. Cara Menghapus Jurnal</h4>

                    <ol>

                        <li>Pilih jurnal.</li>

                        <li>Klik tombol <b>Hapus</b>.</li>

                        <li>Muncul konfirmasi.</li>

                        <li>Klik OK.</li>

                    </ol>

                    <div class="alert alert-danger">

                        Data yang sudah dihapus tidak dapat dikembalikan.

                    </div>

                    <img src="{{ asset('images/panduan/menghapus.png') }}"
                        class="img-fluid rounded border">

                </div>

                <!-- ===================== 4 ===================== -->

                <div id="filter" class="content-section d-none">

                    <h4>4. Filter Data</h4>

                    <p>
                        Gunakan kotak pencarian untuk mencari jurnal berdasarkan hari maupun pekerjaan.
                    </p>

                    <ul>

                        <li>Ketik kata kunci.</li>

                        <li>Klik Cari.</li>

                        <li>Data akan difilter secara otomatis.</li>

                    </ul>

                </div>

            </div>

        </div>

    </div>

</div>

<script>

document.addEventListener("DOMContentLoaded", function () {

    const menu = document.querySelectorAll(".menu-item");
    const content = document.querySelectorAll(".content-section");

    menu.forEach(item => {

        item.addEventListener("click", function (e) {

            e.preventDefault();

            menu.forEach(m => m.classList.remove("active"));
            this.classList.add("active");

            content.forEach(c => c.classList.add("d-none"));

            document.getElementById(this.dataset.target).classList.remove("d-none");

        });

    });

});

</script>

@endsection