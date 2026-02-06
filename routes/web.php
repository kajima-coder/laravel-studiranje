<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\FakultetController;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/fakulteti', [FakultetController::class, 'index'])->name('fakulteti.index');

// Student CRUD (bez show/edit/update/destroy jer to ide s middleware)
Route::resource('studenti', StudentController::class)->except(['show', 'edit', 'update', 'destroy']);
Route::get('/studenti', [StudentController::class, 'index'])
    ->name('studenti.index');


// show je pod middleware
Route::get('studenti/{student}', [StudentController::class, 'show'])
    ->name('studenti.show')
    ->middleware('student.mjesto');

// edit/update/destroy su pod middleware
Route::middleware('student.mjesto')->group(function () {
    Route::get('studenti/{student}/edit', [StudentController::class, 'edit'])->name('studenti.edit');
    Route::put('studenti/{student}', [StudentController::class, 'update'])->name('studenti.update');
    Route::delete('studenti/{student}', [StudentController::class, 'destroy'])->name('studenti.destroy');
});

// link rute (da ne pucaju linkovi iz layouta)
Route::get('/link1', fn() => redirect()->route('studenti.index'));
Route::get('/link2', fn() => redirect()->route('fakulteti.index'));
Route::get('/link3', fn() => view('about'));
