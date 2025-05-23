<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProdukController;

// Route::get('/', function () {
//     //return view('welcome');
//     return view('backend.dashboard');
// });
Route::get('/', function () {
    //return view('welcome');
    return view('frontend.home');
});
// Route untuk halaman Tentang Kami
Route::get('/tentang', function () {
    return view('frontend.tentang');
})->name('tentang');
Route::get('/kontak', function () {
    return view('frontend.kontak');
})->name('kontak');

use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('home');

use App\Http\Controllers\ShopController;

Route::get('/shop', [ShopController::class, 'index'])->name('shop.index');

use App\Http\Controllers\KontakController;

Route::post('/kontak/kirim', [KontakController::class, 'kirim'])->name('kontak.kirim');



// Route CRUD lengkap

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('dashboard', DashboardController::class)
        ->names([
            'index' => 'dashboard.index',
            'create' => 'dashboard.create',
            'store' => 'dashboard.store',
            'show' => 'dashboard.show',
            'edit' => 'dashboard.edit',
            'update' => 'dashboard.update',
            'destroy' => 'dashboard.destroy',
        ]);
    Route::resource('produk', ProdukController::class)
        ->names([
            'index' => 'produk.index',
            'create' => 'produk.create',
            'store' => 'produk.store',
            'show' => 'produk.show',
            'edit' => 'produk.edit',
            'update' => 'produk.update',
            'destroy' => 'produk.destroy',
        ]);
});

// Form jual produk (frontend)
Route::get('/jual-produk', [ProdukController::class, 'formPenjual'])->name('produk.formPenjual');


Route::resource('users', UserController::class); // Menangani route CRUD dasar
// Route khusus untuk halaman edit, update, dan hapus
Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
Route::put('/users/{id}', [UserController::class, 'update'])->name('user.update');
Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('user.destroy');
Route::get('/users/{id}', [UserController::class, 'show'])->name('user.show');
// Menambahkan route untuk form tambah user (create)
Route::get('/users/create', [UserController::class, 'create'])->name('user.create');
// Route untuk menyimpan user baru (store)
Route::post('/users', [UserController::class, 'store'])->name('user.store');

use App\Http\Controllers\KategoriController;

Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori.index');
Route::get('/kategori/create', [KategoriController::class, 'create'])->name('kategori.create');
Route::post('/kategori', [KategoriController::class, 'store'])->name('kategori.store');
Route::get('/kategori/{id}', [KategoriController::class, 'show'])->name('kategori.show');
Route::get('/kategori/{id}/edit', [KategoriController::class, 'edit'])->name('kategori.edit');
Route::put('/kategori/{id}', [KategoriController::class, 'update'])->name('kategori.update');
Route::delete('/kategori/{id}', [KategoriController::class, 'destroy'])->name('kategori.destroy');

use App\Http\Controllers\SearchController;

Route::get('/search', [SearchController::class, 'index'])->name('search.index');


// Halaman gabungan login + register
Route::get('/login', [LoginController::class, 'showCombinedForm'])->name('login');
// Proses login
Route::post('/login', [LoginController::class, 'login']);
// Proses register
Route::post('/register', [RegisterController::class, 'register'])->name('register');
// Logout
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
