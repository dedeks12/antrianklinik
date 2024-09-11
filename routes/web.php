<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AntrianAdminController;
use App\Http\Controllers\AntrianController;
use App\Http\Controllers\LayoutAdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginUserController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Session as FacadesSession;
use App\Http\Middleware\CheckRole;

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
    return view('user.create');
});
//Route::resource('/homeadmin', \App\Http\Controllers\AdminController::class);
//Route::resource('/home', \App\Http\Controllers\UserController::class);

Route::get('login', [LoginUserController::class, 'index'])->name('login');
Route::post('home', [LoginUserController::class, 'customLogin'])->name('login.custom'); 
//Route::post('home', [LayoutAdminController::class, 'index'])->name('nama'); 
Route::get('registration', [LoginUserController::class, 'registration'])->name('register-user');
Route::post('custom-registration', [LoginUserController::class, 'customRegistration'])->name('register.custom'); 
Route::get('signout', [LoginUserController::class, 'signOut'])->name('signout');


//Route::get('/home', function () {
 // return view('user.index');
//})->middleware('auth:user');
//Route::get('home', [UserController::class, 'index'])->name('home')->middleware('auth:user');


//Route::get('/homeadmin', function () {
  //  return view('admin.index');
//})->middleware('auth:admin');
//Route::get('homeadmin', [AdminController::class, 'index'])->name('homeadmin')->middleware('auth:admin');
//Route::FacadesHash(['admin.index']);
Route::middleware(['auth:admin'])->group(function () {
  //FacadesSession::flush();
  //Route::get('homeadmin', [AdminController::class, 'index'])->name('homeadmin');
   //Route::get('home', [LayoutAdminController::class, 'index'])->name('home');
   Route::resource('/home/admin', \App\Http\Controllers\AdminController::class);
   Route::resource('/home/pasien', \App\Http\Controllers\PasienController::class);
   Route::resource('/home/noantrian', \App\Http\Controllers\AntrianAdminController::class);
   Route::get('/home/today', [AntrianAdminController::class, 'today'])->name('antrian.today');
   Route::get('/home/dashboard-min', [AdminController::class, 'dashboard'])->name('admin.dashboard');
   Route::get('/print-antrian-pdf/{id}', [AntrianAdminController::class, 'pdf'])->name('antrian.print.pdf');
   Route::get('/admin/call/{id}', [AntrianAdminController::class, 'panggilantrian'])->name('antrian.call');
   Route::put('/admin/status/{id}', [AntrianAdminController::class, 'ubahstatus'])->name('antrian.status');

});

Route::middleware(['auth:user'])->group(function () {
  //FacadesSession::flush();
  Route::get('home/user', [UserController::class, 'index'])->name('home');
  Route::resource('/home/user', \App\Http\Controllers\UserController::class);
  Route::resource('/home/antrian', \App\Http\Controllers\AntrianController::class);
  Route::get('/home/hari-ini', [AntrianController::class, 'today'])->name('antrian.user.today');
  Route::get('/home/dashboard', [UserController::class, 'dashboard'])->name('user.dashboard');
  Route::get('/antrian-pdf/{id}', [AntrianController::class, 'pdf'])->name('antrian.pdf');
  Route::put('/user/status/{id}', [AntrianAdminController::class, 'ubahstatus'])->name('status.antrian');


});
// Route::resource('/admin', \App\Http\Controllers\AdminController::class);
// Route::resource('/home/pasien', \App\Http\Controllers\PasienController::class);