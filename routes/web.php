<?php

use App\Http\Controllers\JournalController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::middleware('auth')->group(function () {

    Route::middleware(['auth', 'admin'])->group(function () {

    Route::get('/admin/dashboard', [\App\Http\Controllers\AdminDashboardController::class, 'index'])
        ->name('admin.dashboard');

    Route::get('/admin/journals', [\App\Http\Controllers\AdminJournalController::class, 'index'])
        ->name('admin.journals');

    Route::get('/admin/latest-journals', [\App\Http\Controllers\AdminJournalController::class, 'latest'])
        ->name('admin.latest-journals');
    
    Route::get('/admin/users', [\App\Http\Controllers\AdminUserController::class, 'index'])
        ->name('admin.users');

    Route::patch('/admin/users/{user}/role', [\App\Http\Controllers\AdminUserController::class, 'updateRole'])
        ->name('admin.users.role');

    Route::delete('/admin/users/{user}', [\App\Http\Controllers\AdminUserController::class, 'destroy'])
        ->name('admin.users.destroy');

});

    Route::get('/export', [\App\Http\Controllers\ExportController::class, 'index'])
        ->name('export.index');

    Route::get('/export/excel', [\App\Http\Controllers\ExportController::class, 'excel'])
        ->name('export.excel');

    Route::get('/export/pdf', [\App\Http\Controllers\ExportController::class, 'pdf'])
        ->name('export.pdf');
        
    Route::get('/export/word', [\App\Http\Controllers\ExportController::class, 'word'])
        ->name('export.word');

    Route::resource('journals', JournalController::class)->except(['show']);
    Route::view('/panduan', 'panduan')->name('panduan');
        
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    

});

require __DIR__.'/auth.php';