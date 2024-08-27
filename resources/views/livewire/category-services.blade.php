<div>
    <h1>Services</h1>
    <ul>
        @foreach ($services as $service)
            <li>
                <h2>{{ $service->title }}</h2>
                <p>{{ $service->description }}</p>
                <p>Price: {{ $service->price }}</p>
                <a href="{{ route('service.providers', ['serviceId' => $service->id]) }}">
                    View Providers
                </a>
            </li>
        @endforeach
    </ul>
</div>
