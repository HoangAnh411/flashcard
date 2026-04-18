@extends('layouts.app')

@section('title', 'Categories — FlashLearn')

@section('content')
<div class="page-header">
    <div class="flex-between">
        <div>
            <h1>Categories</h1>
            <p>Organize your flashcards into categories.</p>
        </div>
        <a href="{{ route('categories.create') }}" class="btn btn-primary" id="btn-create-category">New Category</a>
    </div>
</div>

@if($categories->count() > 0)
    <div class="grid-2">
        @foreach($categories as $category)
            <div class="card" id="category-{{ $category->id }}">
                <div class="flex-between">
                    <div>
                        <h3 style="font-size: 1rem; font-weight: 600; margin-bottom: 0.125rem;">
                            {{ $category->name }}
                        </h3>
                        <p class="text-muted text-sm">
                            {{ $category->flashcards_count }} flashcard{{ $category->flashcards_count !== 1 ? 's' : '' }}
                        </p>
                    </div>
                    <div class="flex flex-gap">
                        <a href="{{ route('categories.edit', $category) }}" class="btn btn-secondary btn-sm" id="btn-edit-cat-{{ $category->id }}">Edit</a>
                        <button type="button" class="btn btn-danger btn-sm" id="btn-delete-cat-{{ $category->id }}"
                                onclick="confirmDelete('{{ route('categories.destroy', $category) }}', 'Warning: Deleting this category will permanently delete ALL flashcards inside it. This action cannot be undone.')">
                            Delete
                        </button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@else
    <div class="empty-state">
        <h3>No categories yet</h3>
        <p>Create categories to organize your flashcards.</p>
        <a href="{{ route('categories.create') }}" class="btn btn-primary">Create Category</a>
    </div>
@endif
@endsection
