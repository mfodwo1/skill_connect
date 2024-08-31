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
        <section class="bg-gray-50 min-h-screen h-auto pb-24">
            <div class="sm:px-6 max-w-7xl px-2 pb-5">
                <h2 class="text-xl text-black font-black py-3 sticky top-0 bg-white z-10">
                    {{ $category->title }}
                </h2>
                <div class="grid max-w-md grid-cols-2 gap-2">
                    @foreach ($services as $service)
                        <div>
                            <div class="overflow-hidden bg-white rounded shadow h-[295px]">
                                <div class="h-[200px]">
                                    <div>
                                        <a href="#" class="block h-[50%]">
                                            <Image
                                                class="object-cover w-full h-full"
                                                src="{{$service->provider->portfolio_url ? asset('storage/'.$service->provider->portfolio_url) : asset('storage/images.jpg') }}"
                                                alt=""
                                                width={400}
                                                height={300}
                                            />
                                        </a>
                                    </div>

                                    <p class="p-2 text-sm text-gray-600 ">
                                        {{ Str::limit($service->title, 40) }}
                                    </p>
                                    <div class="pb-2">
                                        <!----rating---->
                                        <div class="flex gap-2 py-1 justify-center">
                                            <div class="flex items-center w-[100px] h-[20px]">
                                                @for ($i = 0; $i < 5; $i++)
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                         fill="currentColor"
                                                         viewBox="0 0 24 24"
                                                         class="w-5 h-5 {{ $i < $yellowStars ? 'text-yellow-400' : 'text-gray-300' }}">
                                                        <path d="M12 17.27l5.18 3.15-1.39-6.06L22 9.24l-6.19-.53L12 2 8.19 8.71 2 9.24l4.21 4.12-1.39 6.06L12 17.27z" />
                                                    </svg>
                                                @endfor
                                            </div>
                                            <span class="text-gray-600">
                                            ({{ $rating }})
                                            </span>
                                        </div>

                                       <div class="flex justify-between px-2">
                                           <p class="pt-3 text-sm">
                                               @if(isset($service->distance))
                                                   {{ $service->distance }} km
                                               @else
                                                   Calculating...
                                               @endif
                                           </p>

                                           <a
                                               href="{{ route('service.provider.page', $service->id) }}"
                                               wire:navigate.hover
                                               class="bg-gray-400 px-4 py-2 rounded-full mt-2 text-sm"
                                           >
                                               View
                                           </a>
                                       </div>
                                        <p class="pt-2 text-sm">
                                            {{ Str::limit($service->provider->location, 20)}}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </section>
    </div>

</div>

