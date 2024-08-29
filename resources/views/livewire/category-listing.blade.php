<div>
    <h1>Categories</h1>
    <ul>
        @foreach ($categories as $category)
            <li>
                <div class="bg-amber-200 w-80">
                    <a href="{{ route('category.services', ['categoryId' => $category->id]) }}">
                        <img src="{{asset('cover_image')}}">
                        <h1>{{ $category->name }}</h1>
                        <p>{{ $category->description }}</p>
                    </a>
                </div>
            </li>
        @endforeach
    </ul>
</div>
