@extends('../layout/mainWarga')

@section('wargaContent')
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
                        <form action="{{route('warga/data-mutasi-masuk/store')}}" method="post">
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

                                    <select class="form-select" name="nik_pelapor" id="nik_pelapor">
                                        <option name="nik_pelapor" id="nik_pelapor" value="{{$user->nik}}" selected>{{$user->nik}} | {{$user->name}}</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="nama_pelapor" class="form-label"><b>Nama Pelapor</b></label>

                                    <select class="form-select" name="nama_pelapor" id="nama_pelapor">
                                        <option name="nama_pelapor" id="nama_pelapor" value="{{$user->nama}}" selected>{{$user->nama}}</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="nik_mm" class="form-label"><b>NIK</b></label>

                                    <input type="text" name="nik_mm" id="nik_mm" class="form-control @error('nik_mm') is-invalid @enderror" required value="{{ old('nik_mm') }}" autocomplete="off" placeholder="Input Nama">

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

                                    <select class="form-select" name="agama_mm" id="agama_mm">
                                        <option value="" selected>Silakan Pilih Agama</option>
                                        <option name="agama_mm" id="agama_mm" value="Islam">Islam</option>
                                        <option name="agama_mm" id="agama_mm" value="Kristen">Kristen</option>
                                        <option name="agama_mm" id="agama_mm" value="Katolik">Katolik</option>
                                        <option name="agama_mm" id="agama_mm" value="Hindu">Hindu</option>
                                        <option name="agama_mm" id="agama_mm" value="Buddha">Buddha</option>
                                        <option name="agama_mm" id="agama_mm" value="Konghucu">Konghucu</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="pendidikan" class="form-label"><b>Pendidikan</b></label>

                                    <input type="text" name="pendidikan" id="pendidikan" class="form-control @error('pendidikan') is-invalid @enderror" required value="{{ old('pendidikan') }}" autocomplete="off" placeholder="Input pendidikan">

                                    @error('pendidikan')
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

                                    <select class="form-select" name="status_kawin_mm" id="status_kawin_mm">
                                        <option value="" selected>Silakan Pilih Status Kawin</option>
                                        <option name="status_kawin_mm" id="status_kawin_mm" value="Kawin">Kawin</option>
                                        <option name="status_kawin_mm" id="status_kawin_mm" value="Belum Kawin">Belum Kawin</option>
                                        <option name="status_kawin_mm" id="status_kawin_mm" value="Cerai Hidup">Cerai Hidup</option>
                                        <option name="status_kawin_mm" id="status_kawin_mm" value="Cerai Mati">Cerai Mati</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="no_kk" class="form-label"><b>No KK</b></label>

                                    <input type="text" name="no_kk" id="no_kk" class="form-control @error('no_kk') is-invalid @enderror" required value="{{ old('no_kk') }}" autocomplete="off" placeholder="Input Status Kawin">

                                    @error('no_kk')
                                    <div class="invalid-feedback">
                                        <p style="text-align: left">{{ $message }}</p>
                                    </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="wn" class="form-label"><b>Warga Negara</b></label>

                                    <select class="form-select" name="wn" id="wn">
                                        <option value="">Silakan Pilih Jenis Warga Negara</option>
                                        <option name="wn" id="wn" value="WNI">WNI</option>
                                        <option name="wn" id="wn" value="WNA" selected>WNA</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="kebangsaan" class="form-label"><b>Kebangsaan</b></label>

                                    <input type="text" name="kebangsaan" id="kebangsaan" class="form-control @error('kebangsaan') is-invalid @enderror" required value="{{ old('kebangsaan') }}" autocomplete="off" placeholder="Input Kebangsaan">

                                    @error('kebangsaan')
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
                                    <label for="padukuhan_tuju" class="form-label"><b>Padukuhan Tuju</b></label>
                                    <select class="form-select" name="padukuhan_tuju" id="padukuhan_tuju">
                                        <option value="" selected>Silakan Pilih Padukuhan</option>
                                        <option value="Bodeh">Bodeh</option>
                                        <option value="Depok">Depok</option>
                                        <option value="Gamping Kidul">Gamping Kidul</option>
                                        <option value="Gamping Lor">Gamping Lor</option>
                                        <option value="Gamping Tengah">Gamping Tengah</option>
                                        <option value="Kalimanjung">Kalimanjung</option>
                                        <option value="Mancasan">Mancasan</option>
                                        <option value="Mejing Kidul">Mejing Kidul</option>
                                        <option value="Mejing Lor">Mejing Lor</option>
                                        <option value="Mejing Wetan">Mejing Wetan</option>
                                        <option value="Ptukan">Ptukan</option>
                                        <option value="Tlogo">Tlogo</option>
                                        <option value="Watulangkah">Watulangkah</option>
                                    </select>
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
                                    <label for="sts_penduduk" class="form-label"><b>Status Penduduk</b></label>

                                    <select class="form-select" name="sts_penduduk" id="sts_penduduk">
                                        <option value="" selected>Silakan Pilih Status Penduduk</option>
                                        <option name="sts_penduduk" id="sts_penduduk" value="Meninggal">Meninggal</option>
                                        <option name="sts_penduduk" id="sts_penduduk" value="tinggal">Tinggal</option>
                                        <option name="sts_penduduk" id="sts_penduduk" value="Pindah Keluar">Pindah Keluar</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="sts_dalam_kk" class="form-label"><b>Status Dalam KK</b></label>

                                    <select class="form-select" name="sts_dalam_kk" id="sts_dalam_kk">
                                        <option value="" selected>Silakan Pilih Status Penduduk</option>
                                        <option name="sts_dalam_kk" id="sts_dalam_kk" value="Kepala Keluarga">Kepala Keluarga</option>
                                        <option name="sts_dalam_kk" id="sts_dalam_kk" value="Istri">Istri</option>
                                        <option name="sts_dalam_kk" id="sts_dalam_kk" value="Anak">Anak</option>
                                    </select>
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
                    <th style="text-align: center">Lampiran</th>
                    <th style="text-align: center">Varifikasi</th>
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
                        <a href="{{route('warga/data-mutasi-masuk/lampiran/show',$item->nik_mm)}}"><button class="btn btn-success"><i class="bi bi-eye-fill"></i></button></a>
                        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#cretaeLampiran{{ $item->nik_mm }}"><i class="bi bi-plus-square-fill"></i></button>
                        <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#destroyLampiran{{ $item->nik_mm }}"><i class="bi bi-trash"></i></button>
                    </td>
                    <td style="vertical-align: middle;  ">{{ $item->verifikasi }}</td>
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

                <!-- Modal delete lampiran-->
                <div class="modal fade" id="destroyLampiran{{ $item->nik_mm}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="destroyLampiranLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="destroyLampiranLabel">Delete Lampiran</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>Apakah anda yakin untuk menghapus lampiran dari <b>{{ $item->nama_mm }}</b></p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Cancel</button>
                                <form action="{{route('warga/data-mutasi-masuk/lampiran/destroy', $item->nik_mm) }}" method="post">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Deleted</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal Create Lampiran-->
                <div class="modal fade" id="cretaeLampiran{{ $item->nik_mm }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="cretaeLampiranLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="cretaeLampiranLabel">Tambah Lampiran Surat Mutasi Masuk</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <span class="modal-title fs-6 text-center" id="cretaeLampiranLabel">Upload dokumen kelengkapan, pastikan file berupa (jpg/pdf) dengan ukuran masksmal 2MB/file</span>
                            <form id="lampiranForm" action="{{route('warga/data-mutasi-masuk/lampiran/store',$item->nik_mm)}}" method="POST" enctype="multipart/form-data">
                                @method('POST')
                                @csrf
                                <div class="modal-body">

                                    <div class="mb-3">
                                        <label for="kk" class="form-label">Kartu Keluarga</label>
                                        <input class="form-control" type="file" id="kk" name="kk">
                                        @error('kk')
                                        <div class="invalid-feedback">
                                            <p style="text-align: left">{{ $message }}</p>
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="ktp_mm" class="form-label">KTP </label>
                                        <input class="form-control" type="file" id="ktp_mm" name="ktp_mm">
                                        @error('ktp')
                                        <div class="invalid-feedback">
                                            <p style="text-align: left">{{ $message }}</p>
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="ktp_pelapor" class="form-label">KTP Pelapor</label>
                                        <input class="form-control" type="file" id="ktp_pelapor" name="ktp_pelapor">
                                        @error('ktp_pelapor')
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

                @endforeach
            </table>
            <div class="d-flex justify-content-between mb-3">
                {{ $MutasiMasuk->links('layout.pagination') }}
            </div>
        </div>

    </div>
</main>
@endsection