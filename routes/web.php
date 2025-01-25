<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BoardController;
use App\Http\Controllers\PinController;
use App\Http\Controllers\GeneratePinsController;
use App\Http\Controllers\ProfileController;
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
})->name('mainIndex');


Route::get('contact-us', function () {
    return view('contactus');
});

Route::get('privacy-policy', function () {
    return view('privacypolicy');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::view('/about', 'about')->name('about');;
Route::view('/contact', 'contact')->name('contact');
Route::view('/test', 'layouts.master');
Route::get('request-pinterest-access-token', [PintreseApiController::class, 'requestPinterestAccess']);
Route::get('fetch-all-boards', [PintreseApiController::class, 'getBoards']);
Route::get('save/pinterest/access/token', [PintreseApiController::class, 'savePinterestAccess']);
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::post('save-all-cards', [PintreseApiController::class, 'savePinterestPins']);
    Route::post('upload-pin-to-pinterest', [PintreseApiController::class, 'uploadPintoPinterest']);
    Route::post('/upload-pin-images', [PintreseApiController::class, 'savePinterestPins']);
    Route::post('/save-pin/{id}', [PintreseApiController::class, 'updatePins']);
    Route::resource('boards', BoardController::class);
    Route::resource('pins', PinController::class);
    Route::get('generate', [GeneratePinsController::class, 'index']);
    Route::get('scheduling', [GeneratePinsController::class, 'scheduling']);
    Route::post('save-schedule', [GeneratePinsController::class, 'saveSchedule']);
    Route::get('pins-history', [PintreseApiController::class, 'pinsHistory']);
    Route::get('delete-pin/{id}', [PintreseApiController::class, 'deletePin']);
    Route::get('generate-image', [GeneratePinsController::class, 'generateImage']);
    Route::get('generate-pin-post', [GeneratePinsController::class, 'pin']);
});
Route::post('contactUs', [PintreseApiController::class, 'contactus']);
