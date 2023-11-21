<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" type="text/css" href="/css/trix.css">
    <script type="text/javascript" src="/js/trix.js"></script>
    <style>
        
        trix-toolbar [data-trix-button-group="file-tools"]{
        display: none
        }
    </style>
    @include('../all/allCss')

    <title>{{ $title }}</title>
</head>
<body class="bodyPublic">
    <script>
        // mematikan fungsi add file trix editor (e) = end
        document.addEventListener('trix-file-accept', function(e) { e.preventDefault();})
    </script>
    @include('../all/allScript')

    @include('../layout/publicc/navbarPublic')

    @yield('publicContent')

    @include('../layout/publicc/footerPublic')
</body>
</html>