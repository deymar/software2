<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/variables.css">
    <link rel="stylesheet" href="/css/format.css">
    <link 
        rel="stylesheet"   href="/css/layouts/estructura_principal.css">
        
    @yield('styles')
    <title> @yield('title') </title>
</head>
<body>
    
    <div class="img-fondo" >
        @yield('imagen_fondo')
    </div>

    <div class="super-content">
        @yield('content')
    </div>

    @yield('scripts')
    
</body>
</html>