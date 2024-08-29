<div>
    <h2>Notifications</h2>
    @foreach ($notifications as $notification)
        <div>
            <strong>Booking Date:</strong> {{ $notification->data['booking_date'] }}<br>
            <strong>Service:</strong> {{ $notification->data['service_id'] }}<br>
{{--            <strong>Service:</strong> {{ $notification->data['booking_message'] }}<br>--}}
            <a href="{{ url('/bookings/' . $notification->data['booking_id']) }}">View Booking</a>
            <br>
            <button wire:click="markAsRead('{{ $notification->id }}')">Mark as Read</button>
        </div>
    @endforeach

    @if ($notifications->isEmpty())
        <p>No new notifications.</p>
    @endif
</div>
