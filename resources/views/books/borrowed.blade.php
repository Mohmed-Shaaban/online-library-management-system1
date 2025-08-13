<x-app-layout>
    <div class="min-h-screen flex flex-col bg-gradient-to-b from-indigo-50 via-white to-indigo-50">

        <!-- Header -->
        <x-slot name="header">
            <h2 class="font-bold text-3xl text-gray-800 leading-tight flex items-center gap-3">
                📚 <span>{{ __('Borrowed Books') }}</span>
            </h2>
        </x-slot>

        <!-- Main Content -->
        <main class="flex-1 py-12 lg:py-16">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="p-8 backdrop-blur-lg bg-white/70 shadow-2xl rounded-3xl border border-gray-100">

                    <!-- Back Button -->
                    <div class="mb-8">
                        <a href="{{ url()->previous() }}"
                           class="inline-flex items-center px-5 py-2 bg-gradient-to-r from-gray-100 to-gray-200 hover:from-gray-200 hover:to-gray-300 text-gray-800 font-medium rounded-full shadow-md hover:shadow-lg transition-all duration-300">
                            ← Back
                        </a>
                    </div>

                    <!-- Borrowed Books Count -->
                    <div class="flex items-center justify-between flex-wrap gap-4 mb-8">
                        <h3 class="text-2xl font-bold text-gray-800 flex items-center gap-3">
                            📖 <span>Total Borrowed Books:</span>
                            <span class="bg-gradient-to-r from-indigo-500 to-indigo-600 text-white px-3 py-1 rounded-full shadow-md">
                                {{ $countBorrowedBook }}
                            </span>
                        </h3>
                    </div>

                    @if($countBorrowedBook > 0)
                        <div class="overflow-x-auto rounded-xl border border-gray-200 shadow-xl">
                            <table class="min-w-full text-sm text-left">
                                <thead class="sticky top-0 z-10">
                                    <tr class="bg-gradient-to-r from-indigo-600 to-indigo-500 text-white uppercase tracking-wider text-xs shadow-md">
                                        <th class="px-6 py-3"># ID</th>
                                        <th class="px-6 py-3">📕 Title</th>
                                        <th class="px-6 py-3">✍️ Author</th>
                                        <th class="px-6 py-3">🙋 Borrowed By</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200">
                                    @foreach($borrowed_Books as $book)
                                        <tr class="hover:bg-indigo-50 hover:scale-[1.01] transition-transform duration-200">
                                            <td class="px-6 py-4 font-medium text-gray-700">{{ $book->id }}</td>
                                            <td class="px-6 py-4 font-semibold text-gray-900">{{ $book->title }}</td>
                                            <td class="px-6 py-4 text-gray-600">{{ $book->author }}</td>
                                            <td class="px-6 py-4 text-gray-700">
                                                {{ optional($book->borrowedBy)->name ?? 'Unknown' }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="p-6 bg-yellow-50 border-l-4 border-yellow-400 rounded-lg shadow-md flex items-center gap-3">
                            <span class="text-2xl">⚠️</span>
                            <p class="text-yellow-800 font-medium">
                                No borrowed books at the moment.
                            </p>
                        </div>
                    @endif
                </div>
            </div>
        </main>


    </div>
</x-app-layout>
