<?php

use App\Http\Controllers\Admin\AdminController as AdminAdminController;
use App\Http\Controllers\Admin\ProfileController as AdminProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('admin.dashboard');
});

Route::get('/update', function () {
    return view('admin.pages.user.profile.update');
});

Route::get('/pass', function () {
    return view('admin.pages.user.profile.security');
});

Route::get('/info', function () {
    return view('admin.pages.user.profile.user-info');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});






    Route::group(['middleware' => ['auth']], function () {
        Route::group(['prefix' => 'admin', 'middleware' => ['role:Admin']], function () {
            Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
            Route::get('/user-management', [AdminAdminController::class, 'userDefaultlist'])->name('user-management');
            Route::get('/info', [AdminProfileController::class, 'index'])->name('userinfo');


        });





    Route::group(['middleware' => ['permission:manage-users']], function () {
        Route::get('/users', [UserController::class, 'index'])->name('users.index');
    });
});















require __DIR__.'/auth.php';
