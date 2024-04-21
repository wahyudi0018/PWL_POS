<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\StokController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ManagerController;
// use App\Http\Controllers\POSController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// // Route level
// Route::get('/level', [LevelController::class, 'index']);
// Route::get('/level/tambah', [LevelController::class, 'tambah']);
// Route::post('/level', [LevelController::class, 'store']);

// // Route kategori
// Route::get('/kategori', [KategoriController::class, 'index']);
// Route::get('/kategori/create', [KategoriController::class, 'create']);
// Route::post('/kategori', [KategoriController::class, 'store']);
// Route::put('/kategori/{id}', [KategoriController::class, 'saveUpdate'])->name('kategori.saveUpdate');
// Route::get('/kategori/{id}/update', [KategoriController::class, 'update'])->name('kategori.update');
// Route::delete('/kategori/{id}', [KategoriController::class, 'destroy'])->name('kategori.destroy');

// // Route user
// Route::get('/user', [UserController::class, 'index']);
// Route::get('/user/tambah', [UserController::class, 'tambah']);
// Route::post('/user/tambah_simpan', [UserController::class, 'tambah_simpan']);
// Route::get('/user/ubah/{id}', [UserController::class, 'ubah']);
// Route::put('user/ubah_simpan/{id}', [UserController::class, 'ubah_simpan']);
// Route::get('/user/hapus/{id}', [UserController::class, 'hapus']);

// // Route POS
// Route::resource('m_user', POSController::class);

// Route Laravel Starter Code
Route::get('/', [WelcomeController::class, 'index']);

// m_user
Route::group(['prefix' => 'user'], function() {
    Route::get('/', [UserController::class, 'index']);              // menampilkan halaman awal user
    Route::post('/list', [UserController::class, 'list']);          // menampilkan data user dalam bentuk json untuk datatables
    Route::get('/create', [UserController::class, 'create']);       // menampilkan halaman form tambah user
    Route::post('/', [UserController::class, 'store']);             // menyimpan data user baru
    Route::get('/{id}', [UserController::class, 'show']);           // menampilkan detail user
    Route::get('/{id}/edit', [UserController::class, 'edit']);      // menampilkan halaman form edit user
    Route::put('/{id}', [UserController::class, 'update']);         // menyimpan perubahan data user
    Route::delete('/{id}', [UserController::class, 'destroy']);     // menghapus data user
});

// m_level
Route::group(['prefix' => 'level'], function () {
    Route::get('/', [LevelController::class, 'index']);
    Route::post('/list', [LevelController::class, 'list']);
    Route::get('/create', [LevelController::class, 'create']);
    Route::post('/', [LevelController::class, 'store']);
    Route::get('/{id}', [LevelController::class, 'show']);
    Route::get('/{id}/edit', [LevelController::class, 'edit']);
    Route::put('/{id}', [LevelController::class, 'update']);
    Route::delete('/{id}', [LevelController::class, 'destroy']);
});

// m_kategori
Route::group(['prefix' => 'kategori'], function () {
    Route::get('/', [KategoriController::class, 'index']);
    Route::post('/list', [KategoriController::class, 'list']);
    Route::get('/create', [KategoriController::class, 'create']);
    Route::post('/', [KategoriController::class, 'store']);
    Route::get('/{id}', [KategoriController::class, 'show']);
    Route::get('/{id}/edit', [KategoriController::class, 'edit']);
    Route::put('/{id}', [KategoriController::class, 'update']);
    Route::delete('/{id}', [KategoriController::class, 'destroy']);
});

// m_barang
Route::group(['prefix' => 'barang'], function () {
    Route::get('/', [BarangController::class, 'index']);
    Route::post('/list', [BarangController::class, 'list']);
    Route::get('/create', [BarangController::class, 'create']);
    Route::post('/', [BarangController::class, 'store']);
    Route::get('/{id}', [BarangController::class, 'show']);
    Route::get('/{id}/edit', [BarangController::class, 'edit']);
    Route::post('/{id}', [BarangController::class, 'update']);
    Route::delete('/{id}', [BarangController::class, 'destroy']);
});

// t_stok
Route::group(['prefix' => 'stok'], function () {
    Route::get('/', [StokController::class, 'index']);
    Route::post('/list', [StokController::class, 'list']);
    Route::get('/create', [StokController::class, 'create']);
    Route::post('/', [StokController::class, 'store']);
    Route::get('/{id}', [StokController::class, 'show']);
    Route::get('/{id}/edit', [StokController::class, 'edit']);
    Route::post('/{id}', [StokController::class, 'update']);
    Route::delete('/{id}', [StokController::class, 'destroy']);
});

// t_penjualan
Route::group(['prefix' => 'penjualan'], function () {
    Route::get('/', [PenjualanController::class, 'index']);
    Route::post('/list', [PenjualanController::class, 'list']);
    Route::get('/create', [PenjualanController::class, 'create']);
    Route::post('/', [PenjualanController::class, 'store']);
    Route::get('/{id}', [PenjualanController::class, 'show']);
    Route::get('/{id}/edit', [PenjualanController::class, 'edit']);
    Route::post('/{id}', [PenjualanController::class, 'update']);
    Route::delete('/{id}', [PenjualanController::class, 'destroy']);
});

// Route Auth
Route::get('login', [AuthController::class, 'index'])->name('login');
Route::get('register', [AuthController::class, 'register'])->name('register');
Route::post('proses_login', [AuthController::class, 'proses_login'])->name('proses_login');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');
Route::post('proses_register', [AuthController::class, 'proses_register'])->name('proses_register');

// Mengatur middleware menggunakan group untuk mengecek kondisi login pada routing
// jika user login sebagai admin akan dibawa ke AdminController
// jika user login sebagai manager akan dibawa ke ManagerController
Route::group(['middleware' => ['cek_login:1']], function(){
    Route::resource('admin', AdminController::class);
});
Route::group(['middleware' => ['cek_login:2']], function(){
    Route::resource('manager', ManagerController::class);
});
