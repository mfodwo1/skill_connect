<!-- resources/views/livewire/category-services.blade.php -->

<div x-data="{
    latitude: null,
    longitude: null,
    init() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition((position) => {
                this.latitude = position.coords.latitude;
                this.longitude = position.coords.longitude;

                // Send the location to the Livewire component
                this.updateLocation(this.latitude, this.longitude);
            }, (error) => {
                console.error('Error getting location: ', error);
            });
        } else {
            console.error('Geolocation is not supported by this browser.');
        }
    },
    updateLocation(latitude, longitude) {
        // Ensure that both latitude and longitude are valid numbers
        if (typeof latitude === 'number' && typeof longitude === 'number') {
            Livewire.dispatch('updateLocation', [latitude, longitude]);
        } else {
            console.error('Invalid latitude or longitude');
        }
    }
}">
    <h1>Services for {{ $categoryName }}</h1>
    <ul>
        @foreach ($services as $service)
            <li>
                <h2>{{ $service->title }}</h2>
                <p>{{ $service->description }}</p>
                <p>Price: {{ $service->price }}</p>
                <p>Provided by: {{ $service->provider->user->name }}</p>
                <p>Distance from you:
                    @if(isset($service->distance))
                        {{ $service->distance }} km
                    @else
                        Calculating...
                    @endif
                </p>
            </li>
        @endforeach
    </ul>
</div>
