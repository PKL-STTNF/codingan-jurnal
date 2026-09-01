<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminUserController extends Controller
{
    public function index(Request $request)
    {
        $query = User::query()->latest();

        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%");
            });
        }

        $perPage = in_array($request->integer('per_page'), [10, 25, 50, 100])
            ? $request->integer('per_page')
            : 50;

        $users = $query->paginate($perPage)->withQueryString();

        return view('admin.users', compact('users'));
    }


    public function updateRole(Request $request, User $user)
    {
        if ($user->id === auth()->id()) {
            return back()->with('error', 'Role akun yang sedang digunakan tidak dapat diubah.');
        }

        $request->validate([
            'role' => ['required', 'in:user,admin'],
        ]);

        $user->update([
            'role' => $request->role,
        ]);

        return back()->with('success', 'Role pengguna berhasil diperbarui.');
    }


    public function destroy(User $user)
    {
        if ($user->id === auth()->id()) {
            return back()->with('error', 'Akun yang sedang digunakan tidak dapat dihapus.');
        }

        foreach ($user->journals as $journal) {
            if ($journal->dokumentasi && Storage::disk('public')->exists($journal->dokumentasi)) {
                Storage::disk('public')->delete($journal->dokumentasi);
            }
        }

        $user->delete();

        return back()->with('success', 'Pengguna berhasil dihapus.');
    }
}