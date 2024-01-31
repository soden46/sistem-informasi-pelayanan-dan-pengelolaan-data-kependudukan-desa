@extends('../layout/mainWarga')

@section('wargaContent')
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

                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#cretaeDataMasyarakat" style="margin-right: 15px">Tambah Data Mutasi Keluar</button>
                <form action="/data-penduduk" method="GET" style="margin-left: 40%">

                    <input type="text" id="cari" name="cari" placeholder="Cari NIK/No KK/Nama">
                    <button type="submit" class="btn btn-success">Cari</button>
                </form>
            </div>


            <!-- Modal create-->
            <div class="modal fade" id="cretaeDataMasyarakat" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="cretaeDataMasyarakatLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="cretaeDataMasyarakatLabel">Tambah Data Mutasi Keluar</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{route('warga/data-mutasi-keluar/store')}}" method="post">
                            @csrf
                            <div class="modal-body">

                                <div class="mb-3">
                                    <label for="tgl_regis_mk" class="form-label"><b>TGL Regis</b></label>

                                    <input type="date" name="tgl_regis_mk" id="tgl_regis_mk" class="form-control @error('tgl_regis_mk') is-invalid @enderror" required value="{{ old('tgl_regis') }}" autocomplete="off" placeholder="Input Tanggal Regis">

                                    @error('tgl_regis_mk')
                                    <div class="invalid-feedback">
                                        <p style="text-align: left">{{ $message }}</p>
                                    </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="nik_pelapor" class="form-label"><b>NIK Pelapor</b></label>

                                    <select class="form-select" name="nik_pelapor" id="nik_pelapor">
                                        <option name="nik_pelapor" id="nik_pelapor" value="" selected>Silakan Pilih NIK</option>
                                        <option name="nik_pelapor" id="nik_pelapor" value="{{$user->nik}}" selected>{{$user->nik}} | {{$user->name}}</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="nama_pelapor" class="form-label"><b>Nama Pelapor</b></label>

                                    <select class="form-select" name="nama_pelapor" id="nama_pelapor">
                                        <option name="nama_pelapor" id="nama_pelapor" value="" selected>Silakan Pilih NIK</option>
                                        <option name="nama_pelapor" id="nama_pelapor" value="{{$user->nama}}" selected>{{$user->nama}}</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="nik_mk" class="form-label"><b>NIK</b></label>

                                    <select class="form-select" name="nik_mk" id="nik_mk">
                                        <option name="nik_mk" id="nik_mk" value="" selected>Silakan Pilih NIK</option>
                                        @foreach($pendudk as $penduduk)
                                        <option name="nik_mk" id="nik_mk" value="{{$penduduk->nik}}">{{$penduduk->nik}} | {{$penduduk->nama}}</option>
                                        @endforeach
                                    </select>
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
                    <th>Nama</th>
                    <th>NIK</th>
                    <th>Jenis Kelamin</th>
                    <th>Tempat Lahir</th>
                    <th>Tanggal Lahir</th>
                    <th>Agama</th>
                    <th>Pekerjaan</th>
                    <th style="text-align: center">Lampiran</th>
                    <th style="text-align: center">Verifiksi</th>
                </tr>
                @foreach ($MutasiKeluar as $index => $item)
                <tr style="width: 100%">
                    <td style="vertical-align: middle; width: 5%; ">{{ $index + $MutasiKeluar->firstItem() }}</td>
                    <td style="vertical-align: middle;  ">{{ $item->pend->nama }}</td>
                    <td style="vertical-align: middle;  ">{{ $item->nik_mk }}</td>
                    <td style="vertical-align: middle;  ">{{ $item->pend->jk }}</td>
                    <td style="vertical-align: middle;  ">{{ $item->pend->tempat_lahir }}</td>
                    <td style="vertical-align: middle;  ">{{ $item->pend->tgl_lahir }}</td>
                    <td style="vertical-align: middle;  ">{{ $item->pend->agama }}</td>
                    <td style="vertical-align: middle;  ">{{ $item->pend->pekerjaan }}</td>
                    <td style="text-align: center;  ">
                        <a href="{{route('warga/data-mutasi-keluar/lampiran/show',$item->nik_mk)}}"><button class="btn btn-success"><i class="bi bi-eye-fill"></i></button></a>
                        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#cretaeLampiran{{ $item->nik_mk }}"><i class="bi bi-plus-square-fill"></i></button>
                        <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#destroyLampiran{{ $item->nik_mk }}"><i class="bi bi-trash"></i></button>
                    </td>
                    <td style="vertical-align: middle;  ">{{ $item->verifikasi }}</td>
                </tr>

                <!-- Modal delete-->
                <div class="modal fade" id="staticBackdrop{{ $item->nik_mk}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
                                <form action="{{route('warga/data-mutasi-keluar/delete', $item->nik_mk) }}" method="post">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Deleted</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal delete lampiran-->
                <div class="modal fade" id="destroyLampiran{{ $item->nik_mk}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="destroyLampiranLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="destroyLampiranLabel">Delete Lampiran</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>Apakah anda yakin untuk menghapus lampiran dari <b>{{ $item->nama_mk }}</b></p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Cancel</button>
                                <form action="{{route('warga/data-mutasi-masuk/lampiran/destroy', $item->nik_mk) }}" method="post">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Deleted</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal Create Lampiran-->
                <div class="modal fade" id="cretaeLampiran{{ $item->nik_mk }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="cretaeLampiranLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="cretaeLampiranLabel">Tambah Lampiran Surat Mutasi Keluar</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <span class="modal-title fs-6 text-center" id="cretaeLampiranLabel">Upload dokumen kelengkapan, pastikan file berupa (jpg/pdf) dengan ukuran masksmal 2MB/file</span>
                            <form id="lampiranForm" action="{{route('warga/data-mutasi-keluar/lampiran/store',$item->nik_mk)}}" method="POST" enctype="multipart/form-data">
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
                                        <label for="ktp" class="form-label">KTP </label>
                                        <input class="form-control" type="file" id="ktp" name="ktp">
                                        @error('ktp')
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
                {{ $MutasiKeluar->links('layout.pagination') }}
            </div>
        </div>

    </div>
</main>
@endsection