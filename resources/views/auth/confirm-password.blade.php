<x-guest-layout>
    <div class="max-w-md mx-auto bg-gradient-to-b from-white to-gray-50 p-8 rounded-2xl shadow-xl border border-gray-100">

        <!-- Heading -->
        <div class="text-center mb-6">
            <h2 class="text-3xl font-extrabold text-gray-800">🔒 Confirm Password</h2>
            <p class="mt-2 text-sm text-gray-600">
                {{ __('For security reasons, please confirm your password before continuing.') }}
            </p>
        </div>

        <!-- Form -->
        <form method="POST" action="{{ route('password.confirm') }}" class="space-y-6">
            @csrf

            <!-- Password -->
            <div>
                <x-input-label for="password" :value="__('Password')" class="text-gray-700 font-semibold" />
                <x-text-input
                    id="password"
                    class="block mt-2 w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none transition"
                    type="password"
                    name="password"
                    required
                    autocomplete="current-password"
                    placeholder="Enter your password"
                />
                <x-input-error :messages="$errors->get('password')" class="mt-2 text-sm text-red-500" />
            </div>

            <!-- Submit Button -->
            <div class="flex justify-center">
                <x-primary-button class="px-6 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg shadow-md transition">
                    {{ __('Confirm Password') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-guest-layout>
