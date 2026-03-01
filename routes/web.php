<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;

// Route::get('/', function () {
//     return view('frontend.index');
// });
Route::get('/', [MainController::class, 'index'])->name('index');

Route::prefix('main')->name('main.')->group(function () {
    Route::get('/index', [MainController::class, 'index'])->name('index');
    
    Route::get('/about', [MainController::class, 'about'])->name('about');
        Route::get('/mot-presidente', [MainController::class, 'motPresidente'])->name('mot_presidente');
        Route::get('/membres', [MainController::class, 'membres'])->name('membres');
        Route::get('/statuts-reglements', [MainController::class, 'statuts'])->name('statuts');
        Route::get('/documents', [MainController::class, 'documents'])->name('documents');

    Route::get('/evenements', [MainController::class, 'evenements'])->name('evenements');
    
    Route::get('/phototheque', [MainController::class, 'phototheque'])->name('phototheque');
    Route::get('/videotheque', [MainController::class, 'videotheque'])->name('videotheque');

    Route::get('/secteurs', [MainController::class, 'secteurs'])->name('secteurs');
    Route::get('/clubs', [MainController::class, 'clubs'])->name('clubs');
    

    Route::get('/contact', [MainController::class, 'contact'])->name('contact');


    // Route::get('/liste_exercice', [AdminController::class, 'liste_exercice'])->name('exercice');
    // Route::get('/liste_trimestre', [AdminController::class, 'liste_trimestre'])->name('trimestre');
    // Route::post('/create_exercice', [AdminController::class, 'create_exercice'])->name('create_exercice');
    // Route::post('/create_trimestre', [AdminController::class, 'create_trimestre'])->name('create_trimestre');
    // Route::get('/get_exe/{id}', [AdminController::class, 'get_exercice'])->name('get_exe');
    // Route::get('/get_trim/{id}', [AdminController::class, 'get_trimestre'])->name('get_trim');
    // Route::delete('/delete_exe/{id}', [AdminController::class, 'delete_exercice'])->name('delete_exe');
    // Route::delete('/delete_trim/{id}', [AdminController::class, 'delete_trimestre'])->name('delete_trim');
});
