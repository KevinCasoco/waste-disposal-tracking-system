<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CollectorController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EditProfile;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::redirect('/', destination: 'login');

Route::get('/dashboard', [DashboardController::class, 'countUsersByRole'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// guess routes

Route::middleware('guest')->group(function () {

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
        ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
        ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
        ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
        ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
        ->name('password.store');
});

Route::middleware('auth', 'status')->group(function () {

    Route::get('register', [RoleController::class, 'roleInRegister'])->name('register');

    // Route::get('register', [RegisteredUserController::class, 'create'])
    //             ->name('register');

    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('verify-email', EmailVerificationPromptController::class)
        ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
        ->middleware('throttle:6,1')
        ->name('verification.send');

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
        ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::put('password', [PasswordController::class, 'update'])->name('password.update');
}); // end of middleware group

Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
    ->name('logout')->middleware('auth');

// Admin Dashboard Sidebar
Route::middleware('auth')->group(function () {

    Route::get('/admin', [AdminController::class, 'index'])->name('admin');
    Route::post('/admin/create_admin', [AdminController::class, 'create_admin'])->name('admin.create_admin');
    Route::get('/collector', [CollectorController::class, 'index'])->name('collector');
    Route::post('/collector/create_collector', [AdminController::class, 'create_collector'])->name('collector.create_collector');
    Route::get('/residents', [UserController::class, 'index'])->name('residents');
    Route::get('/schedule', function () {
        return view('schedule');
    })->name('schedule');

    // Route::get('/admin/{id}/edit', [AdminController::class, 'edit'])->name('admin.edit');
    Route::put('/admin/{id}', [AdminController::class, 'update'])->name('admin.update');

    Route::delete('/admin/{id}', [AdminController::class, 'destroy'])->name('admin.destroy');
    Route::delete('/admin/collector/{id}', [AdminController::class, 'admin_destroy_collector'])->name('collector.admin_destroy_collector');
    Route::delete('/admin/residents/{id}', [AdminController::class, 'admin_destroy_residents'])->name('residents.admin_destroy_residents');

}); // end of middleware group

// Collector Dashboard Sidebar
Route::middleware('auth')->group(function () {

    Route::get('/collector-residents', [UserController::class, 'collector'])->name('collector-residents');
    Route::post('/collector/create_collector_residents', [CollectorController::class, 'create_collector_residents'])->name('collector-residents.create_collector_residents');
    Route::get('/collector-schedule', function () {
        return view('collector-schedule');
    })->name('collector-schedule');

    Route::delete('/collector/{id}', [CollectorController::class, 'destroy_collector_residents'])->name('collector-residents.destroy_collector_residents');

}); // end of middleware group

// User-Residents Dashboard Sidebar
Route::middleware('auth')->group(function () {

    Route::get('/user-residents', [UserController::class, 'residents'])->name('user-residents');
    Route::delete('/residents/{id}', [UserController::class, 'destroy_user_residents'])->name('user-residents.destroy_user_residents');
    Route::get('/user-schedule', function () {
        return view('user-schedule');
    })->name('user-schedule');
    Route::get('/augmented', function () {
        return view('augmented');
    })->name('augmented');

}); // end of middleware group

require __DIR__.'/auth.php';
