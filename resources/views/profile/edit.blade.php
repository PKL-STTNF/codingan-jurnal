@extends('layouts.main')

@section('content')

<div class="container-fluid px-0">

    {{-- =========================
         HEADER
    ========================== --}}

    <div class="mb-4">

        <h1 class="page-title">
            👤 Profil Saya
        </h1>

        <p class="page-subtitle">
            Kelola informasi akun Anda.
        </p>

    </div>


    <div class="row g-4">

        {{-- =========================
             BAGIAN KIRI
        ========================== --}}

        <div class="col-lg-8">


            {{-- =========================
                 INFORMASI AKUN
            ========================== --}}

            <div class="card border-0 shadow-sm profile-card">

                <div class="card-body p-4">

                    <div class="profile-section-header mb-4">

                        <div class="profile-icon blue">
                            <i class="bi bi-person-vcard-fill"></i>
                        </div>

                        <div>
                            <h4 class="mb-1 fw-bold">
                                Informasi Akun
                            </h4>

                            <p class="text-muted small mb-0">
                                Kelola nama dan alamat email akun Anda.
                            </p>
                        </div>

                    </div>


                    <form method="POST"
                          action="{{ route('profile.update') }}">

                        @csrf
                        @method('PATCH')


                        {{-- NAMA --}}

                        <div class="mb-3">

                            <label class="form-label fw-semibold">
                                Nama
                            </label>

                            <input
                                type="text"
                                name="name"
                                class="form-control profile-input @error('name') is-invalid @enderror"
                                value="{{ old('name', auth()->user()->name) }}"
                                required
                            >

                            @error('name')

                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>

                            @enderror

                        </div>


                        {{-- EMAIL --}}

                        <div class="mb-4">

                            <label class="form-label fw-semibold">
                                Email
                            </label>

                            <input
                                type="email"
                                name="email"
                                class="form-control profile-input @error('email') is-invalid @enderror"
                                value="{{ old('email', auth()->user()->email) }}"
                                required
                            >

                            @error('email')

                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>

                            @enderror

                        </div>


                        <button
                            type="submit"
                            class="btn btn-primary profile-button">

                            <i class="bi bi-check2-circle me-1"></i>

                            Simpan Perubahan

                        </button>

                    </form>

                </div>

            </div>



            {{-- =========================
                 UBAH PASSWORD
            ========================== --}}

            <div class="card border-0 shadow-sm profile-card mt-4">

                <div class="card-body p-4">

                    <div class="profile-section-header mb-4">

                        <div class="profile-icon purple">
                            <i class="bi bi-shield-lock-fill"></i>
                        </div>

                        <div>

                            <h4 class="mb-1 fw-bold">
                                Ubah Password
                            </h4>

                            <p class="text-muted small mb-0">
                                Ganti kata sandi akun Anda secara berkala.
                            </p>

                        </div>

                    </div>


                    <form method="POST"
                          action="{{ route('password.update') }}">

                        @csrf
                        @method('PUT')


                        {{-- PASSWORD SAAT INI --}}

                        <div class="mb-3">

                            <label class="form-label fw-semibold">
                                Password Saat Ini
                            </label>

                            <input
                                type="password"
                                name="current_password"
                                class="form-control profile-input @error('current_password', 'updatePassword') is-invalid @enderror"
                                autocomplete="current-password"
                                required
                            >

                            @error('current_password', 'updatePassword')

                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>

                            @enderror

                        </div>


                        {{-- PASSWORD BARU --}}

                        <div class="mb-3">

                            <label class="form-label fw-semibold">
                                Password Baru
                            </label>

                            <input
                                type="password"
                                name="password"
                                class="form-control profile-input @error('password', 'updatePassword') is-invalid @enderror"
                                autocomplete="new-password"
                                required
                            >

                            @error('password', 'updatePassword')

                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>

                            @enderror

                        </div>


                        {{-- KONFIRMASI PASSWORD --}}

                        <div class="mb-4">

                            <label class="form-label fw-semibold">
                                Konfirmasi Password
                            </label>

                            <input
                                type="password"
                                name="password_confirmation"
                                class="form-control profile-input"
                                autocomplete="new-password"
                                required
                            >

                        </div>


                        <button
                            type="submit"
                            class="btn btn-primary profile-button">

                            <i class="bi bi-shield-check me-1"></i>

                            Simpan Password

                        </button>


                        @if (session('status') === 'password-updated')

                            <div class="alert alert-success mt-3 mb-0">

                                <i class="bi bi-check-circle-fill me-1"></i>

                                Password berhasil diubah.

                            </div>

                        @endif

                    </form>

                </div>

            </div>



            {{-- =========================
                 HAPUS AKUN
            ========================== --}}

            <div class="card border-0 shadow-sm profile-card danger-card mt-4">

                <div class="card-body p-4">

                    <div class="profile-section-header mb-4">

                        <div class="profile-icon red">
                            <i class="bi bi-trash3-fill"></i>
                        </div>

                        <div>

                            <h4 class="mb-1 fw-bold text-danger">
                                Hapus Akun
                            </h4>

                            <p class="text-muted small mb-0">
                                Tindakan ini permanen dan tidak dapat dibatalkan.
                            </p>

                        </div>

                    </div>


                    <div class="danger-info mb-4">

                        <i class="bi bi-exclamation-triangle-fill"></i>

                        <span>
                            Seluruh data jurnal Anda akan ikut terhapus secara permanen.
                        </span>

                    </div>


                    <form method="POST"
                          action="{{ route('profile.destroy') }}">

                        @csrf
                        @method('DELETE')


                        <div class="mb-3">

                            <label class="form-label fw-semibold">
                                Masukkan password untuk konfirmasi
                            </label>

                            <input
                                type="password"
                                name="password"
                                class="form-control profile-input @error('password', 'userDeletion') is-invalid @enderror"
                                placeholder="Masukkan password Anda"
                                autocomplete="current-password"
                                required
                            >

                            @error('password', 'userDeletion')

                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>

                            @enderror

                        </div>


                        {{-- BUTTON BUKA MODAL --}}

                        <button
                            type="button"
                            class="btn btn-danger "
                            data-bs-toggle="modal"
                            data-bs-target="#deleteAccountModal">

                            <i class="bi bi-trash3 me-1"></i>

                            Hapus Akun

                        </button>

                    </form>

                </div>

            </div>

        </div>



        {{-- =========================
             BAGIAN KANAN
        ========================== --}}

        <div class="col-lg-4">


            {{-- PROFILE CARD --}}

            <div class="card border-0 shadow-sm profile-card profile-summary">

                <div class="card-body p-4 text-center">


                    {{-- AVATAR --}}

                    <div class="profile-avatar mx-auto">

                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}

                    </div>


                    <h4 class="fw-bold mt-3 mb-1">

                        {{ Auth::user()->name }}

                    </h4>


                    <p class="text-muted mb-4">

                        {{ Auth::user()->email }}

                    </p>


                    <div class="profile-divider"></div>


                    {{-- JUMLAH JURNAL --}}

                    <div class="journal-stat">

                        <div class="journal-stat-icon">

                            <i class="bi bi-journal-text"></i>

                        </div>

                        <div>

                            <div class="text-muted small">
                                Jumlah Jurnal
                            </div>

                            <div class="journal-count">

                                {{ Auth::user()->journals()->count() }}

                            </div>

                        </div>

                    </div>


                    <div class="profile-divider"></div>


                    {{-- STATUS --}}

                    <div class="d-flex justify-content-between align-items-center">

                        <span class="text-muted">
                            Status Akun
                        </span>

                        <span class="badge rounded-pill bg-success-subtle text-success px-3 py-2">

                            <i class="bi bi-check-circle-fill me-1"></i>

                            Aktif

                        </span>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>



