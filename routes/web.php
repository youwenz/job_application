<?php

use App\Http\Controllers\EmployerController;
use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard.index');
});

Route::get('/employer', [EmployerController::class, 'index']);

Route::get('/jobs', [SearchController::class, 'index'])->name('search.index');

Route::get('/search', [SearchController::class, 'search'])->name('search.search');

