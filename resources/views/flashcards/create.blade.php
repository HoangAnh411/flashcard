@extends('layouts.app')

@section('title', 'Create Flashcard — FlashLearn')

@section('content')
<div class="page-header">
    <h1>Create New Flashcard</h1>
    <p>Add a new question and answer to your collection.</p>
</div>

<div class="card" style="max-width: 800px;">
    <form method="POST" action="{{ route('flashcards.store') }}" id="create-flashcard-form">
        @csrf

        <div class="form-group">
            <label for="category_id" class="form-label">Category</label>
            <select name="category_id" id="category_id" class="form-control">
                <option value="">-- Select Category --</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            @error('category_id')
                <p class="error-text">{{ $message }}</p>
            @enderror
            @if($categories->count() === 0)
                <p class="text-muted text-sm mt-1">
                    No categories yet. <a href="{{ route('categories.create') }}">Create one first</a>
                </p>
            @endif
        </div>

        <div class="form-group">
            <label for="question" class="form-label">Question (Front Side)</label>
            <textarea name="question" id="question" class="form-control"
                      placeholder="Type your question here..." rows="4">{{ old('question') }}</textarea>
            @error('question')
                <p class="error-text">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="answer" class="form-label">Answer (Back Side)</label>
            <textarea name="answer" id="answer" class="form-control"
                      placeholder="Type the answer here..." rows="4">{{ old('answer') }}</textarea>
            @error('answer')
                <p class="error-text">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex flex-gap">
            <button type="submit" class="btn btn-primary" id="btn-submit">Save Flashcard</button>
            <a href="{{ route('flashcards.index') }}" class="btn btn-secondary">Back to List</a>
        </div>
    </form>
</div>
@endsection
