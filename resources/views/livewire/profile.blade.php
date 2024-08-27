<div>
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <form wire:submit.prevent="store">
        <div>
            <label for="bio">Bio</label>
            <textarea id="bio" wire:model="bio"></textarea>
            @error('bio') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="skills">Skills</label>
            <input id="skills" type="text" wire:model="skills">
            @error('skills') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="portfolio_url">Portfolio URL</label>
            <input id="portfolio_url" type="url" wire:model="portfolio_url">
            @error('portfolio_url') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="availability">Availability</label>
            <input id="availability" type="text" wire:model="availability">
            @error('availability') <span class="error">{{ $message }}</span> @enderror
        </div>

        <button type="submit">Save Profile</button>
    </form>
</div>
