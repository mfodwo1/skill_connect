<div>
    <div class="chat-box" style="height: 400px; overflow-y: scroll;">
        @foreach($messages as $message)
            <div class="mb-2 {{ $message['sender_id'] === Auth::id() ? 'text-right' : '' }}">
                <strong>{{ $message['sender_id'] === Auth::id() ? 'You' : 'Other' }}:</strong> {{ $message['message'] }}
            </div>
        @endforeach
    </div>

    <div class="mt-4">
        <form wire:submit.prevent="sendMessage">
            <input type="text" wire:model="newMessage" class="form-control" placeholder="Type your message here...">
            @error('newMessage') <span class="text-danger">{{ $message }}</span> @enderror

            <button type="submit" class="btn btn-primary mt-2">Send</button>
        </form>
    </div>
</div>
