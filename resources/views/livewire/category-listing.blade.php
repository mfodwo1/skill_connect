<section class="bg-gray-50 min-h-screen h-auto">
    <div class="sm:px-6 max-w-7xl px-2 pb-5">
        <h2 class="text-xl text-black font-black py-3 sticky top-0 bg-white z-10">
            Services
        </h2>
        <div class="grid max-w-md grid-cols-1 gap-6 px-4">

            @foreach ($categories as $category)
                <div class="overflow-hidden bg-white rounded shadow">
                    <div class="relative h-[320px] bg-white shadow-lg rounded-md overflow-hidden">
                        <a href="{{ route('category.services', ['categoryId' => $category->id]) }}" title="" class="block h-[75%]">
                            <Image
                                width={400}
                                height={300}
                                class="object-cover w-full h-full"
                                src="{{asset($category->cover_image)}}"
                                alt="Carpentry Image"
                            />
                        </a>
                        <div class="absolute top-4 left-4">
                            <span class="px-4 py-1.5 text-xs font-semibold tracking-widest text-gray-900 uppercase bg-white rounded-full shadow-sm">
                                {{ $category->name }}
                            </span>
                        </div>
                        <div class="px-2">
                            <p class="text-sm font-medium text-gray-600 my-3">
                                {{ $category->description }}
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</section>





{{--    --}}
{{--    --}}
{{--    <h1>Categories</h1>--}}
{{--    <ul>--}}
{{--        @foreach ($categories as $category)--}}
{{--            <li>--}}
{{--                <div class="bg-amber-200 w-80">--}}
{{--                    <a href="{{ route('category.services', ['categoryId' => $category->id]) }}">--}}
{{--                        <img src="{{asset('storage/'.$category->cover_image)}}">--}}
{{--                        <h1>{{ $category->name }}</h1>--}}
{{--                        <p>{{ $category->description }}</p>--}}
{{--                    </a>--}}
{{--                </div>--}}
{{--            </li>--}}
{{--        @endforeach--}}
{{--    </ul>--}}
{{--</div>--}}
