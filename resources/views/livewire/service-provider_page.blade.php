<div>
    @if (session()->has('message'))
        <div style="color: green;">
            {{ session('message') }}
        </div>
    @endif

    <h1>Service Providers</h1>

    <h2>{{ $service->provider->user->name }}</h2>
    <p>{{ $service->provider->bio }}</p>
    <p>Skills: {{ $service->provider->skills }}</p>
    <p>Rating: {{ $service->provider->rating }}</p>
    <a href="{{route('chat',  $service->provider->user->id)}}">Message Provider</a><br>
    <button wire:click="bookProvider">Book Provider</button>
</div>
