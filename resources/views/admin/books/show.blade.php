@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="card shadow-sm">
        <div class="card-header bg-info text-white">
            <h4 class="mb-0">📖 Book Details</h4>
        </div>
        <div class="card-body">
            {{-- Book Information --}}
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <th scope="row" style="width: 200px;">ID</th>
                        <td>{{ $book->id }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Title</th>
                        <td>{{ $book->title }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Author</th>
                        <td>{{ $book->author }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Description</th>
                        <td>{{ $book->description }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Publication Date</th>
                        <td>{{ $book->publication_date ?? '—' }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Added On</th>
                        <td>{{ $book->created_at }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Last Updated</th>
                        <td>{{ $book->updated_at }}</td>
                    </tr>
                </tbody>
            </table>

            {{-- Borrow / Return Buttons --}}
            <div class="mt-4">
                @if(!$book->borrowed_by)
                    <form method="post" action="{{ route('books.borrow', $book->id) }}">
                        @csrf
                        <button type="submit" class="btn btn-primary">
                            📚 Borrow this Book
                        </button>
                    </form>
                @elseif($book->borrowed_by == auth()->id())
                    <form method="post" action="{{ route('books.return', $book->id) }}">
                        @csrf
                        <button type="submit" class="btn btn-warning">
                            🔄 Return this Book
                        </button>
                    </form>
                @else
                    <div class="alert alert-secondary" role="alert">
                        This book is currently borrowed by another student.
                    </div>
                @endif
            </div>

            {{-- Back Button --}}
            <div class="mt-3">
                <a href="{{ url('/books') }}" class="btn btn-outline-secondary">⬅ Back to Books</a>
            </div>
        </div>
    </div>
</div>
@endsection
