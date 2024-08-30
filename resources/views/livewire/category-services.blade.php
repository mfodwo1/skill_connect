<!-- resources/views/livewire/category-services.blade.php -->
<div>
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
        <section class="bg-gray-50 min-h-screen h-auto">
            <div class="sm:px-6 max-w-7xl px-2 pb-5">
                <h2 class="text-xl text-black font-black py-3 sticky top-0 bg-white z-10">
                    {{ $categoryName }}
                </h2>
                <div class="grid max-w-md grid-cols-2 gap-2">
                    @foreach ($services as $service)
                        <div>
                            <div class="overflow-hidden bg-white rounded shadow h-[240px]">
                                <div class="h-[200px]">
                                    <div>
                                        <a
                                            href="#"
                                            title=""
                                            class="block h-[50%]"
                                        >
                                            <Image
                                                class="object-cover w-full h-full"
                                                src="https://cdn.rareblocks.xyz/collection/celebration/images/blog/2/blog-post-1.jpg"
                                                alt=""
                                                width={400}
                                                height={300}
                                            />
                                        </a>
                                    </div>

                                    <p class="p-2 text-sm text-gray-600 ">
                                        Amet minim mollit non deserunt ullamco
                                    </p>
                                    <div class="pb-2">
                                                <span class="flex px-2">
                                                    <div class="flex items-center w-[100px] h-[20px]">
                                                        <svg
                                                            xmlns="http://www.w3.org/2000/svg"
                                                            fill="currentColor"
                                                            viewBox="0 0 24 24"
                                                            class="w-5 h-5 text-yellow-400"
                                                        >
                                                            <path d="M12 17.27l5.18 3.15-1.39-6.06L22 9.24l-6.19-.53L12 2 8.19 8.71 2 9.24l4.21 4.12-1.39 6.06L12 17.27z" />
                                                        </svg>

                                                        <svg
                                                            xmlns="http://www.w3.org/2000/svg"
                                                            fill="currentColor"
                                                            viewBox="0 0 24 24"
                                                            class="w-5 h-5 text-yellow-400"
                                                        >
                                                            <path d="M12 17.27l5.18 3.15-1.39-6.06L22 9.24l-6.19-.53L12 2 8.19 8.71 2 9.24l4.21 4.12-1.39 6.06L12 17.27z" />
                                                        </svg>

                                                        <svg
                                                            xmlns="http://www.w3.org/2000/svg"
                                                            fill="currentColor"
                                                            viewBox="0 0 24 24"
                                                            class="w-5 h-5 text-yellow-400"
                                                        >
                                                            <path d="M12 17.27l5.18 3.15-1.39-6.06L22 9.24l-6.19-.53L12 2 8.19 8.71 2 9.24l4.21 4.12-1.39 6.06L12 17.27z" />
                                                        </svg>

                                                        <svg
                                                            xmlns="http://www.w3.org/2000/svg"
                                                            fill="currentColor"
                                                            viewBox="0 0 24 24"
                                                            class="w-5 h-5 text-yellow-400"
                                                        >
                                                            <path d="M12 17.27l5.18 3.15-1.39-6.06L22 9.24l-6.19-.53L12 2 8.19 8.71 2 9.24l4.21 4.12-1.39 6.06L12 17.27z" />
                                                        </svg>

                                                        <svg
                                                            xmlns="http://www.w3.org/2000/svg"
                                                            fill="currentColor"
                                                            viewBox="0 0 24 24"
                                                            class="w-5 h-5 text-yellow-400"
                                                        >
                                                            <path d="M12 17.27l5.18 3.15-1.39-6.06L22 9.24l-6.19-.53L12 2 8.19 8.71 2 9.24l4.21 4.12-1.39 6.06L12 17.27z" />
                                                        </svg>
                                                    </div>
                                                    <p class="text-gray-500 text-sm">
                                                        (123)
                                                    </p>
                                                </span>
                                        <h3 class="text-gray-600 text-sm px-3">
                                            Cape Coast
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    <div class="overflow-hidden bg-white rounded shadow">
                        <div class="">
                            <div>
                                <a href="#" title="" class="block">
                                    <Image
                                        class="object-cover w-full h-full"
                                        src="https://cdn.rareblocks.xyz/collection/celebration/images/blog/2/blog-post-1.jpg"
                                        alt=""
                                        width={400}
                                        height={300}
                                    />
                                </a>
                            </div>

                            <p class="p-2 text-sm text-gray-600 ">
                                Amet minim mollit non deserunt ullamco
                            </p>
                            <div class="pb-2">
                                        <span class="flex px-2">
                                            <div class="flex items-center w-[100px] h-[20px]">
                                                {/* Star 1 */}
                                                <svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    fill="currentColor"
                                                    viewBox="0 0 24 24"
                                                    class="w-5 h-5 text-yellow-400"
                                                >
                                                    <path d="M12 17.27l5.18 3.15-1.39-6.06L22 9.24l-6.19-.53L12 2 8.19 8.71 2 9.24l4.21 4.12-1.39 6.06L12 17.27z" />
                                                </svg>

                                                {/* Star 2 */}
                                                <svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    fill="currentColor"
                                                    viewBox="0 0 24 24"
                                                    class="w-5 h-5 text-yellow-400"
                                                >
                                                    <path d="M12 17.27l5.18 3.15-1.39-6.06L22 9.24l-6.19-.53L12 2 8.19 8.71 2 9.24l4.21 4.12-1.39 6.06L12 17.27z" />
                                                </svg>

                                                {/* Star 3 */}
                                                <svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    fill="currentColor"
                                                    viewBox="0 0 24 24"
                                                    class="w-5 h-5 text-yellow-400"
                                                >
                                                    <path d="M12 17.27l5.18 3.15-1.39-6.06L22 9.24l-6.19-.53L12 2 8.19 8.71 2 9.24l4.21 4.12-1.39 6.06L12 17.27z" />
                                                </svg>

                                                {/* Star 4 */}
                                                <svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    fill="currentColor"
                                                    viewBox="0 0 24 24"
                                                    class="w-5 h-5 text-yellow-400"
                                                >
                                                    <path d="M12 17.27l5.18 3.15-1.39-6.06L22 9.24l-6.19-.53L12 2 8.19 8.71 2 9.24l4.21 4.12-1.39 6.06L12 17.27z" />
                                                </svg>

                                                {/* Star 5 */}
                                                <svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    fill="currentColor"
                                                    viewBox="0 0 24 24"
                                                    class="w-5 h-5 text-yellow-400"
                                                >
                                                    <path d="M12 17.27l5.18 3.15-1.39-6.06L22 9.24l-6.19-.53L12 2 8.19 8.71 2 9.24l4.21 4.12-1.39 6.06L12 17.27z" />
                                                </svg>
                                            </div>
                                            <p class="text-gray-500 text-sm">
                                                (123)
                                            </p>
                                        </span>
                                <h3 class="text-gray-600 text-sm px-3">
                                    Cape Coast
                                </h3>
                            </div>
                        </div>
                    </div>

                    <div class="overflow-hidden bg-white rounded shadow">
                        <div class="">
                            <div>
                                <a href="#" title="" class="block">
                                    <Image
                                        class="object-cover w-full h-full"
                                        src="https://cdn.rareblocks.xyz/collection/celebration/images/blog/2/blog-post-1.jpg"
                                        alt=""
                                        width={400}
                                        height={300}
                                    />
                                </a>
                            </div>

                            <p class="p-2 text-sm text-gray-600 ">
                                Amet minim mollit non deserunt ullamco
                            </p>
                            <div class="pb-2">
                                        <span class="flex px-2">
                                            <div class="flex items-center w-[100px] h-[20px]">
                                                {/* Star 1 */}
                                                <svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    fill="currentColor"
                                                    viewBox="0 0 24 24"
                                                    class="w-5 h-5 text-yellow-400"
                                                >
                                                    <path d="M12 17.27l5.18 3.15-1.39-6.06L22 9.24l-6.19-.53L12 2 8.19 8.71 2 9.24l4.21 4.12-1.39 6.06L12 17.27z" />
                                                </svg>

                                                {/* Star 2 */}
                                                <svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    fill="currentColor"
                                                    viewBox="0 0 24 24"
                                                    class="w-5 h-5 text-yellow-400"
                                                >
                                                    <path d="M12 17.27l5.18 3.15-1.39-6.06L22 9.24l-6.19-.53L12 2 8.19 8.71 2 9.24l4.21 4.12-1.39 6.06L12 17.27z" />
                                                </svg>

                                                {/* Star 3 */}
                                                <svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    fill="currentColor"
                                                    viewBox="0 0 24 24"
                                                    class="w-5 h-5 text-yellow-400"
                                                >
                                                    <path d="M12 17.27l5.18 3.15-1.39-6.06L22 9.24l-6.19-.53L12 2 8.19 8.71 2 9.24l4.21 4.12-1.39 6.06L12 17.27z" />
                                                </svg>

                                                {/* Star 4 */}
                                                <svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    fill="currentColor"
                                                    viewBox="0 0 24 24"
                                                    class="w-5 h-5 text-yellow-400"
                                                >
                                                    <path d="M12 17.27l5.18 3.15-1.39-6.06L22 9.24l-6.19-.53L12 2 8.19 8.71 2 9.24l4.21 4.12-1.39 6.06L12 17.27z" />
                                                </svg>

                                                {/* Star 5 */}
                                                <svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    fill="currentColor"
                                                    viewBox="0 0 24 24"
                                                    class="w-5 h-5 text-yellow-400"
                                                >
                                                    <path d="M12 17.27l5.18 3.15-1.39-6.06L22 9.24l-6.19-.53L12 2 8.19 8.71 2 9.24l4.21 4.12-1.39 6.06L12 17.27z" />
                                                </svg>
                                            </div>
                                            <p class="text-gray-500 text-sm">
                                                (123)
                                            </p>
                                        </span>
                                <h3 class="text-gray-600 text-sm px-3">
                                    Cape Coast
                                </h3>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </div>







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
                <a href="{{ route('service.provider.page', $service->id) }}">View Service Details</a>
            </li>
        @endforeach
    </ul>
</div>
</div>
