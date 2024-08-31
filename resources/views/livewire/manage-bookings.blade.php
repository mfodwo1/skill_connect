<div class="container">
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
                                            src="{{$booking->seeker->profile_photo_path ? asset($booking->seeker->profile_photo_path):asset('storage/images.jpg') }}"
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
                                                                ✅
                                                            @elseif($booking->status == 'pending')
                                                                ....
                                                            @elseif($booking->status == 'accepted')
                                                                uuu
                                                            @else
                                                                xxx
                                                            @endif
                                                        </span>
                                                    </span>
                                            <span class="text-gray-500 px-2">
                                              {{ $booking->booking_date }}
                                            </span>
                                        </p>
                                        <p class="text-xs font-medium text-gray-600 px-1">
                                                    <span class="font-mono font-bold pr-1 text-gray-700">
                                                        CUSTOMER
                                                    </span>
                                            <span class="text-gray-500 px-1">
                                                        •
                                                    </span>
                                            {{ $booking->seeker->name }}
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

    <!-- Jetstream Modal -->
    <!-- Jetstream Modal -->
    <x-dialog-modal wire:model.live="showModal">
        <x-slot name="title">
            {{ __('Booking Status') }}
        </x-slot>

        <x-slot name="content">
            @if($selectedBooking)
                <div href="#" title="" class="block w-[30%]">
                    <Image
                        width={400}
                        height={300}
                        class="object-cover w-full h-full"
                        src="{{ $selectedBooking->seeker->profile_photo_path ? asset($selectedBooking->seeker->profile_photo_path) : asset('storage/images.jpg') }}"
                        alt="Profile Image"
                    />
                </div>
                <h3 class="text-black text-base font-semibold py-1">
                    {{ $selectedBooking->service->title }}
                </h3>

                <p class="text-gray-700 leading-snug text-xs flex items-center">
                <span class="text-xs font-mono font-extrabold rounded-md bg-blue-200 px-1 flex items-center justify-center">
                    STATUS
                </span>
                    <span class="font-bold text-gray-500 px-1 flex gap-[2px] items-center">
                    {{ $selectedBooking->status }}
                    <span class="text-[8px]">
                        @if($selectedBooking->status == 'completed')
                            ✅
                        @elseif($selectedBooking->status == 'pending')
                            ....
                        @elseif($selectedBooking->status == 'accepted')
                            uuu
                        @else
                            xxx
                        @endif
                    </span>
                </span>
                    <span class="text-gray-500 px-2">
                    {{ $selectedBooking->booking_date }}
                </span>
                </p>
                <p class="text-xs font-medium text-gray-600 px-1">
                <span class="font-mono font-bold pr-1 text-gray-700">
                    CUSTOMER
                </span>
                    <span class="text-gray-500 px-1">
                    •
                </span>
                    {{ $selectedBooking->seeker->name }}
                </p>

                <div class="mt-4">
                    <select wire:model="status" class="form-control">
                        <option value="">Status</option>
                        <option value="completed">Completed</option>
                        <option value="pending">Pending</option>
                        <option value="accepted">Accept</option>
                        <option value="rejected">Reject</option>
                    </select>

                    <x-input-error for="status" class="mt-2" />
                </div>
            @endif
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="$set('showModal', false)" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-secondary-button>

            <x-button class="ms-3 bg-blue-500" wire:click="updateStatus" wire:loading.attr="disabled">
                {{ __('Update Status') }}
            </x-button>

            @if($selectedBooking)
                <a
                    href="{{ route('chat', $selectedBooking->seeker->id) }}"
                    wire:navigate.hover
                    wire:loading.attr="disabled"
                    wire:loading.class="opacity-50"
                    class="ms-3 bg-green-600 px-4 py-2 rounded text-white"
                >
                    {{ __('Chat') }}
                </a>
            @endif
        </x-slot>
    </x-dialog-modal>

</div>



{{--@if (session()->has('success'))--}}
{{--    <div class="alert alert-success">--}}
{{--        {{ session('success') }}--}}
{{--    </div>--}}
{{--@endif--}}

{{--@if (session()->has('error'))--}}
{{--    <div class="alert alert-danger">--}}
{{--        {{ session('error') }}--}}
{{--    </div>--}}
{{--@endif--}}
{{--<h2>Your Bookings</h2>--}}
{{--<table class="table">--}}
{{--    <thead>--}}
{{--    <tr>--}}
{{--        <th>Service</th>--}}
{{--        <th>Seeker</th>--}}
{{--        <th>Booking Date</th>--}}
{{--        <th>Status</th>--}}
{{--        <th>Action</th>--}}
{{--    </tr>--}}
{{--    </thead>--}}
{{--    <tbody>--}}
{{--    @foreach($bookings as $booking)--}}
{{--        <tr>--}}
{{--            <td>{{ $booking->service->title }}</td>--}}
{{--            <td>{{ $booking->seeker->name }}</td>--}}
{{--            <td>{{ $booking->booking_date }}</td>--}}
{{--            <td>{{ $booking->status }}</td>--}}
{{--            <td>--}}
{{--                <button wire:click="selectBooking({{ $booking->id }})" class="btn btn-primary">Update Status</button>--}}
{{--            </td>--}}
{{--        </tr>--}}
{{--    @endforeach--}}
{{--    </tbody>--}}
{{--</table>--}}
