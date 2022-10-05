<?php

use App\Http\Controllers\Application\AllApplicationsController;
use App\Http\Controllers\Application\CreateApplicationController;
use App\Http\Controllers\Application\MyApplicationsController;
use App\Http\Controllers\DownloadController;
use App\Http\Controllers\User\UserController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::post('/', [UserController::class, 'store']);

Route::get('/logout', [UserController::class, 'logout'])->name('logout');

Route::get('/andmed', [UserController::class, 'index'])->name('andmed');

Route::put('/andmed/update', [UserController::class, 'update']);

Route::get('/minu_kandideerimised', [MyApplicationsController::class, 'index'])->name('my-applications');

Route::get('/minu_kandideerimised/create', [CreateApplicationController::class, 'index']);

Route::post('/minu_kandideerimised/create', [CreateApplicationController::class, 'store'])->name('create-application');

Route::get('/kandideerimine/{id}', [MyApplicationsController::class, 'show'])->name('application');

Route::delete('/kandideerimine/{id}', [MyApplicationsController::class, 'destroy']);

Route::get('/kandideerimine/{id}/edit', [MyApplicationsController::class, 'edit'])->name('edit-application');

Route::put('/kandideerimine/{id}/edit', [MyApplicationsController::class, 'update']);

Route::get('/download/{id}', [DownloadController::class, 'downloadFromUserApplication'])->name('downloadFromUserApplication');
