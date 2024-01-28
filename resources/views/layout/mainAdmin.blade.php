<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    @include('../all/allCss')

    <link rel="stylesheet" href="/css/dashboard.css">
    <script type="text/javascript" src="/js/dashboard.js"></script>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/dashboard/">
    <link rel="stylesheet" type="text/css" href="/css/trix.css">
    <script type="text/javascript" src="/js/trix.js"></script>
    <style>
        trix-toolbar [data-trix-button-group="file-tools"] {
            display: none
        }
    </style>


    {{-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous"> --}}


    <title>{{ $title }}</title>
</head>

<body class="bodyPublic">

    @include('../all/allScript')
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://unpkg.com/bootstrap-show-password@1.2.1/dist/bootstrap-show-password.min.js"></script>

    @include('../layout/admin/navbar')
    @include('../layout/admin/sidebar')

    <div class="container-fluid">
        <div class="row">
            <script>
                // mematikan fungsi add file trix editor (e) = end
                document.addEventListener('trix-file-accept', function(e) {
                    e.preventDefault();
                })

                function previewImage() {
                    // tangkap variabel image dengan id image
                    const logoDesa = document.querySelector('#logoDesa');

                    // ambil tag img kosong untuk preview
                    const imgPreview = document.querySelector('.img-preview');

                    imgPreview.style.display = 'block';

                    // menangkap gambarnya dari url
                    const oFReader = new FileReader();
                    oFReader.readAsDataURL(logoDesa.files[0]);


                    oFReader.onload = function(oFREvent) {
                        imgPreview.src = oFREvent.target.result;
                    }
                }

                function previewImageApbdesa() {
                    // tangkap variabel image dengan id image
                    const fotoApbdesa = document.querySelector('#fotoApbdes');

                    // ambil tag img kosong untuk preview
                    const imgPreview = document.querySelector('.img-preview-Apbdesa');

                    imgPreview.style.display = 'block';

                    // menangkap gambarnya dari url
                    const oFReader = new FileReader();
                    oFReader.readAsDataURL(fotoApbdesa.files[0]);


                    oFReader.onload = function(oFREvent) {
                        imgPreview.src = oFREvent.target.result;
                    }
                }
            </script>
            @yield('adminContent')
        </div>
    </div>

    <!-- Dependent Select -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $('#nik_pelapor').on('change', function() {
                var pelaporID = $(this).val();
                if (pelaporID) {
                    $.ajax({
                        url: '/getPelapor/' + pelaporID,
                        type: "GET",
                        data: {
                            "_token": "{{ csrf_token() }}"
                        },
                        dataType: "json",
                        success: function(data) {
                            if (data) {
                                $('#nama_pelapor').empty();
                                $('#nama_pelapor').append('<option hidden>Pilih Nama Pelapor</option>');
                                $.each(data, function(key, nama_pelapor) {
                                    $('select[name="nama_pelapor"]').append('<option value="' + key + '" selected>' + nama_pelapor.nama + '</option>');
                                });
                            } else {
                                $('#nama_pelapor').empty();
                            }
                        }
                    });
                } else {
                    $('#nama_pelapor').empty();
                }
            });
        });
    </script>
</body>

</html>