<li class="sidebar-item {{ $active ? 'active' : '' }} ">
    <a {{ $attributes }} class='sidebar-link'>
        <i class="{{ $icon }}"></i>
        <span>{{ $slot }}</span>
    </a>
</li>