{{-- =====================================================
     MODAL KONFIRMASI HAPUS AKUN
===================================================== --}}

<div class="modal fade"
     id="deleteAccountModal"
     tabindex="-1"
     aria-labelledby="deleteAccountModalLabel"
     aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered">

        <div class="modal-content delete-modal">


            {{-- HEADER --}}

            <div class="modal-header border-0 px-4 pt-4">

                <div class="delete-modal-icon">

                    <i class="bi bi-exclamation-triangle-fill"></i>

                </div>

                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="Close">
                </button>

            </div>


            {{-- BODY --}}

            <div class="modal-body px-4 pb-2">

                <h4 class="fw-bold mb-2"
                    id="deleteAccountModalLabel">

                    Hapus Akun?

                </h4>

                <p class="text-muted mb-0">

                    Apakah Anda yakin ingin menghapus akun ini secara permanen?

                </p>

                <div class="delete-warning mt-3">

                    <i class="bi bi-info-circle-fill me-2"></i>

                    Semua data jurnal yang terkait dengan akun ini juga akan ikut terhapus.

                </div>

            </div>


            {{-- FOOTER --}}

            <div class="modal-footer border-0 px-4 pb-4 pt-3">

                <button
                    type="button"
                    class="btn btn-light px-4"
                    data-bs-dismiss="modal">

                    Batal

                </button>


                <button
                    type="button"
                    class="btn btn-danger px-4"
                    id="confirmDeleteAccount">

                    <i class="bi bi-trash3 me-1"></i>

                    Ya, Hapus Akun

                </button>

            </div>

        </div>

    </div>

