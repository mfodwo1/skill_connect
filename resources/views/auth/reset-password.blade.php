<x-guest-layout>
    <section class="bg-white min-h-screen">
        <div class="flex items-center justify-center py-10 px-5 bg-white">
            <div class="w-full max-w-sm mt-[25%]">
                <div class="mb-8 flex flex-col gap-3">
                    <h2 class="text-3xl font-bold leading-tight text-black text-center">
                        Reset Your Password
                    </h2>
                    <p class="text-base leading-tight text-black text-center">
                        Enter your new password below
                    </p>
                </div>

                <x-validation-errors class="mb-4" />

                <form method="POST" action="{{ route('password.update') }}" class="mt-8">
                    @csrf

                    <input type="hidden" name="token" value="{{ $request->route('token') }}">

                    <div class="space-y-5">
                        <div>
                            <div class="mt-2.5">
                                <x-label for="email" value="{{ __('Email') }}" class="sr-only" />
                                <x-input id="email"
                                     type="email" name="email"
                                     :value="old('email', $request->email)"
                                     required autofocus autocomplete="username"
                                     class="block w-full p-4 text-black placeholder-gray-500 transition-all duration-200 border border-gray-200 rounded-full bg-gray-50 focus:border-blue-600 caret-blue-600"
                                />

                            </div>
                        </div>

                        <div>
                            <div class="mt-2.5">
                                <input
                                    type="password"
                                    name="password"
                                    id="password"
                                    placeholder="New Password"
                                    required autofocus autocomplete="new-password"
                                    class="block w-full p-4 text-black placeholder-gray-500 transition-all duration-200 border border-gray-200 rounded-full bg-gray-50 focus:border-blue-600 caret-blue-600"
                                />
                            </div>
                        </div>

                        <div>
                            <div class="mt-2.5">
                                <input
                                    type="password"
                                    name="password_confirmation"
                                    id="password_confirmation"
                                    placeholder="Confirm New Password"
                                    required autofocus autocomplete="new-password"
                                    class="block w-full p-4 text-black placeholder-gray-500 transition-all duration-200 border border-gray-200 rounded-full bg-gray-50 focus:border-blue-600 caret-blue-600"
                                />
                            </div>
                        </div>

                        <div>
                            <button
                                type="submit"
                                class="inline-flex items-center justify-center w-full px-4 py-5 text-base font-semibold text-white transition-all duration-200 bg-blue-600 border border-transparent rounded-full focus:outline-none focus:bg-blue-700"
                            >
                                Reset Password
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</x-guest-layout>


{{--<x-guest-layout>--}}
{{--    <x-authentication-card>--}}
{{--        <x-slot name="logo">--}}
{{--            <x-authentication-card-logo />--}}
{{--        </x-slot>--}}

{{--        <x-validation-errors class="mb-4" />--}}

{{--        <form method="POST" action="{{ route('password.update') }}">--}}
{{--            @csrf--}}

{{--            <input type="hidden" name="token" value="{{ $request->route('token') }}">--}}

{{--            <div class="block">--}}
{{--                <x-label for="email" value="{{ __('Email') }}" />--}}
{{--                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" />--}}
{{--            </div>--}}

{{--            <div class="mt-4">--}}
{{--                <x-label for="password" value="{{ __('Password') }}" />--}}
{{--                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />--}}
{{--            </div>--}}

{{--            <div class="mt-4">--}}
{{--                <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />--}}
{{--                <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />--}}
{{--            </div>--}}

{{--            <div class="flex items-center justify-end mt-4">--}}
{{--                <x-button>--}}
{{--                    {{ __('Reset Password') }}--}}
{{--                </x-button>--}}
{{--            </div>--}}
{{--        </form>--}}
{{--    </x-authentication-card>--}}
{{--</x-guest-layout>--}}
