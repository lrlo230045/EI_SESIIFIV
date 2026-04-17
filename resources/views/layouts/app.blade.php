<!DOCTYPE html>
<html>
<head>
    <title>SIIFIV</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body class="bg-light">

<!-- NAVBAR -->
<nav class="navbar navbar-dark bg-dark px-3">
    <span class="navbar-brand">SIIFIV</span>

    <div>
        <a href="/dashboard" class="btn btn-outline-light btn-sm">Dashboard</a>
        <a href="/talleres-disponibles" class="btn btn-outline-light btn-sm">Talleres</a>
        <a href="/mis-talleres" class="btn btn-outline-light btn-sm">Mis talleres</a>
        <a href="/mis-actividades" class="btn btn-outline-light btn-sm">Mis actividades</a>
        <a href="/actividades-disponibles" class="btn btn-outline-light btn-sm">Actividades</a>

        @if(auth()->user()->role == 'admin')
            <a href="/actividades" class="btn btn-warning btn-sm">Actividades</a>
        @endif

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

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show mt-2">
            {{ session('success') }}
            <button class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show mt-2">
            {{ session('error') }}
            <button class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if(session('warning'))
        <div class="alert alert-warning alert-dismissible fade show mt-2">
            {{ session('warning') }}
            <button class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @yield('content')

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>