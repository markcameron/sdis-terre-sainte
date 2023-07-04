@php
    $images = $block->imagesAsArrays('image', 'desktop');
    $crops = $block->imagesAsArrays('image', 'desktop', ['w' => 490, 'h' => 367]);
@endphp

<div class="grid grid-cols-{!! $block->input('columns') !!} gap-4">
@foreach ($crops as $index => $image)
    <div>
        <a href="{{ $images[$index]['src'] }}">
            <img src="{{ $image['src'] }}" class="w-full h-auto py-4" alt="{{ $image['alt'] }}" title="{{ $image['caption'] }}">
        </a>
    </div>
@endforeach
</div>
