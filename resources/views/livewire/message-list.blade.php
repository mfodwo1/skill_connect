<div>
    <div class="bg-blue-500 p-4 text-white justify-center grid grid-cols-12 items-center">
        <span class="col-span-9 text-center font-bold">
                @ {{ Auth()->user()->name }}
            </span>
        <div class="rounded-md col-span-2 flex justify-end">
            <div class="relative w-12 h-12">
                <Image
                    src="{{ Auth()->user()->profile?->portfolio_url ? asset('storage/'.Auth()->user()->profile?->portfolio_url) : Auth::user()->profile_photo_url }}"
                    alt="{{ Auth::user()->name }}"
                    class="rounded-full"
                    layout="fill"
                />
            </div>
        </div>
    </div>

    <section class="bg-gray-50 min-h-screen h-auto">
        <div class="sm:px-6 max-w-7xl px-2 pb-5">

            <!-- <Message> List -->
            <div class="grid max-w-md grid-cols-1 gap-6 px-3 pt-4">
                <!-- Message Item -->
                <div class="overflow-hidden bg-white rounded shadow flex flex-col gap-2">
                    @foreach($conversations as $conversation)
                        <div>
                            <a href="{{ route('chat', ['receiverId' => $conversation['user']?->id]) }}" class="btn btn-primary">
                                <div class="h-[100px] bg-white shadow-lg rounded-md overflow-hidden flex w-full">
                                    <div class="w-24">
                                        <Image
                                            width={400}
                                            height={300}
                                            class="object-cover w-full h-full rounded-full"
                                            src="{{ $conversation['user']?->profile_photo_url }}" alt="{{ $conversation['user']?->name }}"
                                            alt="user image"
                                        />
                                    </div>


                                    <div class="px-2 w-[70%] h-full pt-4">
                                        <h3 class="text-black text-base font-semibold py-1">
                                            {{ $conversation['user']?->name }}
                                        </h3>
                                        <hr class="py-1" />
                                        <p class="text-xs font-medium text-gray-600 px-1">
                                            <span class="font-mono font-bold pr-1 text-gray-700">
                                                Unread Messages:
                                            </span>
                                            <span class="text-gray-500 px-1">
                                                {{ $conversation['unreadCount'] }}
                                            </span>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>






{{--    <ul>--}}
{{--        @foreach ($conversations as $conversation)--}}
{{--            <li wire:poll.10s>--}}
{{--                <a href="{{ route('chat', ['receiverId' => $conversation['user']?->id]) }}">--}}
{{--                    <img src="{{ $conversation['user']?->profile_photo_url }}" alt="{{ $conversation['user']?->name }}" class="rounded-full w-10 h-10">--}}
{{--                    <span>{{ $conversation['user']?->name }}</span>--}}
{{--                    <span>Unread Messages: {{ $conversation['unreadCount'] }}</span>--}}
{{--                </a>--}}
{{--            </li>--}}
{{--        @endforeach--}}
{{--    </ul>--}}
</div>
