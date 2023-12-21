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
        @if (session()->has('successUpdatedAcount'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session('successUpdatedAcount') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        @if (session()->has('successDeletedOtherAcount'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>{{ session('successDeletedOtherAcount') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        @if (session()->has('successCreatedOtherAcount'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session('successCreatedOtherAcount') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif


        <script>
            function password_show_hide() {
                var x = document.getElementById("password");
                var show_eye = document.getElementById("show_eye");
                var hide_eye = document.getElementById("hide_eye");
                hide_eye.classList.remove("d-none");
                if (x.type === "password") {
                    x.type = "text";
                    show_eye.style.display = "none";
                    hide_eye.style.display = "block";
                } else {
                    x.type = "password";
                    show_eye.style.display = "block";
                    hide_eye.style.display = "none";
                }
            }

            function password_show_hideAdmin() {
                var x = document.getElementById("passwordAdmin");
                var show_eye = document.getElementById("show_eyeAdmin");
                var hide_eye = document.getElementById("hide_eyeAdmin");
                hide_eye.classList.remove("d-none");
                if (x.type === "password") {
                    x.type = "text";
                    show_eye.style.display = "none";
                    hide_eye.style.display = "block";
                } else {
                    x.type = "password";
                    show_eye.style.display = "block";
                    hide_eye.style.display = "none";
                }
            }
        </script>

        <div class="py-4">
            <div class="mb-4">
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createdAcount">Created Acount</button>

                {{-- modal created acount --}}
                <div class="modal fade" id="createdAcount" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="createdAcountLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="createdAcountLabel">Created Acount</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>

                            <form action="/other-account/store" method="post">
                                @csrf
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="name" class="form-label"><b>Nama User</b></label>

                                        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" autofocus required value="{{ old('name') }}" placeholder="Input your name">

                                        @error('name')
                                        <div class="invalid-feedback">
                                            <p style="text-align: left">{{ $message }}</p>
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="userName" class="form-label"><b>UserName</b></label>

                                        <input type="text" name="userName" id="userName" class="form-control @error('userName') is-invalid @enderror" autofocus required value="{{ old('userName') }}" placeholder="Input your userName">

                                        @error('userName')
                                        <div class="invalid-feedback">
                                            <p style="text-align: left">{{ $message }}</p>
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="role" class="form-label"><b>Status Akun</b></label>

                                        <select class="form-select" name="role" id="role">
                                            <option value="" selected>Pilih status akun</option>
                                            <option value="Staff">Staff</option>
                                            <option value="Masyarakat">Masyarakat</option>
                                        </select>
                                    </div>

                                    <div class="mb-3">

                                        <label for="password" class="form-label"><b>Password</b></label>
                                        <p class="text-muted" style="font-size: 11px; margin-top: -8px;">Password terdiri dari minimal 8 karakter dan maksimal 15 karakter </p>
                                        <p class="text-muted" style="font-size: 11px; margin-top: -8px;">(Huruf besar, Huruf kecil, Angka)</p>

                                        <div class="input-group mb-3">
                                            <input name="password" type="password" class="input form-control" id="password" placeholder="password" required="true" aria-label="password" aria-describedby="basic-addon1" />

                                            <div class="input-group-append">
                                                <span class="input-group-text" onclick="password_show_hide();" style="height: 39px">
                                                    <i class="fas fa-eye" id="show_eye"></i>
                                                    <i class="fas fa-eye-slash d-none" id="hide_eye"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-primary">Created</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <table class="table mb-5" style="text-align: left; color: black">
                <div style="background-color: #006029; color: whitesmoke; width: 100%">
                    <h6 class="py-2" style="font-family: 'Raleway', sans-serif; text-align: center;">Acount Admin</h6>
                </div>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Username</th>
                    <th>Status</th>
                    <th>Last Updated</th>
                    <th style="text-align: center">Action</th>
                </tr>
                <?php $i = 1 ?>
                @foreach ($user as $item)
                <tr style="width: 100%">
                    <td style="vertical-align: middle; width: 5%; ">{{$i++ }}</td>
                    <td style="vertical-align: middle; width: 30%; text-transform: capitalize">{{ $item->name }}</td>
                    <td style="vertical-align: middle;">{{ $item->userName }}</td>
                    <td style="vertical-align: middle; text-transform: capitalize ">{{ $item->status }}</td>
                    <td style="vertical-align: middle;  ">{{ $item->updated_at}}</td>
                    <td style="text-align: center;  ">
                        <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editAcount{{ $item->id }}">Edit</button>
                        <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#admin{{ $item->id }}">Hapus</button>
                    </td>
                </tr>

                <!-- Modal delete-->
                <div class="modal fade" id="admin{{ $item->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="adminLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="adminLabel">Delete {{ $item->title }}</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>Apakah anda yakin untuk menghapus acount <b>{{ $item->status }} {{ $item->name }}</b></p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Cancel</button>
                                <form action="/other-account/delete/{{ $item->id }}" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Deleted</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- modal edit acount --}}
                <div class="modal fade" id="editAcount{{ $item->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editAcountLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="editAcountLabel">Edit Acount {{ $item->name }}</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>

                            <form action="/other-account/update/{{ $item->id }}" method="POST">
                                @method('POST')
                                @csrf
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="name" class="form-label"><b>Nama User</b></label>

                                        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" autofocus required value="{{ old('name', $item->name) }}" placeholder="Input your name">

                                        @error('name')
                                        <div class="invalid-feedback">
                                            <p style="text-align: left">{{ $message }}</p>
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="userName" class="form-label"><b>UserName</b></label>

                                        <input type="text" name="userName" id="userName" class="form-control @error('userName') is-invalid @enderror" autofocus required value="{{ old('userName', $item->userName) }}" placeholder="Input your userName">

                                        @error('userName')
                                        <div class="invalid-feedback">
                                            <p style="text-align: left">{{ $message }}</p>
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="role" class="form-label"><b>Status Akun</b></label>

                                        <select class="form-select" name="role" id="role">
                                            <option value="{{ $item->role }}" selected>{{ $item->role }}</option>
                                            <option value="Staff">Staff</option>
                                            <option value="Masyarakat">Masyarakat</option>
                                        </select>
                                    </div>

                                    <div class="mb-3">

                                        <label for="password" class="form-label"><b>Password</b></label>
                                        <p class="text-muted" style="font-size: 11px; margin-top: -8px;">Password terdiri dari minimal 8 karakter dan maksimal 15 karakter </p>
                                        <p class="text-muted" style="font-size: 11px; margin-top: -8px;">(Huruf besar, Huruf kecil, Angka)</p>

                                        <div class="input-group mb-3">
                                            <input name="password" type="password" class="input form-control  @error('password') is-invalid @enderror" id="passwordAdmin" placeholder="password" aria-label="password" aria-describedby="basic-addon1" />

                                            <div class="input-group-append">
                                                <span class="input-group-text" onclick="password_show_hide();" style="height: 39px">
                                                    <i class="fas fa-eye" id="show_eyeAdmin"></i>
                                                    <i class="fas fa-eye-slash d-none" id="hide_eyeAdmin"></i>
                                                </span>
                                            </div>
                                        </div>

                                        @error('password')
                                        <p style="text-align: left">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-primary">Updated</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>



                @endforeach
            </table>

        </div>

    </div>
</main>
<script>
    function password_show_hide() {
        var x = document.getElementById("password");
        var show_eye = document.getElementById("show_eye");
        var hide_eye = document.getElementById("hide_eye");
        hide_eye.classList.remove("d-none");
        if (x.type === "password") {
            x.type = "text";
            show_eye.style.display = "none";
            hide_eye.style.display = "block";
        } else {
            x.type = "password";
            show_eye.style.display = "block";
            hide_eye.style.display = "none";
        }
    }
</script>
@endsection