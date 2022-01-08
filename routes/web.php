<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    DashboardController,
    Admin\DashboardAdmin,
    Admin\AdminController,
    Admin\LoginController
};
use App\Http\Controllers\admin\BeritaController;
use App\Http\Controllers\admin\MemberController;
use App\Models\Berita;
use App\Models\Member;
use Illuminate\Auth\Events\Login;
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
    return redirect()->route('login');
});
Route::get('login', [LoginController::class, 'index'])->name('login');
Route::post('login', [LoginController::class, 'authenticate'])->name('admin.authenticate');
Route::middleware(['auth'])->group(function () {
    Route::get('logout', [LoginController::class, 'logout'])->name('logout');
});

Route::group(['middleware' => ['auth', 'checklevel:1']], function () {
    //routing Superadmin Admin
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/admin/create', [AdminController::class, 'create'])->name('admin.create');
    Route::post('/admin/store', [AdminController::class, 'store'])->name('admin.store');
    Route::get('/admin/edit/{uuid}', [AdminController::class, 'edit'])->name('admin.edit');
    Route::get('/admin/delete/{uuid}', [AdminController::class, 'destroy'])->name('admin.destroy');
    Route::resource('admin', AdminController::class)->only(
        'update'
    );
});

Route::group(['middleware' => ['auth', 'checklevel:1,2']], function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::get('/dashboard', [DashboardAdmin::class, 'index'])->name('dashboard');

    //routing Member
    Route::get('anggota', [MemberController::class, 'index'])->name('member.index');
    Route::get('anggota/create', [MemberController::class, 'create'])->name('member.create');
    Route::post('anggota/create', [MemberController::class, 'store'])->name('member.store');
    Route::get('anggota/edit/{uuid}', [MemberController::class, 'edit'])->name('member.edit');
    Route::resource('anggota', MemberController::class)->only(
        'update'
    );
    Route::get('member/delete/{uuid}', [MemberController::class, 'destroy'])->name('member.destroy');


    //routing berita
    Route::get('berita', [BeritaController::class, 'index'])->name('berita.index');
    Route::get('berita/create', [BeritaController::class, 'create'])->name('berita.create');
    Route::post('berita/create', [BeritaController::class, 'store'])->name('berita.store');
    Route::get('berita/edit/{uuid}', [BeritaController::class, 'edit'])->name('edit');
    Route::resource('berita', BeritaController::class)->only(
        'update',
    );
    Route::get('member/delete/{uuid}', [BeritaController::class, 'destroy'])->name('berita.destroy');
});
