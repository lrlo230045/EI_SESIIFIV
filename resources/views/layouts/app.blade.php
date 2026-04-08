<!DOCTYPE html>
<html>
<head>
    <title>SIIFIV</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<!-- NAVBAR -->
<nav class="navbar navbar-dark bg-dark px-3">
    <span class="navbar-brand">SIIFIV</span>

    <div>
        <a href="/dashboard" class="btn btn-outline-light btn-sm">Dashboard</a>
        <a href="/talleres-disponibles" class="btn btn-outline-light btn-sm">Talleres</a>
        <a href="/mis-talleres" class="btn btn-outline-light btn-sm">Mis talleres</a>

        @if(auth()->user()->role == 'admin')
            <a href="/users" class="btn btn-warning btn-sm">Usuarios</a>
            <a href="/talleres" class="btn btn-warning btn-sm">Talleres</a>
        @endif

        <form method="POST" action="{{ route('logout') }}" class="d-inline">
            @csrf
            <button class="btn btn-danger btn-sm">Salir</button>
        </form>
    </div>
</nav>

<!-- CONTENIDO -->
<div class="container mt-4">
    @yield('content')
</div>

</body>
</html>