<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Book') }}
        </h2>
    </x-slot>

    <div class="py-12 lg:py-16">
        <div class="w-full mx-auto sm:px-6 lg:px-12 space-y-6">
            <div class="p-6 sm:p-10 lg:p-12 bg-white shadow sm:rounded-lg">

                <!-- Back Button -->
                <div class="mb-6">
                    <a href="{{ route('books.index') }}"
                       class="px-4 py-2 bg-gray-200 hover:bg-gray-300 text-gray-800 rounded-lg shadow-sm">
                        ← Back to Books
                    </a>
                </div>

                <form method="POST" action="{{ route('books.update', $book->id) }}" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <!-- Title -->
                    <div>
                        <label class="block font-medium text-gray-700">Title</label>
                        <input type="text" name="title" value="{{ old('title', $book->title) }}"
                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                               placeholder="Book Title">
                    </div>

                    <!-- Author -->
                    <div>
                        <label class="block font-medium text-gray-700">Author</label>
                        <input type="text" name="author" value="{{ old('author', $book->author) }}"
                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                               placeholder="Author Name">
                    </div>

                    <!-- Description -->
                    <div>
                        <label class="block font-medium text-gray-700">Description</label>
                        <textarea name="description" rows="4"
                                  class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                                  placeholder="Book description">{{ old('description', $book->description) }}</textarea>
                    </div>

                    <!-- Publication Date -->
                    <div>
                        <label class="block font-medium text-gray-700">Publication Date</label>
                        <input type="date" name="publication_date"
                               value="{{ old('publication_date', $book->publication_date) }}"
                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                    </div>

                    <!-- Submit Button -->
                    <div>
                        <button type="submit"
                                class="px-6 py-2 bg-indigo-600 text-white rounded-lg shadow hover:bg-indigo-700">
                            Update Book
                        </button>
                    </div>
                </form>

                <!-- Error Messages -->
                @if($errors->any())
                    <ul class="mt-4 space-y-1">
                        @foreach($errors->all() as $error)
                            <li class="text-red-600 text-sm">{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif

            </div>
        </div>
    </div>
</x-app-layout>
