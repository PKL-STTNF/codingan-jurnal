<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

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

        $users = $query->paginate(10)->withQueryString();

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

        $user->delete();

        return back()->with('success', 'Pengguna berhasil dihapus.');
    }
}