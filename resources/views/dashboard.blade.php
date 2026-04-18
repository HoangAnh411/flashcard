@extends('layouts.app')

@section('title', 'Dashboard — FlashLearn')

@section('content')
<div class="page-header">
    <h1>Dashboard</h1>
</div>

{{-- Stats Cards --}}
<div class="stats-grid">
    <div class="stat-card stat-total">
        <div class="stat-number">{{ $totalFlashcards }}</div>
        <div class="stat-label">Total Flashcards</div>
    </div>
    <div class="stat-card stat-learned">
        <div class="stat-number">{{ $learnedCount }}</div>
        <div class="stat-label">Learned</div>
    </div>
    <div class="stat-card stat-learning">
        <div class="stat-number">{{ $learningCount }}</div>
        <div class="stat-label">Still Learning</div>
    </div>
    <div class="stat-card stat-categories">
        <div class="stat-number">{{ $totalCategories }}</div>
        <div class="stat-label">Categories</div>
    </div>
</div>

{{-- Progress Overview --}}
@if($totalFlashcards > 0)
<div class="card mt-2">
    <h3 style="font-size: 1rem; font-weight: 600; margin-bottom: 1rem;">Overall Progress</h3>
    <div class="overall-progress-track">
        <div class="overall-progress-fill" style="width: {{ round(($learnedCount / $totalFlashcards) * 100) }}%"></div>
    </div>
    <p class="text-muted text-sm" style="margin-top: 0.5rem;">
        {{ round(($learnedCount / $totalFlashcards) * 100) }}% completed ({{ $learnedCount }} / {{ $totalFlashcards }} cards)
    </p>
</div>
@endif

{{-- Category Breakdown --}}
@if($categoryStats->count() > 0)
<div class="card mt-2">
    <h3 style="font-size: 1rem; font-weight: 600; margin-bottom: 1rem;">Progress by Category</h3>
    <div class="category-progress-list">
        @foreach($categoryStats as $cat)
        <div class="category-progress-item">
            <div class="flex-between" style="margin-bottom: 4px;">
                <span style="font-weight: 500; font-size: 0.875rem;">{{ $cat->name }}</span>
                <span class="text-muted text-sm">{{ $cat->learned_count }} / {{ $cat->flashcards_count }}</span>
            </div>
            <div class="category-progress-track">
                <div class="category-progress-fill" style="width: {{ $cat->flashcards_count > 0 ? round(($cat->learned_count / $cat->flashcards_count) * 100) : 0 }}%"></div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endif

{{-- Quick Actions --}}
<div class="card mt-2">
    <h3 style="font-size: 1rem; font-weight: 600; margin-bottom: 1rem;">Quick Actions</h3>
    <div class="flex flex-gap flex-wrap">
        <a href="{{ route('flashcards.study') }}" class="btn btn-primary">Start Studying</a>
        <a href="{{ route('flashcards.create') }}" class="btn btn-secondary">Create Flashcard</a>
        <a href="{{ route('categories.create') }}" class="btn btn-secondary">Create Category</a>
    </div>
</div>

<style>
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 1rem;
    }

    .stat-card {
        background: var(--bg-card);
        border: 1px solid var(--border-default);
        border-radius: var(--radius);
        padding: 1.25rem;
        text-align: center;
        box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1);
        border-top: 3px solid transparent;
    }

    .stat-total  { border-top-color: #6366f1; }
    .stat-learned { border-top-color: #10b981; }
    .stat-learning { border-top-color: #f59e0b; }
    .stat-categories { border-top-color: #0ea5e9; }

    .stat-number {
        font-size: 2rem;
        font-weight: 700;
        line-height: 1;
        margin-bottom: 0.25rem;
    }

    .stat-total .stat-number { color: #6366f1; }
    .stat-learned .stat-number { color: #10b981; }
    .stat-learning .stat-number { color: #f59e0b; }
    .stat-categories .stat-number { color: #0ea5e9; }

    .stat-label {
        font-size: 0.8125rem;
        color: var(--text-secondary);
        font-weight: 500;
    }

    .overall-progress-track {
        width: 100%;
        height: 8px;
        background: #e2e8f0;
        border-radius: 8px;
        overflow: hidden;
    }

    .overall-progress-fill {
        height: 100%;
        background: linear-gradient(90deg, #10b981, #059669);
        border-radius: 8px;
        transition: width 0.5s ease;
    }

    .category-progress-list {
        display: flex;
        flex-direction: column;
        gap: 0.75rem;
    }

    .category-progress-track {
        width: 100%;
        height: 6px;
        background: #e2e8f0;
        border-radius: 6px;
        overflow: hidden;
    }

    .category-progress-fill {
        height: 100%;
        background: var(--btn-primary-bg);
        border-radius: 6px;
        transition: width 0.5s ease;
    }

    @media (max-width: 768px) {
        .stats-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }
</style>
@endsection
