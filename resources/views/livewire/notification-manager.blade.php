<div>
    <h2 class="text-3xl font-bold leading-tight text-black py-3 px-4 sticky top-0 bg-white z-10 p-2">Notifications</h2>
{{--    @foreach ($notifications as $notification)--}}
{{--        <div>--}}
{{--            <strong>Booking Date:</strong> {{ $notification->data['booking_date'] }}<br>--}}
{{--            <strong>Service:</strong> {{ $notification->data['service_id'] }}<br>--}}
{{--            <strong>Service:</strong> {{ $notification->data['booking_message'] }}<br>--}}
{{--            <a href="{{ url('/bookings/' . $notification->data['booking_id']) }}">View Booking</a>--}}
{{--            <br>--}}
{{--            <button wire:click="markAsRead('{{ $notification->id }}')">Mark as Read</button>--}}
{{--        </div>--}}
{{--    @endforeach--}}

    @if ($notifications->isEmpty())
        <div class="h-screen w-dvw flex flex-col justify-center items-center">>
            <img src="https://img.freepik.com/free-vector/push-notifications-concept-illustration_114360-4986.jpg?t=st=1725362470~exp=1725366070~hmac=a72c63d2a9b73199c678b2928b9fea9c1fd8defcbd742aaed7b9e44536076b37&w=740"
             alt=""
                 class="h-[30%] w-[80%]"
            />
            <p class="text-lg font-semibold"> No new notifications</p>
        </div>

    @endif
{{--    "data" => "{"booking_id":1,"service_id":3,"seeker_id":4,"booking_date":"2024-09-01T19:06:55.902821Z","booking_message":"i want to book"}--}}
    <section class="bg-gray-50 min-h-screen h-auto">
        <div class="sm:px-6 max-w-7xl px-2 pb-5">

            <!-- <Message> List -->
            <div class="grid grid-cols-1 gap-6 px-3 pt-4">
                <!-- Message Item -->
                <div class="overflow-hidden bg-white rounded shadow flex flex-col gap-2">
                    @foreach ($notifications as $notification)
                        <div>
                            <div class="btn btn-primary">
                                <div class="bg-white shadow-lg rounded-md overflow-hidden flex-1 w-full">

                                    <div class="px-2 pt-4">
                                        <h3 class="text-black text-base font-semibold py-1">
                                            {{ $notification->data['booking_date'] }}
                                        </h3>
                                        <hr class="py-1" />
                                        <p class="font-medium text-gray-600 px-1">
                                            <span class="font-mono font-bold pr-1 text-gray-700">
                                                {{ $notification->data['booking_message'] }}
                                            </span>
                                        </p>

                                        <div class="flex px-4 w-full justify-between">
                                            <a
                                                href="{{ route('bookings') }}"
                                                class=" text-blue-500"
                                            >
                                                View Booking
                                            </a>
                                            <button
                                                wire:click="markAsRead('{{ $notification->id }}')"
                                                class="bg-gray-600 text-white px-4 py-2 rounded-full"
                                            >
                                                Mark as Read
                                            </button>
                                        </div>


                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

</div>
