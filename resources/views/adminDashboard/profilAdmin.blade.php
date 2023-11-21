@extends('../layout/mainAdmin')

@section('adminContent')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">{{ $title }}</h1>
        {{-- <div class="btn-toolbar mb-2 mb-md-0">
                <div class="btn-group me-2">
                <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
                <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
                </div>
                <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
                <span data-feather="calendar" class="align-text-bottom"></span>
                This week
                </button>
            </div> --}}
    </div>
    <div class="card" style="width: 100%; height: 100%; background-color: white; padding: 20px">
        @if (session()->has('successUpdatedPost'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session('successUpdatedPost') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        @if (session()->has('successUpdatedVisiMisi'))
        <div class="alert alert-info alert-dismissible fade show" role="alert">
            <strong>{{ session('successUpdatedVisiMisi') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <div>
            <a href="/profilDesa/{{ $profil->id }}/edit" class="btn btn-primary">Update Profil Desa</a>
        </div>
        <div class="d-inline-block " style="text-align: center">
            <img src="{{ asset('storage/'. $profil->logoDesa) }}" class="img-fluid rounded-start" alt="..." style="width: 150px">
            <h5 style="font-family: 'Raleway', sans-serif; margin-top: 15px">{{ $profil->namaDesa }}</h5>
        </div>

        <div class="py-4">
            <table class="table" style="text-align: left; color: black">
                <tr>
                    <td style="width: 15%; font-weight: bold">Nama Desa</td>
                    <td style="width: 85%">: {{ $profil->namaDesa }}</td>
                </tr>
                <tr>
                    <td style="width: 15%; font-weight: bold">Kepala Desa</td>
                    <td style="width: 85%">: {{ $profil->kepalaDesa }}</td>
                </tr>
                <tr>
                    <td style="width: 15%; font-weight: bold">Kecamatan</td>
                    <td style="width: 85%">: {{ $profil->kecamatan }}</td>
                </tr>
                <tr>
                    <td style="width: 15%; font-weight: bold">Kabupaten</td>
                    <td style="width: 85%">: {{ $profil->kabupaten }}</td>
                </tr>
                <tr>
                    <td style="width: 15%; font-weight: bold">Provinsi</td>
                    <td style="width: 85%">: {{ $profil->provinsi }}</td>
                </tr>
                <tr>
                    <td style="width: 15%; font-weight: bold">Luas Desa</td>
                    <td style="width: 85%">: {{ $profil->luasDesa }} Km<sup>2</sup></td>
                </tr>
                <tr>
                    <td style="width: 15%; font-weight: bold">Jumlah Dusun</td>
                    <td style="width: 85%">: {{ $profil->jumlahDusun }} Dusun</td>
                </tr>
                <tr>
                    <td style="width: 15%; font-weight: bold">Jumlah Keluarga</td>
                    <td style="width: 85%">: {{ $profil->jumlahKeluarga }} Keluarga</td>
                </tr>
                <tr>
                    <td style="width: 15%; font-weight: bold">Jumlah Jiwa</td>
                    <td style="width: 85%">: {{ $profil->jumlshJiwa }} Jiwa</td>
                </tr>
            </table>
        </div>

        <div class="mb-4 p-2">
            <div id="sejarah" class="mb-5">
                <div style="background-color: #006029; color: whitesmoke; width: 100%">
                    <h5 class="py-2" style="font-family: 'Raleway', sans-serif; text-align: center;">Sejarah</h5>
                </div>
                <div style="text-align: justify; margin-top: 10px">
                    {!! $profil->sejarah !!}
                </div>
            </div>


        </div>
    </div>
</main>
@endsection