<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
//use Illuminate\Support\Facades\App;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\FilmController;


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

Route::get('/lang/{locale}', function (string $locale) {
    //App::setLocale($locale);
    session(['locale' => $locale]);

    //povratak na prethodnu stranicu
    return redirect()->back();
})->whereIn('locale', ['en', 'sr'])->name('lang');


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //prikaz svih podataka
    Route::get('/genre', [GenreController::class, 'index'])
    ->name('genre.index');

    //prikaz forme za unos
    Route::get('/genre/create', [GenreController::class, 'create'])
    ->name('genre.create');
    
    //validacija podataka i upis novog reda u tabelu
    Route::post('/genre', [GenreController::class, 'store'])
    ->name('genre.store');

    //forma za izmenu podatka
    Route::get('/genre/{genre}/edit', [GenreController::class, 'edit'])
    ->name('genre.edit');

    //izmena postojećeg podatka
    Route::put('/genre/{genre}', [GenreController::class, 'update'])
    ->name('genre.update');

    //brisanje podatka
    Route::delete('/genre/{genre}', [GenreController::class, 'destroy'])
    ->name('genre.destroy');

    //definisanje svih 7 ruta za kontroler
    Route::resource('film', FilmController::class);

    Route::post('/film', [FilmController::class, 'index'])
    ->name('film.index');
});

require __DIR__.'/auth.php';

Auth::routes([
    'register' => false,
    'reset' => false,
    'verify' => false
]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
