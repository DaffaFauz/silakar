<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex justify-content-between">
                <div class="logo">
                    <a href="index.html"><img class="img-fluid w-75 h-auto" src="assets/images/logo/LogoPuskesmas4.png"
                            alt=""></a>
                </div>
                <div class="toggler">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-title">Menu</li>
                <x-menu-link href="/" :active="request()->is('/')" :icon="'bi bi-grid-fill'">Dashboard</x-menu-link>
                <li
                    class="sidebar-item  has-sub {{ request()->path() == 'kodrek' || request()->path() == 'subkodrek1' || request()->path() == 'subkodrek2' || request()->path() == 'subkodrek3' || request()->path() == 'subkodrek4' || request()->path() == 'subkodrek5' ? 'active' : '' }}">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-stack"></i>
                        <span>Kode Rekening</span>
                    </a>
                    <ul class="submenu">
                        <x-sub-menu-link href="/kodrek" :active="request()->is('kodrek')">Kode Rekening</x-sub-menu-link>
                        <x-sub-menu-link href="/subkodrek1" :active="request()->is('subkodrek1')">Subkode Rekening 1</x-sub-menu-link>
                        <x-sub-menu-link href="/subkodrek2" :active="request()->is('subkodrek2')">Subkode Rekening 2</x-sub-menu-link>
                        <x-sub-menu-link href="/subkodrek3" :active="request()->is('subkodrek3')">Subkode Rekening 3</x-sub-menu-link>
                        <x-sub-menu-link href="/subkodrek4" :active="request()->is('subkodrek4')">Subkode Rekening 4</x-sub-menu-link>
                        <x-sub-menu-link href="/subkodrek5" :active="request()->is('subkodrek5')">Subkode Rekening 5</x-sub-menu-link>
                    </ul>
                </li>
                <x-menu-link href="/anggaran" :active="request()->is('anggaran')" :icon="'bi bi-grid-fill'">Anggaran</x-menu-link>
                <x-menu-link href="/laporan" :active="request()->is('/laporan')" :icon="'bi bi-grid-fill'">Laporan</x-menu-link>
                <li class="sidebar-title">Keluar</li>
                <x-menu-link href="/logout" :active="request()->is('/logout')" :icon="'bi bi-grid-fill'">Keluar</x-menu-link>
            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>
