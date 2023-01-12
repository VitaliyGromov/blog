<x-card>
    <div class="card-body">
        <h5>
            <a href="{{ route('blog.show', $post->id) }}">
                <p>{{ $post->title }}</p>
            </a>
        </h5>
        <p class="text-muted">
            {{ $post->published_at->diffForHumans() }}
        </p>
    </div>
</x-card>