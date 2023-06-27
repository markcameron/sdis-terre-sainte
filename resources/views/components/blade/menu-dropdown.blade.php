<div class="relative">
    <button type="button" @click="dropdownIsOpen = !dropdownIsOpen"
    @class(['group', 'inline-flex', 'items-center', 'font-bold', 'hover:text-gray-300', 'p-3' => $type === 'mobile'])
        aria-expanded="false">
        <span>{{ $node['title'] }}</span>
        <svg class="ml-2 h-5 w-5 group-hover:text-gray-300" xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
            <path fill-rule="evenodd"
                d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                clip-rule="evenodd" />
        </svg>
    </button>
    <div x-show="dropdownIsOpen" x-transition:enter="transition ease-out duration-100"
        x-transition:enter-start="transform opacity-0 scale-95"
        x-transition:enter-end="transform opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-75"
        x-transition:leave-start="transform opacity-100 scale-100"
        x-transition:leave-end="transform opacity-0 scale-95"
        class="absolute right-0 z-10 mt-2 w-56 origin-top-right rounded-md border-2 border-gray-600 bg-gray-700"
        role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
        <div class="py-1" role="none">
            @foreach ($node['children'] as $index => $child)
            <a href="{{ $child['url'] }}" class="block px-4 py-2 font-bold hover:bg-gray-500"
                role="menuitem" tabindex="-1" id="menu-item-{{ $index }}">{{ $child['title'] }}</a>
            @endforeach
        </div>
    </div>
</div>
