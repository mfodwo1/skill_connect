<div>
    <div class="container">
        <h2>Your Bookings</h2>
        <table class="table">
            <thead>
            <tr>
                <th>Service</th>
                <th>Provider</th>
                <th>Booking Date</th>
                <th>Status</th>
            </tr>
            </thead>
            <tbody>
            @foreach($bookings as $booking)
                <tr>
                    <td>{{ $booking->service->title }}</td>
                    <td>{{ $booking->provider->name }}</td>
                    <td>{{ $booking->booking_date }}</td>
                    <td>{{ ucfirst($booking->status) }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
