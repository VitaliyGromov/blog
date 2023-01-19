<x-card>
    <div class="card-body">
        <h5>
            <a href="{{ route('blog.show', $post->id) }}">
                <p>{{ $post->title }}</p>
            </a>
        </h5>
        <p class="text-muted">
            @if($post->published_at != null)
                {{ $post->published_at->diffForHumans()}}
                @else
                    {{__('Дата не указана')}}
            @endif
        </p>
    </div>
</x-card>