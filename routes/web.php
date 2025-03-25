<?php
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\BookmarkController;
use App\Http\Controllers\EmployerController;
use App\Http\Controllers\JobListingController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\JobController;
use Illuminate\Support\Facades\Route;

// Landing page for pre-login
Route::get('/', function () {
    return view('dashboard.index');
});

// Company Routes (Employer dashboard)
Route::prefix('companies')->name('companies.')->group(function () {
    Route::get('/', [CompanyController::class, 'index'])->name('index'); // List companies
    Route::get('/create', [CompanyController::class, 'create'])->name('create'); // Create form
    Route::post('/', [CompanyController::class, 'store'])->name('store'); // Store company
    Route::get('/{id}', [CompanyController::class, 'viewCompany'])->name('show'); // View company
    Route::post('/{id}', [CompanyController::class, 'updateCompany'])->name('update'); // Update company
    Route::get('/delete/{id}', [CompanyController::class, 'deleteCompany'])->name('delete'); // Delete company
});

// Job Routes (Employer dashboard)
Route::prefix('companies/jobs')->name('jobs.')->group(function () {
    Route::get('/', [JobController::class, 'index'])->name('index'); // List jobs
    Route::get('/create', [JobController::class, 'create'])->name('create'); // Create job form
    Route::post('/', [JobController::class, 'createJob'])->name('store'); // Store job
    Route::get('/{id}', [JobController::class, 'viewJob'])->name('show'); // View job
    Route::post('/{id}', [JobController::class, 'updateJob'])->name('update'); // Update job
    Route::get('/delete/{id}', [JobController::class, 'deleteJob'])->name('delete'); // Delete job
});

Route::get('/jobs/search', [SearchController::class, 'index'])->name('search.index');

Route::get('/search', [SearchController::class, 'search'])->name('search.search');


// Job Listings & Details
Route::get('/jobs', [JobListingController::class, 'index'])->name('jobListings.list');
Route::get('/jobs/{jobId}', [JobListingController::class, 'show'])->name('jobListings.details');

// Job Applications
// Route::middleware(['auth'])->group(function () {
    Route::get('/employee/jobs/{jobId}/apply', [ApplicationController::class, 'showApplyForm'])->name('jobListings.apply.form');
    Route::post('/employee/jobs/{jobId}/apply', [ApplicationController::class, 'apply'])->name('jobListings.apply');

    // Bookmarks
    Route::post('/employee/jobs/{jobId}/bookmark', [BookmarkController::class, 'save'])->name('jobListings.bookmark');
    Route::delete('/employee/jobs/{jobId}/bookmark', [BookmarkController::class, 'remove'])->name('jobListings.bookmark.remove');
// });
