<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\LigueController;
use App\Http\Controllers\ClubController;
use App\Http\Controllers\PersonneController;
use App\Http\Controllers\FonctionController;
use App\Http\Controllers\AffectationController;
use App\Http\Controllers\ActiviteController;
use App\Http\Controllers\EvenementController;
use App\Http\Controllers\CommissionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;




Route::middleware(['auth', 'verified'])->group(function () {


    Route::resource('ligues', LigueController::class);
Route::resource('clubs', ClubController::class);
Route::resource('personnes', PersonneController::class);
Route::resource('fonctions', FonctionController::class);
Route::resource('affectations', AffectationController::class);
Route::resource('activites', ActiviteController::class);
Route::resource('evenements', EvenementController::class);
Route::resource('commissions', CommissionController::class);
Route::resource('users', UserController::class)->middleware('auth');

});





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






Route::get('/dashboard', function () {
    return view('backend.dashboard.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
