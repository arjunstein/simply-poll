<div>
    <form>
        <label>Poll title</label>
        <input type="text" wire:model.live="title" />

        Current title: {{ $title }}

        <div class="mb-4 mt-4">
            <button type="button" class="btn" wire:click.prevent="addOption">Add option</button>
        </div>
        <div>
            @foreach ($options as $i => $opt)
                <div class="mb-4">
                    {{ $i + 1 }} - {{ $opt }}
                </div>
            @endforeach
        </div>
    </form>
</div>