</div>



{{-- =====================================================
     CSS
===================================================== --}}

<style>

.profile-card {
    border-radius: 18px;
    background: #ffffff;
    transition: all .25s ease;
}

.profile-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 15px 35px rgba(0, 0, 0, 0.10) !important;
}

.profile-section-header {
    display: flex;
    align-items: center;
    gap: 14px;
}

.profile-icon {
    width: 46px;
    height: 46px;
    border-radius: 13px;

    display: flex;
    align-items: center;
    justify-content: center;

    font-size: 20px;
}

.profile-icon.blue {
    background: #eaf2ff;
    color: #2563eb;
}

.profile-icon.purple {
    background: #f1eaff;
    color: #7c3aed;
}

.profile-icon.red {
    background: #ffeaea;
    color: #dc3545;
}

.profile-input {
    min-height: 48px;
    border-radius: 10px;
    border: 1px solid #dee2e6;
    padding: 10px 14px;
    transition: all .2s ease;
}

.profile-input:focus {
    border-color: #2563eb;
    box-shadow: 0 0 0 3px rgba(37,99,235,.10);
}

.profile-button {
    border-radius: 10px;
    padding: 10px 18px;
    font-weight: 500;

    transition:
        transform 0.2s ease,
        box-shadow 0.2s ease;
}

.profile-button:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 15px rgba(0, 0, 0, 0.12);
}

.profile-button:active {
    transform: translateY(1px) scale(0.98);
    box-shadow: none;
}
.profile-summary {
    position: sticky;
    top: 20px;
}

.profile-avatar {
    width: 92px;
    height: 92px;

    border-radius: 50%;

    display: flex;
    align-items: center;
    justify-content: center;

    background: linear-gradient(135deg, #2563eb, #3b82f6);
    color: white;

    font-size: 36px;
    font-weight: 700;

    box-shadow: 0 8px 20px rgba(37,99,235,.25);
}

.profile-divider {
    height: 1px;
    background: #edf0f4;
    margin: 22px 0;
}

.journal-stat {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 14px;
}

.journal-stat-icon {
    width: 44px;
    height: 44px;

    border-radius: 12px;

    display: flex;
    align-items: center;
    justify-content: center;

    background: #e8f0ff;
    color: #2563eb;

    font-size: 20px;
}

.journal-count {
    font-size: 28px;
    font-weight: 700;
    color: #1f2937;
}

.danger-card {
    border: 1px solid #ffe0e0 !important;
}

.danger-info {
    display: flex;
    align-items: center;
    gap: 10px;

    padding: 13px 15px;

    border-radius: 10px;

    background: #fff5f5;
    color: #842029;

    font-size: 14px;
}

.delete-modal {
    border: 0;
    border-radius: 18px;
    overflow: hidden;

    box-shadow: 0 20px 60px rgba(0,0,0,.20);
}

.delete-modal-icon {
    width: 52px;
    height: 52px;

    border-radius: 14px;

    display: flex;
    align-items: center;
    justify-content: center;

    background: #ffe8e8;
    color: #dc3545;

    font-size: 22px;
}

.delete-warning {
    display: flex;
    align-items: flex-start;

    padding: 12px 14px;

    border-radius: 10px;

    background: #fff5f5;
    color: #842029;

    font-size: 13px;
}

.delete-modal .btn {
    border-radius: 9px;
    font-weight: 500;
}

@media (max-width: 991px) {

    .profile-summary {
        position: static;
    }

}

</style>



{{-- =====================================================
     JAVASCRIPT
===================================================== --}}

<script>

document.addEventListener('DOMContentLoaded', function () {

    const confirmDeleteButton =
        document.getElementById('confirmDeleteAccount');

    const deleteModal =
        document.getElementById('deleteAccountModal');

    if (!confirmDeleteButton || !deleteModal) {
        return;
    }


    confirmDeleteButton.addEventListener('click', function () {

        const form =
            document.querySelector(
                'form[action="{{ route('profile.destroy') }}"]'
            );

        if (form && form.reportValidity()) {

            form.submit();

        }

    });

});

</script>

@endsection