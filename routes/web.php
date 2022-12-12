<?php

use App\Models\Learning;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\OsisController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\RaporController;
use App\Http\Controllers\ScoreController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\RombelController;
use App\Http\Controllers\ServerController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\FacilityController;
use App\Http\Controllers\LearningController;
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
Route::get('/aplikasi', [GuestController::class, 'aplikasi']);
Route::get('/erapor', function () {
    return redirect('http://0.tcp.ap.ngrok.io:10320/login');
});

Route::middleware('guest')->group(function () {
    Route::get('/masuk', [AuthController::class, 'masuk'])->name('login');
    Route::post('/masuk', [AuthController::class, 'authenticate']);
});

Route::middleware('auth')->group(function () {
    Route::get('/keluar', [AuthController::class, 'keluar']);
    Route::get('/dasbor', [AuthController::class, 'dasbor']);
    Route::get('/s/{id}', [AuthController::class, 'sesi']);
    Route::get('/kata-sandi', [AuthController::class, 'view_password']);
    Route::patch('/kata-sandi', [AuthController::class, 'change_password']);

    // if (Session::get('app') == 'web') {
    Route::resource('/kelola-berita', PostController::class);
    Route::resource('/kelola-osis', OsisController::class);
    Route::resource('/kelola-pendidik', TeacherController::class);
    Route::resource('/kelola-tendik', StaffController::class);
    Route::resource('/kelola-manajemen', ManagementController::class);
    Route::resource('/kelola-fasilitas', FacilityController::class);
    Route::resource('/kelola-prestasi', AchievementController::class);
    Route::resource('/kelola-server', ServerController::class);
    Route::resource('/kelola-galeri', GalleryController::class);
    Route::get('/pratinjau-berita/{post:slug}', [GuestController::class, 'berita_preview']);
    Route::get('/kelola-server/{server:name}/refresh', [ServerController::class, 'refresh']);
    Route::get('/kelola-server/{server:name}/switch/{status}', [ServerController::class, 'status']);
    Route::get('/pratinjau-galeri/{album:slug}', [GuestController::class, 'galeri_preview']);
    Route::get('/sebagai/{organization}', [AuthController::class, 'sebagai']);
    Route::get('/post-slug', [PostController::class, 'slug']);
    // }

    // if (session::has('app')) {
    Route::get('/kelola-nilai/excel/{rombel}', [LearningController::class, 'export_excel']);
    Route::post('/kelola-nilai/excel/import', [LearningController::class, 'import']);
    Route::get('/kelola-rapor/{rombel}', [RaporController::class, 'rapor']);
    Route::get('/kelola-rapor/{rombel}/{user}', [RaporController::class, 'preview_rapor']);
    Route::post('/kelola-rapor/{rombel}/{user}', [RaporController::class, 'unduh_rapor']);

    Route::resource('/kelola-pembelajaran', LearningController::class);
    Route::resource('/kelola-rombel', RombelController::class);
    Route::resource('/kelola-mapel', SubjectController::class);
    Route::get('/g/{id}', function ($id) {
        $user   = auth()->user()->id;
        $get    = Learning::where('subject_id', $id)->where('teacher_id', $user)->get();
        if ($get->count() > 0 || Session::get('run_as') == 1)
            session([
                'run_subject' => $id
            ]);
        return redirect('/dasbor');
    });
    // Route::resource('/kelola-nilai/{rombel}', ScoreController::class);
    // }

});
