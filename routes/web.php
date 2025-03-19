<?php

use App\Http\Controllers\EmployerController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\CompanyController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard.index');
});

Route::get('/employer', [EmployerController::class, 'index']);


// Company Routes
Route::get('companies', [CompanyController::class, 'index']); // List companies

// Ensure "create" is before "{id}" to avoid conflicts
Route::get('companies/create', [CompanyController::class, 'create'])->name('companies.create'); // Display the form to create a company
Route::post('companies', [CompanyController::class, 'createCompany'])->name('companies.createCompany');

Route::get('companies/{id}', [CompanyController::class, 'viewCompany']); // View one company
Route::post('companies/{id}', [CompanyController::class, 'updateCompany']); // Update company
Route::get('companies/delete/{id}', [CompanyController::class, 'deleteCompany']); // Delete company

// Job Routes
Route::get('jobs', [JobController::class, 'index']); // List jobs

Route::get('jobs/create', [JobController::class, 'create'])->name('jobs.create');
Route::post('Jobs', [JobController::class, 'createJob'])->name('jobs.createJob');

Route::get('jobs/{id}', [JobController::class, 'viewJob']); // View one job

Route::post('jobs/{id}', [JobController::class, 'updateJob']); // Update job
Route::get('jobs/delete/{id}', [JobController::class, 'deleteJob']); // Delete job

