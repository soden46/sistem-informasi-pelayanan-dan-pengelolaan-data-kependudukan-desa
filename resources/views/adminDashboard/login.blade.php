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
        @if (session()->has('loginError'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>{{ session('loginError') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session('success') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <form action="/authenticate" method="POST">
            @csrf

            <div class="d-flex justify-content-center px-2"><img src="{{asset('sip.png')}}" id="foto" alt="Logo" height="192px" /></div>
            <h1 class="h3 mb-3 fw-normal"><b>Sign in to Your Acount</b></h1>
            <p class="text-muted" style="font-size: 12px; margin-top: -8px;">Silakan masukan Username dan Password anda</p>

            <div class="form-group">
                <input style="height: 55px" type="text" class="form-control" id="userName" name="userName" placeholder="Username" autocomplete="off">
            </div>
            {{-- <div class="form-floating">
                <input data-toggle="password" type="password" class="form-control" id="password" placeholder="Password">
                <label for="floatingPassword">Password</label>
                
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
                    <p>Password Bawaan Akun Warga Adalah tanggal lahir: Tanggal/Bulan/Tahun (30/01/2000)</p>
                    <input style="height: 55px" name="password" type="password" class="input form-control" id="password" placeholder="password" required="true" aria-label="password" aria-describedby="basic-addon1" autocomplete="off" />

                    <div class="input-group-append" style="height: 55px">
                        <span class="input-group-text" onclick="password_show_hide();">
                            <i class="fas fa-eye" id="show_eye"></i>
                            <i class="fas fa-eye-slash d-none" id="hide_eye"></i>
                        </span>
                    </div>
                </div>
            </div>
            <button class="w-100 btn btn-lg btn-success" type="submit"><b>Sign in</b></button>
        </form>
    </main>
</body>

</html>