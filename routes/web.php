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
use App\Http\Controllers\WasteCollectionSchedule;
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
    ->middleware(['auth', 'verified', 'checkActiveStatus'])
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
Route::middleware('auth', 'checkActiveStatus')->group(function () {

    Route::post('/admin/create_admin', [AdminController::class, 'create_admin'])->name('admin.create_admin');
    Route::get('/collector', [CollectorController::class, 'index'])->name('collector');
    Route::post('/collector/create_collector', [AdminController::class, 'create_collector'])->name('collector.create_collector');
    Route::get('/residents', [UserController::class, 'index'])->name('residents');
    Route::get('/schedule', function () {
        return view('schedule');
    })->name('schedule');

    // notify the users
    Route::get('/admin', [WasteCollectionSchedule::class, 'showNotificationForm'])->name('admin');
    Route::post('/send-notification', [WasteCollectionSchedule::class, 'sendNotification'])->name('admin.send-notification');

    // active and inactive for admin
    Route::get('/admin/activate/{id}', [AdminController::class, 'activateUser'])->name('admin.activateUser');
    Route::get('/admin/deactivate/{id}', [AdminController::class, 'deactivateUser'])->name('admin.deactivateUser');
    Route::put('/admin/toggle/{id}', [AdminController::class, 'toggleUserStatus'])->name('admin.toggleUserStatus');

    // active and inactive for collector
    Route::get('/collector/activate/{id}', [AdminController::class, 'activateCollector'])->name('collector.activateCollector');
    Route::get('/collector/deactivate/{id}', [AdminController::class, 'deactivateCollector'])->name('collector.deactivateCollector');
    Route::put('/collector/toggle/{id}', [AdminController::class, 'toggleCollectorStatus'])->name('collector.toggleCollectorStatus');

    // active and inactive for residents
    Route::get('/residents/activate/{id}', [AdminController::class, 'activateResidents'])->name('residents.activateResidents');
    Route::get('/residents/deactivate/{id}', [AdminController::class, 'deactivateResidents'])->name('residents.deactivateResidents');
    Route::put('/residents/toggle/{id}', [AdminController::class, 'toggleResidentsStatus'])->name('residents.toggleResidentsStatus');

    // edit admin
    Route::get('/admin', [AdminController::class, 'index'])->name('admin');
    Route::patch('/admin/update/{id}', [AdminController::class, 'update'])->name('admin.update');

    // edit collector
    Route::get('/collector', [CollectorController::class, 'index'])->name('collector');
    Route::patch('/collector/update/{id}', [AdminController::class, 'update_collector'])->name('collector.update_collector');

    // edit residents/users
    Route::get('/residents', [UserController::class, 'index'])->name('residents');
    Route::patch('/residents/update/{id}', [AdminController::class, 'update_residents'])->name('residents.update_residents');

    // delete
    Route::delete('/admin/{id}', [AdminController::class, 'destroy'])->name('admin.destroy');
    Route::delete('/admin/collector/{id}', [AdminController::class, 'admin_destroy_collector'])->name('collector.admin_destroy_collector');
    Route::delete('/admin/residents/{id}', [AdminController::class, 'admin_destroy_residents'])->name('residents.admin_destroy_residents');

}); // end of middleware group

// Collector Dashboard Sidebar
Route::middleware('auth', 'checkActiveStatus')->group(function () {

    // Route::get('/collector-residents', [UserController::class, 'collector'])->name('collector-residents');
    Route::post('/collector/create_collector_residents', [CollectorController::class, 'create_collector_residents'])->name('collector-residents.create_collector_residents');
    Route::get('/collector-schedule', function () {
        return view('collector-schedule');
    })->name('collector-schedule');

    // active and inactive for admin
    Route::get('/collector-residents/activate/{id}', [CollectorController::class, 'activateUser'])->name('collector-residents.activateUser');
    Route::get('/collector-residents/deactivate/{id}', [CollectorController::class, 'deactivateUser'])->name('collector-residents.deactivateUser');
    Route::put('/collector-residents/toggle/{id}', [CollectorController::class, 'toggleResidentsStatus'])->name('collector-residents.toggleResidentsStatus');

    // edit collector
    Route::patch('/residents-collector/update/{id}', [CollectorController::class, 'update_collector'])->name('collector-residents.update_collector');

    // delete residents-collector
    Route::get('/collector-residents', [CollectorController::class, 'collector'])->name('collector-residents');
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
