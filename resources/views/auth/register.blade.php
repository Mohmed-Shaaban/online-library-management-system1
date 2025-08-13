<x-guest-layout>
    <div class="max-w-md mx-auto bg-white p-8 rounded-2xl shadow-xl border border-gray-100">
        <!-- Title -->
        <h2 class="text-3xl font-extrabold text-center mb-8 text-indigo-600">
            Create Your Account
        </h2>
        <p class="text-center text-gray-500 mb-6 text-sm">
            Please fill in the details to get started.
        </p>

        <form method="POST" action="{{ route('register') }}" class="space-y-5">
            @csrf

            <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('Full Name')" class="text-gray-700 font-medium" />
                <x-text-input
                    id="name"
                    class="block mt-1 w-full border-gray-300 rounded-lg shadow-sm focus:border-indigo-500 focus:ring-indigo-200 focus:ring-2"
                    type="text"
                    name="name"
                    :value="old('name')"
                    required
                    autofocus
                    autocomplete="name"
                />
                <x-input-error :messages="$errors->get('name')" class="mt-2 text-sm text-red-500" />
            </div>

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
                    autocomplete="username"
                />
                <x-input-error :messages="$errors->get('email')" class="mt-2 text-sm text-red-500" />
            </div>

            <!-- Password -->
            <div>
                <x-input-label for="password" :value="__('Password')" class="text-gray-700 font-medium" />
                <x-text-input
                    id="password"
                    class="block mt-1 w-full border-gray-300 rounded-lg shadow-sm focus:border-indigo-500 focus:ring-indigo-200 focus:ring-2"
                    type="password"
                    name="password"
                    required
                    autocomplete="new-password"
                />
                <x-input-error :messages="$errors->get('password')" class="mt-2 text-sm text-red-500" />
            </div>

            <!-- Confirm Password -->
            <div>
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="text-gray-700 font-medium" />
                <x-text-input
                    id="password_confirmation"
                    class="block mt-1 w-full border-gray-300 rounded-lg shadow-sm focus:border-indigo-500 focus:ring-indigo-200 focus:ring-2"
                    type="password"
                    name="password_confirmation"
                    required
                    autocomplete="new-password"
                />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-sm text-red-500" />
            </div>

            <!-- Role Selection -->
            <div>
                <x-input-label for="usertype" :value="__('Role')" class="text-gray-700 font-medium" />
                <select
                    id="usertype"
                    name="usertype"
                    class="mt-1 w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-200 focus:ring-2"
                >
                    <option value="student" {{ old('usertype') == 'student' ? 'selected' : '' }}>Student</option>
                    <option value="admin" {{ old('usertype') == 'admin' ? 'selected' : '' }}>Admin</option>
                </select>
                <x-input-error :messages="$errors->get('usertype')" class="mt-2 text-sm text-red-500" />
            </div>

            <!-- Actions -->
            <div class="flex items-center justify-between mt-6">
                <a
                    class="text-sm text-gray-500 hover:text-indigo-600 transition-colors"
                    href="{{ route('login') }}"
                >
                    {{ __('Already registered?') }}
                </a>

                <x-primary-button class="px-6 py-2 bg-indigo-600 hover:bg-indigo-700 rounded-lg shadow-md text-white transition duration-300">
                    {{ __('Register') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-guest-layout>
