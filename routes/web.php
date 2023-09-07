<?php

use App\Http\Controllers\BillingController;
use App\Http\Controllers\Dashboard_pelangganController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IppoolController;
use App\Http\Controllers\KonfirmasiController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MasterbulanController;
use App\Http\Controllers\PaketController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PPPoEprofileController;
use App\Http\Controllers\PPPoEsecretController;
use App\Http\Controllers\RouterconController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\UserpaketController;
use App\Http\Controllers\UserpelangganController;
use App\Http\Controllers\UsertagihanController;
use App\Http\Controllers\UsrpelangganController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('index');
});
Route::get('/login',[LoginController::class,'index'])->name('login');
Route::post('/postlogin',[LoginController::class,'postlogin'])->name('postlogin');
Route::get('/logout',[LoginController::class,'logout'])->name('logout');
Route::get('/failed',[LoginController::class,'failed'])->name('failed');

Route::get('/register',[LoginController::class,'register'])->name('register');
Route::post('/postregister',[LoginController::class,'create'])->name('postregister');

Route::get('dashboardpelanggan', [Dashboard_pelangganController::class, 'index'])->name('dashboardpelanggan')->middleware('isLogin');
Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

//paket
Route::get('/paket/index', [PaketController::class, 'index'])->name('paket.index');
Route::get('/paket/log', [PaketController::class, 'log'])->name('paket.log');
Route::get('/paket/logup/{id}', [PaketController::class, 'logup'])->name('paket.logup');
Route::get('/paket/create', [PaketController::class, 'create'])->name('paket.create');
Route::post('/paket', [PaketController::class, 'store'])->name('paket.store');
Route::get('/paket/edit/{id}', [PaketController::class, 'edit'])->name('paket.edit');
Route::post('/paket/{id}', [PaketController::class, 'update'])->name('paket.update');
Route::get('/paket/{id}', [PaketController::class, 'delete'])->name('paket.delete');

//pelangggan aktif
Route::get('/useraktif/index', [UserpelangganController::class, 'index'])->name('useraktif.index');
Route::get('/useraktif/password', [UserpelangganController::class, 'password'])->name('useraktif.password');
Route::get('/useraktif/passwordubah/{id}', [UserpelangganController::class, 'passwordubah'])->name('useraktif.passwordubah');
Route::get('/useraktif/update/{id}', [UserpelangganController::class, 'update'])->name('useraktif.update');

// layanan Pelanggan
Route::get('/layananpelanggan/index', [UserpaketController::class, 'index'])->name('layananpelanggan.index');
Route::get('/layananpelanggan/updatepaket/{id}', [UserpaketController::class, 'ubahpaket'])->name('layananpelanggan.update');

// Tagihan Pelanggan
Route::get('/tagihanpelanggan/index', [UsertagihanController::class, 'index'])->name('tagihanpelanggan.index');
Route::get('/tagihanpelanggan/create', [UsertagihanController::class, 'create'])->name('tagihanpelanggan.create');
Route::post('/tagihanpelanggan', [UsertagihanController::class, 'store'])->name('tagihanpelanggan.store');
Route::get('/tagihanpelanggan/edit/{id}', [UsertagihanController::class, 'edit'])->name('tagihanpelanggan.edit');
Route::post('/tagihanpelanggan/{id}', [UsertagihanController::class, 'update'])->name('tagihanpelanggan.update');

//User Pelanggan
Route::get('/userpelanggan/index', [UsrpelangganController::class, 'index'])->name('userpelanggan.index');
Route::get('/userpelanggan/create', [UsrpelangganController::class, 'create'])->name('userpelanggan.create');
Route::post('/userpelanggan', [UsrpelangganController::class, 'store'])->name('userpelanggan.store');
Route::get('/userpelanggan/edit/{id}', [UsrpelangganController::class, 'edit'])->name('userpelanggan.edit');
Route::post('/userpelanggan/{id}', [UsrpelangganController::class, 'update'])->name('userpelanggan.update');
Route::get('/userpelanggan/{id}', [UsrpelangganController::class, 'destroy'])->name('userpelanggan.delete');


//router connect
Route::get('/routercon/index', [RouterconController::class, 'index'])->name('routercon.index');
Route::get('/routercon/create', [RouterconController::class, 'create'])->name('routercon.create');
Route::post('/routercon', [RouterconController::class, 'store'])->name('routercon.store');
Route::get('/routercon/edit/{id}', [RouterconController::class, 'edit'])->name('routercon.edit');
Route::post('/routercon/{id}', [RouterconController::class, 'update'])->name('routercon.update');
Route::get('/routercon/{id}', [RouterconController::class, 'destroy'])->name('routercon.delete');
Route::get('/routercon/status/{id}', [RouterconController::class, 'status'])->name('routercon.status');

