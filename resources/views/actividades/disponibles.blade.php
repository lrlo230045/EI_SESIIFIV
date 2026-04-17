@extends('layouts.app')

@section('content')

<div class="container py-5">

    <!-- HEADER -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">Actividades Disponibles</h2>

        <a href="{{ route('actividades.mis') }}" class="btn btn-outline-primary">
            Mis Actividades
        </a>
    </div>

    <!-- GRID -->
    <div class="row g-4">

    @foreach($actividades as $a)

        @php
            $inscritos = $a->users->count();
            $disponibles = $a->cupo - $inscritos;
            $inscrito = auth()->user()->actividades->contains($a->id);
        @endphp

        <div class="col-md-4">
            <div class="card border-0 shadow h-100">

                <div class="card-body d-flex flex-column">

                    <!-- TITULO -->
                    <h5 class="fw-bold">{{ $a->nombre }}</h5>

                    <!-- DESCRIPCIÓN -->
                    <p class="text-muted small">
                        {{ $a->descripcion ?? 'Sin descripción' }}
                    </p>

                    <!-- INFO -->
                    <div class="mb-3">

                        <span class="badge bg-info">
                            Cupo: {{ $a->cupo }}
                        </span>

                        <span class="badge bg-success">
                            Disponibles: {{ $disponibles }}
                        </span>

                    </div>

                    <!-- FECHAS -->
                    <small class="text-muted mb-3">
                        {{ $a->fecha_inicio }} → {{ $a->fecha_fin }}
                    </small>

                    <!-- BOTÓN -->
                    <div class="mt-auto">

                        @if($inscrito)

                            <!-- YA INSCRITO -->
                            <form method="POST" action="{{ route('actividades.cancelar',$a->id) }}">
                                @csrf
                                <button class="btn btn-danger w-100">
                                    Cancelar inscripción
                                </button>
                            </form>

                        @else

                            @if($disponibles <= 0)

                                <!-- SIN CUPO -->
                                <button class="btn btn-secondary w-100" disabled>
                                    Cupo lleno
                                </button>

                            @else

                                <!-- INSCRIBIR -->
                                <form method="POST" action="{{ route('actividades.inscribirse',$a->id) }}">
                                    @csrf
                                    <button class="btn btn-success w-100">
                                        Inscribirse
                                    </button>
                                </form>

                            @endif

                        @endif

                    </div>

                </div>

            </div>
        </div>

    @endforeach

    </div>

</div>

@endsection