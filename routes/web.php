<?php
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CropController;
use App\http\controllers\CultivationRecordController;
use App\http\controllers\pestControlRecordController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])
    ->name('home');
Route::get('/about', [HomeController::class, 'about'])
    ->name('about');
Route::get('/contact', [HomeController::class, 'contact'])
    ->name('contact');
Route::get('/login', [AuthController::class, 'showLoginForm'])
    ->name('login');
Route::post('/login', [AuthController::class, 'login'])
    ->name('login.submit');
Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout');
Route::middleware('auth')->group(function () {

Route::get('/crops', [CropController::class, 'index'])
    ->name('crops.index');
Route::get('/crops/create', [CropController::class, 'create'])
    ->name('crops.create');
Route::POST('/crops', [CropController::class, 'store']);
Route::get('/crops/{id}/edit', [CropController::class, 'edit'])
    ->name('crops.edit');
Route::put('/crops/{id}', [CropController::class, 'update'])
    ->name('crops.update');
Route::delete('/crops/{id}', [CropController::class, 'destroy'])
    ->name('crops.destroy');
Route::get('/crops/{cropId}/cultivation-records',
    [CultivationRecordController::class, 'index']
)->name('cultivation-records.index');
Route::get('/crops/{cropId}/cultivation-records/create', 
    [CultivationRecordController::class, 'create']
)->name('cultivation-records.create');
Route::post('/crops/{cropId}/cultivation-records',
    [CultivationRecordController::class, 'store']
)->name('cultivation-records.store');
Route::get(
    '/crops/{cropId}/cultivation-records/{id}/edit',
    [CultivationRecordController::class, 'edit']
)->name('cultivation-records.edit');
Route::PUT(
    '/crops/{cropId}/cultivation-records/{id}',
    [CultivationRecordController::class, 'update']
)->name('cultivation-records.update');
Route::delete(
    '/crops/{cropId}/cultivation-records/{id}',
    [CultivationRecordController::class, 'destroy']
)->name('cultivation-records.destroy');
Route::get(
    '/crops/{cropId}/pest-control-records',
    [PestControlRecordController::class, 'index']
)->name('pest-control-records.index');
Route::get(
    '/crops/{cropId}/pest-control-records/create',
    [PestControlRecordController::class, 'create']
)->name('pest-control-records.create');
Route::post(
    '/crops/{cropId}/pest-control-records',
    [PestControlRecordController::class, 'store']
)->name('pest-control-records.store');
Route::get(
    '/crops/{cropId}/pest-control-records/{id}',
    [PestControlRecordController::class, 'show']
)->name('pest-control-records.show');
Route::get(
    '/crops/{cropId}/pest-control-records/{id}/edit',
    [PestControlRecordController::class, 'edit']
)->name('pest-control-records.edit');
Route::put(
    '/crops/{cropId}/pest-control-records/{id}',
    [PestControlRecordController::class, 'update']
)->name('pest-control-records.update');
Route::delete(
    '/crops/{cropId}/pest-control-records/{id}',
    [PestControlRecordController::class, 'destroy'] 
)->name('pest-control-records.destroy');

});