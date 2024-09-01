<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
        </x-slot>

        <x-validation-errors class="mb-4" />

        <section class="bg-white h-screen">
            <div class="flex items-center justify-center py-10 bg-white">
                <div class="w-full px-4">
                    <h2 class="text-3xl font-bold leading-tight text-black text-center">
                        Create an Account
                    </h2>

                    <form method="POST" action="{{ route('register') }}" class="mt-8">
                        @csrf
                        <div class="space-y-5">
                            <div>
                                <div class="mt-2.5">
                                    <input
                                        type="text"
                                        name="name"
                                        id="name"
                                        placeholder="Username"
                                        required autofocus
                                        class="block w-full p-4 text-black placeholder-gray-500 transition-all duration-200 border border-gray-200 rounded-full bg-gray-50 outline-none focus:outline-none focus:border-blue-600 focus:bg-white caret-blue-600"
                                    />
                                </div>
                            </div>

                            <div>
                                <div class="mt-2.5">
                                    <select
                                        name="role"
                                        id="role"
                                        class="block w-full p-4 text-black transition-all duration-200 border border-gray-200 rounded-full bg-gray-50 outline-none focus:border-blue-600 focus:bg-white appearance-none"
                                        style="background-position: right 1rem center; background-size: 1.5rem; background-repeat: no-repeat; background-image: url('data:image/svg+xml,%3Csvg xmlns=%27http://www.w3.org/2000/svg%27 fill=%27none%27 viewBox=%270 0 24 24%27 stroke=%27currentColor%27%3E%3Cpath stroke-linecap=%27round%27 stroke-linejoin=%27round%27 stroke-width=%271.5%27 d=%27M19 9l-7 7-7-7%27 /%3E%3C/svg%3E');"
                                    >
                                        <option value="">Role</option>
                                        <option value="service_provider">Service Provider</option>
                                        <option value="service_seeker">Service Seeker</option>
                                    </select>
                                </div>
                            </div>

                            <div>
                                <div class="mt-2.5">
                                    <input
                                        type="email"
                                        name="email"
                                        id="email"
                                        placeholder="Email Address"
                                        required autofocus
                                        class="block w-full p-4 text-black placeholder-gray-500 transition-all duration-200 border border-gray-200 outline-none rounded-full bg-gray-50 focus:outline-none focus:border-blue-600 focus:bg-white caret-blue-600"
                                    />
                                </div>
                            </div>

                            <div>
                                <div class="mt-2.5">
                                    <input
                                        type="tel"
                                        name="phone"
                                        id="phone"
                                        placeholder="Phone number"
                                        required autofocus
                                        class="block w-full p-4 text-black placeholder-gray-500 transition-all duration-200 border border-gray-200 outline-none rounded-full bg-gray-50 focus:outline-none focus:border-blue-600 focus:bg-white caret-blue-600"
                                    />
                                </div>
                            </div>

                            <div>
                                <div class="mt-2.5">
                                    <input
                                        type="password"
                                        name="password"
                                        id="password"
                                        placeholder="Create password"
                                        required autofocus
                                        class="block w-full p-4 text-black placeholder-gray-500 transition-all duration-200 border border-gray-200 outline-none rounded-full bg-gray-50 focus:outline-none focus:border-blue-600 focus:bg-white caret-blue-600"
                                    />
                                </div>
                            </div>

                            <div>
                                <div class="mt-2.5">
                                    <input
                                        type="password"
                                        name="password_confirmation"
                                        id="password_confirmation"
                                        placeholder="Confirm password"
                                        required autofocus
                                        class="block w-full p-4 text-black placeholder-gray-500 transition-all duration-200 border border-gray-200 outline-none rounded-full bg-gray-50 focus:outline-none focus:border-blue-600 focus:bg-white caret-blue-600"
                                    />
                                </div>
                            </div>

                            <div>
                                <button
                                    type="submit"
                                    class="inline-flex items-center justify-center w-full px-4 py-4 text-base font-semibold text-white transition-all duration-200 bg-blue-600 border border-transparent rounded-full focus:outline-none focus:bg-blue-700"
                                >
                                    Sign Up
                                </button>
                            </div>
                        </div>
                    </form>

                    <p class="text-base font-medium text-gray-600 flex gap-5 mt-4 text-center justify-center">
                        <span>Already have an account?</span>
                        <a
                            href="{{route('login')}}"
                            title=""
                            class="text-blue-600 transition-all duration-200 focus:text-blue-700 underline"
                        >
                            Login
                        </a>
                    </p>
                </div>
            </div>
        </section>
    </x-authentication-card>

{{--    <section class="bg-white h-screen">--}}
{{--        <div class="flex items-center justify-center py-10 bg-white">--}}
{{--            <div class="w-full px-4">--}}
{{--                <h2 class="text-3xl font-bold leading-tight text-black text-center">--}}
{{--                    Create an Account--}}
{{--                </h2>--}}

