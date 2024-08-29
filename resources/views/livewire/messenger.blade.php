<div>
    <h2>Chat with {{ Auth::id() === $providerId ? 'Seeker' : 'Provider' }}</h2>

    <div style="border: 1px solid #ddd; padding: 10px; height: 300px; overflow-y: scroll;">
        @foreach ($messages as $message)
            <div style="margin-bottom: 10px;">
                <strong>{{ $message->sender_id === Auth::id() ? 'You' : 'Them' }}:</strong>
                <p>{{ $message->message }}</p>
            </div>
        @endforeach
    </div>

    <div style="margin-top: 10px;">
        <textarea wire:model="newMessage" placeholder="Type your message..." style="width: 100%;"></textarea>
        @error('newMessage') <span class="error">{{ $message }}</span> @enderror
        <button wire:click="sendMessage">Send</button>
    </div>
</div>
