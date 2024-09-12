<div>
    <form wire:submit.prevent="createPoll">
        <label>Poll title</label>
        <input type="text" wire:model.live="title" />

        Current title: {{ $title }}

        <div class="mb-4 mt-4">
            <button type="button" class="btn" wire:click.prevent="addOption">Add option</button>
        </div>
        <div>
            @foreach ($options as $i => $opt)
                <div class="mb-4">
                    <label for="">Option {{ $i + 1 }}</label>
                    <div class="flex gap-2">
                        <input type="text" wire:model="options.{{ $i }}" />
                        <button class="btn" wire:click.prevent="removeOption({{ $i }})">Remove</button>
                    </div>
                </div>
            @endforeach
        </div>
        <button type="submit" class="btn">Create poll</button>
    </form>
</div>
