<div>
    <h1>{{ $provider->user->name }}'s Profile</h1>
    <p>{{ $provider->bio }}</p>
    <p>Skills: {{ $provider->skills }}</p>
    <p>Rating: {{ $provider->rating }}</p>
    <p>Distance from you: <span id="distance">{{ $distance }}</span> km</p>

    <h2>Services Offered</h2>
    <ul>
        @foreach ($provider->services as $service)
            <li>{{ $service->title }} - {{ $service->price }}</li>
        @endforeach
    </ul>

    <h2>Customer Reviews</h2>
    <ul>
        @foreach ($provider->reviews as $review)
            <li>
                <strong>{{ $review->seeker->name }}</strong> rated {{ $review->rating }}/5
                <p>{{ $review->review }}</p>
            </li>
        @endforeach
    </ul>

    <a href="{{ route('route here',$provider->id) }}">Message Provider</a>
    <button wire:click="bookProvider">Book Provider</button>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                const latitude = position.coords.latitude;
                const longitude = position.coords.longitude;

                // Send the location to the Livewire component
                Livewire.emit('updateLocation', latitude, longitude);
            }, function(error) {
                console.error('Error getting location: ', error);
            });
        } else {
            console.error('Geolocation is not supported by this browser.');
        }
    });
</script>
