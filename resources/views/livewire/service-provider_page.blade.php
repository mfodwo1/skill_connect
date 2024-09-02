<div>

    <style>
        .star {
            transition: transform 0.2s ease-in-out, fill 0.2s ease-in-out;
        }

        .star:hover {
            transform: scale(1.2) rotate(10deg);
        }

        .star:active {
            transform: scale(1.3) rotate(15deg);
        }
    </style>
    <section class="bg-[#ffffffe4] min-h-screen h-auto">
            <nav class="top-0 z-30 fixed w-full h-[70px]">
                <div class="bg-blue-500 w-full h-[70px] flex items-center">
                    <a href="{{ route('category.services', $service->category) }}"
                       wire:navigate.hover
                       class="ml-2">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="1.5"
                            stroke="currentColor"
                            class="size-7 text-white z-50"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18"
                            />
                        </svg>
                    </a>
                </div>
            </nav>


        <div class="w-full px-4 mx-auto">
            <div class="relative flex flex-col min-w-0 break-words bg-[#f8f8f8] w-full shadow-xl rounded-lg mt-[170px]">
                <div>
                    <div class="flex flex-wrap justify-center relative items-center">
                        <div class="w-full px-4 flex justify-center">
                            <div class="bg-black">
                                <img
                                    alt="Profile"
                                    src="{{ asset('storage/'.$service->provider->portfolio_url) }}"
                                    class="shadow-xl rounded-full w-52 h-52 align-middle border-none absolute left-[19%] -top-24"
                                >
                            </div>
                        </div>

                        <div class="w-full px-4 text-center mt-20">
                            <div class="flex justify-center py-4 lg:pt-4 pt-8">
                                <div class="mr-4 p-3 text-center flex flex-col items-center">
                                <span class="text-xl font-bold block uppercase tracking-wide text-gray-600">
                                    {{ $service->provider->rating_count }}
                                </span>
                                    <span class="text-sm text-black">
                                    Ratings
                                </span>
                                </div>
                                <div class="mr-4 p-3 text-center flex flex-col items-center">
                                <span class="text-xl font-bold block uppercase tracking-wide text-gray-600">
                                    {{ $totalTaskCompleted }}
                                </span>
                                    <span class="text-sm text-black">
                                    Tasks
                                </span>
                                </div>

                                <a href="{{ route('chat', $service->provider->id) }}" wire:navigate.hover class="mr-4 p-3 text-center flex flex-col items-center gap-1">
                                    <span class="text-xl font-bold block uppercase tracking-wide text-gray-600">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 text-black">
                                            <path d="M4.913 2.658c2.075-.27 4.19-.408 6.337-.408 2.147 0 4.262.139 6.337.408 1.922.25 3.291 1.861 3.405 3.727a4.403 4.403 0 0 0-1.032-.211 50.89 50.89 0 0 0-8.42 0c-2.358.196-4.04 2.19-4.04 4.434v4.286a4.47 4.47 0 0 0 2.433 3.984L7.28 21.53A.75.75 0 0 1 6 21v-4.03a48.527 48.527 0 0 1-1.087-.128C2.905 16.58 1.5 14.833 1.5 12.862V6.638c0-1.97 1.405-3.718 3.413-3.979Z" />
                                            <path d="M15.75 7.5c-1.376 0-2.739.057-4.086.169C10.124 7.797 9 9.103 9 10.609v4.285c0 1.507 1.128 2.814 2.67 2.94 1.243.102 2.5.157 3.768.165l2.782 2.781a.75.75 0 0 0 1.28-.53v-2.39l.33-.026c1.542-.125 2.67-1.433 2.67-2.94v-4.286c0-1.505-1.125-2.811-2.664-2.94A49.392 49.392 0 0 0 15.75 7.5Z" />
                                        </svg>
                                    </span>
                                        <span class="text-sm text-black">
                                        Chat
                                    </span>
                                </a>

                                <button wire:click="bookProvider"
                                        wire:click="delete"
                                        wire:confirm="Are you sure you want to book for this service"
                                        wire:loading.attr="disabled"
                                        wire:loading.class="opacity-50"
                                        class="mr-4 p-3 text-center flex flex-col items-center gap-1"
                                >
                                    <span class="text-xl font-bold block uppercase tracking-wide text-gray-600">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 text-black active:size-7">
                                            <path d="M12 11.993a.75.75 0 0 0-.75.75v.006c0 .414.336.75.75.75h.006a.75.75 0 0 0 .75-.75v-.006a.75.75 0 0 0-.75-.75H12ZM12 16.494a.75.75 0 0 0-.75.75v.005c0 .414.335.75.75.75h.005a.75.75 0 0 0 .75-.75v-.005a.75.75 0 0 0-.75-.75H12ZM8.999 17.244a.75.75 0 0 1 .75-.75h.006a.75.75 0 0 1 .75.75v.006a.75.75 0 0 1-.75.75h-.006a.75.75 0 0 1-.75-.75v-.006ZM7.499 16.494a.75.75 0 0 0-.75.75v.005c0 .414.336.75.75.75h.005a.75.75 0 0 0 .75-.75v-.005a.75.75 0 0 0-.75-.75H7.5ZM13.499 14.997a.75.75 0 0 1 .75-.75h.006a.75.75 0 0 1 .75.75v.005a.75.75 0 0 1-.75.75h-.006a.75.75 0 0 1-.75-.75v-.005ZM14.25 16.494a.75.75 0 0 0-.75.75v.006c0 .414.335.75.75.75h.005a.75.75 0 0 0 .75-.75v-.006a.75.75 0 0 0-.75-.75h-.005ZM15.75 14.995a.75.75 0 0 1 .75-.75h.005a.75.75 0 0 1 .75.75v.006a.75.75 0 0 1-.75.75H16.5a.75.75 0 0 1-.75-.75v-.006ZM13.498 12.743a.75.75 0 0 1 .75-.75h2.25a.75.75 0 1 1 0 1.5h-2.25a.75.75 0 0 1-.75-.75ZM6.748 14.993a.75.75 0 0 1 .75-.75h4.5a.75.75 0 0 1 0 1.5h-4.5a.75.75 0 0 1-.75-.75Z" />
                                            <path fill-rule="evenodd" d="M18 2.993a.75.75 0 0 0-1.5 0v1.5h-9V2.994a.75.75 0 1 0-1.5 0v1.497h-.752a3 3 0 0 0-3 3v11.252a3 3 0 0 0 3 3h13.5a3 3 0 0 0 3-3V7.492a3 3 0 0 0-3-3H18V2.993ZM3.748 18.743v-7.5a1.5 1.5 0 0 1 1.5-1.5h13.5a1.5 1.5 0 0 1 1.5 1.5v7.5a1.5 1.5 0 0 1-1.5 1.5h-13.5a1.5 1.5 0 0 1-1.5-1.5Z" clip-rule="evenodd"/>
                                        </svg>
                                    </span>
                                        <span class="text-sm text-black">
                                        {{__('Book')}}
                                    </span>
                                </button>

                            </div>
                        </div>

                        @if (session()->has('success'))
                            <div style="color: green;">
                                {{ session('success') }}
                            </div>
                        @endif

                        <div class="text-center">
                            <h3 class="text-xl font-semibold leading-normal text-gray-800 mb-2">
                                {{__('@')}}{{ $service->provider->user->name }}
                            </h3>
                            <div class="text-sm leading-normal mt-0 mb-2 text-black font-bold uppercase">
                                <i class="fas fa-map-marker-alt mr-2 text-lg text-black"></i>
                                {{ $service->provider->location }}
                            </div>
                            <div class="mb-2 text-gray-600 mt-7">
                                <h3 class="text-gray-700 underline decoration-2 text-lg font-bold p-1">
                                    SERVICE
                                </h3>
                                <i class="fas fa-briefcase mr-2 text-lg text-black"></i>
                                <span>
                                    {{ $service->title }}
                                </span>
                            </div>

                            <div class="mb-2 text-gray-600 mt-7">
                                <h3 class="text-gray-700 underline decoration-2 text-lg font-bold p-1">
                                    SERVICE DESCRIPTION
                                </h3>
                                <i class="fas fa-briefcase mr-2 text-lg text-black"></i>
                                <span>
                                    {{ $service->description }}
                                </span>
                            </div>
                            <div class="mb-2 text-gray-600 mt-7">
                                <h3 class="text-gray-700 underline decoration-2 text-lg font-bold p-1">
                                   PROVIDER BIO
                                </h3>
                                <i class="fas fa-briefcase mr-2 text-lg text-black"></i>
                                <span>
                                    {{ $service->provider->bio }}
                                </span>
                            </div>

                            <div class="mb-2 text-gray-600 mt-7">
                                <h3 class="text-gray-700 underline decoration-2 text-lg font-bold p-1">
                                   PROVIDER SKILLS
                                </h3>
                                <i class="fas fa-briefcase mr-2 text-lg text-black"></i>
                                <span>
                                    {{ $service->provider->skills }}
                                </span>
                            </div>
                        </div>
                        <!-- Rating and review component -->
                        <div class="bg-gray-200 py-2 flex flex-col justify-center sm:py-6 my-4 w-[90%]">
                            <div class="sm:mx-auto">
                                <div class="w-full flex-col rounded-xl shadow-lg">
                                    <div class="px-12 flex justify-center">
                                        <h2 class="text-gray-800 text-sm font-semibold">Your opinion matters to us!</h2>
                                    </div>

                                    @if (session()->has('message'))
                                        <div class="text-green-600 text-center">
                                            {{ session('message') }}
                                        </div>
                                    @endif

                                    <div class=" w-full flex flex-col items-center">
                                        <div class="flex flex-col items-center py-6 space-y-3">
                                            <!-- Rating Stars -->
                                            <div class="flex space-x-3">
                                                @for($i = 1; $i <= 5; $i++)
                                                    <svg wire:click="$set('rating', {{ $i }})"
                                                         wire:loading.attr="disabled"
                                                         wire:loading.class="opacity-50"
                                                         class="w-9 h-9 cursor-pointer star {{ $rating >= $i ? 'text-yellow-500' : 'text-gray-500' }}"
                                                         xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                                    </svg>
                                                @endfor
                                            </div>
                                        </div>
                                        <div class="w-[90%] sm:w-full flex flex-col">
                                            <textarea wire:model="review" rows="3" class="p-4 text-gray-500 rounded-xl resize-none" placeholder="Leave a message, if you want"></textarea>
                                            <button wire:click="submitReview" class="py-3 my-8 text-lg bg-gradient-to-r from-purple-500 to-indigo-600 rounded-xl text-white">Rate now</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End of rating and review component -->

                        <div class="flex flex-col gap-2 w-full">
                            @foreach($reviews as $review)
                                <span class="text-gray-800 h-14 px-2 mt-2 border-1 bg-[#ffff] border-gray-400 rounded-sm overflow-scroll">
                                    {{__('@')}}{{ $review->seeker->name }}
                                    <span class="text-gray-500 px-1">•</span>
                                    {{ $review->created_at->format('d M, Y') }}
                                    <br/>
                                    <p class="font-light text-gray-700 leading-tight">
                                        {{ $review->review }}
                                    </p>
                                </span>
                            @endforeach

                            <hr />
                            <span class="text-gray-800 h-14 px-2 mt-2 border-1 bg-[#ffff] border-gray-400 rounded-sm overflow-scroll">
                                @selase
                                <span class="text-gray-500 px-1">•</span>
                                Today, 12:30 PM
                                <br />
                                <p class="font-light text-gray-700 leading-tight">
                                    user review here
                                </p>
                            </span>
                            <hr />

                            <div class="text-center">
                                <div class="text-blue-500 underline">
                                    {{ $reviews->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>










