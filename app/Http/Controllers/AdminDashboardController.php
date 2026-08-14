<?php

namespace App\Http\Controllers;

use App\Models\Journal;
use App\Models\User;
use Illuminate\Support\Carbon;

class AdminDashboardController extends Controller
{
    public function index()
    {
        Carbon::setLocale('id');

        $totalUsers = User::count();
        $totalAdmins = User::where('role', 'admin')->count();
        $totalJournals = Journal::count();
        $journalsToday = Journal::whereDate('tanggal', today())->count();

        $recentJournals = Journal::with('user')
            ->latest()
            ->take(5)
            ->get();

        $topUsers = User::withCount('journals')
            ->orderByDesc('journals_count')
            ->take(5)
            ->get();

        $hour = (int) now()->format('H');

        $greeting = $hour < 11
            ? 'Selamat Pagi'
            : ($hour < 15
                ? 'Selamat Siang'
                : ($hour < 18
                    ? 'Selamat Sore'
                    : 'Selamat Malam'));

        $today = now()->translatedFormat('l, d F Y');

        return view('admin.dashboard', compact(
            'totalUsers',
            'totalAdmins',
            'totalJournals',
            'journalsToday',
            'recentJournals',
            'topUsers',
            'greeting',
            'today'
        ));
    }
}
