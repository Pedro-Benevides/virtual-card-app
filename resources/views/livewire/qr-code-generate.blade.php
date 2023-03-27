<div>
    <h2>QR Code Image Generator</h2>

    <div>
        <form wire:submit.prevent="submit" method="post" class="form-inline">

            <div>
                <label>Name</label>

                <input type="text" wire:model="name">

            </div>
            <div class="error-message">
                @error('name')
                {{$message}}
                @enderror
            </div>

            <div>
                <label>Linkedin URL</label>

                <input type="text" wire:model="linkedin_url">

            </div>
            <div class="error-message">
                @error('linkedin_url')
                {{$message}}
                @enderror
            </div>

            <div>
                <label>Github URL</label>

                <input type="text" wire:model="github_url">

            </div>
            <div class="error-message">
                @error('github_url')
                {{$message}}
                @enderror
            </div>

            <button type="submit">
                Generate Image
            </button>
        </form>
    </div>
</div>