<?php

namespace App\Http\Controllers;

use App\Models\Flashcard;
use App\Models\Category;
use Illuminate\Http\Request;

class FlashcardController extends Controller
{
    /**
     * Display a listing of the flashcards.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $query = Flashcard::with('category');

        // Search filter
        if ($request->has('search') && $request->search !== null) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('question', 'like', "%{$search}%")
                  ->orWhere('answer', 'like', "%{$search}%");
            });
        }

        // Category filter
        if ($request->has('category_id') && $request->category_id !== null && $request->category_id !== '') {
            $query->where('category_id', $request->category_id);
        }

        // Status filter
        if ($request->has('status') && $request->status !== null && $request->status !== '') {
            $query->where('is_learned', $request->status === 'learned');
        }

        $flashcards = $query->latest()->paginate(12);
        $categories = Category::withCount('flashcards')->get();

        return view('flashcards.index', compact('flashcards', 'categories'));
    }

    /**
     * Show the form for creating a new flashcard.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $categories = Category::all();
        return view('flashcards.create', compact('categories'));
    }

    /**
     * Store a newly created flashcard in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'question' => 'required|string',
            'answer'   => 'required|string',
            'category_id' => 'required|exists:categories,id',
        ]);

        Flashcard::create($validated);

        return redirect()->route('flashcards.index')
            ->with('success', 'Flashcard created successfully!');
    }

    /**
     * Show the form for editing the specified flashcard.
     *
     * @param  \App\Models\Flashcard  $flashcard
     * @return \Illuminate\View\View
     */
    public function edit(Flashcard $flashcard)
    {
        $categories = Category::all();
        return view('flashcards.edit', compact('flashcard', 'categories'));
    }

    /**
     * Update the specified flashcard in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Flashcard  $flashcard
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Flashcard $flashcard)
    {
        $validated = $request->validate([
            'question' => 'required|string',
            'answer'   => 'required|string',
            'category_id' => 'required|exists:categories,id',
        ]);

        $flashcard->update($validated);

        return redirect()->route('flashcards.index')
            ->with('success', 'Flashcard updated successfully!');
    }

    /**
     * Remove the specified flashcard from storage.
     *
     * @param  \App\Models\Flashcard  $flashcard
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Flashcard $flashcard)
    {
        $flashcard->delete();

        return redirect()->route('flashcards.index')
            ->with('success', 'Flashcard deleted successfully!');
    }

    /**
     * Display the study mode.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function study(Request $request)
    {
        $query = Flashcard::with('category');

        // Optional: filter by category
        if ($request->has('category_id') && $request->category_id !== null && $request->category_id !== '') {
            $query->where('category_id', $request->category_id);
        }

        // Optional: only unlearned cards
        if ($request->has('unlearned_only') && $request->unlearned_only) {
            $query->where('is_learned', false);
        }

        $flashcards = $query->get();
        $categories = Category::all();

        // Prepare card data for JavaScript (avoids closure in Blade @json)
        $cardsJson = $flashcards->map(function ($f) {
            return [
                'id'         => $f->id,
                'question'   => $f->question,
                'answer'     => $f->answer,
                'is_learned' => $f->is_learned,
                'category'   => $f->category->name,
            ];
        })->values();

        return view('flashcards.study', compact('flashcards', 'categories', 'cardsJson'));
    }

    /**
     * Toggle the learned status of a flashcard.
     *
     * @param  \App\Models\Flashcard  $flashcard
     * @return \Illuminate\Http\JsonResponse
     */
    public function toggleLearned(Flashcard $flashcard)
    {
        $flashcard->update([
            'is_learned' => !$flashcard->is_learned,
        ]);

        return response()->json([
            'success'    => true,
            'is_learned' => $flashcard->is_learned,
        ]);
    }
}
