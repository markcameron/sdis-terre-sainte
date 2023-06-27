@foreach ($tree as $node)
    @if (empty($node['children']))
        <x-blade.menu-link :link="$node" :type="$type"></x-blade.menu-link>
    @else
        <x-blade.menu-dropdown :node="$node" :type="$type"></x-blade.menu-link>
    @endif
@endforeach
