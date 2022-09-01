<?php

use App\Http\Controllers\DatatablesCenterController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Datatables
Route::get('members/data', [DatatablesCenterController::class, 'dataMembers'])->name('members.data');
Route::get('users/data', [DatatablesCenterController::class, 'dataUsers'])->name('users.data');

Route::resource('members', MemberController::class)->middleware(['auth', 'active', 'admin-member']);

Route::resource('users', UsersController::class)->middleware(['auth', 'active', 'admin']);
