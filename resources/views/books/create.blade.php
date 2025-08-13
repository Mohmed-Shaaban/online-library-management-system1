<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add New Book') }}
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

                <!-- Error Messages -->
                @if($errors->any())
                    <div class="mb-4 p-4 bg-red-50 border border-red-200 text-red-600 rounded-lg">
                        <ul class="list-disc list-inside">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Create Book Form -->
                <form method="POST" action="{{ route('books.store') }}" class="space-y-6">
                    @csrf

                    <!-- Title -->
                    <div>
                        <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                        <input type="text" id="title" name="title" placeholder="Book Title"
                               value="{{ old('title') }}"
                               class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-indigo-500 focus:border-indigo-500">
                    </div>

                    <!-- Author -->
                    <div>
                        <label for="author" class="block text-sm font-medium text-gray-700">Author</label>
                        <input type="text" id="author" name="author" placeholder="Author Name"
                               value="{{ old('author') }}"
                               class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-indigo-500 focus:border-indigo-500">
                    </div>

                    <!-- Description -->
                    <div>
                        <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                        <textarea id="description" name="description" rows="4" placeholder="Book Description"
                                  class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-indigo-500 focus:border-indigo-500">{{ old('description') }}</textarea>
                    </div>

                    <!-- Publication Date -->
                    <div>
                        <label for="publication_date" class="block text-sm font-medium text-gray-700">Publication Date</label>
                        <input type="date" id="publication_date" name="publication_date"
                               value="{{ old('publication_date') }}"
                               class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-indigo-500 focus:border-indigo-500">
                    </div>

                    <!-- Submit Button -->
                    <div>
                        <button type="submit" class="px-6 py-2 bg-indigo-600 text-white font-semibold rounded-md shadow hover:bg-indigo-700">
                            ➕ Add Book
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
