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
            <div class="d-flex align-content-end">
                <form action="/data-kk" method="GET" style="margin-left: 40%">
                    <input type="text" id="cari" name="cari" placeholder="Cari NIK/No KK/Nama">
                    <button type="submit" class="btn btn-success">Cari</button>
                </form>
            </div>


            <!-- Modal create-->
            <div class="modal fade" id="cretaeDataMasyarakat" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="cretaeDataMasyarakatLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="cretaeDataMasyarakatLabel">Tambah KK</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{route('data-kk/store')}}" method="post">
                            @csrf
                            <div class="modal-body">

                                <div class="mb-3">
                                    <label for="nik" class="form-label"><b>NIK</b></label>

                                    <input type="text" name="nik" id="nik" class="form-control @error('nik') is-invalid @enderror" required value="{{ old('nik') }}" autocomplete="off" placeholder="Input NIK Penduduk">

                                    @error('nik')
                                    <div class="invalid-feedback">
                                        <p style="text-align: left">{{ $message }}</p>
                                    </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="nama" class="form-label"><b>Nama Penduduk</b></label>

                                    <input type="text" name="nama" id="nama" class="form-control @error('nama') is-invalid @enderror" required value="{{ old('nama') }}" autocomplete="off" placeholder="Input Nama Penduduk">

                                    @error('nama')
                                    <div class="invalid-feedback">
                                        <p style="text-align: left">{{ $message }}</p>
                                    </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="no_kk" class="form-label"><b>No KK</b></label>

                                    <input type="text" name="no_kk" id="no_kk" class="form-control @error('no_kk') is-invalid @enderror" required value="{{ old('no_kk') }}" autocomplete="off" placeholder="Input Nomor KK Penduduk">

                                    @error('no_kk')
                                    <div class="invalid-feedback">
                                        <p style="text-align: left">{{ $message }}</p>
                                    </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="desa" class="form-label"><b>Desa</b></label>

                                    <input type="text" name="desa" id="desa" class="form-control @error('desa') is-invalid @enderror" required value="{{ old('desa') }}" autocomplete="off" placeholder="Input desa">

                                    @error('desa')
                                    <div class="invalid-feedback">
                                        <p style="text-align: left">{{ $message }}</p>
                                    </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="padukuhan" class="form-label"><b>Padukuhan</b></label>

                                    <input type="text" name="padukuhan" id="padukuhan" class="form-control @error('padukuhan') is-invalid @enderror" required value="{{ old('padukuhan') }}" autocomplete="off" placeholder="Input Padukuhan">

                                    @error('padukuhan')
                                    <div class="invalid-feedback">
                                        <p style="text-align: left">{{ $message }}</p>
                                    </div>
                                    @enderror
                                </div>

                                <div class="form-group row mb-3">
                                    <div class="col-sm-6">
                                        <label for="rt" class="form-label"><b>RT</b></label>

                                        <input type="text" name="rt" id="rt" class="form-control @error('rt') is-invalid @enderror" required value="{{ old('rt') }}" autocomplete="off" placeholder="Input rt">

                                        @error('rt')
                                        <div class="invalid-feedback">
                                            <p style="text-align: left">{{ $message }}</p>
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="rw" class="form-label"><b>RW</b></label>

                                        <input type="text" name="rw" id="rw" class="form-control @error('rw') is-invalid @enderror" required value="{{ old('rw') }}" autocomplete="off" placeholder="Input rw">

                                        @error('rw')
                                        <div class="invalid-feedback">
                                            <p style="text-align: left">{{ $message }}</p>
                                        </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="nama_jalan" class="form-label"><b>Nama Jalan</b></label>

                                    <input type="text" name="nama_jalan" id="nama_jalan" class="form-control @error('nama_jalan') is-invalid @enderror" required value="{{ old('nama_jalan') }}" autocomplete="off" placeholder="Input nama_jalan">

                                    @error('nama_jalan')
                                    <div class="invalid-feedback">
                                        <p style="text-align: left">{{ $message }}</p>
                                    </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="kota" class="form-label"><b>Kota</b></label>

                                    <input type="text" name="kota" id="kota" class="form-control @error('kota') is-invalid @enderror" required value="{{ old('kota') }}" autocomplete="off" placeholder="Input kota">

                                    @error('kota')
                                    <div class="invalid-feedback">
                                        <p style="text-align: left">{{ $message }}</p>
                                    </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="prov" class="form-label"><b>Provinsi</b></label>

                                    <input type="text" name="prov" id="prov" class="form-control @error('prov') is-invalid @enderror" required value="{{ old('prov') }}" autocomplete="off" placeholder="Input prov">

                                    @error('prov')
                                    <div class="invalid-feedback">
                                        <p style="text-align: left">{{ $message }}</p>
                                    </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="jk" class="form-label"><b>Jenis Kelamin</b></label>

                                    <select class="form-select" name="jk" id="jk">
                                        <option value="" selected>Silakan Pilih Jenis Kelamin</option>
                                        <option value="Laki-Laki">Laki-Laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>

                                <div class="form-group row mb-3">
                                    <div class="col-sm-6">
                                        <label for="tempat_lahir" class="form-label"><b>Tempat lahir</b></label>

                                        <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control @error('tempat_lahir') is-invalid @enderror" required value="{{ old('tempat_lahir') }}" autocomplete="off" placeholder="Input Tempat Lahir">

                                        @error('tempat_lahir')
                                        <div class="invalid-feedback">
                                            <p style="text-align: left">{{ $message }}</p>
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="tgl_lahir" class="form-label"><b>Tanggal Lahir</b></label>

                                        <input type="date" name="tgl_lahir" id="tgl_lahir" class="form-control @error('tgl_lahir') is-invalid @enderror" required value="{{ old('tgl_lahir') }}" autocomplete="off" placeholder="Input tgl Lahir">

                                        @error('tgl_lahir')
                                        <div class="invalid-feedback">
                                            <p style="text-align: left">{{ $message }}</p>
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="wn" class="form-label"><b>Warga Negara</b></label>

                                    <select class="form-select" name="wn" id="wn">
                                        <option value="" selected>Silakan Pilih Jenis Warga Negara</option>
                                        <option name="wn" id="wn" value="WNI">WNI</option>
                                        <option name="wn" id="wn" value="WNA">WNA</option>
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
                                    <label for="agama" class="form-label"><b>Agama</b></label>

                                    <input type="text" name="agama" id="agama" class="form-control @error('agama') is-invalid @enderror" required value="{{ old('agama') }}" autocomplete="off" placeholder="Input agama">

                                    @error('agama')
                                    <div class="invalid-feedback">
                                        <p style="text-align: left">{{ $message }}</p>
                                    </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="pekerjaan" class="form-label"><b>Pekerjaan</b></label>

                                    <input type="text" name="pekerjaan" id="pekerjaan" class="form-control @error('pekerjaan') is-invalid @enderror" required value="{{ old('pekerjaan') }}" autocomplete="off" placeholder="Input pekerjaan">

                                    @error('pekerjaan')
                                    <div class="invalid-feedback">
                                        <p style="text-align: left">{{ $message }}</p>
                                    </div>
                                    @enderror
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
                                    <label for="sts_kawin" class="form-label"><b>Status Kawin</b></label>

                                    <select class="form-select" name="sts_kawin" id="sts_kawin">
                                        <option value="" selected>Silakan Pilih Status Kawin</option>
                                        <option name="sts_kawin" id="sts_kawin" value="Kawin">Kawin</option>
                                        <option name="sts_kawin" id="sts_kawin" value="Belum Kawin">Belum Kawin</option>
                                        <option name="sts_kawin" id="sts_kawin" value="Cerai Hidup">Cerai Hidup</option>
                                        <option name="sts_kawin" id="sts_kawin" value="Cerai Mati">Cerai Mati</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="sts_penduduk" class="form-label"><b>Status Penduduk</b></label>

                                    <select class="form-select" name="sts_penduduk" id="sts_penduduk">
                                        <option value="" selected>Silakan Pilih Status Penduduk</option>
                                        <option name="sts_penduduk" id="sts_penduduk" value="Meninggal">Meninggal</option>
                                        <option name="sts_penduduk" id="sts_penduduk" value="Hidup">Hidup</option>
                                        <option name="sts_penduduk" id="sts_penduduk" value="Pindah Keluar">Pindah Keluar</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="sts_dalam_kk" class="form-label"><b>Status Dalam KK</b></label>

                                    <select class="form-select" name="sts_dalam_kk" id="sts_dalam_kk">
                                        <option value="" selected>Silakan Pilih Status Penduduk</option>
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
                    <th>NoKK</th>
                    <th>NIK</th>
                    <th>NAMA</th>
                    <th>Padukuhan</th>
                    <th>RT</th>
                    <th>RW</th>
                    <th style="text-align: center">Data Keluarga</th>
                    <th style="text-align: center">Action</th>
                </tr>
                @foreach ($masyarakat as $index => $item)
                <tr style="width: 100%">
                    <td style="vertical-align: middle; width: 5%; ">{{ $index + $masyarakat->firstItem() }}</td>
                    <td style="vertical-align: middle;  ">{{ $item->no_kk }}</td>
                    <td style="vertical-align: middle;  ">{{ $item->nik }}</td>
                    <td style="vertical-align: middle;  ">{{ $item->nama }}</td>
                    <td style="vertical-align: middle;  ">{{ $item->padukuhan }}</td>
                    <td style="vertical-align: middle;  ">{{ $item->rt }}</td>
                    <td style="vertical-align: middle;  ">{{ $item->rw }}</td>
                    <td style="text-align: center;  ">
                        <a href="{{route('data-keluarga',$item->no_kk)}}" class="btn btn-success">Lihat</a>
                        <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#tambahKel{{ $item->nik }}">Tambah</button>
                    </td>
                    <td style="text-align: center;  ">
                        <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#staticBackdrop{{ $item->nik }}">Hapus</button>
                        <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editDataMasyarakat{{ $item->nik }}">Edit</button>
                    </td>
                </tr>

                <!-- Modal delete-->
                <div class="modal fade" id="staticBackdrop{{ $item->nik}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Delete Data KK</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>Apakah anda yakin untuk menghapus data <b>{{ $item->nama }}</b></p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Cancel</button>
                                <form action="{{route('data-kk', $item->nik) }}" method="post">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Deleted</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal edit-->
                <div class="modal fade" id="editDataMasyarakat{{ $item->nik }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editDataMasyarakatLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="editDataMasyarakatLabel">Edit Data KK</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="{{route('data-kk',$item->nik)}}" method="post">
                                @csrf
                                <div class="modal-body">

                                    <div class="mb-3">
                                        <label for="nik" class="form-label"><b>NIK</b></label>

                                        <input type="text" name="nik" id="nik" class="form-control @error('nik') is-invalid @enderror" required value="{{ $item->nik }}" autocomplete="off" placeholder="Input NIK Penduduk">

                                        @error('nik')
                                        <div class="invalid-feedback">
                                            <p style="text-align: left">{{ $message }}</p>
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="nama" class="form-label"><b>Nama Penduduk</b></label>

                                        <input type="text" name="nama" id="nama" class="form-control @error('nama') is-invalid @enderror" required value="{{ $item->nama }}" autocomplete="off" placeholder="Input Nama Penduduk">

                                        @error('nama')
                                        <div class="invalid-feedback">
                                            <p style="text-align: left">{{ $message }}</p>
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="no_kk" class="form-label"><b>No KK</b></label>

                                        <input type="text" name="no_kk" id="no_kk" class="form-control @error('no_kk') is-invalid @enderror" required value="{{ $item->no_kk }}" autocomplete="off" placeholder="Input Nomor KK Penduduk">

                                        @error('no_kk')
                                        <div class="invalid-feedback">
                                            <p style="text-align: left">{{ $message }}</p>
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="padukuhan" class="form-label"><b>Padukuhan</b></label>

                                        <input type="text" name="padukuhan" id="padukuhan" class="form-control @error('padukuhan') is-invalid @enderror" required value="{{ $item->padukuhan }}" autocomplete="off" placeholder="Input Padukuhan">

                                        @error('padukuhan')
                                        <div class="invalid-feedback">
                                            <p style="text-align: left">{{ $message }}</p>
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="form-group row mb-3">
                                        <div class="col-sm-6">
                                            <label for="rt" class="form-label"><b>RT</b></label>

                                            <input type="text" name="rt" id="rt" class="form-control @error('rt') is-invalid @enderror" required value="{{ $item->rt }}" autocomplete="off" placeholder="Input rt">

                                            @error('rt')
                                            <div class="invalid-feedback">
                                                <p style="text-align: left">{{ $message }}</p>
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="rw" class="form-label"><b>RW</b></label>

                                            <input type="text" name="rw" id="rw" class="form-control @error('rw') is-invalid @enderror" required value="{{ $item->rw }}" autocomplete="off" placeholder="Input rw">

                                            @error('rw')
                                            <div class="invalid-feedback">
                                                <p style="text-align: left">{{ $message }}</p>
                                            </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="jk" class="form-label"><b>Jenis Kelamin</b></label>

                                        <select class="form-select" name="jk" id="jk">
                                            <option value="" selected>Silakan Pilih Jenis Kelamin</option>
                                            <option value="Laki-Laki">Laki-Laki</option>
                                            <option value="Perempuan">Perempuan</option>
                                        </select>
                                    </div>

                                    <div class="form-group row mb-3">
                                        <div class="col-sm-6">
                                            <label for="tempat_lahir" class="form-label"><b>Tempat lahir</b></label>

                                            <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control @error('tempat_lahir') is-invalid @enderror" required value="{{ $item->tempat_lahir }}" autocomplete="off" placeholder="Input Tempat Lahir">

                                            @error('tempat_lahir')
                                            <div class="invalid-feedback">
                                                <p style="text-align: left">{{ $message }}</p>
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="tgl_lahir" class="form-label"><b>Tanggal Lahir</b></label>

                                            <input type="date" name="tgl_lahir" id="tgl_lahir" class="form-control @error('tgl_lahir') is-invalid @enderror" required value="{{ $item->tgl_lahir }}" autocomplete="off" placeholder="Input tgl Lahir">

                                            @error('tgl_lahir')
                                            <div class="invalid-feedback">
                                                <p style="text-align: left">{{ $message }}</p>
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="wn" class="form-label"><b>Warga Negara</b></label>

                                        <select class="form-select" name="wn" id="wn">
                                            <option value="">Silakan Pilih Jenis Warga Negara</option>
                                            @if($item->wn==="WNA")
                                            <option name="wn" id="wn" value="WNI">WNI</option>
                                            <option name="wn" id="wn" value="WNA" selected>WNA</option>
                                            @elseif($item->wn==="WNI")
                                            <option name="wn" id="wn" value="WNI" selected>WNI</option>
                                            <option name="wn" id="wn" value="WNA">WNA</option>
                                            @endif
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="agama" class="form-label"><b>Agama</b></label>

                                        <input type="text" name="agama" id="agama" class="form-control @error('agama') is-invalid @enderror" required value="{{ $item->agama }}" autocomplete="off" placeholder="Input agama">

                                        @error('agama')
                                        <div class="invalid-feedback">
                                            <p style="text-align: left">{{ $message }}</p>
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="pekerjaan" class="form-label"><b>Pekerjaan</b></label>

                                        <input type="text" name="pekerjaan" id="pekerjaan" class="form-control @error('pekerjaan') is-invalid @enderror" required value="{{ $item->pekerjaan }}" autocomplete="off" placeholder="Input pekerjaan">

                                        @error('pekerjaan')
                                        <div class="invalid-feedback">
                                            <p style="text-align: left">{{ $message }}</p>
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="pendidikan" class="form-label"><b>Pendidikan</b></label>

                                        <input type="text" name="pendidikan" id="pendidikan" class="form-control @error('pendidikan') is-invalid @enderror" required value="{{ $item->pendidikan }}" autocomplete="off" placeholder="Input pendidikan">

                                        @error('pendidikan')
                                        <div class="invalid-feedback">
                                            <p style="text-align: left">{{ $message }}</p>
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="sts_kawin" class="form-label"><b>Status Kawin</b></label>

                                        <select class="form-select" name="sts_kawin" id="sts_kawin">
                                            <option value="" selected>Silakan Pilih Status Kawin</option>
                                            <option name="sts_kawin" id="sts_kawin" value="Kawin">Kawin</option>
                                            <option name="sts_kawin" id="sts_kawin" value="Belum Kawin">Belum Kawin</option>
                                            <option name="sts_kawin" id="sts_kawin" value="Cerai Hidup">Cerai Hidup</option>
                                            <option name="sts_kawin" id="sts_kawin" value="Cerai Mati">Cerai Mati</option>
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="sts_penduduk" class="form-label"><b>Status Penduduk</b></label>

                                        <select class="form-select" name="sts_penduduk" id="sts_penduduk">
                                            <option value="" selected>Silakan Pilih Status Penduduk</option>
                                            <option name="sts_penduduk" id="sts_penduduk" value="Meninggal">Meninggal</option>
                                            <option name="sts_penduduk" id="sts_penduduk" value="Hidup">Hidup</option>
                                            <option name="sts_penduduk" id="sts_penduduk" value="Pindah Keluar">Pindah Keluar</option>
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

                <!-- Modal tambah keluarga-->
                <div class="modal fade" id="tambahKel{{ $item->nik }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="tambahKelLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="editDataMasyarakatLabel">Tambah Data Keluarga</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="{{route('data-keluarga/store',$item->nik)}}" method="post">
                                @csrf
                                <div class="modal-body">

                                    <div class="mb-3">
                                        <label for="nik" class="form-label"><b>NIK</b></label>

                                        <select class="form-select" name="nik" id="nik">
                                            <option name="nik" id="nik" value="" selected>Silakan Pilih NIK Keluraga Yang Ingin Ditambahkan</option>
                                            @foreach($pendu as $penduduk)
                                            <option name="nik" id="nik" value="{{$penduduk->nik}}">{{$penduduk->nik}} | {{$penduduk->nama}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="no_kk" class="form-label"><b>No KK (otomatis terisi)</b></label>

                                        <input type="text" name="no_kk" id="no_kk" class="form-control @error('no_kk') is-invalid @enderror" required value="{{ $item->no_kk }}" autocomplete="off" placeholder="Input Nomor KK Penduduk" readonly>

                                        @error('no_kk')
                                        <div class="invalid-feedback">
                                            <p style="text-align: left">{{ $message }}</p>
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="sts_keluarga" class="form-label">Status Dalam KK</label>
                                        <select class="form-select form-select-lg" name="sts_keluarga" id="sts_keluarga">
                                            <option selected>---Pilih Status Keluarga---</option>
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

                @endforeach
            </table>
            <div class="d-flex justify-content-between mb-3">
                {{ $masyarakat->links('layout.pagination') }}
            </div>
        </div>

    </div>
</main>
<!-- Dependent Select -->
<script type="text/javascript">
    $(document).ready(function() {
        $('select[name="nik"]').on('change', function() {
            var NIK = $(this).val();
            if (NIK) {
                $.ajax({
                    url: '/getSts/' + NIK,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('select[name="sts_keluarga"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="sts_keluarga"]').append('<option value="' + key + '">' + value + '</option>');
                        });
                    }
                });
            } else {
                $('select[name="sts_keluarga"]').empty();
            }
        });
    });
</script>
@endsection