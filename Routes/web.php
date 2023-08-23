<?php

use Illuminate\Support\Facades\Route;
use Modules\World\Http\Controllers\CityController;
use Modules\World\Http\Controllers\CountryController;
use Modules\World\Http\Controllers\LanguageController;
use Modules\World\Http\Controllers\StateController;
use Modules\World\Http\Controllers\TimezoneController;

Route::middleware(['auth', 'active', 'verified', 'set.locale'])->group(function () {

    Route::prefix('world')->name('world.')->group(function () {

        Route::prefix('countries')->name('countries.')->group(function () {
            Route::get('/', [CountryController::class, 'index'])->name('index');
            Route::get('/create', [CountryController::class, 'create'])->name('create');
            Route::post('/store', [CountryController::class, 'store'])->name('store');
            Route::get('/{country}', [CountryController::class, 'show'])->name('show');
            Route::get('/{country}/edit', [CountryController::class, 'edit'])->name('edit');
            Route::patch('/{country}/update', [CountryController::class, 'update'])->name('update');
            Route::delete('/{country}/delete', [CountryController::class, 'delete'])->name('delete');
        });

        Route::prefix('states')->name('states.')->group(function () {
            Route::get('/', [StateController::class, 'index'])->name('index');
            Route::get('/create', [StateController::class, 'create'])->name('create');
            Route::post('/store', [StateController::class, 'store'])->name('store');
            Route::get('/{state}', [StateController::class, 'show'])->name('show');
            Route::get('/{state}/edit', [StateController::class, 'edit'])->name('edit');
            Route::patch('/{state}/update', [StateController::class, 'update'])->name('update');
            Route::delete('/{state}/delete', [StateController::class, 'delete'])->name('delete');
        });

        Route::prefix('cities')->name('cities.')->group(function () {
            Route::get('/', [CityController::class, 'index'])->name('index');
            Route::get('/create', [CityController::class, 'create'])->name('create');
            Route::post('/store', [CityController::class, 'store'])->name('store');
            Route::get('/{city}', [CityController::class, 'show'])->name('show');
            Route::get('/{city}/edit', [CityController::class, 'edit'])->name('edit');
            Route::patch('/{city}/update', [CityController::class, 'update'])->name('update');
            Route::delete('/{city}/delete', [CityController::class, 'delete'])->name('delete');
        });

        Route::prefix('languages')->name('languages.')->group(function () {
            Route::get('/', [LanguageController::class, 'index'])->name('index');
            Route::get('/create', [LanguageController::class, 'create'])->name('create');
            Route::post('/store', [LanguageController::class, 'store'])->name('store');
            Route::get('/{language}', [LanguageController::class, 'show'])->name('show');
            Route::get('/{language}/edit', [LanguageController::class, 'edit'])->name('edit');
            Route::patch('/{language}/update', [LanguageController::class, 'update'])->name('update');
            Route::delete('/{language}/delete', [LanguageController::class, 'delete'])->name('delete');
        });
    });
});
