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
        <form action="/profilDesa/{{ $profil->id }}" method="post" enctype="multipart/form-data">
            @method('put')
            @csrf

            <div style="text-align: center; justify-content: center">
                <img src="{{ asset('storage/' . $profil->logoDesa) }}" class="img-fluid rounded-start" style="width: 150px">
                <h4 style="text-transform: capitalize"><b>{{ $profil->namaDesa }}</b></h4>
            </div>

            <div class="py-4">
                <div class="mb-3">
                    <label for="logoDesa" class="form-label" style="font-weight: bold">Logo Desa</label>

                    {{-- <input type="text" class="form-control @error('logoDesa') is-invalid @enderror" id="logoDesa" name="logoDesa" placeholder="Input your Name Village post" autofocus required value="{{ old('logoDesa', $profil->logoDesa)}}">
                    @error('logoDesa')
                    <div class="invalid-feedback">
                        <p style="text-align: left">{{ $message }}</p>
                    </div>
                    @enderror --}}

                    {{-- <div class="input-group mb-3">
                            <input type="file" class="form-control" id="logoDesa" name="logoDesa">
                        </div> --}}

                    {{-- mengirim data lama image --}}
                    <input type="hidden" name="oldImage" value="{{ $profil->logoDesa }}">

                    {{-- menampilkan preview gambar melalui js dari onchange --}}
                    @if ($profil->logoDesa)
                    <img src="{{ asset('storage/' . $profil->logoDesa) }}" class="img-preview mb-3  d-block" style="height: 80px">
                    @else
                    <img class="img-preview mb-3 " style="height: 80px">
                    @endif

                    <input class="form-control @error('logoDesa') is-invalid @enderror" type="file" id="logoDesa" name="logoDesa" onchange="previewImage()">
                    @error('logoDesa')
                    <div class="invalid-feedback">
                        <p style="text-align: left">{{ $message }}</p>
                    </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="namaDesa" class="form-label" style="font-weight: bold">Nama Desa</label>

                    <input type="text" class="form-control @error('namaDesa') is-invalid @enderror" id="namaDesa" name="namaDesa" placeholder="Input Nama Desa " autofocus required value="{{ old('namaDesa', $profil->namaDesa) }}">
                    @error('namaDesa')
                    <div class="invalid-feedback">
                        <p style="text-align: left">{{ $message }}</p>
                    </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="kepalaDesa" class="form-label" style="font-weight: bold">Kepala Desa</label>

                    <input type="text" class="form-control @error('kepalaDesa') is-invalid @enderror" id="kepalaDesa" name="kepalaDesa" placeholder="Input Nama Kepala Desa " autofocus required value="{{ old('kepalaDesa', $profil->kepalaDesa) }}">
                    @error('kepalaDesa')
                    <div class="invalid-feedback">
                        <p style="text-align: left">{{ $message }}</p>
                    </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="kecamatan" class="form-label" style="font-weight: bold">Kecamatan</label>

                    <input type="text" class="form-control @error('kecamatan') is-invalid @enderror" id="kecamatan" name="kecamatan" placeholder="Input Kecamatan" autofocus required value="{{ old('kecamatan', $profil->kecamatan) }}">
                    @error('kecamatan')
                    <div class="invalid-feedback">
                        <p style="text-align: left">{{ $message }}</p>
                    </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="kabupaten" class="form-label" style="font-weight: bold">Kabupaten</label>

                    <input type="text" class="form-control @error('kabupaten') is-invalid @enderror" id="kabupaten" name="kabupaten" placeholder="Input Kabupaten" autofocus required value="{{ old('kabupaten', $profil->kabupaten) }}">
                    @error('kabupaten')
                    <div class="invalid-feedback">
                        <p style="text-align: left">{{ $message }}</p>
                    </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="provinsi" class="form-label" style="font-weight: bold">Provinsi</label>

                    <input type="text" class="form-control @error('provinsi') is-invalid @enderror" id="provinsi" name="provinsi" placeholder="Input Provinsi" autofocus required value="{{ old('provinsi', $profil->provinsi) }}">
                    @error('provinsi')
                    <div class="invalid-feedback">
                        <p style="text-align: left">{{ $message }}</p>
                    </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="luasDesa" class="form-label" style="font-weight: bold">Luas Desa Km<sup>2</sup></label>

                    <input type="text" class="form-control @error('luasDesa') is-invalid @enderror" id="luasDesa" name="luasDesa" placeholder="Input Luas Desa" autofocus required value="{{ old('luasDesa', $profil->luasDesa) }}">
                    @error('luasDesa')
                    <div class="invalid-feedback">
                        <p style="text-align: left">{{ $message }}</p>
                    </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="jumlahDusun" class="form-label" style="font-weight: bold">Junmlah Dusun</label>

                    <input type="text" class="form-control @error('jumlahDusun') is-invalid @enderror" id="jumlahDusun" name="jumlahDusun" placeholder="Input Jumlah Dusun" autofocus required value="{{ old('jumlahDusun', $profil->jumlahDusun) }} ">
                    @error('jumlahDusun')
                    <div class="invalid-feedback">
                        <p style="text-align: left">{{ $message }}</p>
                    </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="jumlahKeluarga" class="form-label" style="font-weight: bold">Junmlah Keluarga</label>

                    <input type="text" class="form-control @error('jumlahKeluarga') is-invalid @enderror" id="jumlahKeluarga" name="jumlahKeluarga" placeholder="Input Jumlah Keluarga" autofocus required value="{{ old('jumlahKeluarga', $profil->jumlahKeluarga) }} ">
                    @error('jumlahKeluarga')
                    <div class="invalid-feedback">
                        <p style="text-align: left">{{ $message }}</p>
                    </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="jumlahJiwa" class="form-label" style="font-weight: bold">Junmlah Jiwa</label>

                    <input type="text" class="form-control @error('jumlahJiwa') is-invalid @enderror" id="jumlahJiwa" name="jumlahJiwa" placeholder="Input Jumlah Jiwa" autofocus required value="{{ old('jumlahJiwa', $profil->jumlahJiwa) }} ">
                    @error('jumlahJiwa')
                    <div class="invalid-feedback">
                        <p style="text-align: left">{{ $message }}</p>
                    </div>
                    @enderror
                </div>
                <div class="mb-3">

                    <label for="sejarah" class="form-label"><b>Sejarah Desa</b></label>
                    {{-- karena bukan dari boostrap tidak bisa menggunakan class invalid --}}
                    @error('sejarah')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                    <input id="sejarah" type="hidden" name="sejarah" value="{{ old('sejarah', $profil->sejarah) }}">
                    <trix-editor input="sejarah"></trix-editor>
                </div>
            </div>

            <div>
                <button type="submit" class="btn btn-primary">Update Profil</button>
            </div>

        </form>

    </div>
</main>
@endsection