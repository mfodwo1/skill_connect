<div>
    <img src="{{ Auth()->user()->profile?->portfolio_url ? asset('storage/'.Auth()->user()->profile?->portfolio_url) : Auth::user()->profile_photo_url }}">
    <ul>
        @foreach ($conversations as $conversation)
            <li wire:poll.10s>
                <a href="{{ route('chat', ['receiverId' => $conversation['user']?->id]) }}">
                    <img src="{{ $conversation['user']?->profile_photo_url }}" alt="{{ $conversation['user']?->name }}" class="rounded-full w-10 h-10">
                    <span>{{ $conversation['user']?->name }}</span>
                    <span>Unread Messages: {{ $conversation['unreadCount'] }}</span>
                </a>
            </li>
        @endforeach
    </ul>
</div>
