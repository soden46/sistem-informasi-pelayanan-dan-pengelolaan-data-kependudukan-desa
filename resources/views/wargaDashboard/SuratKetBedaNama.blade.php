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

                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#cretaeDataMasyarakat" style="margin-right: 15px">Tambah Data Surat Keterangan Beda Nama</button>
                <form action="surat-ket-beda-nama" method="GET" style="margin-left: 40%">

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
                        <form action="surat-ket-beda-nama/store" method="POST" enctype="multipart/form-data">
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
                    <th>Verifikasi</th>
                    <th style="text-align: center">Cetak</th>
                </tr>
                @foreach ($surat as $index => $item)
                <tr style="width: 100%">
                    <td style="vertical-align: middle; width: 5%; ">{{ $index + $surat->firstItem() }}</td>
                    <td style="vertical-align: middle;  ">{{ $item->tgl_regis_skbn }}</td>
                    <td style="vertical-align: middle;  ">{{ $item->nik }}</td>
                    <td style="vertical-align: middle;  ">{{ $item->pend->nama }}</td>
                    <td style="vertical-align: middle;  ">{{ $item->keperluan_skbn }}</td>
                    <td style="vertical-align: middle;  ">{{$item->verifikasi}}</td>
                    <td style="text-align: center;  ">
                        <a href="{{route('warga/surat-keterangan-beda-nama/pdflurah',$item->nik) }}" class="btn btn-success" target="_blank">Lurah</a>
                        <a href="{{route('warga/surat-keterangan-beda-nama/pdf',$item->nik) }}" class="btn btn-success" target="_blank">Staff</a>
                    </td>
                    <td style="text-align: center;  ">
                        <a href="{{route('warga/surat-keterangan-beda-nama/pd',$item->nik) }}" class="btn btn-success" target="_blank">Lurah</a>
                    </td>
                </tr>

                @endforeach
            </table>
            <div class="d-flex justify-content-between mb-3">
                {{ $surat->links('layout.pagination') }}
            </div>
        </div>

    </div>
</main>
@endsection