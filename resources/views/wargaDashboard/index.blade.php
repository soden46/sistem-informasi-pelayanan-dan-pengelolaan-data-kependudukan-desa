@extends('../layout/mainWarga')

@section('wargaContent')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mt-5">
    <div class="col-md-3 mb-5">
        <h3><a href="" class="text-black">DASHBOARD</a></h3>
    </div>
    <div class="row">
        @if (session()->has('loginSuccess'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session('loginSuccess') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <style>
            .mainMenu:hover {
                background-color: gainsboro
            }
        </style>
        <div class="col-md-3 mb-4">
            <div class="card d-inline-flex mainMenu" style="width: 50rem; padding: 12px;  border-left: 5px solid #1746a2">
                <a href="data-mutasi-keluar" style="text-decoration: none; color: black">
                    <div class="d-flex">
                        <div style="width: 40rem">
                            <h6 style="color: #1746a2">SELAMAT DATANG DI:</h6>
                            <h4>WEBSITE PELAYANAN DAN PENGELOLAAN
                                DATA KEPENDUDUKAN KALURAHAN AMBARKETAWANG</h4>
                        </div>
                        <div style="width: 4rem; ">
                            <h1><span style="color: black; vertical-align: middle" class="bi bi-file-earmark-text"></span></h1>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</main>
@endsection