<?php

use App\Http\Controllers\EmployerController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard.index');
});

Route::get('/employer', [EmployerController::class, 'index']);
