@extends('../layout/mainAdmin')

@section('adminContent')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">{{ $title }}</h1>
    </div>
    <div class="card" style="width: 100%; height: 100%; background-color: white; padding: 20px">
        <!-- Modal Show Lampiran-->
        <div class="container">

            <div class="col-sm">
                <label for="pengetar_rt">Surat Pengantar RT</label>
                <a href="{{asset('storage/'.$rt)}}" target="_blank"><button class="btn btn-success"> Lihat</button></a>
            </div>
            <div class="col-sm">
                <label for="pengetar_rt">Surat Pengantar Dokter</label>
                <a href="{{asset('storage/'.$dokter)}}" target="_blank"><button class="btn btn-success"> Lihat</button></a>
            </div>
            <div class="col-sm">
                <label for="pengetar_rt">Kartu Keluarga</label>
                <a href="{{asset('storage/'.$kk)}}" target="_blank"><button class="btn btn-success"> Lihat</button></a>
            </div>
            <div class="col-sm">
                <label for="pengetar_rt">KTP ISTRI</label>
                <a href="{{asset('storage/'.$istri)}}" target="_blank"><button class="btn btn-success"> Lihat</button></a>
            </div>
            <div class="col-sm">
                <label for="pengetar_rt">KTP SUAMI</label>
                <a href="{{asset('storage/'.$suami)}}" target="_blank"><button class="btn btn-success"> Lihat</button></a>
            </div>
            <div class="col-sm">
                <label for="pengetar_rt">Buku Nikh</label>
                <a href="{{asset('storage/'.$nikah)}}" target="_blank"><button class="btn btn-success"> Lihat</button></a>
            </div>
            <div class="col-sm">
                <label for="pengetar_rt">KTP Pelapor</label>
                <a href="{{asset('storage/'.$pelapor)}}" target="_blank"><button class="btn btn-success"> Lihat</button></a>
            </div>
            <div class="col-sm">
                <label for="pengetar_rt">KTP Saksi 1</label>
                <a href="{{asset('storage/'.$saksi)}}" target="_blank"><button class="btn btn-success"> Lihat</button></a>
            </div>
            <div class="col-sm">
                <label for="pengetar_rt">KTP Saksi 2</label>
                <a href="{{asset('storage/'.$saksi2)}}" target="_blank"><button class="btn btn-success"> Lihat</button></a>
            </div>
        </div>
    </div>
</main>
@endsection