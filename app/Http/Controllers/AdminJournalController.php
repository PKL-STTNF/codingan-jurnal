<?php

namespace App\Http\Controllers;

use App\Models\Journal;
use Illuminate\Http\Request;

class AdminJournalController extends Controller
{
    public function index(Request $request)
    {
        $query = Journal::with('user')->latest();

        // Pencarian
        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {

                $q->where('hari', 'like', "%{$search}%")
                  ->orWhere('unit_kerja', 'like', "%{$search}%")
                  ->orWhere('catatan', 'like', "%{$search}%")
                  ->orWhereHas('user', function ($userQuery) use ($search) {
                      $userQuery->where('name', 'like', "%{$search}%");
                  });

            });
        }

        $journals = $query->paginate(10)->withQueryString();

        return view('admin.journals', compact('journals'));
    }

    public function latest()
    {
        $journals = \App\Models\Journal::with('user')
            ->whereDate('tanggal', today())
            ->latest('tanggal')
            ->latest('created_at')
            ->get();

        return view('admin.latest-journals', compact('journals'));
    }
}