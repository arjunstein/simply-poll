<div>
    <form wire:submit.prevent="createPoll">
        <label>Poll title</label>
        <input type="text" wire:model.blur="title" />
        @error('title')
            <div class="text-red-500">{{ $message }}</div>
        @enderror

        <div class="mb-4 mt-4">
            <button type="button" class="btn" wire:click.prevent="addOption">Add option</button>
        </div>
        <div>
            @foreach ($options as $i => $opt)
                <div class="mb-4">
                    <label for="">Option {{ $i + 1 }}</label>
                    <div class="flex gap-2">
                        <input type="text" wire:model.blur="options.{{ $i }}" />
                        <button class="btn" wire:click.prevent="removeOption({{ $i }})">Remove</button>
                    </div>
                    @error("options.{$i}")
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                </div>
            @endforeach
        </div>
        <button type="submit" class="btn">Create poll</button>
    </form>
</div>
