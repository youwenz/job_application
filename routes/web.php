<?php
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\BookmarkController;
use App\Http\Controllers\EmployerController;
use App\Http\Controllers\JobListingController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\JobController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard.index');
});

// Route::get('/employer', [EmployerController::class, 'index']);


// Company Routes
Route::get('/companies', [CompanyController::class, 'index']); // List companies

Route::get('/companies/create', [CompanyController::class, 'create'])->name('companies.create'); // Display the form to create a company
Route::post('/companies', [CompanyController::class, 'store'])->name('companies.store');


Route::get('/companies/{id}', [CompanyController::class, 'viewCompany'])->name('companies.show');// View one company

Route::post('/companies/{id}', [CompanyController::class, 'updateCompany']); // Update company
Route::get('/companies/delete/{id}', [CompanyController::class, 'deleteCompany']); // Delete company

// Job Routes
Route::get('jobs', [JobController::class, 'index']); // List jobs

Route::get('/companies/jobs/create', [JobController::class, 'create'])->name('jobs.create');// Display the form to create a job
Route::post('/companies/Jobs', [JobController::class, 'createJob'])->name('jobs.createJob');

Route::get('/companies/jobs/{id}', [JobController::class, 'viewJob']); // View one job

Route::post('/companies/jobs/{id}', [JobController::class, 'updateJob']); // Update job
Route::get('/companies/jobs/delete/{id}', [JobController::class, 'deleteJob']); // Delete job



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
