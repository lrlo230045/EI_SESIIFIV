@extends('layouts.app')

@section('content')

<div class="container py-5">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">Mis Actividades</h2>

        <a href="{{ route('actividades.disponibles') }}" class="btn btn-outline-primary">
            Ver Actividades
        </a>
    </div>

    <div class="row g-4">

    @forelse($actividades as $a)
        <div class="col-md-4">

            <div class="card shadow border-0 h-100">

                <div class="card-body d-flex flex-column">

                    <h5 class="fw-bold">{{ $a->nombre }}</h5>

                    <p class="text-muted small">
                        {{ $a->descripcion }}
                    </p>

                    <small class="text-muted mb-3">
                        {{ $a->fecha_inicio }} → {{ $a->fecha_fin }}
                    </small>

                    <div class="mt-auto">
                        <form method="POST" action="{{ route('actividades.cancelar',$a->id) }}">
                            @csrf
                            <button class="btn btn-danger w-100">
                                Cancelar inscripción
                            </button>
                        </form>
                    </div>

                </div>

            </div>

        </div>
    @empty
        <div class="col-12">
            <div class="alert alert-info">
                No estás inscrito en ninguna actividad
            </div>
        </div>
    @endforelse

    </div>

</div>

@endsection