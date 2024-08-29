<div class="container">
    <h2>Your Bookings</h2>

    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session()->has('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <table class="table">
        <thead>
        <tr>
            <th>Service</th>
            <th>Seeker</th>
            <th>Booking Date</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($bookings as $booking)
            <tr>
                <td>{{ $booking->service->title }}</td>
                <td>{{ $booking->seeker->name }}</td>
                <td>{{ $booking->booking_date }}</td>
                <td>{{ $booking->status }}</td>
                <td>
                    <button wire:click="selectBooking({{ $booking->id }})" class="btn btn-primary">Update Status</button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <!-- Jetstream Modal -->
    <x-dialog-modal wire:model.live="showModal">
        <x-slot name="title">
            {{ __('Booking Status') }}
        </x-slot>

        <x-slot name="content">
            {{ __('Are you sure you want to change the booking status? ') }}

            <div class="mt-4">
                <select wire:model="status" class="form-control">
                    <option value="pending">Pending</option>
                    <option value="accepted">Accept</option>
                    <option value="rejected">Reject</option>
                </select>

                <x-input-error for="status" class="mt-2" />
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="$set('showModal', false)" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-secondary-button>

            <x-button class="ms-3 bg-blue-500" wire:click="updateStatus" wire:loading.attr="disabled">
                {{ __('Update Status') }}
            </x-button>
        </x-slot>
    </x-dialog-modal>
</div>







{{--<div class="container">--}}
{{--    <h2>Your Bookings</h2>--}}

{{--    @if (session()->has('success'))--}}
{{--        <div class="alert alert-success">--}}
{{--            {{ session('success') }}--}}
{{--        </div>--}}
{{--    @endif--}}

{{--    @if (session()->has('error'))--}}
{{--        <div class="alert alert-danger">--}}
{{--            {{ session('error') }}--}}
{{--        </div>--}}
{{--    @endif--}}

{{--    <table class="table">--}}
{{--        <thead>--}}
{{--        <tr>--}}
{{--            <th>Service</th>--}}
{{--            <th>Seeker</th>--}}
{{--            <th>Booking Date</th>--}}
{{--            <th>Status</th>--}}
{{--            <th>Action</th>--}}
{{--        </tr>--}}
{{--        </thead>--}}
{{--        <tbody>--}}
{{--        @foreach($bookings as $booking)--}}
{{--            <tr>--}}
{{--                <td>{{ $booking->service->title }}</td>--}}
{{--                <td>{{ $booking->seeker->name }}</td>--}}
{{--                <td>{{ $booking->booking_date }}</td>--}}
{{--                <td>{{ $booking->status }}</td>--}}
{{--                <td>--}}
{{--                    <button wire:click="selectBooking({{ $booking->id }})" class="btn btn-primary">Update Status</button>--}}
{{--                </td>--}}
{{--            </tr>--}}
{{--        @endforeach--}}
{{--        </tbody>--}}
{{--    </table>--}}

{{--    <!-- Modal -->--}}
{{--    <div x-data="{ open: false }" x-show="open" @openModal.window="open = true" @closeModal.window="open = false" style="display: none;">--}}
{{--        <div class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full">--}}
{{--            <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">--}}
{{--                <div class="mt-3 text-center">--}}
{{--                    <h3 class="text-lg leading-6 font-medium text-gray-900">Update Booking Status</h3>--}}
{{--                    <div class="mt-2 px-7 py-3">--}}
{{--                        <select wire:model="status" class="form-control">--}}
{{--                            <option value="pending">Pending</option>--}}
{{--                            <option value="accepted">Accept</option>--}}
{{--                            <option value="rejected">Reject</option>--}}
{{--                        </select>--}}
{{--                    </div>--}}
{{--                    <div class="items-center px-4 py-3">--}}
{{--                        <button wire:click="updateStatus()" class="px-4 py-2 bg-blue-500 text-white text-base font-medium rounded-md w-full shadow-sm hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-300">Save</button>--}}
{{--                        <button @click="open = false" class="mt-2 px-4 py-2 bg-red-500 text-white text-base font-medium rounded-md w-full shadow-sm hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-300">Cancel</button>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}




{{--<div>--}}
{{--    <div class="container">--}}
{{--        <h2>Your Bookings</h2>--}}

{{--        @if (session()->has('success'))--}}
{{--            <div class="alert alert-success">--}}
{{--                {{ session('success') }}--}}
{{--            </div>--}}
{{--        @endif--}}

{{--        @if (session()->has('error'))--}}
{{--            <div class="alert alert-danger">--}}
{{--                {{ session('error') }}--}}
{{--            </div>--}}
{{--        @endif--}}

{{--        <table class="table">--}}
{{--            <thead>--}}
{{--            <tr>--}}
{{--                <th>Service</th>--}}
{{--                <th>Seeker</th>--}}
{{--                <th>Booking Date</th>--}}
{{--                <th>Status</th>--}}
{{--                <th>Action</th>--}}
{{--            </tr>--}}
{{--            </thead>--}}
{{--            <tbody>--}}
{{--            @foreach($bookings as $booking)--}}
{{--                <tr :key="$booking->id">--}}
{{--                    <td>{{ $booking->service->title }}</td>--}}
{{--                    <td>{{ $booking->seeker->name }}</td>--}}
{{--                    <td>{{ $booking->booking_date }}</td>--}}
{{--                    <td>{{ $booking->status }}</td>--}}
{{--                    <td>--}}
{{--                        <button wire:click="selectBooking({{ $booking->id }})" class="btn btn-primary">Update Status</button>--}}
{{--                    </td>--}}
{{--                    <td>--}}
{{--                        <select wire:model="status" wire:change="updateStatus({{ $booking->id }})">--}}
{{--                            <option value="pending" {{ $booking->status == 'pending' ? 'selected' : '' }}>Pending</option>--}}
{{--                            <option value="accepted" {{ $booking->status == 'accepted' ? 'selected' : '' }}>Accept</option>--}}
{{--                            <option value="rejected" {{ $booking->status == 'rejected' ? 'selected' : '' }}>Reject</option>--}}
{{--                        </select>--}}
{{--                    </td>--}}
{{--                </tr>--}}
{{--            @endforeach--}}
{{--            </tbody>--}}
{{--        </table>--}}
{{--    </div>--}}


{{--    <!-- Modal -->--}}
{{--    <div x-data="{ open: false }" x-show="open" @openModal.window="open = true" @closeModal.window="open = false" style="display: none;">--}}
{{--        <div class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full">--}}
{{--            <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">--}}
{{--                <div class="mt-3 text-center">--}}
{{--                    <h3 class="text-lg leading-6 font-medium text-gray-900">Update Booking Status</h3>--}}
{{--                    <div class="mt-2 px-7 py-3">--}}
{{--                        <select wire:model="status" class="form-control">--}}
{{--                            <option value="pending">Pending</option>--}}
{{--                            <option value="accepted">Accept</option>--}}
{{--                            <option value="rejected">Reject</option>--}}
{{--                        </select>--}}
{{--                    </div>--}}
{{--                    <div class="items-center px-4 py-3">--}}
{{--                        <button wire:click="updateStatus()" class="px-4 py-2 bg-blue-500 text-white text-base font-medium rounded-md w-full shadow-sm hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-300">Save</button>--}}
{{--                        <button @click="open = false" class="mt-2 px-4 py-2 bg-red-500 text-white text-base font-medium rounded-md w-full shadow-sm hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-300">Cancel</button>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

{{--</div>--}}
