<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FlashcardController;
use App\Http\Controllers\CategoryController;

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

// Home → redirect to flashcards
Route::get('/', function () {
    return redirect()->route('flashcards.index');
});

// Flashcard routes
Route::get('/flashcards/study', [FlashcardController::class, 'study'])->name('flashcards.study');
Route::patch('/flashcards/{flashcard}/toggle-learned', [FlashcardController::class, 'toggleLearned'])->name('flashcards.toggleLearned');
Route::resource('flashcards', FlashcardController::class)->except(['show']);

// Category routes
Route::resource('categories', CategoryController::class)->except(['show']);
