<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FlashcardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;

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

// Dashboard
Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

// Flashcard routes
Route::get('/flashcards/study', [FlashcardController::class, 'study'])->name('flashcards.study');
Route::patch('/flashcards/{flashcard}/toggle-learned', [FlashcardController::class, 'toggleLearned'])->name('flashcards.toggleLearned');
Route::resource('flashcards', FlashcardController::class)->except(['show']);

// Category routes
Route::resource('categories', CategoryController::class)->except(['show']);
