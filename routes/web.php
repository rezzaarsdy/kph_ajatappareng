<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\{
    DashboardAdmin,
    AdminController,
    LoginController,
    BeritaController,
    GaleriController,
    InboxController,
    MemberController,
    ProfileController
};
use App\Http\Controllers\home\{
    DashboardController,
    BeritaHome,
    GaleriHome,
    ProfileHome
};
use App\Models\Berita;
use App\Models\Member;
use App\Models\Profile;
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
    return redirect()->route('beranda');
});
Route::get('beranda', [DashboardController::class, 'index'])->name('beranda');
Route::post('inbox', [InboxController::class, 'store'])->name('inbox.store');
Route::get('kontak', [InboxController::class, 'create'])->name('inbox.create');
Route::get('informasi/show/{uuid}', [BeritaHome::class, 'show'])->name('berita_home.show');
Route::get('dokumentasi', [GaleriHome::class, 'index'])->name('galeri.home');
Route::get('informasi', [BeritaHome::class, 'index'])->name('berita_home.index');
Route::get('berita/{id}', [BeritaHome::class, 'edit'])->name('berita_home.edit');
Route::get('profil/{id}', [ProfileHome::class, 'edit'])->name('profile_home.edit');


//login
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


    //routing berita admin
    Route::get('news', [BeritaController::class, 'index'])->name('berita.index');
    Route::get('news/create', [BeritaController::class, 'create'])->name('berita.create');
    Route::post('news/create', [BeritaController::class, 'store'])->name('berita.store');
    Route::get('news/edit/{uuid}', [BeritaController::class, 'edit'])->name('berita.edit');
    Route::resource('news', BeritaController::class)->only(
        'update',
    );
    Route::get('news/delete/{uuid}', [BeritaController::class, 'destroy'])->name('berita.destroy');

    //Routing Galeri
    Route::get('galeri', [GaleriController::class, 'index'])->name('galeri.index');
    Route::get('galeri/create', [GaleriController::class, 'create'])->name('galeri.create');
    Route::post('galeri/create', [GaleriController::class, 'store'])->name('galeri.store');
    Route::get('galeri/edit/{uuid}', [GaleriController::class, 'edit'])->name('galeri.edit');
    Route::resource('galeri', GaleriController::class)->only(
        'update'
    );
    Route::get('galeri/delete/{uuid}', [GaleriController::class, 'destroy'])->name('galeri.destroy');

    //routing Index
    Route::get('inbox', [InboxController::class, 'index'])->name('inbox.index');
    Route::get('inbox/delete/{uuid}', [InboxController::class, 'destroy'])->name('inbox.destroy');

    //Routing Profile
    Route::get('profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('profile/create', [ProfileController::class, 'create'])->name('profile.create');
    Route::post('profile/create', [ProfileController::class, 'store'])->name('profile.store');
    Route::get('profile/edit/{uuid}', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::resource('profile', ProfileController::class)->only(
        'update'
    );
    Route::get('profile/delete/{uuid}', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
