<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
// use App\Http\Controllers\RoleController;
// use App\Http\Controllers\ProfileController;
// use App\Http\Controllers\SettingController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
// use App\Http\Controllers\PermissionController;

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

/** Auth Routes */
Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'handleLogin'])->name('login.post');
Route::get('forgot-password', [AuthController::class, 'forgotPassword'])->name('forgot_password');
Route::post('forgot-password', [AuthController::class, 'sendResetLink'])->name('forgot_password.send');
Route::get('reset-password/{token}', [AuthController::class, 'resetPassword'])->name('reset_password');
Route::post('reset-password', [AuthController::class, 'handleResetPassword'])->name('reset_password.send');

Route::group(['middleware' => ['auth_check', 'prevent_back_history']], function () {
    /** Auth Routes */
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');

    /** Dashboard Routes */
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

    /** Profile Routes */
    Route::put('profile-password-update/{id}', [ProfileController::class, 'updatePassword'])->name('profile_password.update');
    Route::resource('profile', ProfileController::class);

    /** User Routes */
    Route::get('user/data', [UserController::class, 'data'])->name('user.data');
    Route::get('user/restore/{user}', [UserController::class, 'restore'])->name('user.restore');
    Route::resource('user', UserController::class);

    /** Role Routes */
    Route::get('role/data', [RoleController::class, 'data'])->name('role.data');
    Route::resource('role', RoleController::class);

    /** Permission Routes */
    Route::get('permission/data', [PermissionController::class, 'data'])->name('permission.data');
    Route::resource('permission', PermissionController::class);

    /** Setting Routes */
    Route::get('setting', [SettingController::class, 'index'])->name('setting.index');
    Route::put('general-setting', [SettingController::class, 'generalSettingUpdate'])->name('general_setting.update');
    Route::put('fee-setting', [SettingController::class, 'feeSettingUpdate'])->name('fee_setting.update');
    Route::put('transaction-setting', [SettingController::class, 'transactionSettingUpdate'])->name('transaction_setting.update');
    Route::put('other-setting', [SettingController::class, 'otherSettingUpdate'])->name('other_setting.update');
});

// require __DIR__ . '/auth.php';