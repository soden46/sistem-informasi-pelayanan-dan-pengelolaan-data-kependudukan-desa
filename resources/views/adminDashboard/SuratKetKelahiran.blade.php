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
            <div class="d-flex">

                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#cretaeDataMasyarakat" style="margin-right: 15px">Tambah Data Bayi</button>
                <form action="/surat-keterangan-kelahiran" method="GET" style="margin-left: 40%">

                    <input type="text" id="cari" name="cari" placeholder="Cari NIK/No KK/Nama">
                    <button type="submit" class="btn btn-success">Cari</button>
                </form>
            </div>


            <!-- Modal create-->
            <div class="modal fade" id="cretaeDataMasyarakat" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="cretaeDataMasyarakatLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="cretaeDataMasyarakatLabel">Tambah Data Bayi</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{route('surat-keterangan-kelahiran/save')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">

                                <div class="mb-3">
                                    <label for="tgl_regis_lahir" class="form-label"><b>TGL Regis Lahir</b></label>

                                    <input type="date" name="tgl_regis_lahir" id="tgl_regis_lahir" class="form-control @error('tgl_regis_lahir') is-invalid @enderror" required value="{{ old('tgl_regis_lahir') }}" autocomplete="off" placeholder="Input Tanggal Regis Lahir">

                                    @error('tgl_regis_lahir')
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
                                    <label for="nik_bayi" class="form-label"><b>Nik Bayi</b></label>

                                    <input type="text" name="nik_bayi" id="nik_bayi" class="form-control @error('nik_bayi') is-invalid @enderror" required value="{{ old('nik_bayi') }}" autocomplete="off" placeholder="Input NIK Bayi">

                                    @error('nik_bayi')
                                    <div class="invalid-feedback">
                                        <p style="text-align: left">{{ $message }}</p>
                                    </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="nama_bayi" class="form-label"><b>Nama Bayi</b></label>

                                    <input type="text" name="nama_bayi" id="nama_bayi" class="form-control @error('nama_bayi') is-invalid @enderror" required value="{{ old('nama_bayi') }}" autocomplete="off" placeholder="Input Nama Bayi">

                                    @error('nama_bayi')
                                    <div class="invalid-feedback">
                                        <p style="text-align: left">{{ $message }}</p>
                                    </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="jenis_kelamin" class="form-label"><b>Jenis Kelamin</b></label>

                                    <select class="form-select" name="jenis_kelamin" id="jenis_kelamin">
                                        <option name="jenis_kelamin" id="jenis_kelamin" value="" selected>Silakan Pilih Jenis Kelamin</option>
                                        <option name="jenis_kelamin" id="jenis_kelamin" value="Laki-Laki">Laki-Laki</option>
                                        <option name="jenis_kelamin" id="jenis_kelamin" value="Perempuan">Perempuan</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="tempat_dilahirkan" class="form-label"><b>Tempat Dilahirkan</b></label>

                                    <select class="form-select" name="tempat_dilahirkan" id="tempat_dilahirkan">
                                        <option name="tempat_dilahirkan" id="tempat_dilahirkan" value="" selected>Silakan Pilih Tempat Dilahirkan</option>
                                        <option name="tempat_dilahirkan" id="tempat_dilahirkan" value="Rumah Sakit">Rumah Sakit</option>
                                        <option name="tempat_dilahirkan" id="tempat_dilahirkan" value="Rumah Bersalin">Rumah Bersalin</option>
                                        <option name="tempat_dilahirkan" id="tempat_dilahirkan" value="Puskesmas">Puskesmas</option>
                                        <option name="tempat_dilahirkan" id="tempat_dilahirkan" value="Polindes">Polindes</option>
                                        <option name="tempat_dilahirkan" id="tempat_dilahirkan" value="Rumah">Rumah</option>
                                        <option name="tempat_dilahirkan" id="tempat_dilahirkan" value="Lain-Lain">Lain_lain</option>
                                    </select>
                                </div>

                                <div class="form-group row mb-3">
                                    <div class="col-sm-4">
                                        <label for="tempat_kelahiran" class="form-label"><b>Tempat Lahir</b></label>

                                        <input type="text" name="tempat_kelahiran" id="tempat_kelahiran" class="form-control @error('tempat_kelahiran') is-invalid @enderror" required value="{{ old('tempat_kelahiran') }}" autocomplete="off" placeholder="Input Tempat Lahir">

                                        @error('tempat_kelahiran')
                                        <div class="invalid-feedback">
                                            <p style="text-align: left">{{ $message }}</p>
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="tgl_lahir" class="form-label"><b>Tanggal Lahir</b></label>

                                        <input type="date" name="tgl_lahir" id="tgl_lahir" class="form-control @error('tgl_lahir') is-invalid @enderror" required value="{{ old('tgl_lahir') }}" autocomplete="off" placeholder="Input Tanggal Lahir">

                                        @error('tgl_lahir')
                                        <div class="invalid-feedback">
                                            <p style="text-align: left">{{ $message }}</p>
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="pukul" class="form-label"><b>Jam Dilahirkan</b></label>

                                        <input type="time" name="pukul" id="pukul" class="form-control @error('pukul') is-invalid @enderror" required value="{{ old('pukul') }}" autocomplete="off" placeholder="Input Jam Lahir">

                                        @error('pukul')
                                        <div class="invalid-feedback">
                                            <p style="text-align: left">{{ $message }}</p>
                                        </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="jenis_kelahiran" class="form-label"><b>Jenis Kelahiran</b></label>

                                    <select class="form-select" name="jenis_kelahiran" id="jenis_kelahiran">
                                        <option name="jenis_kelahiran" id="jenis_kelahiran" value="" selected>Silakan Pilih Jenis Kelahiran</option>
                                        <option name="jenis_kelahiran" id="jenis_kelahiran" value="Tunggal">Tunggal</option>
                                        <option name="jenis_kelahiran" id="jenis_kelahiran" value="Kembar 2">Kembar 2</option>
                                        <option name="jenis_kelahiran" id="jenis_kelahiran" value="Kembar 3">Kembar 3</option>
                                        <option name="jenis_kelahiran" id="jenis_kelahiran" value="Kembar 4">Kembar 4</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="penolong" class="form-label"><b>Penolong</b></label>

                                    <select class="form-select" name="penolong" id="penolong">
                                        <option name="penolong" id="penolong" value="" selected>Silakan Pilih Penolong</option>
                                        <option name="penolong" id="penolong" value="Dokter">Dokter</option>
                                        <option name="penolong" id="penolong" value="Perawat">Perawat</option>
                                        <option name="penolong" id="penolong" value="Bidan">Bidan</option>
                                        <option name="penolong" id="penolong" value="Dukun">Dukun</option>
                                        <option name="penolong" id="penolong" value="Lainnya">Lainnya</option>
                                    </select>
                                </div>

                                <div class="form-group row mb-3">
                                    <div class="col-sm-6">
                                        <label for="berat_bayi" class="form-label"><b>Berat Bayi</b></label>

                                        <input type="number" step=".1" name="berat_bayi" id="berat_bayi" class="form-control @error('berat_bayi') is-invalid @enderror" required value="{{ old('berat_bayi') }}" autocomplete="off" placeholder="Input Berat Badan Bayi">

                                        @error('berat_bayi')
                                        <div class="invalid-feedback">
                                            <p style="text-align: left">{{ $message }}</p>
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="col-sm-6">
                                        <label for="panjang_bayi" class="form-label"><b>Panjang Bayi</b></label>

                                        <input type="number" name="panjang_bayi" id="panjang_bayi" class="form-control @error('panjang_bayi') is-invalid @enderror" required value="{{ old('panjang_bayi') }}" autocomplete="off" placeholder="Input Tinggi Badan Bayi">

                                        @error('panjang_bayi')
                                        <div class="invalid-feedback">
                                            <p style="text-align: left">{{ $message }}</p>
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="anak_ke" class="form-label"><b>Anak Ke</b></label>

                                        <input type="number" name="anak_ke" id="anak_ke" class="form-control @error('anak_ke') is-invalid @enderror" required value="{{ old('anak_ke') }}" autocomplete="off" placeholder="Input Tinggi Badan Lahir">

                                        @error('anak_ke')
                                        <div class="invalid-feedback">
                                            <p style="text-align: left">{{ $message }}</p>
                                        </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="nik_ibu" class="form-label"><b>NIK Ibu</b></label>

                                    <select class="form-select" name="nik_ibu" id="nik_ibu">
                                        <option name="nik_ibu" id="nik_ibu" value="" selected>Silakan Pilih NIK Ibu</option>
                                        @foreach($pendu as $penduduk)
                                        <option name="nik_ibu" id="nik_ibu" value="{{$penduduk->nik}}">{{$penduduk->nik}} | {{$penduduk->nama}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="nik_ayah" class="form-label"><b>NIK Ayah</b></label>

                                    <select class="form-select" name="nik_ayah" id="nik_ayah">
                                        <option name="nik_ayah" id="nik_ayah" value="" selected>Silakan Pilih NIK Ayah</option>
                                        @foreach($pendu as $penduduk)
                                        <option name="nik_ayah" id="nik_ayah" value="{{$penduduk->nik}}">{{$penduduk->nik}} | {{$penduduk->nama}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="tempat_kawin" class="form-label"><b>Tempat Kawin</b></label>

                                    <select class="form-select" name="tempat_kawin" id="tempat_kawin">
                                        <option name="tempat_kawin" id="tempat_kawin" value="" selected>Silakan Pilih Tempat Kawin</option>
                                        <option name="tempat_kawin" id="tempat_kawin" value="KUA">KUA</option>
                                        <option name="tempat_kawin" id="tempat_kawin" value="Gereja">Gereja</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="no_akta_nikah" class="form-label"><b>No Akta Nikah</b></label>

                                    <input type="text" name="no_akta_nikah" id="no_akta_nikah" class="form-control @error('no_akta_nikah') is-invalid @enderror" required value="{{ old('no_akta_nikah') }}" autocomplete="off" placeholder="Input No Akta Nikah">

                                    @error('no_akta_nikah')
                                    <div class="invalid-feedback">
                                        <p style="text-align: left">{{ $message }}</p>
                                    </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="tgl_akta_nikah" class="form-label"><b>Tanggal Akta Nikah</b></label>

                                    <input type="date" name="tgl_akta_nikah" id="tgl_akta_nikah" class="form-control @error('tgl_akta_nikah') is-invalid @enderror" required value="{{ old('tgl_akta_nikah') }}" autocomplete="off" placeholder="Input Tanggal Akta Nikah">

                                    @error('tgl_akta_nikah')
                                    <div class="invalid-feedback">
                                        <p style="text-align: left">{{ $message }}</p>
                                    </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="nik_pelapor" class="form-label"><b>NIK Pelapor</b></label>

                                    <select class="form-select" name="nik_pelapor" id="nik_pelapor">
                                        <option name="nik_pelapor" id="nik_pelapor" value="" selected>Silakan Pilih NIK Pelapor</option>
                                        @foreach($pendu as $penduduk)
                                        <option name="nik_pelapor" id="nik_pelapor" value="{{$penduduk->nik}}">{{$penduduk->nik}} | {{$penduduk->nama}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="nik_saksisatu" class="form-label"><b>NIK Saksi Satu</b></label>

                                    <select class="form-select" name="nik_saksisatu" id="nik_saksisatu">
                                        <option name="nik_saksisatu" id="nik_saksisatu" value="" selected>Silakan Pilih NIK Saksi Satu</option>
                                        @foreach($pendu as $penduduk)
                                        <option name="nik_saksisatu" id="nik_saksisatu" value="{{$penduduk->nik}}">{{$penduduk->nik}} | {{$penduduk->nama}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="nik_saksidua" class="form-label"><b>NIK Saksi Dua</b></label>

                                    <select class="form-select" name="nik_saksidua" id="nik_saksidua">
                                        <option name="nik_saksidua" id="nik_saksidua" value="" selected>Silakan Pilih NIK Saksi Dua</option>
                                        @foreach($pendu as $penduduk)
                                        <option name="nik_saksidua" id="nik_saksidua" value="{{$penduduk->nik}}">{{$penduduk->nik}} | {{$penduduk->nama}}</option>
                                        @endforeach
                                    </select>
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
                    <th>NIK Pelapor</th>
                    <th>Nama Pelapor</th>
                    <th>Nama Bayi</th>
                    <th>NIK Bayi</th>
                    <th>Tempat Lahir</th>
                    <th>Tgl Lahir</th>
                    <th>Jenis Kelamin</th>
                    <th>Verifikasi</th>
                    <th style="text-align: center">cetak</th>
                </tr>
                @foreach ($bayi as $index => $item)
                <tr style="width: 100%">
                    <td style="vertical-align: middle; width: 5%; ">{{ $index + $bayi->firstItem() }}</td>
                    <td style="vertical-align: middle;  ">{{ $item->tgl_regis_lahir }}</td>
                    <td style="vertical-align: middle;  ">{{ $item->nik_pelapor }}</td>
                    <td style="vertical-align: middle;  ">{{ $item->nama_pelapor }}</td>
                    <td style="vertical-align: middle;  ">{{ $item->nama_bayi }}</td>
                    <td style="vertical-align: middle;  ">{{ $item->nik_bayi }}</td>
                    <td style="vertical-align: middle;  ">{{ $item->tempat_kelahiran }}</td>
                    <td style="vertical-align: middle;  ">{{ $item->tgl_lahir }}</td>
                    <td style="vertical-align: middle;  ">{{ $item->jenis_kelamin }}</td>
                    <td style="vertical-align: middle;  ">{{ $item->berat_bayi }}</td>
                    <td style="text-align: center;  ">
                        @if($item->verifikasi=="Belum Verifikasi")
                        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#verifikasibayi{{ $item->nik_bayi }}">Verifikasi</button>
                        @else
                        <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#batalverifikasi{{ $item->nik_bayi }}">Batal Verifikasi</button>
                        @endif
                    </td>
                    <td style="text-align: center;  ">
                        <a href="{{route('surat-keterangan-kelahiran/pdflurah',$item->nik_bayi) }}" class="btn btn-success" target="_blank">Lurah</a>
                        <a href="{{route('surat-keterangan-kelahiran/pdf',$item->nik_bayi) }}" class="btn btn-success" target="_blank">Staff</a>
                    </td>
                </tr>

                <!-- Modal verifikasi-->
                <div class="modal fade" id="verifikasibayi{{ $item->nik_bayi}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
                                <form action="{{route('surat-keterangan-kelahiran', $item->nik_bayi) }}" method="post">
                                    @csrf
                                    <input type="text" id="verifikasi" name="verifikasi" value="Sudah Verifikasi" hidden>
                                    <button type="submit" class="btn btn-success">Verifikasi</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal batal verifikasi-->
                <div class="modal fade" id="batalverifikasi{{ $item->nik_bayi}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
                                <form action="{{route('surat-keterangan-kelahiran', $item->nik_bayi) }}" method="post">
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
                <div class="modal fade" id="editbayi{{ $item->nik_bayi }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editDataMasyarakatLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="editDataMasyarakatLabel">Edit Data Penduduk</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="{{route('surat-keterangan-kelahiran',$item->nik_bayi)}}" method="post">
                                @csrf
                                <div class="modal-body">

                                    <div class="mb-3">
                                        <label for="tgl_regis" class="form-label"><b>TGL Regis Lahir</b></label>

                                        <input type="date" name="tgl_regis_lahir" id="tgl_regis_lahir" class="form-control @error('tgl_regis_lahir') is-invalid @enderror" required value="{{ old('tgl_regis_lahir') }}" autocomplete="off" placeholder="Input Tanggal Regis Lahir">

                                        @error('tgl_regis_lahir')
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
                                        <label for="nik_bayi" class="form-label"><b>Nik Bayi</b></label>

                                        <input type="text" name="nik_bayi" id="nik_bayi" class="form-control @error('nik_bayi') is-invalid @enderror" required value="{{ old('nik_bayi') }}" autocomplete="off" placeholder="Input NIK Bayi">

                                        @error('nik_bayi')
                                        <div class="invalid-feedback">
                                            <p style="text-align: left">{{ $message }}</p>
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="nama_bayi" class="form-label"><b>Nama Bayi</b></label>

                                        <input type="text" name="nama_bayi" id="nama_bayi" class="form-control @error('nama_bayi') is-invalid @enderror" required value="{{ old('nama_bayi') }}" autocomplete="off" placeholder="Input Nama Bayi">

                                        @error('nama_bayi')
                                        <div class="invalid-feedback">
                                            <p style="text-align: left">{{ $message }}</p>
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="jenis_kelamin" class="form-label"><b>Jenis Kelamin</b></label>

                                        <select class="form-select" name="jenis_kelamin" id="jenis_kelamin">
                                            <option name="jenis_kelamin" id="jenis_kelamin" value="" selected>Silakan Pilih Jenis Kelamin</option>
                                            <option name="jenis_kelamin" id="jenis_kelamin" value="Laki-Laki">Laki-Laki</option>
                                            <option name="jenis_kelamin" id="jenis_kelamin" value="Perempuan">Perempuan</option>
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="tempat_dilahirkan" class="form-label"><b>Tempat Dilahirkan</b></label>

                                        <select class="form-select" name="tempat_dilahirkan" id="tempat_dilahirkan">
                                            <option name="tempat_dilahirkan" id="tempat_dilahirkan" value="" selected>Silakan Pilih Tempat Dilahirkan</option>
                                            <option name="tempat_dilahirkan" id="tempat_dilahirkan" value="Rumah Sakit">Rumah Sakit</option>
                                            <option name="tempat_dilahirkan" id="tempat_dilahirkan" value="Rumah Bersalin">Rumah Bersalin</option>
                                            <option name="tempat_dilahirkan" id="tempat_dilahirkan" value="Puskesmas">Puskesmas</option>
                                            <option name="tempat_dilahirkan" id="tempat_dilahirkan" value="Polindes">Polindes</option>
                                            <option name="tempat_dilahirkan" id="tempat_dilahirkan" value="Rumah">Rumah</option>
                                            <option name="tempat_dilahirkan" id="tempat_dilahirkan" value="Lain_lain">Lain_lain</option>
                                        </select>
                                    </div>

                                    <div class="form-group row mb-3">
                                        <div class="col-sm-4">
                                            <label for="tempat_kelahiran" class="form-label"><b>Tempat Lahir</b></label>

                                            <input type="text" name="tempat_kelahiran" id="tempat_kelahiran" class="form-control @error('tempat_kelahiran') is-invalid @enderror" required value="{{ old('tempat_kelahiran') }}" autocomplete="off" placeholder="Input Tempat Lahir">

                                            @error('tempat_kelahiran')
                                            <div class="invalid-feedback">
                                                <p style="text-align: left">{{ $message }}</p>
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="col-sm-4">
                                            <label for="tgl_lahir" class="form-label"><b>Tanggal Lahir</b></label>

                                            <input type="date" name="tgl_lahir" id="tgl_lahir" class="form-control @error('tgl_lahir') is-invalid @enderror" required value="{{ old('tgl_lahir') }}" autocomplete="off" placeholder="Input Tanggal Lahir">

                                            @error('tgl_lahir')
                                            <div class="invalid-feedback">
                                                <p style="text-align: left">{{ $message }}</p>
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="col-sm-4">
                                            <label for="pukul" class="form-label"><b>Jam Dilahirkan</b></label>

                                            <input type="time" name="pukul" id="pukul" class="form-control @error('pukul') is-invalid @enderror" required value="{{ old('pukul') }}" autocomplete="off" placeholder="Input Jam Lahir">

                                            @error('pukul')
                                            <div class="invalid-feedback">
                                                <p style="text-align: left">{{ $message }}</p>
                                            </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="jenis_kelahiran" class="form-label"><b>Jenis Kelahiran</b></label>

                                        <select class="form-select" name="jenis_kelahiran" id="jenis_kelahiran">
                                            <option name="jenis_kelahiran" id="jenis_kelahiran" value="" selected>Silakan Pilih Jenis Kelahiran</option>
                                            <option name="jenis_kelahiran" id="jenis_kelahiran" value="Dokter">Tunggal</option>
                                            <option name="jenis_kelahiran" id="jenis_kelahiran" value="Kembar 2">Kembar 2</option>
                                            <option name="jenis_kelahiran" id="jenis_kelahiran" value="Kembar 2">Kembar 3</option>
                                            <option name="jenis_kelahiran" id="jenis_kelahiran" value="Kembar 2">Kembar 4</option>
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="penolong" class="form-label"><b>Penolong</b></label>

                                        <select class="form-select" name="penolong" id="penolong">
                                            <option name="penolong" id="penolong" value="" selected>Silakan Pilih Penolong</option>
                                            <option name="penolong" id="penolong" value="Dokter">Dokter</option>
                                            <option name="penolong" id="penolong" value="Perawat">Perawat</option>
                                            <option name="penolong" id="penolong" value="Bidan">Bidan</option>
                                            <option name="penolong" id="penolong" value="Dukun">Dukun</option>
                                            <option name="penolong" id="penolong" value="Lainnya">Lainnya</option>
                                        </select>
                                    </div>

                                    <div class="form-group row mb-3">
                                        <div class="col-sm-6">
                                            <label for="berat_bayi" class="form-label"><b>Berat Bayi</b></label>

                                            <input type="number" step=".01" name="berat_bayi" id="berat_bayi" class="form-control @error('berat_bayi') is-invalid @enderror" required value="{{ old('berat_bayi') }}" autocomplete="off" placeholder="Input Beray Badan Lahir">

                                            @error('berat_bayi')
                                            <div class="invalid-feedback">
                                                <p style="text-align: left">{{ $message }}</p>
                                            </div>
                                            @enderror
                                        </div>

                                        <div class="col-sm-6">
                                            <label for="panjang_bayi" class="form-label"><b>Panjang Bayi</b></label>

                                            <input type="number" name="panjang_bayi" id="panjang_bayi" class="form-control @error('panjang_bayi') is-invalid @enderror" required value="{{ old('panjang_bayi') }}" autocomplete="off" placeholder="Input Tinggi Badan Lahir">

                                            @error('panjang_bayi')
                                            <div class="invalid-feedback">
                                                <p style="text-align: left">{{ $message }}</p>
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="anak_ke" class="form-label"><b>Anak Ke</b></label>

                                            <input type="number" name="anak_ke" id="anak_ke" class="form-control @error('anak_ke') is-invalid @enderror" required value="{{ old('anak_ke') }}" autocomplete="off" placeholder="Input Tinggi Badan Lahir">

                                            @error('anak_ke')
                                            <div class="invalid-feedback">
                                                <p style="text-align: left">{{ $message }}</p>
                                            </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="nik_ibu" class="form-label"><b>NIK Ibu</b></label>

                                        <select class="form-select" name="nik_ibu" id="nik_ibu">
                                            <option name="nik_ibu" id="nik_ibu" value="" selected>Silakan Pilih NIK Ibu</option>
                                            @foreach($pendu as $penduduk)
                                            <option name="nik_ibu" id="nik_ibu" value="{{$penduduk->nik}}">{{$penduduk->nik}} | {{$penduduk->nama}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="nik_ayah" class="form-label"><b>NIK Ibu</b></label>

                                        <select class="form-select" name="nik_ayah" id="nik_ayah">
                                            <option name="nik_ayah" id="nik_ayah" value="" selected>Silakan Pilih NIK Ayah</option>
                                            @foreach($pendu as $penduduk)
                                            <option name="nik_ayah" id="nik_ayah" value="{{$penduduk->nik}}">{{$penduduk->nik}} | {{$penduduk->nama}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="tempat_kawin" class="form-label"><b>Tempat Kawin</b></label>

                                        <input type="text" name="tempat_kawin" id="tempat_kawin" class="form-control @error('tempat_kawin') is-invalid @enderror" required value="{{ old('tempat_kawin') }}" autocomplete="off" placeholder="Input Tempat Kawin">

                                        @error('tempat_kawin')
                                        <div class="invalid-feedback">
                                            <p style="text-align: left">{{ $message }}</p>
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="no_akta_nikah" class="form-label"><b>No Akta Nikah</b></label>

                                        <input type="text" name="no_akta_nikah" id="no_akta_nikah" class="form-control @error('no_akta_nikah') is-invalid @enderror" required value="{{ old('no_akta_nikah') }}" autocomplete="off" placeholder="Input No Akta Nikah">

                                        @error('no_akta_nikah')
                                        <div class="invalid-feedback">
                                            <p style="text-align: left">{{ $message }}</p>
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="tgl_akta_nikah" class="form-label"><b>Tanggal Akta Nikah</b></label>

                                        <input type="date" name="tgl_akta_nikah" id="tgl_akta_nikah" class="form-control @error('tgl_akta_nikah') is-invalid @enderror" required value="{{ old('tgl_akta_nikah') }}" autocomplete="off" placeholder="Input Tanggal Akta Nikah">

                                        @error('tgl_akta_nikah')
                                        <div class="invalid-feedback">
                                            <p style="text-align: left">{{ $message }}</p>
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="nik_pelapor" class="form-label"><b>NIK Pelapor</b></label>

                                        <select class="form-select" name="nik_pelapor" id="nik_pelapor">
                                            <option name="nik_pelapor" id="nik_pelapor" value="" selected>Silakan Pilih NIK Pelapor</option>
                                            @foreach($pendu as $penduduk)
                                            <option name="nik_pelapor" id="nik_pelapor" value="{{$penduduk->nik}}">{{$penduduk->nik}} | {{$penduduk->nama}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="nik_saksisatu" class="form-label"><b>NIK Saksi Satu</b></label>

                                        <select class="form-select" name="nik_saksisatu" id="nik_saksisatu">
                                            <option name="nik_saksisatu" id="nik_saksisatu" value="" selected>Silakan Pilih NIK Saksi Satu</option>
                                            @foreach($pendu as $penduduk)
                                            <option name="nik_saksisatu" id="nik_saksisatu" value="{{$penduduk->nik}}">{{$penduduk->nik}} | {{$penduduk->nama}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="nik_saksidua" class="form-label"><b>NIK Saksi Dua</b></label>

                                        <select class="form-select" name="nik_saksidua" id="nik_saksidua">
                                            <option name="nik_saksidua" id="nik_saksidua" value="" selected>Silakan Pilih NIK Saksi Dua</option>
                                            @foreach($pendu as $penduduk)
                                            <option name="nik_saksidua" id="nik_saksidua" value="{{$penduduk->nik}}">{{$penduduk->nik}} | {{$penduduk->nama}}</option>
                                            @endforeach
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
                {{ $bayi->links('layout.pagination') }}
            </div>
        </div>

    </div>
</main>
@endsection