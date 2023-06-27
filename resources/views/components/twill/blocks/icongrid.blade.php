<div class="grid grid-cols-1 md:grid-cols-{!! $block->input('columns') !!} gap-16 my-16">
    @foreach ($block->children as $child)
        <div class="flex flex-col items-center">
            @svg('phosphor-' . $child->input('icon'), 'w-32 h-32 text-' . $child->input('icon-color'))
            <span class="text-3xl font-bold text-center">{{ $child->input('title') }}</span>
        </div>
    @endforeach
</div>
