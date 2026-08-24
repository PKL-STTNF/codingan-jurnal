@extends('layouts.admin')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <div>

        <h2 class="page-title">
            👥 Kelola User
        </h2>

        <p class="page-subtitle">
            Kelola akun pengguna yang terdaftar pada Website Jurnal PKL.
        </p>

    </div>

</div>


{{-- PESAN --}}

@if(session('success'))

    <div class="alert alert-success">

        <i class="bi bi-check-circle"></i>

        {{ session('success') }}

    </div>

@endif


@if(session('error'))

    <div class="alert alert-danger">

        <i class="bi bi-exclamation-circle"></i>

        {{ session('error') }}

    </div>

@endif


{{-- SEARCH --}}

<form action="{{ route('admin.users') }}"
      method="GET"
      class="row g-2 mb-4">

    <div class="col-md-6">

        <input
            type="text"
            name="search"
            class="form-control"
            placeholder="Cari nama atau email..."
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

            <a href="{{ route('admin.users') }}"
               class="btn btn-outline-secondary w-100">

                Reset

            </a>

        </div>

    @endif

</form>


{{-- TABLE --}}

<div class="table-responsive">

    <table class="table table-bordered table-hover align-middle">

        <thead>

            <tr>

                <th>No</th>

                <th>Pengguna</th>

                <th>Email</th>

                <th>Role</th>

                <th>Terdaftar</th>

                <th>Aksi</th>

            </tr>

        </thead>

        <tbody>

            @forelse($users as $user)

                <tr>

                    {{-- NO --}}

                    <td>

                        {{ $users->firstItem() + $loop->index }}

                    </td>


                    {{-- USER --}}

                    <td>

                        <div class="d-flex align-items-center">

                            <div
                                class="rounded-circle bg-primary text-white
                                       d-flex justify-content-center
                                       align-items-center me-2"
                                style="width:38px;height:38px;">

                                {{ strtoupper(substr($user->name, 0, 1)) }}

                            </div>

                            <strong>

                                {{ $user->name }}

                            </strong>

                        </div>

                    </td>


                    {{-- EMAIL --}}

                    <td>

                        {{ $user->email }}

                    </td>


                    {{-- ROLE --}}

                    <td>

                        @if($user->role === 'admin')

                            <span class="badge bg-primary">

                                <i class="bi bi-shield-fill-check"></i>

                                Admin

                            </span>

                        @else

                            <span class="badge bg-secondary">

                                User

                            </span>

                        @endif

                    </td>


                    {{-- TANGGAL --}}

                    <td>

                        {{ $user->created_at->format('d M Y') }}

                    </td>


                    {{-- AKSI --}}

                    <td>

                        @if($user->id === auth()->id())

                            <span class="text-muted small">

                                Akun Anda

                            </span>

                        @else

                            {{-- UBAH ROLE --}}

                            <form
                                action="{{ route('admin.users.role', $user) }}"
                                method="POST"
                                class="d-inline">

                                @csrf

                                @method('PATCH')

                                <input
                                    type="hidden"
                                    name="role"
                                    value="{{ $user->role === 'admin' ? 'user' : 'admin' }}">

                                <button
                                    type="submit"
                                    class="btn btn-outline-primary btn-sm"
                                    onclick="return confirm('Yakin ingin mengubah role pengguna ini?')">

                                    @if($user->role === 'admin')

                                        <i class="bi bi-person"></i>

                                        Jadikan User

                                    @else

                                        <i class="bi bi-shield-check"></i>

                                        Jadikan Admin

                                    @endif

                                </button>

                            </form>


                            {{-- HAPUS --}}

                            <form
                                action="{{ route('admin.users.destroy', $user) }}"
                                method="POST"
                                class="d-inline">

                                @csrf

                                @method('DELETE')

                               <button type="button"
                                        class="btn btn-danger btn-sm"
                                        data-bs-toggle="modal"
                                        data-bs-target="#deleteUserModal"
                                        data-delete-url="{{ route('admin.users.destroy', $user->id) }}"
                                        data-user-name="{{ $user->name }}">

                                    <i class="bi bi-trash"></i>

                                </button>

                            </form>

                        @endif

                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="6"
                        class="text-center text-muted py-5">

                        <i class="bi bi-people fs-1 d-block mb-2"></i>

                        Belum ada pengguna.

                    </td>

                </tr>

            @endforelse

        </tbody>

    </table>

</div>


{{-- PAGINATION --}}

@if($users->hasPages())

    <div class="d-flex justify-content-center mt-4">

        {{ $users->links('pagination::bootstrap-5') }}

    </div>

@endif

{{-- =========================
     MODAL HAPUS USER
========================= --}}

<div class="modal fade"
     id="deleteUserModal"
     tabindex="-1"
     aria-labelledby="deleteUserModalLabel"
     aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered">

        <div class="modal-content border-0 shadow"
             style="
                border-radius:20px;
                overflow:hidden;
            ">

            {{-- ICON --}}

            <div class="modal-body text-center p-4">

                <div class="mx-auto mb-4 d-flex align-items-center justify-content-center"
                     style="
                        width:75px;
                        height:75px;
                        border-radius:50%;
                        background:#fff1f2;
                        color:#dc3545;
                        font-size:34px;
                     ">

                    <i class="bi bi-person-x-fill"></i>

                </div>


                {{-- JUDUL --}}

                <h4 class="fw-bold mb-2">

                    Hapus Pengguna?

                </h4>


                {{-- USER NAME --}}

                <div class="mb-3">

                    <span id="deleteUserName"
                          class="fw-semibold text-danger">

                    </span>

                </div>


                {{-- DESKRIPSI --}}

                <p class="text-muted mb-2">

                    Apakah Anda yakin ingin menghapus pengguna ini?

                </p>

                <p class="text-muted small mb-4">

                    Semua data jurnal milik pengguna ini juga dapat
                    ikut terhapus secara permanen.

                </p>


                {{-- FORM DELETE --}}

                <form id="deleteUserForm"
                      method="POST">

                    @csrf
                    @method('DELETE')


                    <div class="d-flex justify-content-center gap-2">

                        {{-- BATAL --}}

                        <button type="button"
                                class="btn btn-light px-4"
                                data-bs-dismiss="modal"
                                style="border-radius:10px;">

                            Batal

                        </button>


                        {{-- HAPUS --}}

                        <button type="submit"
                                class="btn btn-danger px-4"
                                style="border-radius:10px;">

                            <i class="bi bi-trash3 me-1"></i>

                            Ya, Hapus

                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

</div>


{{-- =========================
     SCRIPT MODAL HAPUS USER
========================= --}}

<script>

document.addEventListener('DOMContentLoaded', function () {

    const deleteUserModal =
        document.getElementById('deleteUserModal');

    const deleteUserForm =
        document.getElementById('deleteUserForm');

    const deleteUserName =
        document.getElementById('deleteUserName');


    deleteUserModal.addEventListener('show.bs.modal', function (event) {

        const button = event.relatedTarget;

        const deleteUrl =
            button.getAttribute('data-delete-url');

        const userName =
            button.getAttribute('data-user-name');


        // Masukkan URL ke form
        deleteUserForm.setAttribute('action', deleteUrl);


        // Tampilkan nama user
        deleteUserName.textContent = userName;

    });

});

</script>
@endsection