<?php
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\BookmarkController;
use App\Http\Controllers\EmployerController;
use App\Http\Controllers\JobListingController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard.index');
});

Route::get('/employer', [EmployerController::class, 'index']);

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