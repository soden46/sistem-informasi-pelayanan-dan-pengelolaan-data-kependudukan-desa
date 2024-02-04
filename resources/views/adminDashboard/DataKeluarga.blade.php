@extends('../layout/mainAdmin')

@section('adminContent')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

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

                <form action="{{route('data-keluarga/cari',$no_kk)}}" method="GET" style="margin-left: 40%">

                    <input type="text" id="cari" name="cari" placeholder="Cari NIK Atau No KK">
                    <button type="submit" class="btn btn-success">Cari</button>
                </form>
            </div>


            <!-- Modal create-->
            <div class="modal fade" id="cretaeDataMasyarakat" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="cretaeDataMasyarakatLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="cretaeDataMasyarakatLabel">Tambah Data Keluarga</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{route('data-keluarga/store')}}" method="post">
                            @csrf
                            <div class="modal-body">

                                <div class="mb-3">
                                    <label for="no_kk" class="form-label"><b>NO KK</b></label>

                                    <select class="form-select" name="no_kk" id="no_kk">
                                        <option name="no_kk" id="no_kk" value="" selected>Silakan Pilih NIK</option>
                                        @foreach($pendu as $penduduk)
                                        <option name="no_kk" id="no_kk" value="{{$penduduk->no_kk}}">{{$penduduk->no_kk}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="nik" class="form-label"><b>NIK</b></label>

                                    <input type="text" name="nik" id="nik" class="form-control @error('nik') is-invalid @enderror" required value="{{ old('nik') }}" autocomplete="off" placeholder="Input NIK">

                                    @error('nik')
                                    <div class="invalid-feedback">
                                        <p style="text-align: left">{{ $message }}</p>
                                    </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="sts_keluarga" class="form-label"><b>Status Keluarga</b></label>

                                    <select class="form-select" name="sts_keluarga" id="sts_keluarga">
                                        <option value="" selected>Silakan Pilih Status Keluarga</option>
                                        <option name="sts_keluarga" id="sts_keluarga" value="Istri">Istri</option>
                                        <option name="sts_keluarga" id="sts_keluarga" value="Anak">Anak</option>
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


            <div class="table-responsive">
                <table class="table" style="text-align: left; color: black">
                    <tr>
                        <th>No</th>
                        <th>NIK</th>
                        <th>NAMA</th>
                        <th>NoKK</th>
                        <th>Status Keluarga</th>
                        <th>Status Kawin</th>
                        <th style="text-align: center">Action</th>
                    </tr>
                    @foreach ($keluarga as $index => $item)
                    <tr style="width: 100%">
                        <td style="vertical-align: middle; width: 5%; ">{{ $index + $keluarga->firstItem() }}</td>
                        <td style="vertical-align: middle;  ">{{ $item->nik }}</td>
                        <td style="vertical-align: middle;  ">{{ $item->pend->nama }}</td>
                        <td style="vertical-align: middle;  ">{{ $item->no_kk }}</td>
                        <td style="vertical-align: middle;  ">{{ $item->sts_keluarga }}</td>
                        <td style="vertical-align: middle;  ">{{ $item->pend->sts_kawin }}</td>
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
                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Delete Data Penduduk</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p>Apakah anda yakin untuk menghapus data <b>{{ $item->nama }}</b></p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Cancel</button>
                                    <form action="{{route('data-keluarga', $item->nik) }}" method="post">
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
                                    <h1 class="modal-title fs-5" id="editDataMasyarakatLabel">Edit Data Penduduk</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="{{route('data-keluarga',$item->nik)}}" method="post">
                                    @csrf
                                    <div class="modal-body">

                                        <div class="mb-3">
                                            <label for="no_kk" class="form-label"><b>NoKK</b></label>

                                            <input type="text" name="no_kk" id="no_kk" class="form-control @error('no_kk') is-invalid @enderror" required value="{{ $item->no_kk }}" autocomplete="off" placeholder="Input Nomor KK">

                                            @error('no_kk')
                                            <div class="invalid-feedback">
                                                <p style="text-align: left">{{ $message }}</p>
                                            </div>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="nik" class="form-label"><b>NIK</b></label>

                                            <input type="text" name="nik" id="nik" class="form-control @error('nik') is-invalid @enderror" required value="{{ $item->nik }}" autocomplete="off" placeholder="Input NIK">

                                            @error('nik')
                                            <div class="invalid-feedback">
                                                <p style="text-align: left">{{ $message }}</p>
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="sts_keluarga" class="form-label"><b>Status Keluarga</b></label>

                                            <select class="form-select" name="sts_keluarga" id="sts_keluarga">
                                                <option value="" selected>Silakan Pilih Status Keluarga</option>
                                                <option name="sts_keluarga" id="sts_keluarga" value="Istri">Istri</option>
                                                <option name="sts_keluarga" id="sts_keluarga" value="Anak">Anak</option>
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

                    @endforeach
                </table>
                <div class="d-flex justify-content-between mb-3">
                    {{ $keluarga->links('layout.pagination') }}
                </div>
            </div>

        </div>
</main>
@endsection