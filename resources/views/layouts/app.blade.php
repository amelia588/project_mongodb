<!DOCTYPE html>
<html>
<head>
    <title>Gestión de Productos</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="{{ route('productos.index') }}">Productos</a>
    </nav>
    <div class="container mt-5">
        @yield('content')
    </div>
</body>
</html>
