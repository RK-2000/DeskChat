<?php

use App\Http\Controllers\User\DashboardController;
use App\Http\Controllers\UserController;
use Illuminate\Auth\Events\Logout;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('create-account',[UserController::class,'index'])->name("createAccount");
Route::post('create-account',[UserController::class,'createAccountPost'])->name("createAccountPost");

Route::get('log-in',[UserController::class,'signIn'])->name("signIn");
Route::post('log-in',[UserController::class,'signInPost'])->name("signInPost");

Route::get('logout', [UserController::class,'logout'])->name('logout');


Route::middleware(['auth'])->group(function () {
    Route::get('home',[DashboardController::class,'index'])->name("dashboard");
    Route::get('edit',[UserController::class,'editProfile'])->name("editProfile");
});
