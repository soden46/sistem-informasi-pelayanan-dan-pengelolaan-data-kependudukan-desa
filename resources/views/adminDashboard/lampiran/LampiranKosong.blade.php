@extends('../layout/mainAdmin')

@section('adminContent')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">{{ $title }}</h1>
    </div>
    <div class="card" style="width: 100%; height: 100%; background-color: white; padding: 20px">
        <!-- Modal Show Lampiran-->
        <div class="container">

            <h3>Data Lampiran Kosong, Silahkan Unggah/Upload Lampiran</h3>
            <h6>Saat Mengunggah File Lampiran, Pastikan File Lampiran Berupa (jpg/pdf) Dengan Ukuran Masksmal 2MB/File</h6>

        </div>
    </div>
</main>
@endsection