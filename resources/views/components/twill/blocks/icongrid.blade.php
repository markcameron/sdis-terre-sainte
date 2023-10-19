<div class="grid grid-cols-1 md:grid-cols-{!! $block->input('columns') !!} gap-16 my-16">
    @foreach ($block->children as $child)
        <div class="flex flex-col items-center">
            @svg('phosphor-' . $child->input('icon'), 'w-32 h-32 ' . $child->input('icon-rotate') . ' text-' . $child->input('icon-color'))
            <span class="text-2xl font-bold text-center {{ 'text-' . $child->input('title-color') }}">{{ $child->input('title') }}</span>
            <div>{!! $child->input('body') !!}</div>
        </div>
    @endforeach
</div>
