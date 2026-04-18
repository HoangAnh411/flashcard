@extends('layouts.app')

@section('title', 'Edit Flashcard — FlashLearn')

@section('content')
<div class="page-header">
    <h1>Edit Flashcard</h1>
    <p>Update the question or answer for this flashcard.</p>
</div>

<div class="card" style="max-width: 800px;">
    <form method="POST" action="{{ route('flashcards.update', $flashcard) }}" id="edit-flashcard-form">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="category_id" class="form-label">Category</label>
            <select name="category_id" id="category_id" class="form-control">
                <option value="">-- Select Category --</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}"
                        {{ old('category_id', $flashcard->category_id) == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            @error('category_id')
                <p class="error-text">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="question" class="form-label">Question (Front Side)</label>
            <textarea name="question" id="question" class="form-control"
                      rows="4">{{ old('question', $flashcard->question) }}</textarea>
            @error('question')
                <p class="error-text">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="answer" class="form-label">Answer (Back Side)</label>
            <textarea name="answer" id="answer" class="form-control"
                      rows="4">{{ old('answer', $flashcard->answer) }}</textarea>
            @error('answer')
                <p class="error-text">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex flex-gap">
            <button type="submit" class="btn btn-primary" id="btn-update">Update Flashcard</button>
            <a href="{{ route('flashcards.index') }}" class="btn btn-secondary">Back to List</a>
        </div>
    </form>
</div>
@endsection
