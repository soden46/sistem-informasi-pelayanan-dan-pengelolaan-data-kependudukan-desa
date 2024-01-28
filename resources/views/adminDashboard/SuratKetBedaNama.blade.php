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

        @if (session()->has('successCreatedPenduduk'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session('successCreatedPenduduk') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session('success') }}</strong>
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

                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#cretaeDataMasyarakat" style="margin-right: 15px">Tambah Data Surat Keterangan Beda Nama</button>
                <form action="/surat-keterangan-kematian" method="GET" style="margin-left: 40%">

                    <input type="text" id="cari" name="cari" placeholder="Cari NIK/No KK/Nama">
                    <button type="submit" class="btn btn-success">Cari</button>
                </form>
            </div>


            <!-- Modal create-->
            <div class="modal fade" id="cretaeDataMasyarakat" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="cretaeDataMasyarakatLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="cretaeDataMasyarakatLabel">Tambah Data Surat Keterangan Beda Nama</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="/surat-ket-beda-nama/store" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">

                                <div class="mb-3">
                                    <label for="tgl_regis_skbn" class="form-label"><b>TGL Regis SKBN</b></label>

                                    <input type="date" name="tgl_regis_skbn" id="tgl_regis_skbn" class="form-control @error('tgl_regis_skbn') is-invalid @enderror" required value="{{ old('tgl_regis_skbn') }}" autocomplete="off" placeholder="Input Tanggal Regis SKBN">

                                    @error('tgl_regis_skbn')
                                    <div class="invalid-feedback">
                                        <p style="text-align: left">{{ $message }}</p>
                                    </div>
                                    @enderror
                                </div>

                                <div class="form-group row mb-3">
                                    <div class="mb-3">
                                        <label for="nik" class="form-label"><b>NIK</b></label>

                                        <select class="form-select" name="nik" id="nik">
                                            <option name="nik" id="nik" value="" selected>Silakan Pilih NIK</option>
                                            @foreach($pendu as $penduduk)
                                            <option name="nik" id="nik" value="{{$penduduk->nik}}">{{$penduduk->nik}} | {{$penduduk->nama}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="nama" class="form-label"><b>Nama Lama</b></label>

                                        <input type="text" name="nama" id="nama" class="form-control @error('nama') is-invalid @enderror" required value="{{ old('nama') }}" autocomplete="off" placeholder="Input Tertulis Pada">

                                        @error('nama')
                                        <div class="invalid-feedback">
                                            <p style="text-align: left">{{ $message }}</p>
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="tertulis_pada" class="form-label"><b>Tertulis Pada</b></label>

                                        <input type="text" name="tertulis_pada" id="tertulis_pada" class="form-control @error('tertulis_pada') is-invalid @enderror" required value="{{ old('tertulis_pada') }}" autocomplete="off" placeholder="Input Tertulis Pada">

                                        @error('tertulis_pada')
                                        <div class="invalid-feedback">
                                            <p style="text-align: left">{{ $message }}</p>
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="nama_baru" class="form-label"><b>Nama Baru</b></label>

                                        <input type="text" name="nama_baru" id="nama_baru" class="form-control @error('nama_baru') is-invalid @enderror" required value="{{ old('nama_baru') }}" autocomplete="off" placeholder="Input Nama Baru">

                                        @error('nama_baru')
                                        <div class="invalid-feedback">
                                            <p style="text-align: left">{{ $message }}</p>
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="form-group row mb-3">
                                        <div class="col-sm-4">
                                            <label for="tempat_lh_baru" class="form-label"><b>Tempat Lahir Baru</b></label>

                                            <input type="text" name="tempat_lh_baru" id="tempat_lh_baru" class="form-control @error('tempat_lh_baru') is-invalid @enderror" required value="{{ old('tempat_lh_baru') }}" autocomplete="off" placeholder="Input Tempat Lahir Baru">

                                            @error('tempat_lh_baru')
                                            <div class="invalid-feedback">
                                                <p style="text-align: left">{{ $message }}</p>
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="col-sm-4">
                                            <label for="tgl_lh_baru" class="form-label"><b>Tanggal Lahir Baru</b></label>

                                            <input type="date" name="tgl_lh_baru" id="tgl_lh_baru" class="form-control @error('tgl_lh_baru') is-invalid @enderror" required value="{{ old('tgl_lh_baru') }}" autocomplete="off" placeholder="Input Tanggal Lahir Baru">

                                            @error('tgl_lh_baru')
                                            <div class="invalid-feedback">
                                                <p style="text-align: left">{{ $message }}</p>
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="alamat_baru" class="form-label"><b>Alamat Baru</b></label>

                                    <input type="text" name="alamat_baru" id="alamat_baru" class="form-control @error('alamat_baru') is-invalid @enderror" required value="{{ old('alamat_baru') }}" autocomplete="off" placeholder="Input Alamat Baru">

                                    @error('alamat_baru')
                                    <div class="invalid-feedback">
                                        <p style="text-align: left">{{ $message }}</p>
                                    </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="keperluan_skbn" class="form-label"><b>Keperluan SKBN</b></label>

                                    <input type="text" name="keperluan_skbn" id="keperluan_skbn" class="form-control @error('keperluan_skbn') is-invalid @enderror" required value="{{ old('keperluan_skbn') }}" autocomplete="off" placeholder="Input Keperluan SKBN">

                                    @error('keperluan_skbn')
                                    <div class="invalid-feedback">
                                        <p style="text-align: left">{{ $message }}</p>
                                    </div>
                                    @enderror
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
                            <h1 class="modal-title fs-5" id="deleteAllDataLabel">Hapus Seluruh Data Bayi</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                            <div class="mb-3">
                                <p><b>Apakah anda yakin untuk menghapus seluruh data bayi? pastikan anda telah meng-export data untuk menanggulangi kesalahan</b></p>
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
                    <th>NIK</th>
                    <th>Nama</th>
                    <th>Keperluan</th>
                    <th>Lampiran</th>
                    <th style="text-align: center">Verifikasi</th>
                    <th style="text-align: center">Cetak</th>
                </tr>
                @foreach ($surat as $index => $item)
                <tr style="width: 100%">
                    <td style="vertical-align: middle; width: 5%; ">{{ $index + $surat->firstItem() }}</td>
                    <td style="vertical-align: middle;  ">{{ $item->tgl_regis_skbn }}</td>
                    <td style="vertical-align: middle;  ">{{ $item->nik }}</td>
                    <td style="vertical-align: middle;  ">{{ $item->nama }}</td>
                    <td style="vertical-align: middle;  ">{{ $item->keperluan_skbn }}</td>
                    <td style="text-align: center;  ">
                        <a href="{{route('surat-keterangan-beda-nama/lampiran/show',$item->nik)}}"><button class="btn btn-success"><i class="bi bi-eye-fill"></i></button></a>
                        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#cretaeLampiran{{ $item->nik }}"><i class="bi bi-plus-square-fill"></i></button>
                        <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#destroyLampiran{{ $item->nik }}"><i class="bi bi-trash"></i></button>
                    </td>
                    <td style="text-align: center;  ">
                        @if($item->verifikasi=="Belum Verifikasi")
                        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#verifikasibayi{{ $item->nik }}">Verifikasi</button>
                        @else
                        <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#batalverifikasi{{ $item->nik }}">Batal Verifikasi</button>
                        @endif
                    </td>
                    <td style="text-align: center;  ">
                        <a href="{{route('surat-keterangan-beda-nama/pdflurah',$item->nik) }}" class="btn btn-success" target="_blank">Lurah</a>
                    </td>
                </tr>

                <!-- Modal verifikasi-->
                <div class="modal fade" id="verifikasibayi{{ $item->nik}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
                                <form action="{{route('surat-ket-beda-nama/verif', $item->nik) }}" method="post">
                                    @csrf
                                    <input type="text" id="verifikasi" name="verifikasi" value="Sudah Verifikasi" hidden>
                                    <button type="submit" class="btn btn-success">Verifikasi</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal batal verifikasi-->
                <div class="modal fade" id="batalverifikasi{{ $item->nik}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
                                <form action="{{route('surat-ket-beda-nama/verif', $item->nik) }}" method="post">
                                    @method('post')
                                    @csrf
                                    <input type="text" name="verifikasi" value="Belum Verifikasi" value="Belum Verifikasi" hidden>
                                    <button type="submit" class="btn btn-danger">Batalkan Verifikasi</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal edit-->
                <div class="modal fade" id="editbayi{{ $item->nik }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editDataMasyarakatLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="editDataMasyarakatLabel">Edit Data Penduduk</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="{{route('surat-ket-beda-nama',$item->nik)}}" method="post">
                                @csrf
                                <div class="modal-body">

                                    <div class="mb-3">
                                        <label for="tgl_regis_mati" class="form-label"><b>TGL Regis Kematian</b></label>

                                        <input type="date" name="tgl_regis_mati" id="tgl_regis_mati" class="form-control @error('tgl_regis_mati') is-invalid @enderror" required value="{{ old('tgl_regis_mati') }}" autocomplete="off" placeholder="Input Tanggal Regis Lahir">

                                        @error('tgl_regis_mati')
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
                                        <label for="nama_kepala_keluarga" class="form-label"><b>Nama Kepala Keluarga</b></label>

                                        <input type="text" name="nama_kepala_keluarga" id="nama_kepala_keluarga" class="form-control @error('nama_kepala_keluarga') is-invalid @enderror" required value="{{ old('nama_kepala_keluarga') }}" autocomplete="off" placeholder="Input Nama Kepala Keluarga">

                                        @error('nama_kepala_keluarga')
                                        <div class="invalid-feedback">
                                            <p style="text-align: left">{{ $message }}</p>
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="nik" class="form-label"><b>Nik Mati</b></label>

                                        <input type="text" name="nik" id="nik" class="form-control @error('nik') is-invalid @enderror" required value="{{ old('nik') }}" autocomplete="off" placeholder="Input NIK Mati">

                                        @error('nik')
                                        <div class="invalid-feedback">
                                            <p style="text-align: left">{{ $message }}</p>
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="form-group row mb-3">
                                        <div class="col-sm-4">
                                            <label for="anak_ke" class="form-label"><b>Anak Ke</b></label>

                                            <input type="text" name="anak_ke" id="anak_ke" class="form-control @error('anak_ke') is-invalid @enderror" required value="{{ old('anak_ke') }}" autocomplete="off" placeholder="Input Anak Ke">

                                            @error('anak_ke')
                                            <div class="invalid-feedback">
                                                <p style="text-align: left">{{ $message }}</p>
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="col-sm-4">
                                            <label for="tgl_mati" class="form-label"><b>Tanggal Mati</b></label>

                                            <input type="date" name="tgl_mati" id="tgl_mati" class="form-control @error('tgl_mati') is-invalid @enderror" required value="{{ old('tgl_mati') }}" autocomplete="off" placeholder="Input Tanggal Mati">

                                            @error('tgl_mati')
                                            <div class="invalid-feedback">
                                                <p style="text-align: left">{{ $message }}</p>
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="col-sm-4">
                                            <label for="pukul_mati" class="form-label"><b>Jam Kematian</b></label>

                                            <input type="time" name="pukul_mati" id="pukul_mati" class="form-control @error('pukul_mati') is-invalid @enderror" required value="{{ old('pukul_mati') }}" autocomplete="off" placeholder="Input Jam Kematian">

                                            @error('pukul_mati')
                                            <div class="invalid-feedback">
                                                <p style="text-align: left">{{ $message }}</p>
                                            </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row mb-3">
                                        <div class="mb-3">
                                            <label for="sebab" class="form-label"><b>Sebab Kematian</b></label>

                                            <select class="form-select" name="sebab" id="sebab">
                                                <option name="sebab" id="sebab" value="" selected>Silakan Pilih Sebab Kematian</option>
                                                <option name="sebab" id="sebab" value="kecelakaan">Kecelakaan</option>
                                                <option name="sebab" id="sebab" value="Sakit">Sakit</option>
                                                <option name="sebab" id="sebab" value="Lain-Lain">Lain-Lain</option>
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label for="tempat_mati" class="form-label"><b>Tempat Kematian</b></label>

                                            <select class="form-select" name="tempat_mati" id="tempat_mati">
                                                <option name="tempat_mati" id="tempat_mati" value="" selected>Silakan Pilih Tempat Kematian</option>
                                                <option name="tempat_mati" id="tempat_mati" value="Rumah">Rumah</option>
                                                <option name="tempat_mati" id="tempat_mati" value="Jalan">Jalan</option>
                                                <option name="tempat_mati" id="tempat_mati" value="Rumah Sakit">Rumah Sakit</option>
                                                <option name="tempat_mati" id="tempat_mati" value="Lain-Lain">Lain-Lain</option>
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label for="alamat" class="form-label"><b>Alamat </b></label>

                                            <input type="text" name="alamat" id="alamat" class="form-control @error('alamat') is-invalid @enderror" required value="{{ old('alamat') }}" autocomplete="off" placeholder="Input Alamat">

                                            @error('alamat')
                                            <div class="invalid-feedback">
                                                <p style="text-align: left">{{ $message }}</p>
                                            </div>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="yang_menerangkan" class="form-label"><b>Yang Menerangkan</b></label>

                                            <select class="form-select" name="yang_menerangkan" id="yang_menerangkan">
                                                <option name="yang_menerangkan" id="yang_menerangkan" value="" selected>Silakan Pilih Yang Menerangkan</option>
                                                <option name="yang_menerangkan" id="yang_menerangkan" value="Keluarga">Keluarga</option>
                                                <option name="yang_menerangkan" id="yang_menerangkan" value="Teman">Teman</option>
                                                <option name="yang_menerangkan" id="yang_menerangkan" value="Tetangga">Tetangga</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="nik_ibu" class="form-label"><b>NIK Ibu</b></label>

                                        <input type="text" name="nik_ibu" id="nik_ibu" class="form-control @error('nik_ibu') is-invalid @enderror" required value="{{ old('nik_ibu') }}" autocomplete="off" placeholder="Input NIK Ibu">

                                        @error('nik_ibu')
                                        <div class="invalid-feedback">
                                            <p style="text-align: left">{{ $message }}</p>
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="nik_ayah" class="form-label"><b>NIK Ayah</b></label>

                                        <input type="text" name="nik_ayah" id="nik_ayah" class="form-control @error('nik_ayah') is-invalid @enderror" required value="{{ old('nik_ayah') }}" autocomplete="off" placeholder="Input NIK Ayah">

                                        @error('nik_ayah')
                                        <div class="invalid-feedback">
                                            <p style="text-align: left">{{ $message }}</p>
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="nik_pelapor" class="form-label"><b>NIK Pelapor</b></label>

                                        <input type="text" name="nik_pelapor" id="nik_pelapor" class="form-control @error('nik_pelapor') is-invalid @enderror" required value="{{ old('nik_pelapor') }}" autocomplete="off" placeholder="Input NIK Pelapor">

                                        @error('nik_pelapor')
                                        <div class="invalid-feedback">
                                            <p style="text-align: left">{{ $message }}</p>
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="nik_saksisatu" class="form-label"><b>NIK Saksi Satu</b></label>

                                        <input type="text" name="nik_saksisatu" id="nik_saksisatu" class="form-control @error('nik_saksisatu') is-invalid @enderror" required value="{{ old('nik_saksisatu') }}" autocomplete="off" placeholder="Input NIK Ayah">

                                        @error('nik_saksisatu')
                                        <div class="invalid-feedback">
                                            <p style="text-align: left">{{ $message }}</p>
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="nik_saksidua" class="form-label"><b>NIK Saksi Dua</b></label>

                                        <input type="text" name="nik_saksidua" id="nik_saksidua" class="form-control @error('nik_saksidua') is-invalid @enderror" required value="{{ old('nik_saksidua') }}" autocomplete="off" placeholder="Input NIK Ayah">

                                        @error('nik_saksidua')
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

                <!-- Modal Lampiran-->
                <div class="modal fade" id="cretaeLampiran{{ $item->nik }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="cretaeLampiranLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="cretaeLampiranLabel">Tambah Lampiran Surat Keterangan Beda Nama</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <span class="modal-title fs-6 text-center" id="cretaeLampiranLabel">Upload dokumen kelengkapan, pastikan file berupa (jpg/pdf) dengan ukuran masksmal 2MB/file</span>
                            <form id="lampiranForm" action="{{route('surat-keterangan-beda-nama/lampiran/store',$item->nik)}}" method="POST" enctype="multipart/form-data">
                                @method('POST')
                                @csrf
                                <div class="modal-body">

                                    <div class="mb-3">
                                        <label for="ktp" class="form-label">KTP Pemohon</label>
                                        <input class="form-control" type="file" id="ktp" name="ktp">
                                        @error('ktp')
                                        <div class="invalid-feedback">
                                            <p style="text-align: left">{{ $message }}</p>
                                        </div>
                                        @enderror
                                    </div>

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
                                        <label for="dokumen" class="form-label">Dokumen yang terdapat perbedaan nama</label>
                                        <input class="form-control" type="file" id="dokumen" name="dokumen">
                                        @error('dokumen')
                                        <div class="invalid-feedback">
                                            <p style="text-align: left">{{ $message }}</p>
                                        </div>
                                        @enderror
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
                {{ $surat->links('layout.pagination') }}
            </div>
        </div>

    </div>
</main>
@endsection