{{--                <form method="POST" action="{{ route('register') }}" class="mt-8">--}}
{{--                    @csrf--}}
{{--                    <div class="space-y-5">--}}
{{--                        <div class="flex flex-col items-center">--}}
{{--                            <div class="relative w-28 h-28 mb-4">--}}
{{--                                <input--}}
{{--                                    type="file"--}}
{{--                                    name="profilePicture"--}}
{{--                                    id="profilePicture"--}}
{{--                                    class="absolute w-full h-full opacity-0 cursor-pointer"--}}
{{--                                    accept="image/*"--}}
{{--                                    onchange="previewAvatar(event)"--}}
{{--                                />--}}
{{--                                <div class="w-full h-full rounded-full overflow-hidden border-[5px] border-blue-400 flex items-center justify-center bg-gray-200 text-gray-400">--}}
{{--                                    <img--}}
{{--                                        id="avatarPreview"--}}
{{--                                        src=""--}}
{{--                                        alt="Avatar"--}}
{{--                                        class="hidden w-full h-full object-cover"--}}
{{--                                    />--}}
{{--                                    <svg--}}
{{--                                        id="defaultAvatarIcon"--}}
{{--                                        xmlns="http://www.w3.org/2000/svg"--}}
{{--                                        fill="none"--}}
{{--                                        viewBox="0 0 24 24"--}}
{{--                                        strokeWidth="1.5"--}}
{{--                                        stroke="currentColor"--}}
{{--                                        class="w-16 h-16 text-blue-300"--}}
{{--                                    >--}}
{{--                                        <path--}}
{{--                                            strokeLinecap="round"--}}
{{--                                            strokeLinejoin="round"--}}
{{--                                            d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z"--}}
{{--                                        />--}}
{{--                                    </svg>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div>--}}
{{--                            <div class="mt-2.5 w-">--}}
{{--                                <input--}}
{{--                                    type="text"--}}
{{--                                    name="username"--}}
{{--                                    id="username"--}}
{{--                                    placeholder="Username"--}}
{{--                                    required autofocus--}}
{{--                                    class="block w-full p-4 text-black placeholder-gray-500 transition-all duration-200 border border-gray-200 rounded-full bg-gray-50 outline-none focus:outline-none focus:border-blue-600 focus:bg-white caret-blue-600"--}}
{{--                                />--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div>--}}
{{--                            <div class="mt-2.5">--}}
{{--                                <select--}}
{{--                                    name="role"--}}
{{--                                    id="role"--}}
{{--                                    class="block w-full p-4 text-black transition-all duration-200 border border-gray-200 rounded-full bg-gray-50 outline-none focus:border-blue-600 focus:bg-white appearance-none"--}}
{{--                                    style="background-position: right 1rem center; background-size: 1.5rem; background-repeat: no-repeat; background-image: url('data:image/svg+xml,%3Csvg xmlns=%27http://www.w3.org/2000/svg%27 fill=%27none%27 viewBox=%270 0 24 24%27 stroke=%27currentColor%27%3E%3Cpath stroke-linecap=%27round%27 stroke-linejoin=%27round%27 stroke-width=%271.5%27 d=%27M19 9l-7 7-7-7%27 /%3E%3C/svg%3E');"--}}
{{--                                >--}}
{{--                                    <option value="">Role</option>--}}
{{--                                    <option value="service_provider">Service Provider</option>--}}
{{--                                    <option value="service_seeker">Service Seeker</option>--}}
{{--                                </select>--}}
{{--                            </div>--}}
{{--                        </div>--}}


{{--                        <div>--}}
{{--                            <div class="mt-2.5">--}}
{{--                                <input--}}
{{--                                    type="text"--}}
{{--                                    name="location"--}}
{{--                                    id="location"--}}
{{--                                    placeholder="Location"--}}
{{--                                    required autofocus--}}
{{--                                    class="block w-full p-4 text-black placeholder-gray-500 transition-all duration-200 border border-gray-200 outline-none rounded-full bg-gray-50 focus:outline-none focus:border-blue-600 focus:bg-white caret-blue-600"--}}
{{--                                />--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div>--}}
{{--                            <div class="mt-2.5">--}}
{{--                                <input--}}
{{--                                    type="tel"--}}
{{--                                    name="phone"--}}
{{--                                    id="phone"--}}
{{--                                    placeholder="Phone number"--}}
{{--                                    required autofocus--}}
{{--                                    class="block w-full p-4 text-black placeholder-gray-500 transition-all duration-200 border border-gray-200 outline-none rounded-full bg-gray-50 focus:outline-none focus:border-blue-600 focus:bg-white caret-blue-600"--}}
{{--                                />--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div>--}}
{{--                            <div class="mt-2.5">--}}
{{--                                <input--}}
{{--                                    type="password"--}}
{{--                                    name="password"--}}
{{--                                    id="password"--}}
{{--                                    placeholder="Create password"--}}
{{--                                    required autofocus--}}
{{--                                    class="block w-full p-4 text-black placeholder-gray-500 transition-all duration-200 border border-gray-200 outline-none rounded-full bg-gray-50 focus:outline-none focus:border-blue-600 focus:bg-white caret-blue-600"--}}
{{--                                />--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div>--}}
{{--                            <div class="mt-2.5">--}}
{{--                                <input--}}
{{--                                    type="password"--}}
{{--                                    name="password_confirmation"--}}
{{--                                    id="password_confirmation"--}}
{{--                                    placeholder="Confirm password"--}}
{{--                                    required autofocus--}}
{{--                                    class="block w-full p-4 text-black placeholder-gray-500 transition-all duration-200 border border-gray-200 outline-none rounded-full bg-gray-50 focus:outline-none focus:border-blue-600 focus:bg-white caret-blue-600"--}}
{{--                                />--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div>--}}
{{--                            <button--}}
{{--                                type="submit"--}}
{{--                                class="inline-flex items-center justify-center w-full px-4 py-4 text-base font-semibold text-white transition-all duration-200 bg-blue-600 border border-transparent rounded-full focus:outline-none focus:bg-blue-700"--}}
{{--                            >--}}
{{--                                Sign Up--}}
{{--                            </button>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </form>--}}

{{--                <p class="text-base font-medium text-gray-600 flex gap-5 mt-4 text-center justify-center">--}}
{{--                    <span>Already have an account?</span>--}}
{{--                    <a--}}
{{--                        href="{{route('login')}}"--}}
{{--                        title=""--}}
{{--                        class="text-blue-600 transition-all duration-200 focus:text-blue-700 underline"--}}
{{--                    >--}}
{{--                        Login--}}
{{--                    </a>--}}
{{--                </p>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}

{{--    <x-authentication-card>--}}
{{--        <x-slot name="logo">--}}
{{--            <x-authentication-card-logo />--}}
{{--        </x-slot>--}}

{{--        <x-validation-errors class="mb-4" />--}}

{{--        <form method="POST" action="{{ route('register') }}">--}}
{{--            @csrf--}}

{{--            <div>--}}
{{--                <x-label for="name" value="{{ __('Name') }}" />--}}
{{--                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />--}}
{{--            </div>--}}

{{--            <div class="mt-4">--}}
{{--                <x-label for="email" value="{{ __('Email') }}" />--}}
{{--                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />--}}
{{--            </div>--}}

{{--            <div class="mt-4">--}}
{{--                <x-label for="role" value="{{ __('Role') }}" />--}}
{{--                <select id="role" name="role" class="block mt-1 w-full" required>--}}
{{--                    <option value="service_provider">Service Provider</option>--}}
{{--                    <option value="service_seeker">Service Seeker</option>--}}
{{--                </select>--}}
{{--            </div>--}}

{{--            <div class="mt-4">--}}
{{--                <x-label for="password" value="{{ __('Password') }}" />--}}
{{--                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />--}}
{{--            </div>--}}

{{--            <div class="mt-4">--}}
{{--                <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />--}}
{{--                <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />--}}
{{--            </div>--}}


{{--            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())--}}
{{--                <div class="mt-4">--}}
{{--                    <x-label for="terms">--}}
{{--                        <div class="flex items-center">--}}
{{--                            <x-checkbox name="terms" id="terms" required />--}}

{{--                            <div class="ms-2">--}}
{{--                                {!! __('I agree to the :terms_of_service and :privacy_policy', [--}}
{{--                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Terms of Service').'</a>',--}}
{{--                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Privacy Policy').'</a>',--}}
{{--                                ]) !!}--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </x-label>--}}
{{--                </div>--}}
{{--            @endif--}}

{{--            <div class="flex items-center justify-end mt-4">--}}
{{--                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">--}}
{{--                    {{ __('Already registered?') }}--}}
{{--                </a>--}}

{{--                <x-button class="ms-4">--}}
{{--                    {{ __('Register') }}--}}
{{--                </x-button>--}}
{{--            </div>--}}
{{--        </form>--}}
{{--    </x-authentication-card>--}}


    <!-- JavaScript for avatar preview -->
    <script>
        function previewAvatar(event) {
            const input = event.target;
            const reader = new FileReader();
            const avatarPreview = document.getElementById('avatarPreview');
            const defaultAvatarIcon = document.getElementById('defaultAvatarIcon');

            reader.onload = function () {
                avatarPreview.src = reader.result;
                avatarPreview.classList.remove('hidden');
                defaultAvatarIcon.classList.add('hidden');
            };

            if (input.files && input.files[0]) {
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>

</x-guest-layout>
