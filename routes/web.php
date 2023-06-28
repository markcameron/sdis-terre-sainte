<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\DocumentsController;
use App\Http\Controllers\InterventionsController;

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

Route::get('/', HomepageController::class)->name('homepage');

Route::get('interventions', InterventionsController::class)->name('interventions.index');

Route::controller(NewsController::class)->group(function () {
    Route::name('news.')->prefix('actualites')->group(function () {
        Route::get('', 'index')->name('index');
        Route::get('{slug}', 'show')->name('show');
    });
});

Route::get('documents', [DocumentsController::class, 'index'])->name('documents');

Route::controller(ContactController::class)->group(function () {
    Route::name('contact.')->prefix('contact')->group(function () {
        Route::get('', 'index')->name('index');
        Route::post('submit', 'submit')->name('submit');
    });
});

Route::get('{slug}', [PagesController::class, 'show'])->name('page.show');
