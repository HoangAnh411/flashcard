@extends('layouts.app')

@section('title', 'Edit Category — FlashLearn')

@section('content')
<div class="page-header">
    <h1>Edit Category</h1>
    <p>Update the name of this category.</p>
</div>

<div class="card" style="max-width: 600px;">
    <form method="POST" action="{{ route('categories.update', $category) }}" id="edit-category-form">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name" class="form-label">Category Name</label>
            <input type="text" name="name" id="name" class="form-control"
                   value="{{ old('name', $category->name) }}">
            @error('name')
                <p class="error-text">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex flex-gap">
            <button type="submit" class="btn btn-primary" id="btn-update-category">Update Category</button>
            <a href="{{ route('categories.index') }}" class="btn btn-secondary">Back to Categories</a>
        </div>
    </form>
</div>
@endsection
