@extends('layouts.main')

@section('content')

<div class="mb-4">

    <h2 class="page-title">
        📘 Panduan Penggunaan
    </h2>

    <p class="page-subtitle">
        Panduan lengkap untuk menggunakan Website Jurnal PKL.
    </p>

</div>

<div class="row">

    <!-- ================= MENU ================= -->

    <div class="col-lg-3 mb-4">

        <div class="card shadow-sm border-0">

            <div class="card-body p-2">

                <div class="list-group list-group-flush">

                    <a href="#"
                       class="list-group-item list-group-item-action active menu-item"
                       data-target="tambah">

                        &nbsp; Menambah Jurnal

                    </a>

                    <a href="#"
                       class="list-group-item list-group-item-action menu-item"
                       data-target="edit">

                        &nbsp; Mengedit Jurnal

                    </a>

                    <a href="#"
                       class="list-group-item list-group-item-action menu-item"
                       data-target="hapus">

                        &nbsp; Menghapus Jurnal

                    </a>

                    <a href="#"
                       class="list-group-item list-group-item-action menu-item"
                       data-target="filter">

                        &nbsp; Mencari & Filter

                    </a>

                    <a href="#"
                       class="list-group-item list-group-item-action menu-item"
                       data-target="profil">

                        &nbsp; Mengatur Profil

                    </a>

                    <a href="#"
                       class="list-group-item list-group-item-action menu-item"
                       data-target="tips">

                        &nbsp; Tips Penggunaan

                    </a>

                </div>

            </div>

        </div>

    </div>


    <!-- ================= CONTENT ================= -->

    <div class="col-lg-9">

        <div class="card shadow-sm border-0">

            <div class="card-body p-4">


                <!-- ================================================= -->
                <!-- 1. TAMBAH JURNAL -->
                <!-- ================================================= -->

                <div id="tambah" class="content-section">

                    <div class="mb-4">

                        <span class="badge bg-primary mb-2">
                            Panduan 01
                        </span>

                        <h4 class="fw-bold">
                            Cara Menambah Jurnal
                        </h4>

                        <p class="text-muted">
                            Gunakan fitur ini untuk mencatat kegiatan PKL
                            yang telah dilakukan sekaligus menambahkan
                            dokumentasi berupa foto kegiatan.
                        </p>

                    </div>


                    <h6 class="fw-bold">
                        Langkah-langkah:
                    </h6>

                    <ol>

                        <li class="mb-2">
                            Buka menu <b>Data Jurnal</b>.
                        </li>

                        <li class="mb-2">
                            Klik tombol <b>Tambah Jurnal</b>.
                        </li>

                        <li class="mb-2">
                            Isi data jurnal yang diperlukan.
                        </li>

                        <li class="mb-2">

                            Masukkan:

                            <ul class="mt-2">

                                <li>
                                    Tanggal kegiatan.
                                </li>

                                <li>
                                    Hari.
                                </li>

                                <li>
                                    Unit Kerja / Pekerjaan.
                                </li>

                                <li>
                                    Catatan kegiatan.
                                </li>

                            </ul>

                        </li>


                        <!-- DOKUMENTASI -->

                        <li class="mb-2">

                            Pada bagian <b>Dokumentasi</b>,
                            pilih foto kegiatan yang ingin
                            dilampirkan.

                            <ul class="mt-2">

                                <li>
                                    Klik tombol <b>Pilih File</b>
                                    atau <b>Choose File</b>.
                                </li>

                                <li>
                                    Pilih foto dokumentasi dari perangkat.
                                </li>

                                <li>
                                    Pastikan foto yang dipilih merupakan
                                    dokumentasi kegiatan PKL.
                                </li>

                            </ul>

                        </li>


                        <li class="mb-2">
                            Pastikan seluruh data dan foto dokumentasi
                            yang dimasukkan sudah benar.
                        </li>


                        <li class="mb-2">
                            Klik tombol <b>Simpan Jurnal</b>.
                        </li>


                        <li>
                            Jurnal akan otomatis ditampilkan pada
                            halaman <b>Data Jurnal</b> beserta
                            dokumentasi yang telah diunggah.
                        </li>

                    </ol>


                    <div class="alert alert-info mt-4">

                        <strong>💡 Tips:</strong>

                        Jika dalam satu hari terdapat beberapa kegiatan,
                        tuliskan seluruh kegiatan pada bagian
                        <b>Unit Kerja / Pekerjaan</b> secara terpisah
                        agar lebih mudah dibaca.

                        <br><br>

                        Dokumentasi sebaiknya menggunakan foto yang
                        jelas dan sesuai dengan kegiatan PKL yang dicatat.

                    </div>


                    <div class="mt-4">

                        <img src="{{ asset('images/panduan/tambah.jpeg') }}"
                             class="img-fluid rounded border shadow-sm"
                             alt="Panduan menambah jurnal">

                    </div>

                </div>


                <!-- ================================================= -->
                <!-- 2. EDIT JURNAL -->
                <!-- ================================================= -->

                <div id="edit" class="content-section d-none">

                    <div class="mb-4">

                        <span class="badge bg-warning text-dark mb-2">
                            Panduan 02
                        </span>

                        <h4 class="fw-bold">
                            Cara Mengedit Jurnal
                        </h4>

                        <p class="text-muted">
                            Fitur edit digunakan apabila terdapat data jurnal
                            yang ingin diperbaiki, diperbarui, atau
                            dokumentasi yang ingin diganti.
                        </p>

                    </div>


                    <h6 class="fw-bold">
                        Langkah-langkah:
                    </h6>

                    <ol>

                        <li class="mb-2">
                            Buka halaman <b>Data Jurnal</b>.
                        </li>

                        <li class="mb-2">
                            Cari jurnal yang ingin diperbaiki.
                        </li>

                        <li class="mb-2">
                            Klik tombol <b>Edit</b>.
                        </li>

                        <li class="mb-2">
                            Ubah data jurnal yang diperlukan.
                        </li>


                        <!-- DOKUMENTASI EDIT -->

                        <li class="mb-2">

                            Jika ingin mengganti dokumentasi,
                            cari bagian <b>Dokumentasi</b>.

                        </li>

                        <li class="mb-2">

                            Pilih foto dokumentasi baru dengan
                            menekan tombol <b>Pilih File</b>
                            atau <b>Choose File</b>.

                        </li>

                        <li class="mb-2">

                            Jika tidak ingin mengganti foto,
                            dokumentasi lama dapat tetap digunakan.

                        </li>

                        <li class="mb-2">

                            Periksa kembali seluruh data,
                            termasuk dokumentasi yang dipilih.

                        </li>

                        <li>

                            Klik tombol <b>Update Jurnal</b>.

                        </li>

                    </ol>


                    <div class="alert alert-warning mt-4">

                        <strong>⚠️ Perhatian:</strong>

                        Pastikan perubahan data sudah benar sebelum
                        menekan tombol <b>Update Jurnal</b>.

                        <br><br>

                        Jika mengganti dokumentasi, pastikan foto baru
                        sudah sesuai dengan kegiatan jurnal tersebut.

                    </div>


                    <div class="mt-4">

                        <img src="{{ asset('images/panduan/edit.jpeg') }}"
                             class="img-fluid rounded border shadow-sm"
                             alt="Panduan mengedit jurnal">

                    </div>

                </div>


                <!-- ================================================= -->
                <!-- 3. HAPUS JURNAL -->
                <!-- ================================================= -->

                <div id="hapus" class="content-section d-none">

                    <div class="mb-4">

                        <span class="badge bg-danger mb-2">
                            Panduan 03
                        </span>

                        <h4 class="fw-bold">
                            Cara Menghapus Jurnal
                        </h4>

                        <p class="text-muted">
                            Fitur ini digunakan untuk menghapus jurnal
                            yang sudah tidak diperlukan.
                        </p>

                    </div>


                    <h6 class="fw-bold">
                        Langkah-langkah:
                    </h6>

                    <ol>

                        <li class="mb-2">
                            Buka halaman <b>Data Jurnal</b>.
                        </li>

                        <li class="mb-2">
                            Cari jurnal yang ingin dihapus.
                        </li>

                        <li class="mb-2">
                            Klik tombol <b>Hapus</b>.
                        </li>

                        <li class="mb-2">
                            Sistem akan menampilkan konfirmasi.
                        </li>

                        <li>
                            Klik <b>OK</b> untuk menghapus jurnal.
                        </li>

                    </ol>


                    <div class="alert alert-danger mt-4">

                        <strong>⚠️ Penting:</strong>

                        Data jurnal yang sudah dihapus
                        <b>tidak dapat dikembalikan</b>.

                        <br><br>

                        Dokumentasi yang terkait dengan jurnal
                        juga akan ikut terhapus dari data jurnal.

                        Pastikan jurnal yang dipilih sudah benar.

                    </div>


                    <div class="mt-4">

                        <img src="{{ asset('images/panduan/menghapus.jpeg') }}"
                             class="img-fluid rounded border shadow-sm"
                             alt="Panduan menghapus jurnal">

                    </div>

                </div>


                <!-- ================================================= -->
                <!-- 4. CARI & FILTER -->
                <!-- ================================================= -->

                <div id="filter" class="content-section d-none">

                    <div class="mb-4">

                        <span class="badge bg-success mb-2">
                            Panduan 04
                        </span>

                        <h4 class="fw-bold">
                            Mencari & Filter Jurnal
                        </h4>

                        <p class="text-muted">
                            Gunakan fitur pencarian untuk menemukan jurnal
                            dengan lebih cepat.
                        </p>

                    </div>


                    <h6 class="fw-bold">
                        Cara menggunakan pencarian:
                    </h6>

                    <ol>

                        <li class="mb-2">
                            Buka halaman <b>Data Jurnal</b>.
                        </li>

                        <li class="mb-2">
                            Cari kotak <b>Pencarian</b>.
                        </li>

                        <li class="mb-2">
                            Masukkan kata kunci yang ingin dicari.
                        </li>

                        <li class="mb-2">
                            Kata kunci dapat berupa <b>hari</b>,
                            <b>pekerjaan</b>, atau <b>catatan</b>.
                        </li>

                        <li>
                            Klik tombol <b>Cari</b>.
                        </li>

                    </ol>


                    <div class="alert alert-success mt-4">

                        <strong>💡 Contoh:</strong>

                        Jika ingin mencari kegiatan yang berkaitan
                        dengan komputer, masukkan kata
                        <b>komputer</b> pada kolom pencarian.

                    </div>


                    <p class="text-muted mt-3">

                        Sistem akan menampilkan jurnal yang sesuai
                        dengan kata kunci yang dimasukkan.

                    </p>

                </div>


                <!-- ================================================= -->
                <!-- 5. PROFIL -->
                <!-- ================================================= -->

                <div id="profil" class="content-section d-none">

                    <div class="mb-4">

                        <span class="badge bg-info text-dark mb-2">
                            Panduan 05
                        </span>

                        <h4 class="fw-bold">
                            Mengatur Profil
                        </h4>

                        <p class="text-muted">
                            Halaman Profil Saya digunakan untuk melihat
                            dan mengelola informasi akun, mengubah password,
                            serta menghapus akun pada Website Jurnal PKL.
                        </p>

                    </div>


                    <h6 class="fw-bold">
                        Informasi yang tersedia:
                    </h6>

                    <ul>

                        <li class="mb-2">
                            <b>Nama</b> — nama yang digunakan pada akun.
                        </li>

                        <li class="mb-2">
                            <b>Email</b> — alamat email yang digunakan pada akun.
                        </li>

                        <li class="mb-2">
                            <b>Jumlah Jurnal</b> — menampilkan jumlah jurnal
                            yang telah dibuat oleh pengguna.
                        </li>

                        <li class="mb-2">
                            <b>Status Akun</b> — menunjukkan status akun pengguna,
                            seperti aktif.
                        </li>

                    </ul>


                    <!-- INFORMASI AKUN -->

                    <h6 class="fw-bold mt-4">
                        Mengubah Informasi Akun:
                    </h6>

                    <ol>

                        <li class="mb-2">
                            Buka menu <b>Profil</b> pada navbar.
                        </li>

                        <li class="mb-2">
                            Pada bagian <b>Informasi Akun</b>, ubah
                            <b>Nama</b> atau <b>Email</b> sesuai kebutuhan.
                        </li>

                        <li class="mb-2">
                            Pastikan nama dan email yang dimasukkan sudah benar.
                        </li>

                        <li>
                            Klik tombol <b>Simpan Perubahan</b>.
                        </li>

                    </ol>


                    <!-- UBAH PASSWORD -->

                    <h6 class="fw-bold mt-4">
                        Mengubah Password:
                    </h6>

                    <ol>

                        <li class="mb-2">
                            Pada halaman Profil, cari bagian <b>Ubah Password</b>.
                        </li>

                        <li class="mb-2">
                            Masukkan <b>Password Saat Ini</b>.
                        </li>

                        <li class="mb-2">
                            Masukkan password baru pada bagian
                            <b>Password Baru</b>.
                        </li>

                        <li class="mb-2">
                            Masukkan kembali password baru pada bagian
                            <b>Konfirmasi Password</b>.
                        </li>

                        <li>
                            Klik tombol <b>Simpan Password</b>.
                        </li>

                    </ol>


                    <div class="alert alert-warning mt-4">

                        <strong>⚠️ Perhatian:</strong>

                        Gunakan password yang kuat dan jangan membagikan password
                        kepada orang lain untuk menjaga keamanan akun.

                    </div>


                    <!-- HAPUS AKUN -->

                    <h6 class="fw-bold mt-4">
                        Menghapus Akun:
                    </h6>

                    <ol>

                        <li class="mb-2">
                            Pada halaman Profil, scroll ke bagian
                            <b>Hapus Akun</b>.
                        </li>

                        <li class="mb-2">
                            Perhatikan informasi bahwa penghapusan akun
                            merupakan tindakan permanen.
                        </li>

                        <li class="mb-2">
                            Masukkan <b>Password</b> untuk melakukan konfirmasi.
                        </li>

                        <li>
                            Klik tombol <b>Hapus Akun</b>.
                        </li>

                    </ol>


                    <div class="alert alert-danger mt-4">

                        <strong>⚠️ Penting:</strong>

                        Penghapusan akun bersifat permanen.

                        Seluruh data jurnal dan dokumentasi
                        yang terkait dengan akun juga akan ikut
                        terhapus dan tidak dapat dikembalikan.

                    </div>


                    <!-- STATUS AKUN -->

                    <h6 class="fw-bold mt-4">
                        Melihat Status Akun:
                    </h6>

                    <p>

                        Pada bagian informasi akun di sebelah kanan,
                        pengguna dapat melihat jumlah jurnal yang telah dibuat
                        serta <b>Status Akun</b>.

                    </p>


                    <div class="alert alert-info mt-4">

                        <strong>💡 Tips:</strong>

                        Pastikan informasi akun selalu diperbarui dan gunakan
                        password yang aman.

                        Sebelum menghapus akun, pastikan seluruh data jurnal
                        dan dokumentasi yang penting sudah tidak diperlukan.

                    </div>

                </div>


                <!-- ================================================= -->
                <!-- 6. TIPS -->
                <!-- ================================================= -->

                <div id="tips" class="content-section d-none">

                    <div class="mb-4">

                        <span class="badge bg-secondary mb-2">
                            Panduan 06
                        </span>

                        <h4 class="fw-bold">
                            Tips Penggunaan
                        </h4>

                        <p class="text-muted">
                            Beberapa tips agar pencatatan jurnal PKL
                            tetap rapi dan mudah digunakan.
                        </p>

                    </div>


                    <div class="row">

                        <div class="col-md-6 mb-3">

                            <div class="border rounded p-3 h-100">

                                <h6 class="fw-bold">
                                    Catat Secara Rutin
                                </h6>

                                <p class="text-muted mb-0">
                                    Isi jurnal setiap selesai melakukan
                                    kegiatan PKL agar tidak lupa.
                                </p>

                            </div>

                        </div>


                        <div class="col-md-6 mb-3">

                            <div class="border rounded p-3 h-100">

                                <h6 class="fw-bold">
                                    Gunakan Tanggal yang Benar
                                </h6>

                                <p class="text-muted mb-0">
                                    Pastikan tanggal jurnal sesuai dengan
                                    tanggal kegiatan sebenarnya.
                                </p>

                            </div>

                        </div>


                        <div class="col-md-6 mb-3">

                            <div class="border rounded p-3 h-100">

                                <h6 class="fw-bold">
                                    Gunakan Catatan yang Jelas
                                </h6>

                                <p class="text-muted mb-0">
                                    Tuliskan kegiatan dengan singkat,
                                    jelas, dan mudah dipahami.
                                </p>

                            </div>

                        </div>


                        <div class="col-md-6 mb-3">

                            <div class="border rounded p-3 h-100">

                                <h6 class="fw-bold">
                                    Tambahkan Dokumentasi
                                </h6>

                                <p class="text-muted mb-0">
                                    Tambahkan foto yang sesuai dengan
                                    kegiatan agar jurnal memiliki
                                    bukti dokumentasi yang jelas.
                                </p>

                            </div>

                        </div>


                        <div class="col-md-6 mb-3">

                            <div class="border rounded p-3 h-100">

                                <h6 class="fw-bold">
                                    Periksa Data
                                </h6>

                                <p class="text-muted mb-0">
                                    Selalu periksa kembali jurnal,
                                    termasuk foto dokumentasi,
                                    sebelum menyimpan atau memperbarui data.
                                </p>

                            </div>

                        </div>

                    </div>


                    <div class="alert alert-primary mt-3">

                        <strong>Kesimpulan:</strong>

                        Gunakan Website Jurnal PKL secara rutin untuk
                        mencatat seluruh kegiatan selama pelaksanaan PKL.

                        Dengan pencatatan yang teratur dan dilengkapi
                        dokumentasi foto, data jurnal akan lebih mudah
                        dikelola, diperiksa, dan menjadi bukti kegiatan PKL.

                    </div>

                </div>


            </div>

        </div>

    </div>

