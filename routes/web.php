<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    DashboardController,
    Admin\DashboardAdmin,
    Admin\AdminController
};

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('dashboard', [DashboardController::class, 'index']);
Route::get('dashboard', [DashboardAdmin::class, 'index'])->name('dashboard');
Route::get('admin', [AdminController::class, 'index'])->name('admin.index');
Route::get('admin/create', [AdminController::class, 'create'])->name('admin.create');
Route::post('admin/store', [AdminController::class, 'store'])->name('admin.store');
Route::get('/admin/edit/{uuid}', [AdminController::class, 'edit'])->name('admin.edit');
Route::get('/admin/delete/{uuid}', [AdminController::class, 'destroy'])->name('admin.destroy');
Route::resource('admin', AdminController::class)->only(
    'update'
);