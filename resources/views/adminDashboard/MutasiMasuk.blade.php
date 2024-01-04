@extends('../layout/mainAdmin')

@section('adminContent')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">{{ $title }}</h1>
    </div>
    <div class="card" style="width: 100%; height: 100%; background-color: white; padding: 20px">
        @if (session()->has('successUpdatedMasyarakat'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session('successUpdatedMasyarakat') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        @if (session()->has('successCreatedMasyarakat'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session('successCreatedMasyarakat') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        @if (session()->has('successDeletedMasyarakat'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>{{ session('successDeletedMasyarakat') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        @if (session()->has('successDeletedAllData'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>{{ session('successDeletedAllData') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif


        <div>
            <div class="d-flex">

                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#cretaeDataMasyarakat" style="margin-right: 15px">Tambah Data Mutasi Masuk</button>
                <form action="/data-mutasi-masuk" method="GET" style="margin-left: 40%">

                    <input type="text" id="cari" name="cari" placeholder="Cari NIK/No KK/Nama">
                    <button type="submit" class="btn btn-success">Cari</button>
                </form>
            </div>


            <!-- Modal create-->
            <div class="modal fade" id="cretaeDataMasyarakat" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="cretaeDataMasyarakatLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="cretaeDataMasyarakatLabel">Tambah Data Mutasi Masuk</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{route('data-mutasi-masuk/store')}}" method="post">
                            @csrf
                            <div class="modal-body">

                                <div class="mb-3">
                                    <label for="tgl_regis_mm" class="form-label"><b>TGL Regis</b></label>

                                    <input type="date" name="tgl_regis_mm" id="tgl_regis_mm" class="form-control @error('tgl_regis_mm') is-invalid @enderror" required value="{{ old('tgl_regis') }}" autocomplete="off" placeholder="Input Tanggal Regis">

                                    @error('tgl_regis_mm')
                                    <div class="invalid-feedback">
                                        <p style="text-align: left">{{ $message }}</p>
                                    </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="nik_pelapor" class="form-label"><b>NIK Pelapor</b></label>

                                    <input type="text" name="nik_pelapor" id="nik_pelapor" class="form-control @error('nik_pelapor') is-invalid @enderror" required value="{{ old('nik_pelapor') }}" autocomplete="off" placeholder="Input NIK pelapor">

                                    @error('nik_pelapor')
                                    <div class="invalid-feedback">
                                        <p style="text-align: left">{{ $message }}</p>
                                    </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="nama_pelapor" class="form-label"><b>Nama Pelapor</b></label>

                                    <input type="text" name="nama_pelapor" id="nama_pelapor" class="form-control @error('nama_pelapor') is-invalid @enderror" required value="{{ old('nama_pelapor') }}" autocomplete="off" placeholder="Input Nama Pelapor">

                                    @error('nama_pelapor')
                                    <div class="invalid-feedback">
                                        <p style="text-align: left">{{ $message }}</p>
                                    </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="nik_mm" class="form-label"><b>NIK</b></label>

                                    <input type="text" name="nik_mm" id="nik_mm" class="form-control @error('nik_mm') is-invalid @enderror" required value="{{ old('nik_mm') }}" autocomplete="off" placeholder="Input NIK">

                                    @error('nik_mm')
                                    <div class="invalid-feedback">
                                        <p style="text-align: left">{{ $message }}</p>
                                    </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="nama_mm" class="form-label"><b>Nama</b></label>

                                    <input type="text" name="nama_mm" id="nama_mm" class="form-control @error('nama_mm') is-invalid @enderror" required value="{{ old('nama_mm') }}" autocomplete="off" placeholder="Input Nama">

                                    @error('nama_mm')
                                    <div class="invalid-feedback">
                                        <p style="text-align: left">{{ $message }}</p>
                                    </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="jk_mm" class="form-label"><b>Jenis Kelamin</b></label>
                                    <select class="form-select" name="jk_mm" id="jk_mm">
                                        <option name="jk_mm" id="jk_mm" value="" selected>Silakan Pilih Jenis Kelamin</option>
                                        <option name="jk_mm" id="jk_mm" value="Laki-Laki">Laki-Laki</option>
                                        <option name="jk_mm" id="jk_mm" value="Perempuan">Perempuan</option>
                                    </select>
                                </div>

                                <div class="form-group row mb-3">
                                    <div class="col-sm-6">
                                        <label for="tempat_lh_mm" class="form-label"><b>Tempat Lahir</b></label>

                                        <input type="text" name="tempat_lh_mm" id="tempat_lh_mm" class="form-control @error('tempat_lh_mm') is-invalid @enderror" required value="{{ old('tempat_lh_mm') }}" autocomplete="off" placeholder="Input Tempat Lahir">

                                        @error('tempat_lh_mm')
                                        <div class="invalid-feedback">
                                            <p style="text-align: left">{{ $message }}</p>
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="tgl_lh_mm" class="form-label"><b>Tanggal Lahir</b></label>

                                        <input type="date" name="tgl_lh_mm" id="tgl_lh_mm" class="form-control @error('tgl_lh_mm') is-invalid @enderror" required value="{{ old('tgl_lh_mm') }}" autocomplete="off" placeholder="Input Tanggal Lahir">

                                        @error('tgl_lh_mm')
                                        <div class="invalid-feedback">
                                            <p style="text-align: left">{{ $message }}</p>
                                        </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="agama_mm" class="form-label"><b>Agama</b></label>

                                    <input type="text" name="agama_mm" id="agama_mm" class="form-control @error('agama_mm') is-invalid @enderror" required value="{{ old('agama_mm') }}" autocomplete="off" placeholder="Input Agama">

                                    @error('agama_mm')
                                    <div class="invalid-feedback">
                                        <p style="text-align: left">{{ $message }}</p>
                                    </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="pekerjaan_mm" class="form-label"><b>Pekerjaan</b></label>

                                    <input type="text" name="pekerjaan_mm" id="pekerjaan_mm" class="form-control @error('pekerjaan_mm') is-invalid @enderror" required value="{{ old('pekerjaan_mm') }}" autocomplete="off" placeholder="Input Pekerjaan">

                                    @error('pekerjaan_mm')
                                    <div class="invalid-feedback">
                                        <p style="text-align: left">{{ $message }}</p>
                                    </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="status_kawin_mm" class="form-label"><b>Status Kawin</b></label>

                                    <input type="text" name="status_kawin_mm" id="status_kawin_mm" class="form-control @error('status_kawin_mm') is-invalid @enderror" required value="{{ old('status_kawin_mm') }}" autocomplete="off" placeholder="Input Status Kawin">

                                    @error('status_kawin_mm')
                                    <div class="invalid-feedback">
                                        <p style="text-align: left">{{ $message }}</p>
                                    </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="no_kk" class="form-label"><b>NO KK</b></label>

                                    <input type="text" name="no_kk" id="no_kk" class="form-control @error('no_kk') is-invalid @enderror" required value="{{ old('no_kk') }}" autocomplete="off" placeholder="Input NO KK">

                                    @error('no_kk')
                                    <div class="invalid-feedback">
                                        <p style="text-align: left">{{ $message }}</p>
                                    </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="alamat_asal_mm" class="form-label"><b>Alamat Asal</b></label>

                                    <input type="text" name="alamat_asal_mm" id="alamat_asal_mm" class="form-control @error('alamat_asal_mm') is-invalid @enderror" required value="{{ old('alamat_asal_mm') }}" autocomplete="off" placeholder="Input Alamat Asal">

                                    @error('alamat_asal_mm')
                                    <div class="invalid-feedback">
                                        <p style="text-align: left">{{ $message }}</p>
                                    </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="padukuhan_tuju" class="form-label"><b>Padukuhan Tujuan</b></label>

                                    <input type="text" name="padukuhan_tuju" id="padukuhan_tuju" class="form-control @error('padukuhan_tuju') is-invalid @enderror" required value="{{ old('padukuhan_tuju') }}" autocomplete="off" placeholder="Input Padukuhan Tujuan">

                                    @error('padukuhan_tuju')
                                    <div class="invalid-feedback">
                                        <p style="text-align: left">{{ $message }}</p>
                                    </div>
                                    @enderror
                                </div>

                                <div class="form-group row mb-3">
                                    <div class="col-sm-6">
                                        <label for="rt_tuju" class="form-label"><b>RT Tujuan</b></label>

                                        <input type="text" name="rt_tuju" id="rt_tuju" class="form-control @error('rt_tuju') is-invalid @enderror" required value="{{ old('rt_tuju') }}" autocomplete="off" placeholder="Input RT Tujuan">

                                        @error('rt_tuju')
                                        <div class="invalid-feedback">
                                            <p style="text-align: left">{{ $message }}</p>
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="rw_tuju" class="form-label"><b>RW Tujuan</b></label>

                                        <input type="text" name="rw_tuju" id="rw_tuju" class="form-control @error('rw_tuju') is-invalid @enderror" required value="{{ old('rw_tuju') }}" autocomplete="off" placeholder="Input RW Tujuan">

                                        @error('rw_tuju')
                                        <div class="invalid-feedback">
                                            <p style="text-align: left">{{ $message }}</p>
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="nik1" class="form-label"><b>NIK 1</b></label>

                                    <input type="text" name="nik1" id="nik1" class="form-control @error('nik1') is-invalid @enderror" required value="{{ old('tgl_regis') }}" autocomplete="off" placeholder="Input Tanggal Regis">

                                    @error('nik1')
                                    <div class="invalid-feedback">
                                        <p style="text-align: left">{{ $message }}</p>
                                    </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="nama1" class="form-label"><b>Nama 1</b></label>

                                    <input type="text" name="nama1" id="nama1" class="form-control @error('nama1') is-invalid @enderror" required value="{{ old('nama1') }}" autocomplete="off" placeholder="Input NIK">

                                    @error('nama1')
                                    <div class="invalid-feedback">
                                        <p style="text-align: left">{{ $message }}</p>
                                    </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <div class="mb-3">
                                        <label for="jk1" class="form-label"><b>Jenis Kelamin</b></label>

                                        <select class="form-select" name="jk1" id="jk1">
                                            <option name="jk1" id="jk1" value="" selected>Silakan Pilih Jenis Kelamin</option>
                                            <option name="jk1" id="jk1" value="Laki-Laki">Laki-Laki</option>
                                            <option name="jk1" id="jk1" value="Perempuan">Perempuan</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="agama1" class="form-label"><b>Agama 1</b></label>

                                    <input type="text" name="agama1" id="agama1" class="form-control @error('agama1') is-invalid @enderror" required value="{{ old('agama1') }}" autocomplete="off" placeholder="Input Alamat Tujuan">

                                    @error('agama1')
                                    <div class="invalid-feedback">
                                        <p style="text-align: left">{{ $message }}</p>
                                    </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="ket_kawin1" class="form-label"><b>Keterangan Kawin 1</b></label>

                                    <input type="text" name="ket_kawin1" id="ket_kawin1" class="form-control @error('ket_kawin1') is-invalid @enderror" required value="{{ old('ket_kawin1') }}" autocomplete="off" placeholder="Input Alamat Tujuan">

                                    @error('ket_kawin1')
                                    <div class="invalid-feedback">
                                        <p style="text-align: left">{{ $message }}</p>
                                    </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="ket_kel1" class="form-label"><b>Keterangan Dalam keluarga 1</b></label>

                                    <input type="text" name="ket_kel1" id="ket_kel1" class="form-control @error('ket_kel1') is-invalid @enderror" required value="{{ old('ket_kel1') }}" autocomplete="off" placeholder="Input Alamat Tujuan">

                                    @error('ket_kel1')
                                    <div class="invalid-feedback">
                                        <p style="text-align: left">{{ $message }}</p>
                                    </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="nik2" class="form-label"><b>NIK 2</b></label>

                                    <input type="text" name="nik2" id="nik2" class="form-control @error('nik2') is-invalid @enderror" required value="{{ old('tgl_regis') }}" autocomplete="off" placeholder="Input Tanggal Regis">

                                    @error('nik2')
                                    <div class="invalid-feedback">
                                        <p style="text-align: left">{{ $message }}</p>
                                    </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="nama2" class="form-label"><b>Nama 2</b></label>

                                    <input type="text" name="nama2" id="nama2" class="form-control @error('nama2') is-invalid @enderror" required value="{{ old('nama2') }}" autocomplete="off" placeholder="Input NIK">

                                    @error('nama2')
                                    <div class="invalid-feedback">
                                        <p style="text-align: left">{{ $message }}</p>
                                    </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <div class="mb-3">
                                        <label for="jk2" class="form-label"><b>Jenis Kelamin</b></label>

                                        <select class="form-select" name="jk2" id="jk2">
                                            <option name="jk2" id="jk2" value="" selected>Silakan Pilih Jenis Kelamin</option>
                                            <option name="jk2" id="jk2" value="Laki-Laki">Laki-Laki</option>
                                            <option name="jk2" id="jk2" value="Perempuan">Perempuan</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="agama2" class="form-label"><b>Agama 2</b></label>

                                    <input type="text" name="agama2" id="agama2" class="form-control @error('agama2') is-invalid @enderror" required value="{{ old('agama2') }}" autocomplete="off" placeholder="Input Alamat Tujuan">

                                    @error('agama2')
                                    <div class="invalid-feedback">
                                        <p style="text-align: left">{{ $message }}</p>
                                    </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="ket_kawin2" class="form-label"><b>Keterangan Kawin 2</b></label>

                                    <input type="text" name="ket_kawin2" id="ket_kawin2" class="form-control @error('ket_kawin2') is-invalid @enderror" required value="{{ old('ket_kawin2') }}" autocomplete="off" placeholder="Input Alamat Tujuan">

                                    @error('ket_kawin2')
                                    <div class="invalid-feedback">
                                        <p style="text-align: left">{{ $message }}</p>
                                    </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="ket_kel2" class="form-label"><b>Keterangan Dalam keluarga 2</b></label>

                                    <input type="text" name="ket_kel2" id="ket_kel2" class="form-control @error('ket_kel2') is-invalid @enderror" required value="{{ old('ket_kel2') }}" autocomplete="off" placeholder="Input Alamat Tujuan">

                                    @error('ket_kel2')
                                    <div class="invalid-feedback">
                                        <p style="text-align: left">{{ $message }}</p>
                                    </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="nik3" class="form-label"><b>NIK 3</b></label>

                                    <input type="text" name="nik3" id="nik3" class="form-control @error('nik3') is-invalid @enderror" required value="{{ old('tgl_regis') }}" autocomplete="off" placeholder="Input Tanggal Regis">

                                    @error('nik3')
                                    <div class="invalid-feedback">
                                        <p style="text-align: left">{{ $message }}</p>
                                    </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="nama3" class="form-label"><b>Nama 3</b></label>

                                    <input type="text" name="nama3" id="nama3" class="form-control @error('nama3') is-invalid @enderror" required value="{{ old('nama3') }}" autocomplete="off" placeholder="Input NIK">

                                    @error('nama3')
                                    <div class="invalid-feedback">
                                        <p style="text-align: left">{{ $message }}</p>
                                    </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <div class="mb-3">
                                        <label for="jk3" class="form-label"><b>Jenis Kelamin</b></label>

                                        <select class="form-select" name="jk3" id="jk3">
                                            <option name="jk3" id="jk3" value="" selected>Silakan Pilih Jenis Kelamin</option>
                                            <option name="jk3" id="jk3" value="Laki-Laki">Laki-Laki</option>
                                            <option name="jk3" id="jk3" value="Perempuan">Perempuan</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="agama3" class="form-label"><b>Agama 3</b></label>

                                    <input type="text" name="agama3" id="agama3" class="form-control @error('agama3') is-invalid @enderror" required value="{{ old('agama3') }}" autocomplete="off" placeholder="Input Alamat Tujuan">

                                    @error('agama3')
                                    <div class="invalid-feedback">
                                        <p style="text-align: left">{{ $message }}</p>
                                    </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="ket_kawin3" class="form-label"><b>Keterangan Kawin 3</b></label>

                                    <input type="text" name="ket_kawin3" id="ket_kawin3" class="form-control @error('ket_kawin3') is-invalid @enderror" required value="{{ old('ket_kawin3') }}" autocomplete="off" placeholder="Input Alamat Tujuan">

                                    @error('ket_kawin3')
                                    <div class="invalid-feedback">
                                        <p style="text-align: left">{{ $message }}</p>
                                    </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="ket_kel3" class="form-label"><b>Keterangan Dalam keluarga 3</b></label>

                                    <input type="text" name="ket_kel3" id="ket_kel3" class="form-control @error('ket_kel3') is-invalid @enderror" required value="{{ old('ket_kel3') }}" autocomplete="off" placeholder="Input Alamat Tujuan">

                                    @error('ket_kel3')
                                    <div class="invalid-feedback">
                                        <p style="text-align: left">{{ $message }}</p>
                                    </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="nik4" class="form-label"><b>NIK 4</b></label>

                                    <input type="text" name="nik4" id="nik4" class="form-control @error('nik4') is-invalid @enderror" required value="{{ old('tgl_regis') }}" autocomplete="off" placeholder="Input Tanggal Regis">

                                    @error('nik4')
                                    <div class="invalid-feedback">
                                        <p style="text-align: left">{{ $message }}</p>
                                    </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="nama4" class="form-label"><b>Nama 4</b></label>

                                    <input type="text" name="nama4" id="nama4" class="form-control @error('nama4') is-invalid @enderror" required value="{{ old('nama4') }}" autocomplete="off" placeholder="Input NIK">

                                    @error('nama4')
                                    <div class="invalid-feedback">
                                        <p style="text-align: left">{{ $message }}</p>
                                    </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <div class="mb-3">
                                        <label for="jk4" class="form-label"><b>Jenis Kelamin</b></label>

                                        <select class="form-select" name="jk4" id="jk4">
                                            <option name="jk4" id="jk4" value="" selected>Silakan Pilih Jenis Kelamin</option>
                                            <option name="jk4" id="jk4" value="Laki-Laki">Laki-Laki</option>
                                            <option name="jk4" id="jk4" value="Perempuan">Perempuan</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="agama4" class="form-label"><b>Agama 4</b></label>

                                    <input type="text" name="agama4" id="agama4" class="form-control @error('agama4') is-invalid @enderror" required value="{{ old('agama4') }}" autocomplete="off" placeholder="Input Alamat Tujuan">

                                    @error('agama4')
                                    <div class="invalid-feedback">
                                        <p style="text-align: left">{{ $message }}</p>
                                    </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="ket_kawin4" class="form-label"><b>Keterangan Kawin 4</b></label>

                                    <input type="text" name="ket_kawin4" id="ket_kawin4" class="form-control @error('ket_kawin4') is-invalid @enderror" required value="{{ old('ket_kawin4') }}" autocomplete="off" placeholder="Input Alamat Tujuan">

                                    @error('ket_kawin4')
                                    <div class="invalid-feedback">
                                        <p style="text-align: left">{{ $message }}</p>
                                    </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="ket_kel4" class="form-label"><b>Keterangan Dalam keluarga 4</b></label>

                                    <input type="text" name="ket_kel4" id="ket_kel4" class="form-control @error('ket_kel4') is-invalid @enderror" required value="{{ old('ket_kel4') }}" autocomplete="off" placeholder="Input Alamat Tujuan">

                                    @error('ket_kel4')
                                    <div class="invalid-feedback">
                                        <p style="text-align: left">{{ $message }}</p>
                                    </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="nik5" class="form-label"><b>NIK 5</b></label>

                                    <input type="text" name="nik5" id="nik5" class="form-control @error('nik5') is-invalid @enderror" required value="{{ old('tgl_regis') }}" autocomplete="off" placeholder="Input Tanggal Regis">

                                    @error('nik5')
                                    <div class="invalid-feedback">
                                        <p style="text-align: left">{{ $message }}</p>
                                    </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="nama5" class="form-label"><b>Nama 5</b></label>

                                    <input type="text" name="nama5" id="nama5" class="form-control @error('nama5') is-invalid @enderror" required value="{{ old('nama5') }}" autocomplete="off" placeholder="Input NIK">

                                    @error('nama5')
                                    <div class="invalid-feedback">
                                        <p style="text-align: left">{{ $message }}</p>
                                    </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <div class="mb-3">
                                        <label for="jk5" class="form-label"><b>Jenis Kelamin</b></label>

                                        <select class="form-select" name="jk5" id="jk5">
                                            <option name="jk5" id="jk5" value="" selected>Silakan Pilih Jenis Kelamin</option>
                                            <option name="jk5" id="jk5" value="Laki-Laki">Laki-Laki</option>
                                            <option name="jk5" id="jk5" value="Perempuan">Perempuan</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="agama5" class="form-label"><b>Agama 5</b></label>

                                    <input type="text" name="agama5" id="agama5" class="form-control @error('agama5') is-invalid @enderror" required value="{{ old('agama5') }}" autocomplete="off" placeholder="Input Alamat Tujuan">

                                    @error('agama5')
                                    <div class="invalid-feedback">
                                        <p style="text-align: left">{{ $message }}</p>
                                    </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="ket_kawin5" class="form-label"><b>Keterangan Kawin 5</b></label>

                                    <input type="text" name="ket_kawin5" id="ket_kawin5" class="form-control @error('ket_kawin5') is-invalid @enderror" required value="{{ old('ket_kawin5') }}" autocomplete="off" placeholder="Input Alamat Tujuan">

                                    @error('ket_kawin5')
                                    <div class="invalid-feedback">
                                        <p style="text-align: left">{{ $message }}</p>
                                    </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="ket_kel5" class="form-label"><b>Keterangan Dalam keluarga 5</b></label>

                                    <input type="text" name="ket_kel5" id="ket_kel5" class="form-control @error('ket_kel5') is-invalid @enderror" required value="{{ old('ket_kel5') }}" autocomplete="off" placeholder="Input Alamat Tujuan">

                                    @error('ket_kel5')
                                    <div class="invalid-feedback">
                                        <p style="text-align: left">{{ $message }}</p>
                                    </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="nik6" class="form-label"><b>NIK 6</b></label>

                                    <input type="text" name="nik6" id="nik6" class="form-control @error('nik6') is-invalid @enderror" required value="{{ old('tgl_regis') }}" autocomplete="off" placeholder="Input Tanggal Regis">

                                    @error('nik6')
                                    <div class="invalid-feedback">
                                        <p style="text-align: left">{{ $message }}</p>
                                    </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="nama6" class="form-label"><b>Nama 6</b></label>

                                    <input type="text" name="nama6" id="nama6" class="form-control @error('nama6') is-invalid @enderror" required value="{{ old('nama6') }}" autocomplete="off" placeholder="Input NIK">

                                    @error('nama6')
                                    <div class="invalid-feedback">
                                        <p style="text-align: left">{{ $message }}</p>
                                    </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <div class="mb-3">
                                        <label for="jk6" class="form-label"><b>Jenis Kelamin</b></label>

                                        <select class="form-select" name="jk6" id="jk6">
                                            <option name="jk6" id="jk6" value="" selected>Silakan Pilih Jenis Kelamin</option>
                                            <option name="jk6" id="jk6" value="Laki-Laki">Laki-Laki</option>
                                            <option name="jk6" id="jk6" value="Perempuan">Perempuan</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="agama6" class="form-label"><b>Agama 6</b></label>

                                    <input type="text" name="agama6" id="agama6" class="form-control @error('agama6') is-invalid @enderror" required value="{{ old('agama6') }}" autocomplete="off" placeholder="Input Alamat Tujuan">

                                    @error('agama6')
                                    <div class="invalid-feedback">
                                        <p style="text-align: left">{{ $message }}</p>
                                    </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="ket_kawin6" class="form-label"><b>Keterangan Kawin 6</b></label>

                                    <input type="text" name="ket_kawin6" id="ket_kawin6" class="form-control @error('ket_kawin6') is-invalid @enderror" required value="{{ old('ket_kawin6') }}" autocomplete="off" placeholder="Input Alamat Tujuan">

                                    @error('ket_kawin6')
                                    <div class="invalid-feedback">
                                        <p style="text-align: left">{{ $message }}</p>
                                    </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="ket_kel6" class="form-label"><b>Keterangan Dalam keluarga 6</b></label>

                                    <input type="text" name="ket_kel6" id="ket_kel6" class="form-control @error('ket_kel6') is-invalid @enderror" required value="{{ old('ket_kel6') }}" autocomplete="off" placeholder="Input Alamat Tujuan">

                                    @error('ket_kel6')
                                    <div class="invalid-feedback">
                                        <p style="text-align: left">{{ $message }}</p>
                                    </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="prov_asal" class="form-label"><b>Provinsi Asal</b></label>

                                    <input type="text" name="prov_asal" id="prov_asal" class="form-control @error('prov_asal') is-invalid @enderror" required value="{{ old('prov_asal') }}" autocomplete="off" placeholder="Input RW Tujuan">

                                    @error('prov_asal')
                                    <div class="invalid-feedback">
                                        <p style="text-align: left">{{ $message }}</p>
                                    </div>
                                    @enderror
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>

            <!-- Modal delete all-->
            <div class="modal fade" id="deleteAllData" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="deleteAllDataLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="deleteAllDataLabel">Hapus Seluruh Data Masyarakat</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                            <div class="mb-3">
                                <p><b>Apakah anda yakin untuk menghapus seluruh data masyarakat? pastikan anda telah meng-export data untuk menanggulangi kesalahan</b></p>
                            </div>


                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Cancel</button>
                            <a href="deleteAllMasyarakat"><button type="submit" class="btn btn-primary">Delete</button></a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal export excel-->
            <div class="modal fade" id="exportExcel" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exportExcelLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exportExcelLabel">Export Seluruh Data Masyarakat</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                            <div class="mb-3">
                                <p><b>Apakah anda yakin untuk meng-export seluruh data masyarakat? pastikan data telah benar untuk menanggulangi kesalahan</b></p>
                            </div>


                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Cancel</button>
                            <a href="masyarakatImport"><button class="btn btn-primary">Export</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table" style="text-align: left; color: black">
                <tr>
                    <th>No</th>
                    <th>TGL Regis</th>
                    <th>NIK Pelapor</th>
                    <th>Nama Pelapor</th>
                    <th>NIK</th>
                    <th>Jenis Kelamin</th>
                    <th>Tempat Lahir</th>
                    <th>Tanggal Lahir</th>
                    <th style="text-align: center">Varifikasi</th>
                    <th style="text-align: center">Aksi</th>
                </tr>
                @foreach ($MutasiMasuk as $index => $item)
                <tr style="width: 100%">
                    <td style="vertical-align: middle; width: 5%; ">{{ $index + $MutasiMasuk->firstItem() }}</td>
                    <td style="vertical-align: middle;  ">{{ $item->tgl_regis_mm }}</td>
                    <td style="vertical-align: middle;  ">{{ $item->nik_pelapor }}</td>
                    <td style="vertical-align: middle;  ">{{ $item->nama_pelapor }}</td>
                    <td style="vertical-align: middle;  ">{{ $item->nik_mm }}</td>
                    <td style="vertical-align: middle;  ">{{ $item->jk_mm }}</td>
                    <td style="vertical-align: middle;  ">{{ $item->tempat_lh_mm }}</td>
                    <td style="vertical-align: middle;  ">{{ $item->tgl_lh_mm }}</td>
                    <td style="text-align: center;  ">
                        @if($item->verifikasi=="Belum Verifikasi")
                        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#verifikasibayi{{ $item->nik_mm }}">Verifikasi</button>
                        @else
                        <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#batalverifikasi{{ $item->nik_mm }}">Batal Verifikasi</button>
                        @endif
                    </td>
                    <td style="text-align: center;  ">
                        <a href="{{route('data-mutasi-masuk/pdf',$item->nik_mm) }}" class="btn btn-success" target="_blank">Staff</a>
                    </td>
                </tr>

                <!-- Modal delete-->
                <div class="modal fade" id="staticBackdrop{{ $item->nik_mm}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Delete Data Penduduk</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>Apakah anda yakin untuk menghapus data <b>{{ $item->nama }}</b></p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Cancel</button>
                                <form action="{{route('data-mutasi-masuk/delete', $item->nik_mm) }}" method="post">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Deleted</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal verifikasi-->
                <div class="modal fade" id="verifikasibayi{{ $item->nik_mm}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Verifikasi Data Kelahiran</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>Apakah anda yakin untuk memverifikasi data <b>{{ $item->nama }}</b></p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Cancel</button>
                                <form action="{{route('data-mutasi-masuk/update', $item->nik_mm) }}" method="post">
                                    @csrf
                                    <input type="text" id="verifikasi" name="verifikasi" value="Sudah Verifikasi" hidden>
                                    <button type="submit" class="btn btn-success">Verifikasi</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal batal verifikasi-->
                <div class="modal fade" id="batalverifikasi{{ $item->nik_mm}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Verifikasi Data Kelahiran</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>Apakah anda yakin untuk membatalkan verifikasi data <b>{{ $item->nama }}</b></p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Cancel</button>
                                <form action="{{route('data-mutasi-masuk/update', $item->nik_mm) }}" method="post">
                                    @method('post')
                                    @csrf
                                    <input type="text" name="verifikasi" value="Belum Verifikasi" value="Belum Verifikasi" hidden>
                                    <button type="submit" class="btn btn-danger">Batalkan Verifikasi</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                @endforeach
            </table>
            <div class="d-flex justify-content-between mb-3">
                {{ $MutasiMasuk->links('layout.pagination') }}
            </div>
        </div>

    </div>
</main>
@endsection