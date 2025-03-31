<?php
use App\Http\Controllers\JobApplicationController;
use App\Http\Controllers\BookmarkController;
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
    Route::get('/', [CompanyController::class, 'index'])->name('index'); // Home Page
    Route::get('/list', [CompanyController::class, 'list'])->name('list'); // List companies
    Route::get('/create', [CompanyController::class, 'create'])->name('create'); // Create form
    Route::post('/', [CompanyController::class, 'store'])->name('store'); // Store company
    Route::get('/{id}', [CompanyController::class, 'viewCompany'])->name('show'); // View company
    Route::get('/showEmployer/{id}', [CompanyController::class, 'viewCompanyEmployer'])->name('showEmployer');
    Route::get('/edit/{id}', [CompanyController::class, 'edit'])->name('edit'); // Edit company form
    Route::put('/{id}', [CompanyController::class, 'update'])->name('update');// Update company
});

// Job Routes (Employer dashboard)
Route::prefix('companies/jobs')->name('jobs.')->group(function () {
    Route::get('/', [JobController::class, 'index'])->name('index');
    Route::get('/create', [JobController::class, 'create'])->name('create');
    Route::post('/create', [JobController::class, 'store'])->name('store');
    Route::get('/{id}', [JobController::class, 'view'])->name('show');
    Route::put('/{id}', [JobController::class, 'update'])->name('update');
    Route::delete('/delete/{id}', [JobController::class, 'delete'])->name('delete');
});

Route::get('/jobs/search', [SearchController::class, 'index'])->name('search.index');

Route::get('/search', [SearchController::class, 'search'])->name('search.search');


// Job Listings & Details
Route::get('/jobs', [JobListingController::class, 'index'])->name('jobListings.index');
Route::get('/jobs/{jobId}', [JobListingController::class, 'show'])->name('jobListings.details');

// Job Applications
Route::get('/applications', [JobApplicationController::class, 'index'])->name('jobApplication.index');
Route::get('/jobs/{jobId}/apply-job', [JobApplicationController::class, 'showApplicationForm'])->name('jobListings.apply.form');
Route::post('/jobs/{jobId}/apply-job', [JobApplicationController::class, 'submitApplication'])->name('jobApplication.apply');

// Bookmarks
Route::get('/bookmarks', [BookmarkController::class, 'index'])->name('bookmarks.index');
Route::post('/jobs/{jobId}/bookmark', [BookmarkController::class, 'save'])->name('jobListings.bookmark');
Route::delete('/jobs/{jobId}/bookmark', [BookmarkController::class, 'remove'])->name('jobListings.bookmark.remove');


