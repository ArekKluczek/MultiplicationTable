<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
Route::post('/dashboard/generate', [DashboardController::class, 'generateTable'])->name('dashboard.generate');
