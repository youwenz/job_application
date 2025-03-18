<?php

use App\Http\Controllers\EmployerController;
use App\Http\Controllers\JobListingController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard.index');
});

Route::get('/employer', [EmployerController::class, 'index']);

Route::get('/jobs', [JobListingController::class, 'index'])->name('jobs.index');

Route::get('/search', [JobListingController::class, 'search'])->name('jobs.search');