//Pelanggan
// Route::resource('pelanggan', PelangganController::class);
Route::get('/pelanggan/index', [PelangganController::class, 'index'])->name('pelanggan.index');
Route::get('/pelanggan/create', [PelangganController::class, 'create'])->name('pelanggan.create');
Route::post('/pelanggan', [PelangganController::class, 'store'])->name('pelanggan.store');
Route::get('/pelanggan/edit/{id}', [PelangganController::class, 'edit'])->name('pelanggan.edit');
Route::post('/pelanggan/{id}', [PelangganController::class, 'update'])->name('pelanggan.update');
Route::get('/pelanggan/{id}', [PelangganController::class, 'destroy'])->name('pelanggan.delete');
Route::get('/pelanggan/show/{id}', [PelangganController::class, 'show'])->name('pelanggan.show');
Route::post('/pelanggan/show/layanan/{id}', [PelangganController::class, 'layanan'])->name('pelanggan.layanan');
Route::get('/getpaket/{id}', [PelangganController::class, 'getpaket'])->name('pelanggan.getpaket');
Route::get('/getbulan/{id}', [PelangganController::class, 'getbulan'])->name('pelanggan.getbulan');
Route::post('/pelanggan/status/kirimrouter/{id}', [PelangganController::class, 'kirimrouter'])->name('pelanggan.kirimrouter');



//PPPoE Secret
Route::get('/PPPoEsecret/index', [PPPoEsecretController::class, 'index'])->name('PPPoEsecret.index');
Route::get('/PPPoEsecret/create', [PPPoEsecretController::class, 'create'])->name('PPPoEsecret.create');
Route::post('/PPPoEsecret', [PPPoEsecretController::class, 'store'])->name('PPPoEsecret.store');
Route::get('/PPPoEsecret/edit/{id}', [PPPoEsecretController::class, 'edit'])->name('PPPoEsecret.edit');
Route::post('/PPPoEsecret/update', [PPPoEsecretController::class, 'update'])->name('PPPoEsecret.update');
Route::get('/PPPoEsecret/{id}', [PPPoEsecretController::class, 'destroy'])->name('PPPoEsecret.delete');

//PPPoE ip_pool
Route::get('/poolip/index', [IppoolController::class, 'index'])->name('poolip.index');
Route::get('/poolip/create', [IppoolController::class, 'create'])->name('poolip.create');
Route::post('/poolip', [IppoolController::class, 'store'])->name('poolip.store');
Route::get('/poolip/edit/{id}', [IppoolController::class, 'edit'])->name('poolip.edit');
Route::post('/poolip/update', [IppoolController::class, 'update'])->name('poolip.update');
Route::get('/poolip/{id}', [IppoolController::class, 'destroy'])->name('poolip.delete');


//PPPoE ip_pool
Route::get('/pppoe_profile/index', [PPPoEprofileController::class, 'index'])->name('pppoe_profile.index');
Route::get('/pppoe_profile/create', [PPPoEprofileController::class, 'create'])->name('pppoe_profile.create');
Route::post('/pppoe_profile', [PPPoEprofileController::class, 'store'])->name('profile_pppoe.store');
Route::get('/pppoe_profile/edit/{id}', [PPPoEprofileController::class, 'edit'])->name('pppoe_profile.edit');
Route::post('/pppoe_profile/update', [PPPoEprofileController::class, 'update'])->name('pppoe_profile.update');
Route::get('/pppoe_profile/{id}', [PPPoEprofileController::class, 'destroy'])->name('pppoe_profile.delete');

//Billing
Route::get('/billing/index', [BillingController::class, 'index'])->name('billing.index');
Route::get('/getpelanggan/{id}', [BillingController::class, 'getpelanggan'])->name('billing.getpelanggan');
Route::post('/billing/create', [BillingController::class, 'create'])->name('billing.create');
Route::post('/billing', [BillingController::class, 'store'])->name('billing.store');
Route::get('/billing/edit/{id}', [BillingController::class, 'edit'])->name('billing.edit');
Route::post('/billing/{id}', [BillingController::class, 'update'])->name('billing.update');
Route::get('/billing/{id}', [BillingController::class, 'delete'])->name('billing.delete');

//master bulan
Route::get('/masterbulan/index', [MasterbulanController::class, 'index'])->name('masterbulan.index');

//konfirmasi pembayaran
Route::get('/konfirmasibayar/index', [KonfirmasiController::class, 'index'])->name('konfirmasibayar.index');

//Transaksi
Route::get('/transaksi/index', [TransaksiController::class, 'index'])->name('transaksi.index');
Route::get('/transaksi/{id}/print', [TransaksiController::class, 'print'])->name('transaksi.print');
Route::get('/transaksi/cetak', [TransaksiController::class, 'cetak'])->name('transaksi.cetak');
Route::get('/cetakPDF', [TransaksiController::class, 'cetakPDF'])->name('cetakPDF');
