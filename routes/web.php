<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\OsisController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\FacilityController;
use App\Http\Controllers\ManagementController;
use App\Http\Controllers\AchievementController;

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

// Route::middleware('guest')->group(function () {
    Route::get('/', [GuestController::class, 'beranda']);
    Route::get('/profil', [GuestController::class, 'profil']);
    Route::get('/manajemen', [GuestController::class, 'manajemen']);
    Route::get('/pendidik', [GuestController::class, 'pendidik']);
    Route::get('/tenaga-kependidikan', [GuestController::class, 'tenaga_kependidikan']);
    Route::get('/osis', [GuestController::class, 'osis']);
    Route::get('/osis/{organization:slug}', [GuestController::class, 'ekskul']);
    Route::get('/fasilitas', [GuestController::class, 'fasilitas']);
    Route::get('/prestasi', [GuestController::class, 'prestasi']);
    Route::get('/berita', [GuestController::class, 'berita']);
    Route::get('/berita/{post:slug}', [GuestController::class, 'berita_show']);
    Route::get('/berita/kategori/{organization:slug}', [GuestController::class, 'berita_category']);
    Route::get('/galeri', [GuestController::class, 'galeri']);
    Route::get('/galeri/{album:slug}', [GuestController::class, 'galeri_show']);
    Route::get('/galeri/kategori/{organization:slug}', [GuestController::class, 'galeri_category']);
    Route::get('/kontak', [GuestController::class, 'kontak']);
    Route::get('/masuk', [AuthController::class, 'masuk'])->name('login');
    Route::post('/masuk', [AuthController::class, 'authenticate']);
// });

Route::middleware('auth')->group(function () {
    Route::get('/pratinjau-berita/{post:slug}', [GuestController::class, 'berita_preview']);
    Route::get('/kata-sandi', [AuthController::class, 'view_password']);
    Route::patch('/kata-sandi', [AuthController::class, 'change_password']);
    Route::resource('/kelola-berita', PostController::class);
    Route::resource('/kelola-osis', OsisController::class);
    Route::resource('/kelola-pendidik', TeacherController::class);
    Route::resource('/kelola-tendik', StaffController::class);
    Route::resource('/kelola-manajemen', ManagementController::class);
    Route::resource('/kelola-fasilitas', FacilityController::class);
    Route::resource('/kelola-prestasi', AchievementController::class);

    Route::get('/pratinjau-galeri/{album:slug}', [GuestController::class, 'galeri_preview']);
    Route::resource('/kelola-galeri', GalleryController::class);

    Route::get('/sebagai/{organization}', [AuthController::class, 'sebagai']);
    Route::get('/post-slug', [PostController::class, 'slug']);
    Route::get('/keluar', [AuthController::class, 'keluar']);
    Route::get('/dasbor', [AuthController::class, 'dasbor']);
});
