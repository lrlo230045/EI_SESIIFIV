@extends('layouts.app')

@section('content')

<div class="container py-5">

    <!-- HEADER -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">Talleres Disponibles</h2>

        <a href="{{ route('talleres.mis') }}" class="btn btn-outline-primary">
            Mis Talleres
        </a>
    </div>

    <!-- ALERTAS -->
   

    <!-- GRID -->
    <div class="row g-4">

    @foreach($talleres as $t)

        @php
            $inscritos = $t->users->count();
            $disponibles = $t->cupo - $inscritos;
        @endphp

        <div class="col-md-4">
            <div class="card border-0 shadow h-100">

                <div class="card-body d-flex flex-column">

                    <!-- TITULO -->
                    <h5 class="fw-bold">{{ $t->nombre }}</h5>

                    <!-- DESCRIPCIÓN -->
                    <p class="text-muted small">
                        {{ $t->descripcion ?? 'Sin descripción' }}
                    </p>

                    <!-- INFO -->
                    <div class="mb-3">

                        <span class="badge bg-info">
                            Cupo: {{ $t->cupo }}
                        </span>

                        <span class="badge bg-success">
                            Disponibles: {{ $disponibles }}
                        </span>

                    </div>

                    <!-- FECHAS -->
                    <small class="text-muted mb-3">
                        {{ $t->fecha_inicio }} → {{ $t->fecha_fin }}
                    </small>

                    <!-- BOTÓN -->
                    <div class="mt-auto">

                        @if($disponibles <= 0)
                            <button class="btn btn-secondary w-100" disabled>
                                Cupo lleno
                            </button>
                        @else
                            <form method="POST" action="{{ route('inscribirse',$t->id) }}">
                                @csrf
                                <button class="btn btn-success w-100">
                                    Inscribirse
                                </button>
                            </form>
                        @endif

                    </div>

                </div>

            </div>
        </div>

    @endforeach

    </div>

</div>

@endsection