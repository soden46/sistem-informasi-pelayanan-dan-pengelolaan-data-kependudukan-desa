<style>
    ul>li>a:hover {
        color: blue !important;
    }
</style>
<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="d-flex">
        <div class="d-flex justify-content-start px-2"><img src="{{asset('images/logo/sleman.png')}}" id="foto" alt="Logo" height="75px" /></div>
        <div class="mt-3"><b>Kalurahan Ambarketawang,</b><br>
            <b>Staff Kalurahan</b>
        </div>
    </div>
    <div class="position-sticky pt-3 sidebar-sticky">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ Request::is('admin') ? 'active' : '' }}" aria-current="page" href="/admin">
                    <span class="align-text-bottom bi bi-speedometer2"></span>
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('data-penduduk*') || Request::is('detail-penduduk') ? 'active' : '' }}" href="/data-penduduk">
                    <span class="align-text-bottom bi bi-people"></span>
                    Data Penduduk
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('data-kk') ? 'active' : '' }}" href="/data-kk">
                    <span class="align-text-bottom bi bi-people"></span>
                    Data Kepala Keluarga
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('surat-keterangan-kelahiran*') ? 'active' : '' }}" href="/surat-keterangan-kelahiran">
                    <span class="align-text-bottom bi bi-file-earmark-text"></span>
                    Data Kelahiran
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('surat-keterangan-kematian*') ? 'active' : '' }}" href="/surat-keterangan-kematian">
                    <span class="align-text-bottom bi bi-file-earmark-text"></span>
                    Data Kematian
                </a>
            </li>
            <!-- <li class="nav-item">
                <a class="nav-link {{ Request::is('data-mutasi-masuk*') ? 'active' : '' }}" href="/data-mutasi-masuk">
                    <span class="align-text-bottom bi bi-file-earmark-text"></span>
                    Data Mutasi Masuk
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('data-mutasi-keluar*') ? 'active' : '' }}" href="/data-mutasi-keluar">
                    <span class="align-text-bottom bi bi-file-earmark-text"></span>
                    Data Mutasi Keluar
                </a>
            </li> -->
            <li class="nav-item">
                <a class="nav-link {{ Request::is('surat-ket-beda-nama*') ? 'active' : '' }}" href="/surat-ket-beda-nama">
                    <span class="align-text-bottom bi bi-file-earmark-text"></span>
                    Data SK Beda Nama
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('surat-keterangan-status*') ? 'active' : '' }}" href="/surat-keterangan-status">
                    <span class="align-text-bottom bi bi-file-earmark-text"></span>
                    Data SK Status
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('surat-keterangan-biasa*') ? 'active' : '' }}" href="/surat-keterangan-biasa">
                    <span class="align-text-bottom bi bi-file-earmark-text"></span>
                    Data SK Biasa
                </a>
            </li>
        </ul>
        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-2 mb-1 text-uppercase">
            <span style="text-align: center">Administrator</span>
        </h6>
        <ul class="nav flex-column mb-2">
            <li class="nav-item">
                <a class="nav-link {{ Request::is('myAcount*') ? 'active' : '' }}" href="/myAcount">
                    <span class="align-text-bottom bi bi-person-badge"></span>
                    My Account
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ Request::is('other-account*') ? 'active' : '' }}" href="/other-account">
                    <span class="align-text-bottom bi bi-person-plus"></span>
                    Other Accounts
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/logout"><span class="bi bi-box-arrow-right" style="margin-right: 8px"></span>Log Out</a>
            </li>
        </ul>
    </div>
</nav>