<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Livewire\Kelas;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\SiswaController;

Route::get('/', function () {
    return redirect()->route('login');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {
    Route::get('/kelas', [KelasController::class, 'index'])->name('kelas.index');
});
Route::middleware(['auth'])->group(function () {
    Route::get('/kelas', [KelasController::class, 'index'])->name('kelas.index');
});
Route::middleware(['auth'])->group(function () {
    Route::get('/guru', [GuruController::class, 'index'])->name('guru.index');
});
Route::middleware(['auth'])->group(function () {
    Route::get('/siswa', [SiswaController::class, 'index'])->name('siswa.index');
});