<x-guest-layout>
    <section class="bg-white min-h-screen">
        <div class="flex items-center justify-center py-10 px-5 bg-white">
            <div class="w-full max-w-sm mt-[25%]">
                <div class="mb-8 flex flex-col gap-3">
                    <h2 class="text-3xl font-bold leading-tight text-black text-center">
                        Reset Your Password
                    </h2>
                    <p class="text-base leading-tight text-black text-center">
                        Enter the email address associated with your SkillConnect account
                    </p>
                </div>

                <x-validation-errors class="mb-4" />

                @if (session('status'))
                    <div class="mb-4 font-medium text-sm text-green-600">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('password.email') }}" class="mt-8">
                    @csrf
                    <div class="space-y-5">
                        <div>
                            <div class="mt-2.5">
                                <input
                                    type="email"
                                    name="email"
                                    id="email"
                                    :value="old('email')"
                                    placeholder="Email"
                                    required autofocus
                                    class="block w-full p-4 text-black placeholder-gray-500 transition-all duration-200 border border-gray-200 rounded-full bg-gray-50 focus:border-blue-600 caret-blue-600"
                                />
                            </div>
                        </div>

                        <div>
                            <button
                                type="submit"
                                class="inline-flex items-center justify-center w-full px-4 py-5 text-base font-semibold text-white transition-all duration-200 bg-blue-600 border border-transparent rounded-full focus:outline-none focus:bg-blue-700"
                            >
                                Confirm
                            </button>
                        </div>
                    </div>
                </form>

                <div class="text-base font-medium text-gray-600 flex gap-5 mt-5 text-center justify-center">
                    <span>Remember your password?</span>
                    <a
                        href="{{ route('login') }}"
                        title="Login"
                        class="text-blue-600 transition-all duration-200 focus:ring-blue-600 underline"
                    >
                        Login
                    </a>
                </div>
            </div>
        </div>
    </section>
</x-guest-layout>


{{--<x-guest-layout>--}}
{{--    --}}
{{--    --}}
{{--    <section class="bg-white min-h-screen">--}}
{{--        <div class="flex items-center justify-center py-10 px-5 bg-white">--}}
{{--            <div class="w-full max-w-sm mt-[25%]">--}}
{{--                <div class="mb-8 flex flex-col gap-3">--}}
{{--                    <h2 class="text-3xl font-bold leading-tight text-black text-center">--}}
{{--                        Reset Your Password--}}
{{--                    </h2>--}}
{{--                    <p class="text-base leading-tight text-black text-center">--}}
{{--                        Enter the email address associated with your SkillConnect account--}}
{{--                    </p>--}}
{{--                </div>--}}

{{--                <form method="POST" action="{{ route('password.email') }}" class="mt-8">--}}
{{--                    @csrf--}}
{{--                    <div class="space-y-5">--}}
{{--                        <div>--}}
{{--                            <div class="mt-2.5">--}}
{{--                                <input--}}
{{--                                    type="email"--}}
{{--                                    name="email"--}}
{{--                                    id="email"--}}
{{--                                    :value="old('email')"--}}
{{--                                    placeholder="Email"--}}
{{--                                    required autofocus--}}
{{--                                    class="block w-full p-4 text-black placeholder-gray-500 transition-all duration-200 border border-gray-200 rounded-full bg-gray-50 focus:border-blue-600 caret-blue-600"--}}
{{--                                />--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div>--}}
{{--                            <button--}}
{{--                                type="submit"--}}
{{--                                class="inline-flex items-center justify-center w-full px-4 py-5 text-base font-semibold text-white transition-all duration-200 bg-blue-600 border border-transparent rounded-full focus:outline-none focus:bg-blue-700"--}}
{{--                            >--}}
{{--                                Confirm--}}
{{--                            </button>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </form>--}}

{{--                <div class="text-base font-medium text-gray-600 flex gap-5 mt-5 text-center justify-center">--}}
{{--                    <span>Remember your password?</span>--}}
{{--                    <a--}}
{{--                        href="{{ route('login') }}"--}}
{{--                        title="Login"--}}
{{--                        class="text-blue-600 transition-all duration-200 focus:ring-blue-600 underline"--}}
{{--                    >--}}
{{--                        Login--}}
{{--                    </a>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}





{{--    <x-authentication-card>--}}
{{--        <x-slot name="logo">--}}
{{--            <x-authentication-card-logo />--}}
{{--        </x-slot>--}}

{{--        <div class="mb-4 text-sm text-gray-600">--}}
{{--            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}--}}
{{--        </div>--}}

{{--        @session('status')--}}
{{--            <div class="mb-4 font-medium text-sm text-green-600">--}}
{{--                {{ $value }}--}}
{{--            </div>--}}
{{--        @endsession--}}

{{--        <x-validation-errors class="mb-4" />--}}

{{--        <form method="POST" action="{{ route('password.email') }}">--}}
{{--            @csrf--}}

{{--            <div class="block">--}}
{{--                <x-label for="email" value="{{ __('Email') }}" />--}}
{{--                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />--}}
{{--            </div>--}}

{{--            <div class="flex items-center justify-end mt-4">--}}
{{--                <x-button>--}}
{{--                    {{ __('Email Password Reset Link') }}--}}
{{--                </x-button>--}}
{{--            </div>--}}
{{--        </form>--}}
{{--    </x-authentication-card>--}}
{{--</x-guest-layout>--}}
