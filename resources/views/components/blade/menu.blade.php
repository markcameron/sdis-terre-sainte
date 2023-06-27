@foreach ($tree as $node)
    @if (empty($node['children']))
        <x-menu-link :link="$node" :type="$type"></x-menu-link>
    @else
        <x-menu-dropdown :node="$node" :type="$type"></x-menu-link>
    @endif
@endforeach