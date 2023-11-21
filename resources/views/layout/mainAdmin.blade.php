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
        
        trix-toolbar [data-trix-button-group="file-tools"]{
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
                document.addEventListener('trix-file-accept', function(e) { e.preventDefault();})

                function previewImage(){
                    // tangkap variabel image dengan id image
                    const logoDesa = document.querySelector('#logoDesa');

                    // ambil tag img kosong untuk preview
                    const imgPreview = document.querySelector('.img-preview');

                    imgPreview.style.display = 'block';

                    // menangkap gambarnya dari url
                    const oFReader = new FileReader();
                    oFReader.readAsDataURL(logoDesa.files[0]);

                    
                    oFReader.onload = function(oFREvent){
                    imgPreview.src = oFREvent.target.result;
                    }
                }

                function previewImageApbdesa(){
                    // tangkap variabel image dengan id image
                    const fotoApbdesa = document.querySelector('#fotoApbdes');

                    // ambil tag img kosong untuk preview
                    const imgPreview = document.querySelector('.img-preview-Apbdesa');

                    imgPreview.style.display = 'block';

                    // menangkap gambarnya dari url
                    const oFReader = new FileReader();
                    oFReader.readAsDataURL(fotoApbdesa.files[0]);

                    
                    oFReader.onload = function(oFREvent){
                    imgPreview.src = oFREvent.target.result;
                    }
                }
            </script>
            @yield('adminContent')
        </div>
    </div>

</body>
</html>