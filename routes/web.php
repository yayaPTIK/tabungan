<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\KeuanganController;
use App\Http\Controllers\Auth\ForgetPasswordController;
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
    return view('auth.login');
});

Route::middleware(['middleware'=> 'Back'])->group(function () {
    Auth::routes(['register'=>false]);
});

Route::group(['prefix' => 'admin','middleware'=>'isAdmin','auth'], function(){
    Route::get('/',[AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('profile/{id}', [AdminController::class, 'profile'])->name('admin.profile');
    // Register atau tambah nasabah
    Route::get('report', [AdminController::class, 'report'])->name('admin.report');
    Route::get('tambah/nasabah', [AdminController::class, 'register'])->name('admin.register');
    Route::post('tambah/store', [AdminController::class, 'registerStore'])->name('admin.registerStore');

    Route::get('edit/profile/{id}', [AdminController::class, 'edit'])->name('admin.edit');
    Route::post('edit/store/{id}', [AdminController::class, 'editStore'])->name('admin.editStore');

    // print row
    Route::get('detail/transaksi/print/{id}', [KeuanganController::class,'printRow'])->name('keuangan.printRow');
    Route::get('detail/transaksi/print/all/{id}', [KeuanganController::class, 'printAll'])->name('keuangan.printAll');

    Route::get('nasabah',[KeuanganController::class, 'index'])->name('nasabah');
    Route::get('debet/create/{id}',[KeuanganController::class,'debet'])->name('debet.create');
    Route::post('debet/store',[KeuanganController::class,'debetStore'])->name('debet.store');
    Route::get('kredit/create/{id}',[KeuanganController::class,'kredit'])->name('kredit.create');
    Route::post('kredit/store',[KeuanganController::class,'kreditStore'])->name('kredit.store');
    Route::get('transaksi/detail/{id}',[KeuanganController::class,'show'])->name('keuangan.show');
    Route::get('transaksi/show/{id}',[KeuanganController::class,'show'])->name('transaksi.show');
});
Route::group(['prefix' => 'user','middleware'=>'isUser','auth'], function(){
    Route::get('/',[UserController::class, 'index'])->name('user.dashboard');
    Route::get('detail', [UserController::class, 'detail'])->name('user.detail');
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
