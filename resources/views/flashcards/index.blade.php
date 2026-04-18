@extends('layouts.app')

@section('title', 'Flashcards — FlashLearn')

@section('content')
<div class="page-header">
    <div class="flex-between">
        <div>
            <h1>My Flashcards</h1>
        </div>
        <div class="flex flex-gap">
            <a href="{{ route('flashcards.study') }}" class="btn btn-secondary" id="btn-study-mode">Study Mode</a>
            <a href="{{ route('flashcards.create') }}" class="btn btn-primary" id="btn-create-flashcard">New Flashcard</a>
        </div>
    </div>
</div>

{{-- Filters --}}
<div class="card mb-2" style="padding: 0.75rem 1.25rem;">
    <form method="GET" action="{{ route('flashcards.index') }}" class="flex flex-gap flex-wrap" style="align-items: flex-end;" id="filter-form">
        <div style="flex: 1; min-width: 200px;">
            <label class="form-label" style="margin-bottom: 4px;">Search</label>
            <input type="text" name="search" class="form-control" placeholder="Search questions or answers..."
                   value="{{ request('search') }}" id="input-search" style="padding: 6px 10px;">
        </div>
        <div style="min-width: 160px;">
            <label class="form-label" style="margin-bottom: 4px;">Category</label>
            <select name="category_id" class="form-control" id="select-category" style="padding: 6px 10px;" onchange="this.form.submit()">
                <option value="">All Categories</option>
                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}" {{ request('category_id') == $cat->id ? 'selected' : '' }}>
                        {{ $cat->name }} ({{ $cat->flashcards_count }})
                    </option>
                @endforeach
            </select>
        </div>
    </form>
</div>

{{-- Flashcard Grid --}}
@if($flashcards->count() > 0)
    <div class="grid-2">
        @foreach($flashcards as $flashcard)
            <div class="card" id="flashcard-{{ $flashcard->id }}" style="display: flex; flex-direction: column; justify-content: space-between;">
                <div>
                    <div class="flex-between mb-1">
                        <span class="badge badge-category">{{ $flashcard->category->name }}</span>
                        <span class="badge {{ $flashcard->is_learned ? 'badge-learned' : 'badge-not-learned' }}">
                            {{ $flashcard->is_learned ? 'Learned' : 'Learning' }}
                        </span>
                    </div>
                    <h3 class="pre-wrap" style="font-size: 0.9375rem; font-weight: 600; margin-bottom: 0.375rem; line-height: 1.5;">{{ Str::limit($flashcard->question, 100) }}</h3>
                    <p class="text-muted text-sm pre-wrap" style="line-height: 1.5;">{{ Str::limit($flashcard->answer, 80) }}</p>
                </div>
                <div class="flex-between mt-2" style="padding-top: 0.75rem; border-top: 1px solid var(--gray-200);">
                    <span class="text-muted text-sm">{{ $flashcard->created_at->diffForHumans() }}</span>
                    <div class="flex flex-gap">
                        <a href="{{ route('flashcards.edit', $flashcard) }}" class="btn btn-secondary btn-sm" id="btn-edit-{{ $flashcard->id }}">Edit</a>
                        <button type="button" class="btn btn-danger btn-sm" id="btn-delete-{{ $flashcard->id }}"
                                onclick="confirmDelete('{{ route('flashcards.destroy', $flashcard) }}')">
                            Delete
                        </button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="mt-2" style="display: flex; justify-content: center; padding-top: 1rem;">
        {{ $flashcards->withQueryString()->links() }}
    </div>
@else
    <div class="empty-state">
        <h3>No flashcards yet</h3>
        <p>Create your first flashcard to start learning.</p>
        <a href="{{ route('flashcards.create') }}" class="btn btn-primary">Create Flashcard</a>
    </div>
@endif
@endsection
