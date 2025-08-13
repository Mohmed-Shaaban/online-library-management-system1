<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Book Details') }}
        </h2>
    </x-slot>

    <div class="py-12 lg:py-16">
        <div class="w-full mx-auto sm:px-6 lg:px-12 space-y-6">
            <div class="p-6 sm:p-10 lg:p-12 bg-white shadow sm:rounded-lg">

                <!-- Back Button -->
                <div class="mb-6">
                    <a href="{{ route('books.index') }}" class="px-4 py-2 bg-gray-200 hover:bg-gray-300 text-gray-800 rounded-lg shadow-sm">
                        ← Back to Books
                    </a>
                </div>

                <!-- Book Details Card -->
                <div class="bg-gray-50 rounded-lg p-6 border border-gray-200">
                    <div class="mb-4">
                        <h3 class="text-lg font-semibold text-gray-900">{{ $book->title }}</h3>
                        <p class="text-sm text-gray-600">By {{ $book->author }}</p>
                    </div>

                    <dl class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <dt class="font-medium text-gray-700">ID</dt>
                            <dd class="text-gray-900">{{ $book->id }}</dd>
                        </div>

                        <div>
                            <dt class="font-medium text-gray-700">Description</dt>
                            <dd class="text-gray-900">{{ $book->description }}</dd>
                        </div>

                        <div>
                            <dt class="font-medium text-gray-700">Added Date</dt>
                            <dd class="text-gray-900">{{ $book->created_at->format('d M, Y') }}</dd>
                        </div>

                        <div>
                            <dt class="font-medium text-gray-700">Updated Date</dt>
                            <dd class="text-gray-900">{{ $book->updated_at->format('d M, Y') }}</dd>
                        </div>
                    </dl>

                    <!-- Book Borrow Status -->
                    <div class="mt-6">
                        @if(!$book->borrowed_by)
                            <form method="post" action="{{ route('books.borrow', $book->id) }}">
                                @csrf
                                <button type="submit" class="px-4 py-2 bg-yellow-500 hover:bg-yellow-600 text-white rounded-md shadow-sm">
                                    📚 Borrow
                                </button>
                            </form>
                        @elseif($book->borrowed_by == auth()->id())
                            <form method="post" action="{{ route('books.returnBook', $book->id) }}">
                                @csrf
                                <button type="submit" class="px-4 py-2 bg-green-500 hover:bg-green-600 text-white rounded-md shadow-sm">
                                    🔄 Return this book
                                </button>
                            </form>
                        @else
                            <p class="mt-2 text-red-600 font-medium">This book is currently borrowed by another student.</p>
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
