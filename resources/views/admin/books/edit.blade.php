@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="card shadow-sm">
        <div class="card-header bg-warning text-dark">
            <h4 class="mb-0">✏️ Edit Book</h4>
        </div>
        <div class="card-body">
            {{-- Validation Errors --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>There were some problems with your input:</strong>
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ url('/books/'.$book->id) }}">
                @csrf
                @method('PUT')

                {{-- Title --}}
                <div class="mb-3">
                    <label for="title" class="form-label fw-bold">Title</label>
                    <input
                        type="text"
                        name="title"
                        id="title"
                        class="form-control @error('title') is-invalid @enderror"
                        value="{{ old('title', $book->title) }}"
                        placeholder="Enter book title">
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Author --}}
                <div class="mb-3">
                    <label for="author" class="form-label fw-bold">Author</label>
                    <input
                        type="text"
                        name="author"
                        id="author"
                        class="form-control @error('author') is-invalid @enderror"
                        value="{{ old('author', $book->author) }}"
                        placeholder="Enter author's name">
                    @error('author')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Description --}}
                <div class="mb-3">
                    <label for="description" class="form-label fw-bold">Description</label>
                    <textarea
                        name="description"
                        id="description"
                        rows="4"
                        class="form-control @error('description') is-invalid @enderror"
                        placeholder="Write a short description">{{ old('description', $book->description) }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Publication Date --}}
                <div class="mb-3">
                    <label for="publication_date" class="form-label fw-bold">Publication Date</label>
                    <input
                        type="date"
                        name="publication_date"
                        id="publication_date"
                        class="form-control @error('publication_date') is-invalid @enderror"
                        value="{{ old('publication_date', $book->publication_date) }}">
                    @error('publication_date')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Buttons --}}
                <div class="d-flex justify-content-end">
                    <a href="{{ url('/books') }}" class="btn btn-secondary me-2">Cancel</a>
                    <button type="submit" class="btn btn-warning text-dark">Update Book</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
