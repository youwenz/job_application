<?php
use App\Http\Controllers\JobApplicationController;
use App\Http\Controllers\BookmarkController;
use App\Http\Controllers\JobListingController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\LogoutController; 
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\Auth\PasswordController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    if (!Auth::check()) {
        return view('dashboard.index');
    }

    $user = Auth::user();

    if ($user->role === 'employer') {
        return redirect()->route('companies.index');
    } elseif ($user->role === 'employee') {
        return view('dashboard.index'); 
    }

    return view('dashboard.index'); 
})->name('dashboard');


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

// Route::middleware(['auth'])->group(function () {
    Route::prefix('companies/jobs')->name('jobs.')->group(function () {
        Route::get('/create', [JobController::class, 'create'])->name('create');
        Route::post('/create', [JobController::class, 'store'])->name('store');
        Route::get('/{userId}', [JobController::class, 'show'])->name('show');
        Route::get('/{id}/edit', [JobController::class, 'edit'])->name('edit'); // Show edit form
        Route::put('/{id}', [JobController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [JobController::class, 'delete'])->name('delete');

        // Show applicants for a specific job
        Route::get('/{jobId}/application', [JobApplicationController::class, 'showApplicants'])->name('showApplicants');

    });
// });


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

// Authentication
Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store']);
Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store']);
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');


// Email Verification Route
Route::get('/email/verify/{id}/{hash}', VerifyEmailController::class)
    ->middleware(['auth', 'signed', 'throttle:6,1'])
    ->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

// Profile routes
Route::middleware('auth')->group(function () {
    // Show the profile edit form
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');

    // Update the profile information
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');

    // Delete the user's account
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::put('/user/password', [PasswordController::class, 'update'])->name('password.update');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

// require __DIR__.'/auth.php';


