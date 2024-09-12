<div>
    @forelse ($polls as $poll)
    <div class="mb-4 text-xl">
        <h3>{{ $poll->title }}</h3>
        @foreach ($poll->options as $option)
            <div class="mb-2">
                <button class="btn">Vote</button>
                {{ $option->name }} ({{ $option->votes->count() }})
            </div>
        @endforeach
    </div>
    @empty
        <div class="text-gray-500">
            No polls available
        </div>
    @endforelse
</div>
