<div @class(['rounded-md', 'p-4', $backgroundColor, $class])>
    <div @class(['flex'])>
        <div class="flex-shrink-0">
            <svg @class(['h-5', 'w-5', $foregroundColor]) viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                {!! $icon !!}
            </svg>
        </div>
        <div class="ml-3">
            {{ $slot }}
        </div>
    </div>
</div>
