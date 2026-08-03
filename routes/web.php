<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\PemerintahanController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\UmkmController;
use App\Http\Controllers\Admin\AuthController as AdminAuthController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\BeritaController as AdminBeritaController;
use App\Http\Controllers\Admin\PengumumanController as AdminPengumumanController;
use App\Http\Controllers\Admin\AgendaController as AdminAgendaController;
use App\Http\Controllers\Admin\ProdukController as AdminProdukController;
use App\Http\Controllers\Admin\StatistikController as AdminStatistikController;
use App\Http\Controllers\Admin\SuratController as AdminSuratController;
use App\Http\Controllers\Admin\PengaduanController as AdminPengaduanController;
use App\Http\Controllers\Admin\PeraturanDesaController as AdminPeraturanDesaController;
use App\Http\Controllers\Admin\PerkadesController as AdminPerkadesController;
use App\Http\Controllers\Admin\LpjController as AdminLpjController;

/*
|--------------------------------------------------------------------------
| Beranda
|--------------------------------------------------------------------------
*/
Route::get('/', [HomeController::class, 'index'])->name('home');

/*
|--------------------------------------------------------------------------
| Profil Desa
|--------------------------------------------------------------------------
*/
Route::prefix('profil')->group(function () {
    Route::get('/sejarah', [ProfilController::class, 'sejarah'])->name('profil.sejarah');
    Route::get('/visi-misi', [ProfilController::class, 'visi'])->name('profil.visi');
    Route::get('/struktur-organisasi', [ProfilController::class, 'struktur'])->name('profil.struktur');
    Route::get('/perangkat-desa', [ProfilController::class, 'perangkat'])->name('profil.perangkat');
    Route::get('/peta-wilayah', [ProfilController::class, 'peta'])->name('profil.peta');
});

/*
|--------------------------------------------------------------------------
| Pemerintahan
|--------------------------------------------------------------------------
*/
Route::prefix('pemerintahan')->group(function () {
    Route::get('/rpjmdes', [PemerintahanController::class, 'rpjmdes'])->name('rpjmdes');
    Route::get('/apbdes', [PemerintahanController::class, 'apbdes'])->name('apbdes');
    Route::get('/peraturan-desa', [PemerintahanController::class, 'peraturan'])->name('peraturan');
    Route::get('/peraturan-kepala-desa', [PemerintahanController::class, 'perkades'])->name('perkades');
    Route::get('/lpj', [PemerintahanController::class, 'lpj'])->name('lpj');
    Route::get('/program-kerja', [PemerintahanController::class, 'program'])->name('program');
});

/*
|--------------------------------------------------------------------------
| Layanan Publik
|--------------------------------------------------------------------------
*/
Route::prefix('layanan')->group(function () {
    Route::get('/surat-pengantar', [LayananController::class, 'surat'])->name('surat');
    Route::post('/surat-pengantar', [LayananController::class, 'suratStore'])->name('surat.store');
    Route::get('/pengaduan', [LayananController::class, 'pengaduan'])->name('pengaduan');
    Route::post('/pengaduan', [LayananController::class, 'pengaduanStore'])->name('pengaduan.store');
    Route::get('/ktp-kk-akta', [LayananController::class, 'ktp'])->name('ktp');
    Route::get('/alur-layanan', [LayananController::class, 'alur'])->name('alur');
});

/*
|--------------------------------------------------------------------------
| Berita & Informasi
|--------------------------------------------------------------------------
*/
Route::prefix('informasi')->group(function () {
    Route::get('/berita', [BeritaController::class, 'berita'])->name('berita');
    Route::get('/pengumuman', [BeritaController::class, 'pengumuman'])->name('pengumuman');
    Route::get('/agenda', [BeritaController::class, 'agenda'])->name('agenda');
});

/*
|--------------------------------------------------------------------------
| UMKM & Ekonomi
|--------------------------------------------------------------------------
*/
Route::get('/umkm', [UmkmController::class, 'index'])->name('umkm');

/*
|--------------------------------------------------------------------------
| Admin Panel
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->name('admin.')->group(function () {

    // Login (tidak perlu auth)
    Route::get('/login', [AdminAuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AdminAuthController::class, 'login'])->name('login.post');
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');

    // Semua route di bawah ini wajib login
    Route::middleware('admin.auth')->group(function () {
        Route::get('/', [AdminDashboardController::class, 'index'])->name('dashboard');

        Route::resource('berita', AdminBeritaController::class)->except('show')->parameters(['berita' => 'berita']);
        Route::resource('pengumuman', AdminPengumumanController::class)->except('show')->parameters(['pengumuman' => 'pengumuman']);
        Route::resource('agenda', AdminAgendaController::class)->except('show')->parameters(['agenda' => 'agenda']);
        Route::resource('produk', AdminProdukController::class)->except('show')->parameters(['produk' => 'produk']);

        // Layanan Warga (surat & pengaduan masuk dari publik)
        Route::resource('surat', AdminSuratController::class)->only(['index', 'edit', 'update', 'destroy'])->parameters(['surat' => 'surat']);
        Route::resource('pengaduan', AdminPengaduanController::class)->only(['index', 'edit', 'update', 'destroy'])->parameters(['pengaduan' => 'pengaduan']);

        // Dokumen Legal
        Route::resource('perdes', AdminPeraturanDesaController::class)->except('show')->parameters(['perdes' => 'perdes']);
        Route::resource('perkades', AdminPerkadesController::class)->except('show')->parameters(['perkades' => 'perkades']);
        Route::resource('lpj', AdminLpjController::class)->except('show')->parameters(['lpj' => 'lpj']);

        Route::get('/statistik', [AdminStatistikController::class, 'edit'])->name('statistik.edit');
        Route::put('/statistik', [AdminStatistikController::class, 'update'])->name('statistik.update');
        Route::post('/statistik/bidang', [AdminStatistikController::class, 'storeBidang'])->name('statistik.bidang.store');
        Route::delete('/statistik/bidang/{bidang}', [AdminStatistikController::class, 'destroyBidang'])->name('statistik.bidang.destroy');
        Route::post('/statistik/bulanan', [AdminStatistikController::class, 'storeBulanan'])->name('statistik.bulanan.store');
        Route::delete('/statistik/bulanan/{bulanan}', [AdminStatistikController::class, 'destroyBulanan'])->name('statistik.bulanan.destroy');
    });
});
