<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @include('../all/allCss')

    <!-- Custom styles for this template -->
    <link href="/css/signin.css" rel="stylesheet">
    <title>{{ $title }}</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous" />

    <!-- font awesome  -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous" />

</head>

<body class="text-center">
    @include('../all/allScript')


    <main class="form-signin w-100 m-auto">
        @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session('success') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        @if (session()->has('error'))
        <div class="alert alert-error alert-dismissible fade show" role="alert">
            <strong>{{ session('error') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <form action="/register" method="POST">
            @csrf

            <div class="d-flex justify-content-center px-2"><img src="{{asset('images/logo/sleman.png')}}" id="foto" alt="Logo" height="120px" /></div>
            <h1 class="h3 mb-3 fw-normal"><b>Buat Akun</b></h1>
            <p class="text-muted" style="font-size: 12px; margin-top: -8px;">Masukan Data Yang Diperlukan</p>
            <div class="form-group">
                <input style="height: 55px" type="text" class="form-control" id="nik" name="nik" placeholder="NIK" autocomplete="off" required>
                @error('nik')
                <div class="invalid-feedback">
                    <p style="text-align: left">{{ $message }}</p>
                </div>
                @enderror
            </div>
            <div class="form-group">
                <input style="height: 55px" type="text" class="form-control" id="name" name="name" placeholder="Nama Lengkap" autocomplete="off" required>
                @error('name')
                <div class="invalid-feedback">
                    <p style="text-align: left">{{ $message }}</p>
                </div>
                @enderror
            </div>
            <div class="form-group">
                <input style="height: 55px" type="text" class="form-control" id="userName" name="userName" placeholder="Username" autocomplete="off" required>
                @error('userName')
                <div class="invalid-feedback">
                    <p style="text-align: left">{{ $message }}</p>
                </div>
                @enderror
            </div>
            <div class="form-group">
                <input style="height: 55px" type="text" class="form-control" id="email" name="email" placeholder="Email" autocomplete="off" required>
                @error('email')
                <div class="invalid-feedback">
                    <p style="text-align: left">{{ $message }}</p>
                </div>
                @enderror
            </div>
            {{-- <div class="form-floating">
                <input data-toggle="password" type="password" class="form-control" id="password" placeholder="Password" required>
                <label for="floatingPassword">Password</label>
            @error('password')
                <div class="invalid-feedback">
                    <p style="text-align: left">{{ $message }}</p>
            </div>
            @enderror
            </div> --}}
            <div>
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
                <div class="input-group mb-3">
                    <input style="height: 55px" name="password" type="password" class="input form-control" id="password" placeholder="password" required="true" aria-label="password" aria-describedby="basic-addon1" autocomplete="off" required />

                    <div class="input-group-append" style="height: 55px">
                        <span class="input-group-text" onclick="password_show_hide();">
                            <i class="fas fa-eye" id="show_eye"></i>
                            <i class="fas fa-eye-slash d-none" id="hide_eye"></i>
                        </span>
                    </div>
                </div>
            </div>
            <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" id="syarat" name="syarat" required>
                <label class="form-check-label" for="exampleCheck1">Saya telah membaca, memahami dan menyetujui syarat dan ketentuan pengguna layanan website ini</label>
                @error('syarat')
                <div class="invalid-feedback">
                    <p style="text-align: left">{{ $message }}</p>
                </div>
                @enderror
            </div>

            <button class="w-100 btn btn-lg btn-success" type="submit"><b>Register</b></button>
        </form>
    </main>
</body>

</html>