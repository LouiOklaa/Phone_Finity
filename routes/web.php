<?php

use App\Http\Controllers\AbschnitteController;
use App\Http\Controllers\AccessoriesController;
use App\Http\Controllers\AccessoriesSectionsController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HandysController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    return view('index');
});

Auth::routes();

Route::get('/admin', [HomeController::class, 'index']);
Route::resource('handys', HandysController::class);
Route::resource('abschnitte', AbschnitteController::class);
Route::resource('zubehör_abschnitte', AccessoriesSectionsController::class);
Route::resource('zubehör', AccessoriesController::class);
Route::resource('galerie', GalleryController::class);

Route::get('/{page}', [AdminController::class, 'index']);
