<style>
    ul>li>a:hover {
        color: blue !important;
    }
</style>
<!-- Sidebar Masyarakat/Warga -->
<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="d-flex">
        <div class="d-flex justify-content-start px-2"><img src="{{asset('storage/asset/sleman.png')}}" id="foto" alt="Logo" height="75px" /></div>
        <div class="mt-3"><b>Kalurahan Ambarketawang,</b><br>
            <b>Warga/Masyarakat</b>
        </div>
    </div>
    <div class="position-sticky pt-3 sidebar-sticky">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ Request::is('masyarakat') ? 'active' : '' }}" aria-current="page" href="/masyarakat">
                    <span class="align-text-bottom bi bi-speedometer2"></span>
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('warga/surat-ket-beda-nama*') ? 'active' : '' }}" href="/warga/surat-ket-beda-nama">
                    <span class="align-text-bottom bi bi-file-earmark-text"></span>
                    Data SK Beda Nama
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('warga/surat-keterangan-status*') ? 'active' : '' }}" href="/warga/surat-keterangan-status">
                    <span class="align-text-bottom bi bi-file-earmark-text"></span>
                    Data SK Status
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('warga/surat-keterangan-biasa*') ? 'active' : '' }}" href="/warga/surat-keterangan-biasa">
                    <span class="align-text-bottom bi bi-file-earmark-text"></span>
                    Data SK Biasa
                </a>
            </li>
            <!-- <li class="nav-item">
                <a class="nav-link {{ Request::is('warga/surat-keterangan-kelahiran*') ? 'active' : '' }}" href="/warga/surat-keterangan-kelahiran">
                    <span class="align-text-bottom bi bi-file-earmark-text"></span>
                    Data Kelahiran
                </a>
            </li> -->
            <li class="nav-item">
                <a class="nav-link {{ Request::is('warga/surat-keterangan-kematian*') ? 'active' : '' }}" href="/warga/surat-keterangan-kematian">
                    <span class="align-text-bottom bi bi-file-earmark-text"></span>
                    Data Kematian
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('warga/data-mutasi-masuk*') ? 'active' : '' }}" href="/warga/data-mutasi-masuk">
                    <span class="align-text-bottom bi bi-file-earmark-text"></span>
                    Data Mutasi Masuk
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('warga/data-mutasi-keluar*') ? 'active' : '' }}" href="/warga/data-mutasi-keluar">
                    <span class="align-text-bottom bi bi-file-earmark-text"></span>
                    Data Mutasi Keluar
                </a>
            </li>
        </ul>
        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-uppercase">
            <span style="text-align: center">LOGOUT</span>
        </h6>
        <ul class="nav flex-column mb-2">
            <li class="nav-item">
                <a class="nav-link" href="/logout"><span class="bi bi-box-arrow-right" style="margin-right: 8px"></span>Log Out</a>
            </li>
        </ul>
    </div>
</nav>