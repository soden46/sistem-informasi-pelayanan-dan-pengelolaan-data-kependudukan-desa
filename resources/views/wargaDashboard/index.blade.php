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
        <div class="card w-80 mb-2">
            <div class="card-body">
                <h5 style="color: #1746a2">SELAMAT DATANG DI:</h5>
                <h6>WEBSITE PELAYANAN DAN PENGELOLAAN
                    DATA KEPENDUDUKAN KALURAHAN AMBARKETAWANG</h6>
            </div>
        </div>
        <div></div>
        <div class="card w-80 mb-2">
            <div class="card-body">
                <h4 class="card-title" style="color: #ff0000">Informasi Penting!</h4>
                <h6 style="color: #ff0000"><b> Akun baru diwajibkan mengganti password, karena password default/bawaan adalah tanggal lahir!!!
                    </b></h6>
                <p class="card-text"><b>Persyaratan pengajuan surat keterangan :</b></p>
                <span class="card-text">1. Memilih nik dan mengisi form data diri dengan benar sesuai layanan terpilih. Menggunakan huruf kapital di awal kata.
                </span>
                <br>
                <span class="card-text">2. mengunggah dokumen lampiran berupa pdf yang sesuai. Pastikan dokumen yang Anda unggah berupa scan/foto dokumen ASLI dan dapat TERBACA dengan jelas.
                </span>
                <br>
                <br>
                <p class="card-text"><b> Pengambilan:</b></p>
                <span class="card-text">1. Setelah pengguna mengajukan surat keterangan maka perhatikan bagian Verifikasi, jika status verifikasi "Terverifikasi" maka surat sudah selesai di proses dan bisa diambil.
                </span>
                <br>
                <span class="card-text">2. Pengambilan surat keterangan tidak bisa diwakilkan oleh siapapun. Pengguna bisa hadir mengambil surat keterangan dengan pendamping.
                </span>
            </div>
        </div>
    </div>
</main>
@endsection