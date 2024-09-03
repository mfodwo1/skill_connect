<div>
    @if(Auth::user()->role === 'service_seeker')
        <section class="bg-gray-50 min-h-screen h-auto">
            <div class="sm:px-6 max-w-7xl px-2 pb-5">
                <h2 class="text-3xl text-black font-black py-3 sticky top-0 bg-white z-10">
                    Services
                </h2>
                <div class="grid max-w-md grid-cols-1 gap-6 px-4 mb-14">

                    @foreach ($categories as $category)
                        <div class="overflow-hidden bg-white rounded shadow">
                            <div class="relative h-[320px] bg-white shadow-lg rounded-md overflow-hidden">
                                <a href="{{ route('category.services', ['categoryId' => $category->id]) }}" title="" class="block h-[75%]">
                                    <Image
                                        width={400}
                                        height={300}
                                        class="object-cover w-full h-full"
                                        src="{{asset('storage/'.$category->cover_image)}}"
                                        alt="Carpentry Image"
                                    />
                                </a>
                                <div class="absolute top-4 left-4">
                            <span class="px-4 py-1.5 text-xs font-semibold tracking-widest text-gray-900 uppercase bg-white rounded-full shadow-sm">
                                {{ $category->name }}
                            </span>
                                </div>
                                <div class="px-2">
                                    <p class="text-sm font-medium text-gray-600 my-3">
                                        {{ $category->description }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </section>
    @elseif(Auth::user()->role === 'service_provider' && $profileId)
        <div>
            <div class="bg-white min-h-screen h-auto">
                <div class="container mx-auto pb-3 h-full">
                    <div class="flex justify-center items-center h-full">
                        <div class="w-full max-w-lg">
                            <div class="bg-white shadow-sm rounded-lg overflow-hidden">
                                <div class="bg-blue-300 h-[220px] flex items-end p-4">
                                    <div class="flex-shrink-0">
                                        <Image
                                            class="rounded-full w-36 h-36 border-4 border-green-500 -mt-16 object-cover"
                                            src="{{ asset('storage/'.$portfolio_url) }}"
                                            alt="profile photo"
                                            width={144}
                                            height={144}
                                        />
                                        <button wire:click="editProfile({{ $profileId }})"  class="mt-4 bg-[#ffffff7e] text-gray-600 font-bold py-2 px-4 rounded-lg">
                                            Edit Profile
                                        </button>
                                    </div>
                                    <div class="ml-4">
                                        <h5 class="text-gray-900 text-2xl flex items-center capitalize">
                                            {{$username}}
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 ml-2 text-green-600">
                                                <path fill-rule="evenodd" d="M8.603 3.799A4.49 4.49 0 0 1 12 2.25c1.357 0 2.573.6 3.397 1.549a4.49 4.49 0 0 1 3.498 1.307 4.491 4.491 0 0 1 1.307 3.497A4.49 4.49 0 0 1 21.75 12a4.49 4.49 0 0 1-1.549 3.397 4.491 4.491 0 0 1-1.307 3.497 4.491 4.491 0 0 1-3.497 1.307A4.49 4.49 0 0 1 12 21.75a4.49 4.49 0 0 1-3.397-1.549 4.49 4.49 0 0 1-3.498-1.306 4.491 4.491 0 0 1-1.307-3.498A4.49 4.49 0 0 1 2.25 12c0-1.357.6-2.573 1.549-3.397a4.49 4.49 0 0 1 1.307-3.497 4.49 4.49 0 0 1 3.497-1.307Zm7.007 6.387a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z" clip-rule="evenodd" />
                                            </svg>
                                        </h5>

                                        <p class="text-gray-900 capitalize">
                                            {{$location}}
                                        </p>
                                    </div>
                                </div>
                                <div class="bg-gray-100 p-4">
                                    <div class="flex justify-end text-center gap-4">
                                        <div>
                                            <p class="text-xl font-bold text-gray-500 pl-2">
                                                @if($availability)
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 text-green-600">
                                                        <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25Zm0 8.625a1.125 1.125 0 1 0 0 2.25 1.125 1.125 0 0 0 0-2.25ZM15.375 12a1.125 1.125 0 1 1 2.25 0 1.125 1.125 0 0 1-2.25 0ZM7.5 10.875a1.125 1.125 0 1 0 0 2.25 1.125 1.125 0 0 0 0-2.25Z" clip-rule="evenodd" />
                                                    </svg>
                                                @else
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 text-red-600">
                                                        <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25Zm-1.72 6.97a.75.75 0 1 0-1.06 1.06L10.94 12l-1.72 1.72a.75.75 0 1 0 1.06 1.06L12 13.06l1.72 1.72a.75.75 0 1 0 1.06-1.06L13.06 12l1.72-1.72a.75.75 0 1 0-1.06-1.06L12 10.94l-1.72-1.72Z" clip-rule="evenodd" />
                                                    </svg>
                                                @endif
                                            </p>
                                            <p class="text-gray-500">
                                                Status
                                            </p>
                                        </div>
                                        <div>
                                            <p class="text-xl font-bold text-gray-500">
                                                {{--     253--}}
                                                {{ $total_ratings_count }}
                                            </p>
                                            <p class="text-gray-500">
                                                @if($total_ratings_count ==1)
                                                    Rating
                                                @else
                                                    Ratings
                                                @endif

                                            </p>
                                        </div>

                                        <div>
                                            <p class="text-xl font-bold text-gray-500">
                                                {{$total_provider_bookings_count}}
                                            </p>
                                            <p class="text-gray-500">
                                                Jobs
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="p-4">
                                    <div class="mb-5">
                                        <p class="text-lg font-semibold text-black">
                                            About
                                        </p>
                                        <div class="bg-gray-100 p-4">
                                            <p class="italic text-gray-700">
                                                {{ $bio }}
                                            </p>

                                        </div>

                                    </div>
                                    <div class="mb-5">
                                        <p class="text-lg font-semibold text-black">
                                            SKILLS
                                        </p>
                                        <div class="bg-gray-100 p-4">
                                            <p class="italic text-gray-700">
                                                {{ $skills }}
                                            </p>

                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Jetstream Modal for booking management  -->
            <x-dialog-modal wire:model.live="showModal">
                <x-slot name="title">
                    {{ __('Profile Update') }}
                </x-slot>

                <x-slot name="content">

                    <section class="bg-white">
                        <div class="flex items-center justify-center py-4 bg-white">
                            <div class="w-full px-4">
                                <h2 class="text-3xl font-bold leading-tight text-black text-center">
                                    Update Profile
                                </h2>

                                {{--                        <form wire:submit.prevent="store" class="mt-8">--}}
                                <div class="space-y-5">
                                    <div class="flex flex-col items-center">
                                        <div class="relative w-28 h-28 mb-4">
                                            <input
                                                wire:model="new_portfolio_url"
                                                type="file"
                                                name="profilePicture"
                                                id="profilePicture"
                                                class="absolute w-full h-full opacity-0 cursor-pointer"
                                            />
                                            <div class="w-full h-full rounded-full overflow-hidden border-[5px] border-blue-400 flex items-center justify-center bg-gray-200 text-gray-400">
                                                @if($portfolio_url)
                                                    <img src="{{'storage/'.$portfolio_url}}" alt="">
                                                @else
                                                    <svg
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        fill="none"
                                                        viewBox="0 0 24 24"
                                                        strokeWidth="1.5"
                                                        stroke="currentColor"
                                                        class="w-16 h-16 text-blue-300"
                                                    >
                                                        <path
                                                            strokeLinecap="round"
                                                            strokeLinejoin="round"
                                                            d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z"
                                                        />
                                                    </svg>
                                                @endif
                                            </div>
                                            @error('portfolio_url') <span class="error">{{ $message }}</span> @enderror
                                        </div>
                                    </div>

                                    <div>
                                        <div class="mt-2.5 w-">
                                            <input
                                                id="bio"
                                                wire:model="bio"
                                                type="text"
                                                class="block w-full p-5 text-black placeholder-gray-500 transition-all duration-200 border border-gray-200 rounded-full bg-gray-50 focus:outline-none focus:border-blue-600 focus:bg-white caret-blue-600"
                                            />
                                            @error('bio') <span class="error">{{ $message }}</span> @enderror
                                        </div>
                                    </div>

                                    <div>
                                        <div class="mt-2.5">
                                            <input
                                                type="text"
                                                wire:model="skills"
                                                class="block w-full p-5 text-black placeholder-gray-500 transition-all duration-200 border border-gray-200 rounded-full bg-gray-50 focus:outline-none focus:border-blue-600 focus:bg-white caret-blue-600"
                                            />
                                            @error('skills') <span class="error">{{ $message }}</span> @enderror
                                        </div>
                                    </div>

                                    <div>
                                        <div class="mt-2.5">
                                            <select
                                                wire:model="availability"
                                                class="block w-full p-5 text-black transition-all duration-200 border border-gray-200 rounded-full bg-gray-50 focus:border-blue-600 focus:bg-white"
                                            >
                                                <option value=1>Available</option>
                                                <option value="0">Not Available</option>
                                            </select>
                                            @error('availability') <span class="error">{{ $message }}</span> @enderror
                                        </div>
                                    </div>

                                    <input type="hidden" id="latitude" name="latitude" wire:model="latitude" readonly>
                                    @error('latitude') <span class="error">{{ $message }}</span> @enderror

                                    <input type="hidden" id="longitude" name="longitude" wire:model="longitude" readonly>
                                    @error('longitude') <span class="error">{{ $message }}</span> @enderror

                                </div>
                                {{--                        </form>--}}

                            </div>
                        </div>
                    </section>

                </x-slot>

                <x-slot name="footer">
                    <x-secondary-button wire:click="$set('showModal', false)" wire:loading.attr="disabled">
                        {{ __('Cancel') }}
                    </x-secondary-button>

                    <button class="ms-3 bg-blue-500 text-white px-4 py-2 rounded" wire:click="store" wire:loading.attr="disabled">
                        {{ __('Update Profile') }}
                    </button>
                </x-slot>
            </x-dialog-modal>





            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    if (navigator.geolocation) {
                        navigator.geolocation.getCurrentPosition(function (position) {
                            @this.set('latitude', position.coords.latitude);
                            @this.set('longitude', position.coords.longitude);
                        }, function (error) {
                            console.log(error);
                        });
                    }
                });
            </script>
        </div>
    @else
        <div>
            <section class="bg-white">
                <div class="flex items-center justify-center py-4 bg-white">
                    <div class="w-full px-4">
                        <h2 class="text-3xl font-bold leading-tight text-black text-center">
                            Account Setup
                        </h2>

                        @if (session()->has('message'))
                            <div>
                                {{ session('message') }}
                            </div>
                        @endif
                        @if (session()->has('error'))
                            <div>
                                {{ session('error') }}
                            </div>
                        @endif

                        <div x-data="{ step: 1 }">
                            <form wire:submit.prevent="createProfileAndService" method="post">

                                <!-- Step 1: Profile Information -->
                                <div x-show="step === 1">
                                    @csrf
                                    <h3 class="text-center py-4">Create Profile</h3>
                                    <div class="flex flex-col items-center">
                                        <div class="relative w-28 h-28 mb-4">
                                            <input
                                                wire:model="portfolio_url"
                                                type="file"
                                                name="profilePicture"
                                                id="profilePicture"
                                                class="absolute w-full h-full opacity-0 cursor-pointer"
                                            />
                                            <div class="w-full h-full rounded-full overflow-hidden border-[5px] border-blue-400 flex items-center justify-center bg-gray-200 text-gray-400">
                                                @if ($portfolio_url)
                                                    <img src="{{ $portfolio_url->temporaryUrl() }}">
                                                @else
                                                    <svg
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        fill="none"
                                                        viewBox="0 0 24 24"
                                                        strokeWidth="1.5"
                                                        stroke="currentColor"
                                                        class="w-16 h-16 text-blue-300"
                                                    >
                                                        <path
                                                            strokeLinecap="round"
                                                            strokeLinejoin="round"
                                                            d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z"
                                                        />
                                                    </svg>
                                                @endif

                                            </div>
                                            @error('portfolio_url') <span class="error">{{ $message }}</span> @enderror
                                        </div>
                                    </div>

                                    <div class="mt-2.5">
                                <textarea
                                    id="bio"
                                    wire:model="bio"
                                    placeholder="Bio"
                                    rows="2"
                                    class="block w-full p-5 text-black placeholder-gray-500 transition-all duration-200 border border-gray-200 rounded-full bg-gray-50 focus:outline-none focus:border-blue-600 focus:bg-white caret-blue-600"
                                ></textarea>
                                    </div>
                                    @error('bio') <span>{{ $message }}</span> @enderror

                                    <div class="mt-2.5">
                                <textarea
                                    id="skills"
                                    wire:model="skills"
                                    placeholder="Skills"
                                    rows="3"
                                    class="block w-full p-5 text-black placeholder-gray-500 transition-all duration-200 border border-gray-200 rounded-full bg-gray-50 focus:outline-none focus:border-blue-600 focus:bg-white caret-blue-600"
                                ></textarea>
                                        @error('skills') <span>{{ $message }}</span> @enderror
                                    </div>

                                    <div class="mt-2.5">
                                        <input
                                            type="text"
                                            id="location"
                                            wire:model="location"
                                            placeholder="Location"
                                            class="block w-full p-5 text-black placeholder-gray-500 transition-all duration-200 border border-gray-200 rounded-full bg-gray-50 focus:outline-none focus:border-blue-600 focus:bg-white caret-blue-600"
                                        >
                                        @error('location') <span>{{ $message }}</span> @enderror
                                    </div>

                                    <div class="my-4">
                                        <label for="availability" class="pr-3">Availability Status</label>
                                        <input
                                            type="checkbox"
                                            id="availability"
                                            wire:model="availability"
                                            placeholder="Availability"
                                        >
                                        @error('availability') <span>{{ $message }}</span> @enderror
                                    </div>

                                    <input type="hidden" id="latitude" wire:model="latitude">
                                    @error('latitude') <span class="text-red-600">Location information not found. Refresh Page </span><br> @enderror

                                    <input type="hidden" id="longitude" wire:model="longitude">

                                    <div class="flex w-full">
                                        <button
                                            type="button"
                                            @click="step = 2"
                                            class="bg-blue-500 px-4 py-2 rounded-full mx-auto text-white"
                                            wire:loading.attr="disabled"
                                            wire:loading.class="opacity-50"
                                        >
                                            Next
                                        </button>
                                    </div>
                                </div>

                                <!-- Step 2: Service Information -->
                                <div x-show="step === 2">
                                    <h3 class="text-center py-4">Create Service</h3>

                                    <div  class="mt-2.5">
                                        <select
                                            id="serviceCategory"
                                            wire:model="serviceCategory"
                                            class="block w-full p-5 text-black placeholder-gray-500 transition-all duration-200 border border-gray-200 rounded-full bg-gray-50 focus:outline-none focus:border-blue-600 focus:bg-white caret-blue-600"
                                        >
                                            <option value="">Select a category</option>
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('serviceCategory') <span>{{ $message }}</span> @enderror
                                    </div>

                                    <div class="mt-2.5">
                                        <input
                                            type="text"
                                            id="serviceTitle"
                                            wire:model="serviceTitle"
                                            placeholder="Business Name (service Title)"
                                            class="block w-full p-5 text-black placeholder-gray-500 transition-all duration-200 border border-gray-200 rounded-full bg-gray-50 focus:outline-none focus:border-blue-600 focus:bg-white caret-blue-600"
                                        >
                                        @error('serviceTitle') <span>{{ $message }}</span> @enderror
                                    </div>

                                    <div class="mt-2.5">
                                        <input
                                            type="text"
                                            id="serviceDescription"
                                            wire:model="serviceDescription"
                                            placeholder="Service Description"
                                            class="block w-full p-5 text-black placeholder-gray-500 transition-all duration-200 border border-gray-200 rounded-full bg-gray-50 focus:outline-none focus:border-blue-600 focus:bg-white caret-blue-600"
                                        >
                                        @error('serviceDescription') <span>{{ $message }}</span> @enderror
                                    </div>

                                    <div class="mt-2.5">
                                        <input
                                            type="text"
                                            id="servicePrice"
                                            wire:model="servicePrice"
                                            placeholder="Service Price"
                                            class="block w-full p-5 text-black placeholder-gray-500 transition-all duration-200 border border-gray-200 rounded-full bg-gray-50 focus:outline-none focus:border-blue-600 focus:bg-white caret-blue-600"
                                        >
                                        @error('servicePrice') <span>{{ $message }}</span> @enderror
                                    </div>

                                    @error('latitude') <span class="text-red-600">Location information not found. Refresh Page </span><br> @enderror


                                    <div class="flex justify-between px-4 py-6">
                                        <button
                                            class="bg-teal-700 px-4 py-2 rounded-full text-white"
                                            type="button"
                                            @click="step = 1"
                                            wire:loading.attr="disabled"
                                            wire:loading.class="opacity-50"
                                        >
                                            Previous
                                        </button>
                                        <button
                                            type="submit"
                                            class="bg-blue-500 px-4 py-2 rounded-full text-white"
                                            wire:loading.attr="disabled"
                                            wire:loading.class="opacity-50"
                                        >
                                            Submit
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>

            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    if (navigator.geolocation) {
                        navigator.geolocation.getCurrentPosition(function (position) {
                            @this.set('latitude', position.coords.latitude);
                            @this.set('longitude', position.coords.longitude);
                        }, function (error) {
                            console.log(error);
                        });
                    }
                });
            </script>
        </div>

    @endif
</div>
