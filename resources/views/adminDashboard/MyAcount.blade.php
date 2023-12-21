@extends('../layout/mainAdmin')

@section('adminContent')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="card" style="width: 100%; height: 100%; background-color: white; padding: 20px">
        @if (session()->has('successUpdatedAcount'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session('successUpdatedAcount') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        @if (session()->has('failUpdatedAcount'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>{{ session('failUpdatedAcount') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <div class="container-xl px-4 mt-4">
            <hr class="mt-0 mb-4">
            <div class="row">
                <div class="col-xl-8">
                    <!-- Detail Akun-->
                    <div class="card mb-4">
                        <div class="card-header">Detail Akun</div>
                        <div class="card-body">
                            <form action="{{route('Update/Account',$user->id)}}" method="POST">
                                @csrf
                                @method('POST')
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="name" class="form-label"><b>Nama User</b></label>

                                        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" autofocus required value="{{ old('name', $user->name) }}" placeholder="Input your name">

                                        @error('name')
                                        <div class="invalid-feedback">
                                            <p style="text-align: left">{{ $message }}</p>
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="userName" class="form-label"><b>UserName</b></label>

                                        <input type="text" name="userName" id="userName" class="form-control @error('userName') is-invalid @enderror" autofocus required value="{{ old('userName', $user->userName) }}" placeholder="Input your userName">

                                        @error('userName')
                                        <div class="invalid-feedback">
                                            <p style="text-align: left">{{ $message }}</p>
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="role" class="form-label"><b>Status Akun</b></label>

                                        <select class="form-select" name="role" id="role">
                                            <option value="{{ $user->role }}" selected>{{ $user->role }}</option>
                                            <option value="Staff">Staff</option>
                                            <option value="Masyarakat">Masyarakat</option>
                                        </select>
                                    </div>

                                    <div class="mb-3">

                                        <label for="password_lama" class="form-label"><b>Password Lama</b></label>
                                        <p class="text-muted" style="font-size: 11px; margin-top: -8px;">Password terdiri dari minimal 8 karakter dan maksimal 15 karakter </p>
                                        <p class="text-muted" style="font-size: 11px; margin-top: -8px;">(Huruf besar, Huruf kecil, Angka)</p>

                                        <div class="input-group mb-3">
                                            <input name="password_lama" type="password" class="input form-control  @error('password_lama') is-invalid @enderror" id="password_lama" placeholder="password" aria-label="password" aria-describedby="basic-addon1" />

                                            <div class="input-group-append">
                                                <span class="input-group-text" onclick="password_lama_show_hide();" style="height: 39px">
                                                    <i class="fas fa-eye" id="show_eyeLama"></i>
                                                    <i class="fas fa-eye-slash d-none" id="hide_eyeLama"></i>
                                                </span>
                                            </div>
                                        </div>
                                        @error('password_lama')
                                        <p style="text-align: left">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3"><label for="password_baru" class="form-label"><b>Password Baru</b></label>
                                        <p class="text-muted" style="font-size: 11px; margin-top: -8px;">Password terdiri dari minimal 8 karakter dan maksimal 15 karakter </p>
                                        <p class="text-muted" style="font-size: 11px; margin-top: -8px;">(Huruf besar, Huruf kecil, Angka)</p>

                                        <div class="input-group mb-3">
                                            <input name="password_baru" type="password" class="input form-control  @error('password_baru') is-invalid @enderror" id="password_baru" placeholder="password baru" aria-label="password" aria-describedby="basic-addon1" />

                                            <div class="input-group-append">
                                                <span class="input-group-text" onclick="password_baru_show_hide();" style="height: 39px">
                                                    <i class="fas fa-eye" id="show_eyeBaru"></i>
                                                    <i class="fas fa-eye-slash d-none" id="hide_eyeBaru"></i>
                                                </span>
                                            </div>
                                        </div>

                                        @error('password_baru')
                                        <p style="text-align: left">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <button class="btn btn-primary" type="submit">Save changes</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<script>
    function password_lama_show_hide() {
        var x = document.getElementById("password_lama");
        var show_eye = document.getElementById("show_eyeLama");
        var hide_eye = document.getElementById("hide_eyeLama");
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

    function password_baru_show_hide() {
        var x = document.getElementById("password_baru");
        var show_eye = document.getElementById("show_eyeBaru");
        var hide_eye = document.getElementById("hide_eyeBaru");
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