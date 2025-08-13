<x-app-layout>
    <x-slot name="header">
        <!-- Header -->
        <div class="flex justify-between items-center bg-gradient-to-r from-indigo-600 via-purple-600 to-pink-500 p-6 rounded-2xl shadow-xl">
            <h2 class="font-extrabold text-2xl text-white tracking-tight flex items-center gap-2 drop-shadow-sm">
                📚 {{ __('Dashboard') }}
            </h2>
            <div class="flex items-center gap-5">
                <span class="text-white font-semibold text-lg">{{ Auth::user()->name }}</span>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                        class="flex items-center gap-2 bg-red-500 hover:bg-red-600 text-white px-5 py-2 rounded-lg shadow-lg font-medium transition-all transform hover:scale-105">
                        🚪 Logout
                    </button>
                </form>
            </div>
        </div>
    </x-slot>

    <div class="py-12 bg-gradient-to-br from-gray-50 to-gray-100 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex flex-col lg:flex-row gap-8">

            <!-- Sidebar -->
            <aside class="bg-white/95 backdrop-blur-sm w-full lg:w-1/4 p-6 rounded-2xl shadow-lg border border-gray-100">
                <h3 class="mb-6 font-extrabold text-xl text-indigo-600 flex items-center gap-2">
                    🎓 Student Nook
                </h3>
                <ul class="space-y-3">
                    <li>
                        <a href="/dashboard"
                           class="flex items-center gap-3 px-4 py-3 bg-indigo-50 border border-indigo-200 text-indigo-700 font-medium rounded-xl shadow-sm hover:bg-indigo-100 hover:shadow-md transition">
                            📖 <span>Your Borrowed Books</span>
                        </a>
                    </li>
                    <li>
                        <a href="/books"
                           class="flex items-center gap-3 px-4 py-3 bg-indigo-50 border border-indigo-200 text-indigo-700 font-medium rounded-xl shadow-sm hover:bg-indigo-100 hover:shadow-md transition">
                            📚 <span>All Books</span>
                        </a>
                    </li>
                    <li>
                        <a href="/profile"
                           class="flex items-center gap-3 px-4 py-3 bg-indigo-50 border border-indigo-200 text-indigo-700 font-medium rounded-xl shadow-sm hover:bg-indigo-100 hover:shadow-md transition">
                            👤 <span>Your Profile</span>
                        </a>
                    </li>
                </ul>
            </aside>

            <!-- Main Content -->
            <main class="flex-1 bg-white/95 backdrop-blur-sm p-6 rounded-2xl shadow-lg border border-gray-100">

                <!-- Welcome Banner -->
                <div class="flex justify-center items-center h-24 bg-gradient-to-r from-blue-100 via-indigo-50 to-purple-100 border border-indigo-100 rounded-xl mb-6 shadow-sm">
                    <h1 class="text-2xl font-extrabold text-indigo-700">
                        Welcome to our Library, {{ Auth::user()->name }} 🎉
                    </h1>
                </div>

                <!-- Borrowed Books Count -->
                @if(Auth::user()->usertype == 'student')
                    <div class="bg-blue-50 border-l-4 border-blue-500 text-blue-800 p-4 rounded-lg mb-6 shadow-sm flex items-center gap-2">
                        📌 You have borrowed <strong>{{ $countUserBook }}</strong> out of a maximum of <strong>5</strong> books.
                    </div>
                @endif

                <!-- Borrowed Books Table -->
                <h3 class="font-bold mb-4 text-lg text-indigo-700 flex items-center gap-2">
                    📖 Your Borrowed Books
                </h3>
                <div class="overflow-x-auto rounded-xl border border-gray-200 shadow-md">
                    <table class="min-w-full text-sm">
                        <thead class="bg-indigo-100">
                            <tr>
                                <th class="px-4 py-3 text-left text-indigo-700 font-semibold">Book Title</th>
                                <th class="px-4 py-3 text-left text-indigo-700 font-semibold">Author</th>
                                <th class="px-4 py-3 text-left text-indigo-700 font-semibold">Borrow Date</th>
                                <th class="px-4 py-3 text-left text-indigo-700 font-semibold">Return Date</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @if($borrowedBooks && $borrowedBooks->count() > 0)
                                @foreach($borrowedBooks as $book)
                                    <tr class="hover:bg-indigo-50 transition">
                                        <td class="px-4 py-3">{{ $book->title }}</td>
                                        <td class="px-4 py-3">{{ $book->author }}</td>
                                        <td class="px-4 py-3">{{ $book->borrowed_at }}</td>
                                        <td class="px-4 py-3">{{ $book->due_date }}</td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="4" class="text-center px-4 py-6 text-gray-500">
                                        😔 You haven't borrowed any books yet.
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </main>
        </div>
    </div>
</x-app-layout>
