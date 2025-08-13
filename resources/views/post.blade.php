<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Post Page') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-50">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="bg-white p-8 sm:p-10 lg:p-12 shadow-lg rounded-lg">
                <h1 class="text-3xl font-bold text-gray-800 mb-6">Admin Post Page</h1>

                <p class="text-gray-600 mb-4">
                    This is the admin post management section. Here you can create, edit, and delete posts.
                </p>

                <div class="space-x-4">
                    <a href="{{ route('posts.create') }}"
                       class="px-4 py-2 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700">
                        Create New Post
                    </a>
                    <a href="{{ route('posts.index') }}"
                       class="px-4 py-2 bg-gray-200 text-gray-800 rounded-lg shadow hover:bg-gray-300">
                        View All Posts
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
