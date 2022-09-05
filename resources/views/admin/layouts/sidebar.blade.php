<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item {{ request()->is('dashboard*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('dashboard.index') }}">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        @if (Auth::user()->role_user == 'admin')
            <li class="nav-item {{ request()->is('admin/buku*') ? 'active' : '' }}">
                <a class="nav-link" data-toggle="collapse" href="#error" aria-expanded="false" aria-controls="error">
                    <i class="icon-book menu-icon"></i>
                    <span class="menu-title">Buku</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="error">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link" href="{{ route('buku.index') }}">Data
                                Buku
                            </a></li>
                        <li class="nav-item"> <a class="nav-link" href="{{ route('kategori.index') }}">Kategori
                                Buku
                            </a></li>
                        <li class="nav-item"> <a class="nav-link" href="{{ route('pinjambuku.index') }}">
                                Peminjaman
                                Buku </a></li>
                    </ul>
                </div>
            </li>
            <li class="nav-item {{ request()->is('admin/donasi*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('donasi.index') }}">
                    <i class="icon-grid menu-icon"></i>
                    <span class="menu-title">Data Donatur</span>
                </a>
            </li>
            <li class="nav-item {{ request()->is('admin/murid*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('murid.index') }}">
                    <i class="icon-grid menu-icon"></i>
                    <span class="menu-title">Data User</span>
                </a>
            </li>
            <li class="nav-item {{ request()->is('admin/jadwal*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('jadwal.index') }}">
                    <i class="icon-grid menu-icon"></i>
                    <span class="menu-title">Jadwal TBM</span>
                </a>
            </li>
        @elseif (Auth::user()->role_user == 'donatur')
            <li class="nav-item {{ request()->is('donatur/donatur*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('donatur.index') }}">
                    <i class="icon-grid menu-icon"></i>
                    <span class="menu-title">Donasi Buku</span>
                </a>
            </li>
        @endif
    </ul>
</nav>
