<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JournalController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return redirect()->route('journals.index');
});


Route::resource('journals', JournalController::class)
    ->except(['show']);
Route::resource('profiles', ProfileController::class)
    ->except(['show']);