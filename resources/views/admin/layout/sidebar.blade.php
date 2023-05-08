<!-- Menu -->

<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="/admin-area" class="app-brand-link">
            <span class="app-brand-logo demo" style="width: 100%; height: 100%">
                <img src="{{ asset('assets/img/logo12.png') }}" alt="?">
            </span>
            <!--<span class="app-brand-text demo menu-text fw-bolder ms-2">IF-Admin</span>-->
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboard -->
        <li class="menu-item @if ($menu == 'home') active @endif">
            <a href="/admin-area" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div>Beranda</div>
            </a>
        </li>

        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Menu Tentang</span>
        </li>

        <li class="menu-item @if ($menu == 'informasi') active @endif">
            <a href="/admin-area/informasi-umum" class="menu-link">
                <i class="menu-icon tf-icons bx bx-info-circle"></i>
                Informasi Umum
            </a>
        </li>

        <li class="menu-item @if ($menu == 'dokter') active @endif">
            <a href="/admin-area/dokter" class="menu-link">
                <i class="menu-icon tf-icons bx bx-group"></i>
                Dokter
            </a>
        </li>

        <li class="menu-item @if (($menu == 'galeri')) active open @endif">
            <a href="/admin-area/galeri" class="menu-link">
                <i class="menu-icon tf-icons bx bx-image"></i>
                <div>Galeri</div>
            </a>
        </li>

        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Menu Admin</span>
        </li>

        <li class="menu-item @if ($menu == 'pengguna') active @endif">
            <a href="/admin-area/akun" class="menu-link">
                <i class='menu-icon tf-icons bx bxs-user-account' ></i>
                Data Admin
            </a>
        </li>

        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Menu Pasien</span>
        </li>

        <li class="menu-item @if ($menu == 'pasien') active @endif">
            <a href="/admin-area/pasien" class="menu-link">
                <i class='menu-icon tf-icons bx bxs-user-account' ></i>
                Data Pasien
            </a>
        </li>
    </ul>
</aside>
<!-- / Menu -->
