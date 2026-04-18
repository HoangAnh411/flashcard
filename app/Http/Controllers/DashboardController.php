<?php

namespace App\Http\Controllers;

use App\Models\Flashcard;
use App\Models\Category;

class DashboardController extends Controller
{
    /**
     * Display the dashboard with learning statistics.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $totalFlashcards = Flashcard::count();
        $learnedCount    = Flashcard::where('is_learned', true)->count();
        $learningCount   = $totalFlashcards - $learnedCount;
        $totalCategories = Category::count();

        $categoryStats = Category::withCount([
            'flashcards',
            'flashcards as learned_count' => function ($query) {
                $query->where('is_learned', true);
            },
        ])->get();

        return view('dashboard', compact(
            'totalFlashcards',
            'learnedCount',
            'learningCount',
            'totalCategories',
            'categoryStats'
        ));
    }
}
