@extends('layouts.app')

@section('title', 'Create Category — FlashLearn')

@section('content')
<div class="page-header">
    <h1>Create New Category</h1>
    <p>Add a new category to organize your flashcards.</p>
</div>

<div class="card" style="max-width: 600px;">
    <form method="POST" action="{{ route('categories.store') }}" id="create-category-form">
        @csrf

        <div class="form-group">
            <label for="name" class="form-label">Category Name</label>
            <input type="text" name="name" id="name" class="form-control"
                   placeholder="e.g. Mathematics, History, Science..." value="{{ old('name') }}">
            @error('name')
                <p class="error-text">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex flex-gap">
            <button type="submit" class="btn btn-primary" id="btn-submit-category">Save Category</button>
            <a href="{{ route('categories.index') }}" class="btn btn-secondary">Back to Categories</a>
        </div>
    </form>
</div>
@endsection
