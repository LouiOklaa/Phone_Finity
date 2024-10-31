<?php

use App\Http\Controllers\AbschnitteController;
use App\Http\Controllers\AccessoriesController;
use App\Http\Controllers\AccessoriesSectionsController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\GeneralInformationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HandysController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\ServicesSectionsController;
use App\Http\Controllers\ViewController;
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

Auth::routes(['register' => false ,'reset' => false ,'verify' => false ,'confirm' => false]);

Route::group(['middleware' => 'auth'], function () {

    Route::get('/admin', [HomeController::class, 'index']);
    Route::resource('handys', HandysController::class);
    Route::resource('abschnitte', AbschnitteController::class);
    Route::resource('zubehör_kategorien', AccessoriesSectionsController::class);
    Route::resource('zubehör', AccessoriesController::class);
    Route::resource('galerie', GalleryController::class);
    Route::resource('dienstleistungen', ServicesController::class);
    Route::resource('dienstleistungensbereich', ServicesSectionsController::class);
    Route::resource('allgemeineinformationen', GeneralInformationController::class);
    Route::get('/dokumentation', function () { return view('Documentation.documentation'); });

});

Route::get('/', [ViewController::class, 'index']);
Route::get('/neue/handys/{section_name}', [ViewController::class, 'showNewMobiles'])->name('new_mobiles');
Route::get('/gebrauchte/handys/{section_name}', [ViewController::class, 'showUsedMobiles'])->name('used_mobiles');
Route::get('/alle_handys', [ViewController::class, 'showMobiles'])->name('all_mobiles');
Route::post('/alle_handys/sortieren', [ViewController::class, 'sortAllMobiles'])->name('sort_all_mobiles');
Route::post('/handys/sortieren', [ViewController::class, 'sortMobiles'])->name('sort_mobiles');


Route::get('/zubehör/{brand}/{section_name}', [ViewController::class, 'showAccessories'])->name('show_accessories');
Route::get('/alle_zubehör', [ViewController::class, 'showAccessories'])->name('all_accessories');
Route::post('/alle_zubehör/sortieren', [ViewController::class, 'sortAllAccessories'])->name('sort_all_accessories');
Route::post('/zubehör/sortieren', [ViewController::class, 'sortAccessories'])->name('sort_accessories');

Route::get('/dienstleistung/{section_name}', [ViewController::class, 'showServices'])->name('show_services');
Route::get('/alle_dienstleistungen', [ViewController::class, 'showServices'])->name('all_services');
Route::post('/alle_dienstleistungen/sortieren', [ViewController::class, 'sortAllServices'])->name('sort_all_services');
Route::post('/dienstleistung/sortieren', [ViewController::class, 'sortServices'])->name('sort_services');

Route::get('/unsere_galerie' , [ViewController::class, 'showGallery'])->name('show_gallery');

Route::get('/{page}', [AdminController::class, 'index']);
