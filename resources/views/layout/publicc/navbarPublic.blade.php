<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
<nav class="navbar navUtama" >
    <style>
        @media (min-width: 320px) and (max-width: 480px) 
        {

            #normal{
                display: none !important;
            }

            #mobile{
                display: block !important;
            }

        }
    </style>

    <div id="mobile" class="container-fluid" style="display: none">
        <div class="navbar-brand d-inline-flex "  style="margin-left: 0; margin-top: 10px; margin-bottom: -8px">
            <img src="{{ asset('storage/'. $profil->logoDesa) }}" alt="Logo" width="50" height="55" class="d-inline-block align-text-top">
            <div>
                <h5 style="margin-left: 10px; font-family: 'Raleway', sans-serif; color: white; text-transform: uppercase"><b>{{ $other->shortTitle }} {{ $profil->namaDesa }}</b></h5>
                <p style="margin-left: 10px; font-size: 10px; margin-top: -8px; color: whitesmoke; ">{{ $other->fullTitle }} {{ $profil->namaDesa }}</p>
                <p style="margin-left: 10px; margin-top: -10px; border: 0; border-bottom: 1px solid white"></p>
            </div>
            <button style="margin-left: 40px; margin-top: -10px; border: 0" class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar">
                <h1><span style="color: white; " class="bi bi-grid-fill"></span></h1>
            </button>
        </div>
        <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
            <div class="offcanvas-header" style="border: 0; border-bottom: 1px solid white">
                <div class="d-inline-flex">
                    <img src="{{ asset('storage/'. $profil->logoDesa) }}" alt="Logo" width="40" height="45" class="d-inline-block align-text-top">
                    <div class="d-inline-block">

                        <h5 style="margin-left: 10px; font-family: 'Raleway', sans-serif; color: white; text-transform: uppercase"><b>{{ $other->shortTitle }} {{ $profil->namaDesa }}</b></h5>
                        <p style="margin-left: 10px; font-size: 10px; margin-top: -8px; color: whitesmoke; ">{{ $other->fullTitle }} {{ $profil->namaDesa }}</p>
                    </div>
                </div>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                    <li class="nav-item" >
                        <a style="color: white" class="nav-link active" aria-current="page" href="/">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a style="color: white" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Informasi Desa
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark">
                            <li><a class="dropdown-item" href="/informasiPublic/profil">Profil Desa</a></li>
                            <li><a class="dropdown-item" href="/informasiPublic/apbdes">APBDES Desa</a></li>
                            <li><a class="dropdown-item" href="/informasiPublic/perdes">PERDES Desa</a></li>
                            <li><a class="dropdown-item" href="/informasiPublic/kegiatan">Kegiatan Desa</a></li>
                            <li><a class="dropdown-item" href="/informasiPublic/musyawarah">Musyawarah Desa</a></li>
                            <li><a class="dropdown-item" href="/informasiPublic/kelembagaan">Kelembagaan Desa</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a style="color: white" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Pelayanan Desa
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark">
                            <li><a class="dropdown-item" href="/pelayananPublic/surat">Pengajuan Surat</a></li>
                            <li><a class="dropdown-item" href="/pelayananPublic/pengaduan">Pengaduan</a></li>
                        </ul>
                    </li>
                    <li class="nav-item" >
                        <a style="color: white" class="nav-link active" aria-current="page" href="/login"><button class="btn btn-success">Login Admin</button></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div id="normal" class="container-fluid">
        <div class="navbar-brand d-inline-flex "  style="margin-left: 18px; margin-top: 10px; margin-bottom: -8px">
            <img src="{{ asset('storage/'. $profil->logoDesa) }}" alt="Logo" width="50" height="55" class="d-inline-block align-text-top">
            <div>
                <h3 style="margin-left: 15px; font-family: 'Raleway', sans-serif; color: white; text-transform: uppercase"><b>{{ $other->shortTitle }} {{ $profil->namaDesa }}</b></h3>
                <p style="margin-left: 15px; font-size: 14px; margin-top: -10px; color: whitesmoke">{{ $other->fullTitle }} {{ $profil->namaDesa }}</p>
            </div>
            
        
        </div>
        <div class=" navbar-brand d-inline-flex" >
            <div class="d-inline-flex" style="margin-right: 50px; margin-top: 5px; color: white" >
                <a href="/" class="nvh nav-link" style="margin-right: 25px; font-weight:{{ Request::is('homePublic') ? 'bold' : '' }}">Home</a>


                <div class="nav-item dropdown">
                    <a href="#" class="nvh nav-link dropdown-toggle" style="margin-right: 25px; font-weight:{{ Request::is('informasiPublic*') ? 'bold' : '' }}" role="button" data-bs-toggle="dropdown" aria-expanded="false">Informasi Desa</a>

                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="/informasiPublic/profil">Profil Desa</a></li>
                        <li><a class="dropdown-item" href="/informasiPublic/apbdes">APBDES Desa</a></li>
                        <li><a class="dropdown-item" href="/informasiPublic/perdes">PERDES Desa</a></li>
                        <li><a class="dropdown-item" href="/informasiPublic/kegiatan">Kegiatan Desa</a></li>
                        <li><a class="dropdown-item" href="/informasiPublic/musyawarah">Musyawarah Desa</a></li>
                        <li><a class="dropdown-item" href="/informasiPublic/kelembagaan">Kelembagaan Desa</a></li>
                    </ul>
                </div>
                
                <div class="nav-item dropdown">
                    <a href="#" class="nvh nav-link dropdown-toggle" style="margin-right: 25px; font-weight:{{ Request::is('pelayananPublic*') ? 'bold' : '' }}" role="button" data-bs-toggle="dropdown" aria-expanded="false">Pelayanan Desa</a>

                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="/pelayananPublic/surat">Pengajuan Surat</a></li>
                        <li><a class="dropdown-item" href="/pelayananPublic/pengaduan">Pengaduan</a></li>
                    </ul>
                </div>
            
            </div>

            <a href="/login" class="login navbar-brand d-inline-flex p-1" style="color: white;">
                <h3><span class="bi bi-person-circle"></span></h3>
            </a>
        </div>
        
    </div>
</nav>