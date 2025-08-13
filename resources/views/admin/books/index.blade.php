@extends('layouts.app')

@section('content')
<div class="container py-4">
    {{-- Header Section --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold mb-0">📚 Manage Books</h2>
        @if(auth()->check() && auth()->user()->is_admin)
            <a href="{{ url('/books/create') }}" class="btn btn-success shadow-sm">
                ➕ Add Book
            </a>
        @endif
    </div>

    {{-- Books Table --}}
    <div class="card shadow-sm">
        <div class="card-body p-0">
            <table class="table table-striped table-hover align-middle mb-0">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Publication Date</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th class="text-center" colspan="2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($books as $book)
                        <tr>
                            <td>{{ $book->id }}</td>
                            <td>{{ $book->title }}</td>
                            <td>{{ $book->author }}</td>
                            <td>{{ Str::limit($book->description, 50) }}</td>
                            <td>
                                @if($book->is_borrowed)
                                    <span class="badge bg-danger">Borrowed</span>
                                @else
                                    <span class="badge bg-success">Available</span>
                                @endif
                            </td>
                            <td>{{ $book->publication_date ?? '—' }}</td>
                            <td>{{ $book->created_at->format('Y-m-d') }}</td>
                            <td>{{ $book->updated_at->format('Y-m-d') }}</td>

                            {{-- Actions (Admin only) --}}
                            @if(auth()->check() && auth()->user()->is_admin)
                                <td class="text-center">
                                    <a href="{{ url('/books/'.$book->id.'/edit') }}" class="btn btn-primary btn-sm shadow-sm">
                                        ✏ Edit
                                    </a>
                                </td>
                                <td class="text-center">
                                    <form action="{{ url('/books/'.$book->id) }}" method="POST"
                                          onsubmit="return confirm('Are you sure you want to delete this book?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm shadow-sm">
                                            🗑 Delete
                                        </button>
                                    </form>
                                </td>
                            @else
                                <td colspan="2" class="text-center text-muted">No Actions</td>
                            @endif
                        </tr>
                    @empty
                        <tr>
                            <td colspan="10" class="text-center text-muted py-3">No books found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
