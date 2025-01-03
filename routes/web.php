<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BoardController;
use App\Http\Controllers\PinController;
use App\Http\Controllers\GeneratePinsController;
use App\Http\Controllers\PintreseApiController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::view('/about', 'about')->name('about');;
Route::view('/contact', 'contact')->name('contact');
Route::view('/test', 'layouts.master');
Route::get('request-pinterest-access-token', [PintreseApiController::class, 'requestPinterestAccess']);
Route::get('fetch-all-boards', [PintreseApiController::class, 'getBoards']);
Route::get('save/pinterest/access/token', [PintreseApiController::class, 'savePinterestAccess']);
Route::post('save-all-cards', [PintreseApiController::class, 'savePinterestPins'])->middleware('auth');
Route::post('upload-pin-to-pinterest', [PintreseApiController::class, 'uploadPintoPinterest'])->middleware('auth');
Route::post('/upload-pin-images', [PintreseApiController::class, 'savePinterestPins'])->middleware('auth');
Route::resource('boards', BoardController::class)->middleware('auth');
Route::resource('pins', PinController::class)->middleware('auth');
Route::get('generate', [GeneratePinsController::class, 'index'])->middleware('auth');
Route::get('generate-pin-post', [GeneratePinsController::class, 'pin'])->middleware('auth');