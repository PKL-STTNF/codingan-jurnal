<?php

namespace App\Http\Controllers;

use App\Models\Journal;
use Illuminate\Http\Request;

class AdminJournalController extends Controller
{
    /**
     * Menampilkan semua jurnal
     */
    public function index(Request $request)
    {
        $query = Journal::with([
            'user',
            'dokumentasis'
        ])->latest();

        // =========================
        // PENCARIAN
        // =========================
        if ($request->filled('search')) {

            $search = $request->search;

            $query->where(function ($q) use ($search) {

                $q->where('hari', 'like', "%{$search}%")
                    ->orWhere('unit_kerja', 'like', "%{$search}%")
                    ->orWhere('catatan', 'like', "%{$search}%")

                    ->orWhereHas('user', function ($userQuery) use ($search) {

                        $userQuery->where(
                            'name',
                            'like',
                            "%{$search}%"
                        );

                    });

            });
        }

        // =========================
        // JUMLAH DATA PER HALAMAN
        // =========================
        $perPage = in_array(
            $request->integer('per_page'),
            [10, 25, 50, 100]
        )
            ? $request->integer('per_page')
            : 50;

        // =========================
        // PAGINATION
        // =========================
        $journals = $query
            ->paginate($perPage)
            ->withQueryString();

        return view(
            'admin.journals',
            compact('journals')
        );
    }

    /**
     * Menampilkan jurnal terbaru hari ini
     */
    public function latest()
    {
        $journals = Journal::with([
            'user',
            'dokumentasis'
        ])
            ->whereDate('tanggal', today())
            ->latest('tanggal')
            ->latest('created_at')
            ->get();

        return view(
            'admin.latest-journals',
            compact('journals')
        );
    }
}