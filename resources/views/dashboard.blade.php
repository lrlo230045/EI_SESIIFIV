@extends('layouts.app')

@section('content')

<div class="container mt-5">

    <!-- Bienvenida -->
    <div class="card shadow-sm border-0 mb-4">
        <div class="card-body text-center">
            <h2 class="fw-bold">Bienvenido, {{ auth()->user()->name }}</h2>
            <p class="text-muted mb-0">Gestiona tus talleres y actividades fácilmente</p>
        </div>
    </div>

    <!-- OPCIONES USUARIO -->
    <div class="row g-4">

        <!-- Talleres disponibles -->
        <div class="col-md-3">
            <div class="card shadow h-100 border-0">
                <div class="card-body text-center">
                    <i class="fas fa-book fa-2x text-success mb-3"></i>
                    <h5>Talleres</h5>
                    <p class="text-muted small">Explora talleres</p>
                    <a href="/talleres-disponibles" class="btn btn-success w-100">
                        Ver
                    </a>
                </div>
            </div>
        </div>

        <!-- Mis talleres -->
        <div class="col-md-3">
            <div class="card shadow h-100 border-0">
                <div class="card-body text-center">
                    <i class="fas fa-user-check fa-2x text-primary mb-3"></i>
                    <h5>Mis Talleres</h5>
                    <p class="text-muted small">Tus inscripciones</p>
                    <a href="/mis-talleres" class="btn btn-primary w-100">
                        Ver
                    </a>
                </div>
            </div>
        </div>

        <!-- Actividades disponibles -->
        <div class="col-md-3">
            <div class="card shadow h-100 border-0">
                <div class="card-body text-center">
                    <i class="fas fa-running fa-2x text-warning mb-3"></i>
                    <h5>Actividades</h5>
                    <p class="text-muted small">Explora actividades</p>
                    <a href="/actividades-disponibles" class="btn btn-warning w-100">
                        Ver
                    </a>
                </div>
            </div>
        </div>

        <!-- Mis actividades -->
        <div class="col-md-3">
            <div class="card shadow h-100 border-0">
                <div class="card-body text-center">
                    <i class="fas fa-list-check fa-2x text-info mb-3"></i>
                    <h5>Mis Actividades</h5>
                    <p class="text-muted small">Tus registros</p>
                    <a href="/mis-actividades" class="btn btn-info w-100">
                        Ver
                    </a>
                </div>
            </div>
        </div>

    </div>

    <!-- PANEL ADMIN -->
    @if(auth()->user()->role == 'admin')
        <div class="mt-5">

            <h4 class="fw-bold mb-3">Panel Administrador</h4>

            <div class="row g-4">

                <!-- Usuarios -->
                <div class="col-md-4">
                    <div class="card shadow border-0 h-100">
                        <div class="card-body text-center">
                            <i class="fas fa-users fa-2x text-dark mb-3"></i>
                            <h5>Usuarios</h5>
                            <a href="/users" class="btn btn-dark w-100">
                                Gestionar
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Talleres -->
                <div class="col-md-4">
                    <div class="card shadow border-0 h-100">
                        <div class="card-body text-center">
                            <i class="fas fa-chalkboard-teacher fa-2x text-dark mb-3"></i>
                            <h5>Talleres</h5>
                            <a href="/talleres" class="btn btn-dark w-100">
                                Gestionar
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Actividades -->
                <div class="col-md-4">
                    <div class="card shadow border-0 h-100">
                        <div class="card-body text-center">
                            <i class="fas fa-running fa-2x text-dark mb-3"></i>
                            <h5>Actividades</h5>
                            <a href="/actividades" class="btn btn-dark w-100">
                                Gestionar
                            </a>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    @endif

</div>

@endsection