</div>


<!-- ================= STYLE ================= -->

<style>

    .menu-item {
        border: none !important;
        padding: 14px 16px;
        font-weight: 500;
        transition: all 0.2s ease;
    }

    .menu-item:hover {
        padding-left: 20px;
    }

    .menu-item.active {
        font-weight: 600;
    }

    .content-section {
        animation: fadeIn 0.25s ease-in-out;
    }

    .content-section h4 {
        margin-bottom: 8px;
    }

    .content-section ol li,
    .content-section ul li {
        line-height: 1.7;
    }

    .content-section img {
        max-height: 500px;
        object-fit: contain;
    }

    @keyframes fadeIn {

        from {
            opacity: 0;
            transform: translateY(5px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }

    }

</style>


<!-- ================= JAVASCRIPT ================= -->

<script>

document.addEventListener("DOMContentLoaded", function () {

    const menu = document.querySelectorAll(".menu-item");
    const content = document.querySelectorAll(".content-section");

    menu.forEach(item => {

        item.addEventListener("click", function (e) {

            e.preventDefault();

            // Hapus active dari semua menu
            menu.forEach(m => {
                m.classList.remove("active");
            });

            // Tambahkan active ke menu yang dipilih
            this.classList.add("active");

            // Sembunyikan semua konten
            content.forEach(c => {
                c.classList.add("d-none");
            });

            // Tampilkan konten yang dipilih
            const target = document.getElementById(
                this.dataset.target
            );

            if (target) {
                target.classList.remove("d-none");
            }

        });

    });

});

</script>

@endsection