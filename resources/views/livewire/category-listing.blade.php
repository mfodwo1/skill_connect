<div>
    <h1>Categories</h1>
    <ul>
        @foreach ($categories as $category)
            <li>
                <a href="{{ route('category.services', ['categoryId' => $category->id]) }}">
                    {{ $category->name }}
                </a>
            </li>
        @endforeach
    </ul>
</div>
