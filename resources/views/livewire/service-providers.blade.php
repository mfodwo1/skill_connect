<div>
    <h1>Service Providers</h1>
    <ul>
        @foreach ($providers as $provider)
            <li>
                <h2>{{ $provider->user->name }}</h2>
                <p>{{ $provider->bio }}</p>
                <p>Skills: {{ $provider->skills }}</p>
                <p>Rating: {{ $provider->rating }}</p>
                <a href="#">View Profile</a>
            </li>
        @endforeach
    </ul>
</div>
