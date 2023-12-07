<header id="header" class="d-flex align-items-center">
    <div class="container d-flex align-items-center">
        <h1 class="logo me-auto">
            <a href="/">
                <img src="https://i.ibb.co/8X5FTDS/logo.png" alt="Logo HAFAATOUR">
                HAFAATOUR
            </a>
        </h1>
        <nav id="navbar" class="navbar">
            <ul>
                <li><a class="nav-link scrollto" href="/">Beranda</a></li>
                <li><a class="nav-link scrollto" href="{{ route('package') }}">Paket Wisata</a></li>
                <li><a class="nav-link" href="{{ route('about') }}">Tentang Kami</a></li>
                <li><a class="nav-link" href="{{ route('invoice.index') }}">Cari Invoice</a></li>
                <li><a class="getstarted" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#searchModal">Cari Paket Wisata</a></li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav>
    </div>
</header>
<footer>
    
</footer>
<!-- Modal -->
@include('landingpage.modal')