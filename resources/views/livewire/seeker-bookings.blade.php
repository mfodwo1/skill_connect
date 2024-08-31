<div>
    <section class="bg-gray-50 min-h-screen h-auto">
        <div class="sm:px-6 max-w-7xl px-2 pb-5">
            <!-- Sticky Heading Container -->
            <div class="sticky top-0 bg-white z-10">
                <div class="flex items-center py-2 gap-2 h-[75px]">
                    <div class="flex items-center">
                        <div class="relative w-14 h-14">
                            <Image
                                src="{{ asset('storage/'.Auth::user()->profile->portfolio_url) }}"
                                alt="Profile Image"
                                class="rounded-full"
                                layout="fill"
                            />
                        </div>
                    </div>
                    <div class="flex items-center gap-2 w-[90%]">
                        <input
                            type="search"
                            placeholder="Search"
                            class="px-4 py-1 border-[1px] border-gray-300 rounded-full h-[50px] w-full text-gray-900 focus:outline-none focus:ring-2 focus:ring-blue-400"
                        />
                    </div>
                </div>
                <h2 class="text-xl text-black font-black pb-3">
                    Recent Bookings
                </h2>
            </div>

            <!-- Booking List -->
            <div class="grid max-w-md grid-cols-1 gap-6 px-3">
                <!-- Example Booking Item -->
                <div class="overflow-hidden bg-white rounded shadow flex flex-col gap-2">
                    @foreach($bookings as $booking)
                        <div wire:key="{{ $booking->id }}">
                            <button wire:click="selectBooking({{ $booking->id }})" class="btn btn-primary">
                                <div class="h-[100px] bg-white shadow-lg rounded-md overflow-hidden flex w-full">
                                    <a href="#" title="" class="block w-[30%]">
                                        <Image
                                            width={400}
                                            height={300}
                                            class="object-cover w-full h-full"
                                            src="{{$booking->provider->portfolio_url ? asset('storage/'.$booking->provider->portfolio_url):asset('storage/images.jpg') }}"
                                            alt="Carpentry Image"
                                        />
                                    </a>

                                    <div class="px-2 w-[70%] h-full">
                                        <h3 class="text-black text-base font-semibold py-1">
                                            {{ $booking->service->title }}
                                        </h3>
                                        <hr class="py-1" />
                                        <p class="text-gray-700 leading-snug text-xs flex items-center">
                                                    <span class="text-xs font-mono font-extrabold rounded-md bg-blue-200 px-1 flex items-center justify-center">
                                                        STATUS
                                                    </span>
                                            <span class="font-bold text-gray-500 px-1 flex gap-[2px] items-center">
                                                        {{ $booking->status }}
                                                        <span class="text-[8px]">
                                                            @if($booking->status == 'completed')
                                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-9 text-green-600">
                                                                  <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                                                </svg>

                                                            @elseif($booking->status == 'pending')
                                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-9 text-orange-400">
                                                                  <path stroke-linecap="round" stroke-linejoin="round" d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 5.25h.008v.008H12v-.008Z" />
                                                                </svg>

                                                            @elseif($booking->status == 'accepted')
                                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-9 text-blue-600">
                                                                  <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                                                </svg>


                                                            @else
                                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-9 text-red-600">
                                                                  <path stroke-linecap="round" stroke-linejoin="round" d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                                                </svg>
                                                                xxx
                                                            @endif
                                                        </span>
                                                    </span>
                                            <span class="text-gray-500 px-2">
                                              {{ \Carbon\Carbon::parse($booking->booking_date)->format('Y-m-d') }}
                                            </span>
                                        </p>
                                        <p class="text-xs font-medium text-gray-600 px-1">
                                                    <span class="font-mono font-bold pr-1 text-gray-700">
                                                        CUSTOMER
                                                    </span>
                                            <span class="text-gray-500 px-1">
                                                        •
                                                    </span>
                                            {{ $booking->provider->name }}
                                        </p>
                                    </div>
                                </div>
                            </button>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>







{{--    <div class="container">--}}
{{--        <h2>Your Bookings</h2>--}}
{{--        <table class="table">--}}
{{--            <thead>--}}
{{--            <tr>--}}
{{--                <th>Service</th>--}}
{{--                <th>Provider</th>--}}
{{--                <th>Booking Date</th>--}}
{{--                <th>Status</th>--}}
{{--            </tr>--}}
{{--            </thead>--}}
{{--            <tbody>--}}
{{--            @foreach($bookings as $booking)--}}
{{--                <tr>--}}
{{--                    <td>{{ $booking->service->title }}</td>--}}
{{--                    <td>{{ $booking->provider->name }}</td>--}}
{{--                    <td>{{ $booking->booking_date }}</td>--}}
{{--                    <td>{{ ucfirst($booking->status) }}</td>--}}
{{--                </tr>--}}
{{--            @endforeach--}}
{{--            </tbody>--}}
{{--        </table>--}}
{{--    </div>--}}
</div>
