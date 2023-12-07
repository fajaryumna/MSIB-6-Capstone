<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link " href="{{ route('dashboard') }}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li>

        {{-- <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-globe"></i><span>Website</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="banner.php">
                        <i class="bi bi-circle"></i><span>Banner</span>
                    </a>
                </li>
                <li>
                    <a href="tables-data.html">
                        <i class="bi bi-circle"></i><span>Berita dan Artikel</span>
                    </a>
                </li>
                <li>
                    <a href="tables-data.html">
                        <i class="bi bi-circle"></i><span>Galeri</span>
                    </a>
                </li>
            </ul>
        </li> --}}

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-menu-button-wide"></i><span>Master Data</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('data_user') }}">
                        <i class="bi bi-circle"></i><span>Data Pengguna</span>
                    </a>
                </li>
                {{-- <li>
                    <a href="components-alerts.html">
                        <i class="bi bi-circle"></i><span>Kategori Wisata</span>
                    </a>
                </li> --}}
                <li>
                    <a href="{{ route('data_tour') }}">
                        <i class="bi bi-circle"></i><span>Paket Wisata</span>
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('riwayat') }}">
                <i class="bi bi-shop"></i>
                <span>Transaksi</span>
            </a>
        </li>
    </ul>

</aside>