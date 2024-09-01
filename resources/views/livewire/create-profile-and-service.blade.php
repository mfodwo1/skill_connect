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
                            @error('latitude') <span>Couldn't get location information </span> @enderror

                            <input type="hidden" id="longitude" wire:model="longitude">
                            @error('longitude') <span>Couldn't get location information</span> @enderror

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

                        <div class="mt-2.5">
                            <input
                                type="text"
                                id="serviceTitle"
                                wire:model="serviceTitle"
                                placeholder="Service Title"
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

