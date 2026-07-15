@extends('layouts.app')

@section('content')

@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<div class="d-flex justify-content-between align-items-center mb-4">

    <h2>
        <i class="bi bi-person-badge-fill"></i>
        Profil PKL
    </h2>

    <a href="{{ route('profiles.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-circle"></i>
        Tambah Profil
    </a>

</div>

<table class="table table-bordered table-hover align-middle">

    <thead class="table-primary">

        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Sekolah</th>
            <th>Tempat PKL</th>
            <th>Guru Pembimbing</th>
            <th>Instruktur</th>
            <th>Periode</th>
            <th width="150">Aksi</th>
        </tr>

    </thead>

    <tbody>

    @forelse($profiles as $profile)

        <tr>

            <td>{{ $loop->iteration }}</td>
            <td>{{ $profile->nama }}</td>
            <td>{{ $profile->sekolah }}</td>
            <td>{{ $profile->tempat_pkl }}</td>
            <td>{{ $profile->guru_pembimbing }}</td>
            <td>{{ $profile->instruktur }}</td>
            <td>{{ $profile->periode }}</td>

            <td>

                <a href="{{ route('profiles.edit',$profile->id) }}"
                    class="btn btn-warning btn-sm">

                    <i class="bi bi-pencil-square"></i>

                </a>

                <form action="{{ route('profiles.destroy',$profile->id) }}"
                    method="POST"
                    class="d-inline">

                    @csrf
                    @method('DELETE')

                    <button
                        type="submit"
                        class="btn btn-danger btn-sm"
                        onclick="return confirm('Yakin ingin menghapus profil?')">

                        <i class="bi bi-trash"></i>

                    </button>

                </form>

            </td>

        </tr>

    @empty

        <tr>
            <td colspan="8" class="text-center">
                Belum ada data profil.
            </td>
        </tr>

    @endforelse

    </tbody>

</table>

@endsection