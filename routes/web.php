<?php

use App\Models\Transaksi;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TourController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TransaksiController;

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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/package', [HomeController::class, 'package'])->name('package');
Route::get('/search', [HomeController::class, 'search'])->name('search');
Route::get('/detail/{tour:tour_name}', [DetailController::class, 'show'])->name('detail');
Route::post('/checkout/{tour:id}', [TransaksiController::class, 'checkout']);
Route::get('/invoice', [InvoiceController::class, 'index'])->name('invoice.index');
Route::get('/invoice/{no_pemesanan}', [InvoiceController::class, 'show'])->name('invoice.show');
Route::post('/invoice/search', [InvoiceController::class, 'search'])->name('invoice.search');
Route::get('/invoice/{no_pemesanan}/pdf', [InvoiceController::class, 'generatePDF'])->name('invoice.pdf');

Route::controller(AuthController::class)->group(function () {
    Route::get('register', 'register')->name('register');
    Route::post('register', 'registerSave')->name('register.save');
  
    Route::get('login', 'login')->name('login');
    Route::post('login', 'loginAction')->name('login.action');
  
    Route::get('logout', 'logout')->middleware('auth')->name('logout');
});

Route::middleware('auth')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
 
    Route::controller(TourController::class)->prefix('tours')->group(function () {
        Route::get('', 'index')->name('data_tour');
        Route::get('/show_tour/{id}', 'show')->name('show_tour');
        Route::get('/create_tour', 'create')->name('create_tour');
        Route::post('/store_tour', 'store')->name('store_tour');
        Route::get('edit_tour/{id}', 'edit')->name('edit_tour');
        Route::post('/update_tour/{id}', 'update')->name('update_tour');
        Route::post('/destroy_tour/{id}', 'destroy')->name('destroy_tour');
    });

    Route::controller(UserController::class)->prefix('users')->group(function () {
        Route::get('', 'index')->name('data_user');
        Route::get('/show_user/{id}', 'show')->name('show_user');
        Route::get('/create_user', 'create')->name('create_user');
        Route::post('/store_user', 'store')->name('store_user');
        Route::get('/edit_user/{id}', 'edit')->name('edit_user');
        Route::post('/update_user/{id}', 'update')->name('update_user');
        Route::post('/destroy_user/{id}', 'destroy')->name('destroy_user');
    });

    Route::get('/transaksi', [TransaksiController::class, 'index'])->name('riwayat');
    Route::post('/callback', [TransaksiController::class, 'callback']);
    Route::get('/pemesanan/{id}', [TransaksiController::class, 'pemesanan']);
    Route::get('/transaksi/show/{id}', [TransaksiController::class, 'show'])->name('show_transaksi');
    Route::post('/destroy_transaksi/{id}', [TransaksiController::class, 'destroy'])->name('destroy_riwayat');
 
    Route::get('/profile', [App\Http\Controllers\AuthController::class, 'profile'])->name('profile');
});
