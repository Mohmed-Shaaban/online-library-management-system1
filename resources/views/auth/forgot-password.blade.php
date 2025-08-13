<x-guest-layout>
    <div class="max-w-md mx-auto bg-white p-8 rounded-2xl shadow-xl border border-gray-100">
        <!-- Title -->
        <h2 class="text-3xl font-extrabold text-center mb-4 text-indigo-600">
            Forgot Password
        </h2>
        <p class="mb-6 text-sm text-gray-500 text-center leading-relaxed">
            {{ __('No problem! Enter your email below and we’ll send you a password reset link so you can choose a new one.') }}
        </p>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('password.email') }}" class="space-y-5">
            @csrf

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email Address')" class="text-gray-700 font-medium" />
                <x-text-input
                    id="email"
                    class="block mt-1 w-full border-gray-300 rounded-lg shadow-sm focus:border-indigo-500 focus:ring-indigo-200 focus:ring-2"
                    type="email"
                    name="email"
                    :value="old('email')"
                    required
                    autofocus
                />
                <x-input-error :messages="$errors->get('email')" class="mt-2 text-sm text-red-500" />
            </div>

            <!-- Submit Button -->
            <div class="flex justify-end pt-4">
                <x-primary-button class="px-6 py-2 bg-indigo-600 hover:bg-indigo-700 rounded-lg shadow-md text-white transition duration-300">
                    {{ __('Send Reset Link') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-guest-layout>
