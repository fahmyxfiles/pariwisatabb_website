<?php

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

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\GuestHouseController;
use App\Http\Controllers\TouristAttractionController;

Route::get('/', [HomeController::class, 'index'])->name('utama');
Route::get('/cronjob', [HomeController::class, 'cronjob']);

Route::get('/kegiatan', [HomeController::class, 'daftar_kegiatan'])->name('event.index');
Route::get('/kegiatan/{name}', [HomeController::class, 'kegiatan'])->name('event.show');

Route::get('/profil/{page}', [HomeController::class, 'profil'])->name('profil.index');

Route::get('/hotel', [HotelController::class, 'index'])->name('hotel.index');
Route::get('/hotel/{hotel}', [HotelController::class, 'show'])->name('hotel.show');

Route::get('/penginapan', [GuestHouseController::class, 'index'])->name('penginapan.index');
Route::get('/penginapan/{penginapan}', [GuestHouseController::class, 'show'])->name('penginapan.show');

Route::get('/transportasi', [HomeController::class, 'transportasi'])->name('transportasi.index');

Route::get('/destinasi/{category?}', [TouristAttractionController::class, 'index'])->name('touristAttraction.index');
Route::get('/destinasi/{category}/{touristAttraction?}', [TouristAttractionController::class, 'show'])->name('touristAttraction.show');

use App\Http\Controllers\AdminController;
use App\Http\Controllers\EventController;

Route::prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');
    Route::prefix('event')->group(function () {
        Route::get('/', [EventController::class, 'index'])->name('admin.event.index'); // LIST
        Route::get('/create', [EventController::class, 'create'])->name('admin.event.create'); // FORM-CREATE
        Route::get('/show/{event}', [EventController::class, 'show'])->name('admin.event.show'); // SHOW-DETAILS
        Route::get('/edit/{event}', [EventController::class, 'edit'])->name('admin.event.edit'); // FORM-EDIT

        Route::post('/store', [EventController::class, 'store'])->name('admin.event.store'); // SAVE-NEW
        Route::post('/update/{event}', [EventController::class, 'update'])->name('admin.event.update'); // UPDATE-EXISTING
        Route::post('/destroy/{event}', [EventController::class, 'destroy'])->name('admin.event.destroy'); // DELETE-EXISTING
    });
});