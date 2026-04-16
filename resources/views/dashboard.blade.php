@extends('layouts.app')

@section('content')

<div class="container mt-5">

    <!-- Bienvenida -->
    <div class="card shadow-sm border-0 mb-4">
        <div class="card-body text-center">
            <h2 class="fw-bold">Bienvenido, {{ auth()->user()->name }}</h2>
            <p class="text-muted mb-0">Gestiona tus talleres de forma sencilla</p>
        </div>
    </div>

    <!-- Opciones principales -->
    <div class="row g-4">

        <!-- Talleres disponibles -->
        <div class="col-md-6">
            <div class="card shadow h-100 border-0">
                <div class="card-body text-center">
                    <i class="fas fa-book fa-2x text-success mb-3"></i>
                    <h5 class="card-title">Talleres Disponibles</h5>
                    <p class="text-muted">Explora todos los talleres disponibles</p>
                    <a href="/talleres-disponibles" class="btn btn-success w-100">
                        Ver Talleres
                    </a>
                </div>
            </div>
        </div>

        <!-- Mis talleres -->
        <div class="col-md-6">
            <div class="card shadow h-100 border-0">
                <div class="card-body text-center">
                    <i class="fas fa-user-check fa-2x text-primary mb-3"></i>
                    <h5 class="card-title">Mis Talleres</h5>
                    <p class="text-muted">Consulta los talleres en los que estás inscrito</p>
                    <a href="/mis-talleres" class="btn btn-primary w-100">
                        Ver Mis Talleres
                    </a>
                </div>
            </div>
        </div>

    </div>

    <!-- Panel Admin -->
    @if(auth()->user()->role == 'admin')
        <div class="mt-5">

            <h4 class="fw-bold mb-3">Panel Administrador</h4>

            <div class="row g-4">

                <!-- Usuarios -->
                <div class="col-md-6">
                    <div class="card shadow border-0 h-100">
                        <div class="card-body text-center">
                            <i class="fas fa-users fa-2x text-dark mb-3"></i>
                            <h5>Usuarios</h5>
                            <a href="/users" class="btn btn-dark w-100">
                                Gestionar Usuarios
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Talleres -->
                <div class="col-md-6">
                    <div class="card shadow border-0 h-100">
                        <div class="card-body text-center">
                            <i class="fas fa-chalkboard-teacher fa-2x text-dark mb-3"></i>
                            <h5>Talleres</h5>
                            <a href="/talleres" class="btn btn-dark w-100">
                                Gestionar Talleres
                            </a>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    @endif

</div>

@endsection