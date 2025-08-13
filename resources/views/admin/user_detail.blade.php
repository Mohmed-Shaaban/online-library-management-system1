<x-app-layout>
    <div class="min-h-screen flex flex-col">

        <!-- Header -->
        <x-slot name="header">
            <h2 class="font-semibold text-3xl text-gray-800 leading-tight flex items-center gap-3">
                🧑‍🎓 <span>{{ __('Student Details') }}</span>
            </h2>
        </x-slot>

        <!-- Main Content -->
        <main class="flex-grow py-12">
            <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white shadow-2xl rounded-2xl p-8 space-y-8 border border-gray-100">

                    <!-- Back Button -->
                    <div>
                        <a href="{{ url()->previous() }}"
                           class="inline-flex items-center px-5 py-2 bg-gray-100 hover:bg-gray-200 text-gray-800 font-medium rounded-lg shadow-sm transition-all duration-200">
                            ← Back
                        </a>
                    </div>

                    @if($student)
                        <!-- Student Profile Card -->
                        <div class="bg-gradient-to-br from-indigo-50 to-white p-8 rounded-xl shadow-sm border space-y-6 text-center">

                            <!-- Avatar -->
                            <div class="flex justify-center">
                                <div class="w-24 h-24 rounded-full bg-indigo-200 flex items-center justify-center text-4xl font-bold text-indigo-700 shadow-md">
                                    {{ strtoupper(substr($student->name, 0, 1)) }}
                                </div>
                            </div>

                            <!-- Name -->
                            <h3 class="text-2xl font-bold text-indigo-700">
                                {{ $student->name }}
                            </h3>

                            <!-- Info List -->
                            <div class="space-y-4 text-left max-w-sm mx-auto">
                                <div class="flex items-center gap-3">
                                    <span class="text-gray-500 font-semibold uppercase text-xs">🆔 ID</span>
                                    <span class="text-base font-medium text-gray-800">{{ $student->id }}</span>
                                </div>

                                <div class="flex items-center gap-3">
                                    <span class="text-gray-500 font-semibold uppercase text-xs">📧 Email</span>
                                    <span class="text-base font-medium text-gray-700">{{ $student->email }}</span>
                                </div>
                            </div>
                        </div>
                    @else
                        <!-- No Student Found -->
                        <div class="text-center py-12 bg-yellow-50 border border-yellow-200 rounded-lg shadow-sm">
                            <p class="text-yellow-800 text-lg font-medium flex items-center justify-center gap-2">
                                ⚠ No student found with the provided ID.
                            </p>
                        </div>
                    @endif
                </div>
            </div>
        </main>



    </div>
</x-app-layout>
