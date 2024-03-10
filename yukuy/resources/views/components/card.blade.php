@props(['url', 'title', 'content', 'width' => 'w-full', 'height' => 'h-full'])

<div class="{{ $width }} {{ $height }} mb-3">
    <div class="card border-0 bg-white rounded-lg border-b-2 hover:border-indigo-400" style="cursor: pointer;">
        <div class="card-body p-3">
            <a href="{{ $url }}" class="card-link">
                <h5 class="card-title">{{ $title }}</h5>
            </a>
            <p class="card-text">{{ $content }}</p>
        </div>
    </div>
</div>
