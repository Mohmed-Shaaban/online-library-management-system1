<x-app-layout>
    <x-slot name="header">
        <div class="bg-gradient-to-r from-indigo-600 via-purple-500 to-pink-500 p-4 sm:p-6 rounded-xl shadow-md flex items-center gap-2">
            <span class="text-2xl">⚙️</span>
            <h2 class="font-bold text-xl sm:text-2xl text-white tracking-tight">
                {{ __('Profile Settings') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-8 bg-gradient-to-br from-gray-50 to-gray-100 min-h-screen">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <!-- Update Profile Information -->
            <div class="bg-white/90 backdrop-blur-sm shadow-md rounded-2xl p-6 border border-gray-200 hover:shadow-lg transition duration-200">
                <div class="flex items-start justify-between">
                    <div>
                        <h3 class="text-xl font-semibold text-indigo-600 flex items-center gap-2 mb-2">
                            <span class="bg-indigo-100 p-1.5 rounded-full text-sm">📝</span>
                            {{ __('Profile Information') }}
                        </h3>
                        <p class="text-sm text-gray-500 mb-4 leading-snug">
                            {{ __("Update your account's profile details.") }}
                        </p>
                    </div>
                    <div class="bg-indigo-100 text-indigo-800 px-2 py-0.5 rounded-full text-xs font-medium">
                        {{ __('Required') }}
                    </div>
                </div>

                <div class="max-w-lg">
                    <form method="post" action="{{ route('profile.update') }}" class="space-y-4">
                        @csrf
                        @method('patch')

                        <!-- Name -->
                        <div>
                            <x-input-label for="name" value="{{ __('Full Name') }}" class="text-sm font-medium text-gray-700" />
                            <x-text-input
                                id="name"
                                name="name"
                                type="text"
                                class="mt-1 block w-full text-sm border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                placeholder="{{ __('Your full name') }}"
                                :value="old('name', $user->name)"
                                required
                                autofocus
                                autocomplete="name"
                            />
                            <x-input-error class="mt-1 text-xs" :messages="$errors->get('name')" />
                        </div>

                        <!-- Email -->
                        <div>
                            <x-input-label for="email" value="{{ __('Email Address') }}" class="text-sm font-medium text-gray-700" />
                            <x-text-input
                                id="email"
                                name="email"
                                type="email"
                                class="mt-1 block w-full text-sm border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                placeholder="{{ __('Your email') }}"
                                :value="old('email', $user->email)"
                                required
                                autocomplete="username"
                            />
                            <x-input-error class="mt-1 text-xs" :messages="$errors->get('email')" />

                            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                                <div class="mt-2 bg-yellow-50 border-l-4 border-yellow-400 p-2 rounded-md text-xs text-yellow-700">
                                    <p>
                                        ⚠️ {{ __('Email unverified.') }}
                                        <button
                                            form="send-verification"
                                            class="ml-1 underline font-medium text-indigo-600 hover:text-indigo-800"
                                        >
                                            {{ __('Resend verification') }}
                                        </button>
                                    </p>

                                    @if (session('status') === 'verification-link-sent')
                                        <p class="mt-1 font-medium text-green-600">
                                            ✅ {{ __('Verification sent!') }}
                                        </p>
                                    @endif
                                </div>
                            @endif
                        </div>

                        <!-- Actions -->
                        <div class="flex items-center gap-3">
                            <x-primary-button class="px-4 py-2 text-sm rounded-md shadow-sm bg-indigo-600 hover:bg-indigo-700">
                                💾 {{ __('Save') }}
                            </x-primary-button>

                            @if (session('status') === 'profile-updated')
                                <p
                                    x-data="{ show: true }"
                                    x-show="show"
                                    x-transition
                                    x-init="setTimeout(() => show = false, 3000)"
                                    class="text-xs text-green-600 font-medium"
                                >
                                    ✅ {{ __('Saved!') }}
                                </p>
                            @endif
                        </div>
                    </form>
                </div>
            </div>

            <!-- Update Password -->
            <div class="bg-white/90 backdrop-blur-sm shadow-md rounded-2xl p-6 border border-gray-200 hover:shadow-lg transition duration-200">
                <div class="flex items-start justify-between">
                    <div>
                        <h3 class="text-xl font-semibold text-yellow-600 flex items-center gap-2 mb-2">
                            <span class="bg-yellow-100 p-1.5 rounded-full text-sm">🔒</span>
                            {{ __('Update Password') }}
                        </h3>
                        <p class="text-sm text-gray-500 mb-4 leading-snug">
                            {{ __('Secure your account with a strong password.') }}
                        </p>
                    </div>
                    <div class="bg-yellow-100 text-yellow-800 px-2 py-0.5 rounded-full text-xs font-medium">
                        {{ __('Recommended') }}
                    </div>
                </div>

                <div class="max-w-lg">
                    <form method="post" action="{{ route('password.update') }}" class="space-y-4">
                        @csrf
                        @method('put')

                        <!-- Current Password -->
                        <div>
                            <x-input-label for="current_password" value="{{ __('Current Password') }}" class="text-sm font-medium text-gray-700" />
                            <x-text-input
                                id="current_password"
                                name="current_password"
                                type="password"
                                class="mt-1 block w-full text-sm border-gray-300 rounded-md shadow-sm focus:border-yellow-500 focus:ring-yellow-500"
                                placeholder="{{ __('Current password') }}"
                                autocomplete="current-password"
                            />
                            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-1 text-xs" />
                        </div>

                        <!-- New Password -->
                        <div>
                            <x-input-label for="password" value="{{ __('New Password') }}" class="text-sm font-medium text-gray-700" />
                            <x-text-input
                                id="password"
                                name="password"
                                type="password"
                                class="mt-1 block w-full text-sm border-gray-300 rounded-md shadow-sm focus:border-yellow-500 focus:ring-yellow-500"
                                placeholder="{{ __('New password') }}"
                                autocomplete="new-password"
                            />
                            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-1 text-xs" />
                        </div>

                        <!-- Confirm Password -->
                        <div>
                            <x-input-label for="password_confirmation" value="{{ __('Confirm Password') }}" class="text-sm font-medium text-gray-700" />
                            <x-text-input
                                id="password_confirmation"
                                name="password_confirmation"
                                type="password"
                                class="mt-1 block w-full text-sm border-gray-300 rounded-md shadow-sm focus:border-yellow-500 focus:ring-yellow-500"
                                placeholder="{{ __('Confirm new password') }}"
                                autocomplete="new-password"
                            />
                            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-1 text-xs" />
                        </div>

                        <!-- Actions -->
                        <div class="flex items-center gap-3">
                            <x-primary-button class="px-4 py-2 text-sm rounded-md shadow-sm bg-yellow-500 hover:bg-yellow-600">
                                🔑 {{ __('Update') }}
                            </x-primary-button>

                            @if (session('status') === 'password-updated')
                                <p
                                    x-data="{ show: true }"
                                    x-show="show"
                                    x-transition
                                    x-init="setTimeout(() => show = false, 3000)"
                                    class="text-xs text-green-600 font-medium"
                                >
                                    ✅ {{ __('Updated!') }}
                                </p>
                            @endif
                        </div>
                    </form>
                </div>
            </div>

            <!-- Delete User -->
            <div class="bg-white/90 backdrop-blur-sm shadow-md rounded-2xl p-6 border border-red-200 hover:shadow-lg transition duration-200">
                <div class="flex items-start justify-between">
                    <div>
                        <h3 class="text-xl font-semibold text-red-600 flex items-center gap-2 mb-2">
                            <span class="bg-red-100 p-1.5 rounded-full text-sm">❌</span>
                            {{ __('Delete Account') }}
                        </h3>
                        <p class="text-sm text-gray-500 mb-4 leading-snug">
                            {{ __('Permanently remove your account and all data.') }}
                        </p>
                    </div>
                    <div class="bg-red-100 text-red-800 px-2 py-0.5 rounded-full text-xs font-medium">
                        {{ __('Danger Zone') }}
                    </div>
                </div>

                <div class="max-w-lg">
                    <x-danger-button
                        x-data
                        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
                        class="px-4 py-2 text-sm rounded-md shadow-sm"
                    >
                        🗑️ {{ __('Delete Account') }}
                    </x-danger-button>

                    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
                        <form method="post" action="{{ route('profile.destroy') }}" class="p-4 sm:p-6 space-y-4">
                            @csrf
                            @method('delete')

                            <div>
                                <h2 class="text-lg font-bold text-gray-900 flex items-center gap-2">
                                    ⚠️ {{ __('Confirm Deletion') }}
                                </h2>

                                <p class="mt-2 text-sm text-gray-600">
                                    {{ __('This will permanently delete your account and all data.') }}
                                </p>
                            </div>

                            <!-- Password Input -->
                            <div>
                                <x-input-label for="password" value="{{ __('Password') }}" class="text-sm font-medium text-gray-700" />
                                <x-text-input
                                    id="password"
                                    name="password"
                                    type="password"
                                    class="mt-1 block w-full text-sm border-gray-300 rounded-md shadow-sm focus:border-red-500 focus:ring-red-500"
                                    placeholder="{{ __('Your password') }}"
                                />
                                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-1 text-xs" />
                            </div>

                            <!-- Buttons -->
                            <div class="flex justify-end space-x-2">
                                <x-secondary-button x-on:click="$dispatch('close')" class="px-4 py-2 text-sm rounded-md">
                                    {{ __('Cancel') }}
                                </x-secondary-button>

                                <x-danger-button class="px-4 py-2 text-sm rounded-md">
                                    {{ __('Delete Permanently') }}
                                </x-danger-button>
                            </div>
                        </form>
                    </x-modal>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
