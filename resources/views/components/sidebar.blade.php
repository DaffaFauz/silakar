<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex justify-content-between">
                <div class="logo">
                    <a href="index.html"><img class="img-fluid w-75 h-auto"
                            src="{{ asset('assets/images/logo/LogoPuskesmas.png') }}" alt=""></a>
                </div>
                <div class="toggler">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-title">Menu</li>
                <x-menu-link href="/dashboard" :active="request()->is('dashboard')" :icon="'bi bi-grid-fill'">Dashboard</x-menu-link>
                @if (Auth::user()->jabatan === 'staff_keuangan')
                    <x-menu-link href="/kodrek" :active="request()->is('kodrek')" :icon="'bi bi-stack'">Kode Rekening</x-menu-link>
                @endif
                @if (in_array(Auth::user()->jabatan, ['staff_keuangan', 'bendahara']))
                    <x-menu-link href="/anggaran" :active="request()->is('anggaran')" :icon="'fa fa-money-check-alt'">Anggaran</x-menu-link>
                @endif
                @if (Auth::user()->jabatan === 'staff_keuangan')
                    <x-menu-link href="/realisasi" :active="request()->is('realisasi')" :icon="'fa fa-money-bill-wave'">Realisasi</x-menu-link>
                @endif
                <x-menu-link href="/laporan" :active="request()->is('laporan')" :icon="'fa fa-file-alt'">Laporan</x-menu-link>
                <li class="sidebar-title">Keluar</li>
                <x-menu-link href="/logout" :active="request()->is('/logout')" :icon="'fa fa-sign-out-alt'">Keluar</x-menu-link>
            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>
