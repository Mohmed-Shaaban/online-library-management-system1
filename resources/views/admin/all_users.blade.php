<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-3xl text-gray-800 leading-tight flex items-center space-x-2">
            <span>👥</span>
            <span>{{ __('All Students') }}</span>
        </h2>
    </x-slot>

    <div class="py-12 bg-gradient-to-br from-indigo-50 via-white to-indigo-100 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white/80 backdrop-blur-lg shadow-xl rounded-3xl p-8 border border-indigo-100">

                <!-- Top Controls -->
                <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-8 gap-4">
                    <a href="/home"
                       class="inline-flex items-center px-5 py-2 bg-gradient-to-r from-gray-100 to-gray-200 hover:from-gray-200 hover:to-gray-300 text-gray-700 font-semibold rounded-lg shadow-sm transition">
                        ← Back to Dashboard
                    </a>

                    <div class="text-lg font-semibold text-gray-700 bg-indigo-50 px-5 py-2 rounded-lg shadow-sm border border-indigo-100">
                        Total Students: <span class="font-bold text-indigo-600">{{ $countUsers }}</span>
                    </div>
                </div>

                <!-- Search Box -->
                <div class="mb-8">
                    <h3 class="text-2xl font-bold text-indigo-700 text-center mb-4">🔍 Search Student Details</h3>
                    <form action="{{ route('search.student') }}" method="post" class="flex flex-col sm:flex-row justify-center items-center gap-3">
                        @csrf
                        <input type="text"
                               name="student_id"
                               placeholder="Enter Student ID"
                               class="border border-indigo-200 bg-white/70 backdrop-blur-md rounded-xl px-5 py-3 shadow-sm focus:outline-none focus:ring-4 focus:ring-indigo-300 w-full sm:w-72 transition">
                        <button type="submit"
                                class="px-6 py-3 bg-gradient-to-r from-indigo-500 to-indigo-600 hover:from-indigo-600 hover:to-indigo-700 text-white font-semibold rounded-xl shadow-md transition-transform hover:scale-105">
                            Search
                        </button>
                    </form>
                </div>

                <!-- Students Table -->
                <div class="overflow-x-auto rounded-xl shadow-md border border-indigo-100">
                    @if(count($users) > 0)
                        <table class="min-w-full text-sm text-left border-collapse">
                            <thead>
                                <tr class="bg-gradient-to-r from-indigo-500 to-indigo-600 text-white">
                                    <th class="px-6 py-4">ID</th>
                                    <th class="px-6 py-4">Name</th>
                                    <th class="px-6 py-4">Email</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-indigo-100">
                                @foreach($users as $user)
                                    <tr class="hover:bg-indigo-50 transition">
                                        <td class="px-6 py-4">{{ $user->id }}</td>
                                        <td class="px-6 py-4 font-medium text-gray-700">{{ $user->name }}</td>
                                        <td class="px-6 py-4 text-gray-600">{{ $user->email }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <p class="text-gray-600 text-center py-6">No students found.</p>
                    @endif
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
