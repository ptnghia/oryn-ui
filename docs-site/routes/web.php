<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DocsController;

Route::get('/', [DocsController::class, 'home'])->name('home');

Route::prefix('docs')->name('docs.')->group(function () {
    // Getting Started
    Route::get('/installation', [DocsController::class, 'installation'])->name('installation');
    Route::get('/quick-start', [DocsController::class, 'quickStart'])->name('quick-start');
    Route::get('/configuration', [DocsController::class, 'configuration'])->name('configuration');

    // Theming
    Route::get('/theming', [DocsController::class, 'theming'])->name('theming');
    Route::get('/theming/colors', [DocsController::class, 'themingColors'])->name('theming.colors');
    Route::get('/theming/dark-mode', [DocsController::class, 'themingDarkMode'])->name('theming.dark-mode');
    Route::get('/theming/presets', [DocsController::class, 'themingPresets'])->name('theming.presets');

    // Components — dynamic route
    Route::get('/components/{component}', [DocsController::class, 'component'])->name('component');
});
