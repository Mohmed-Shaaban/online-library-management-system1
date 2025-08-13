<x-guest-layout>
    <div class="max-w-md mx-auto bg-white p-8 rounded-2xl shadow-xl border border-gray-100">
        <!-- Title -->
        <h2 class="text-3xl font-extrabold text-center mb-4 text-indigo-600">
            Verify Your Email
        </h2>
        <p class="mb-6 text-sm text-gray-500 text-center leading-relaxed">
            {{ __('Thanks for signing up! Before getting started, please verify your email address by clicking on the link we just sent you. If you didn\'t receive it, you can request another one below.') }}
        </p>

        <!-- Status Message -->
        @if (session('status') == 'verification-link-sent')
            <div class="mb-6 p-4 bg-green-100 text-green-700 rounded-lg text-sm shadow-sm border border-green-200">
                {{ __('A new verification link has been sent to the email address you provided during registration.') }}
            </div>
        @endif

        <!-- Actions -->
        <div class="mt-6 flex flex-col sm:flex-row items-center justify-between gap-4">
            <!-- Resend Verification -->
            <form method="POST" action="{{ route('verification.send') }}" class="w-full sm:w-auto">
                @csrf
                <x-primary-button class="w-full px-6 py-2 bg-indigo-600 hover:bg-indigo-700 rounded-lg shadow-md text-white transition duration-300">
                    {{ __('Resend Verification Email') }}
                </x-primary-button>
            </form>

            <!-- Logout -->
            <form method="POST" action="{{ route('logout') }}" class="w-full sm:w-auto">
                @csrf
                <button type="submit"
                    class="w-full underline text-sm text-gray-500 hover:text-indigo-600 transition-colors rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    {{ __('Log Out') }}
                </button>
            </form>
        </div>
    </div>
</x-guest-layout>
