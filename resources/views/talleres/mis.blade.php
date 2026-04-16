@extends('layouts.app')

@section('content')

<div class="container py-5">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">Mis Talleres</h2>

        <a href="{{ route('talleres.user') }}" class="btn btn-outline-primary">
            Ver Talleres
        </a>
    </div>

  
    <div class="row g-4">

    @forelse($talleres as $t)
        <div class="col-md-4">

            <div class="card shadow border-0 h-100">

                <div class="card-body d-flex flex-column">

                    <h5 class="fw-bold">{{ $t->nombre }}</h5>

                    <p class="text-muted small">
                        {{ $t->descripcion }}
                    </p>

                    <small class="text-muted mb-3">
                        {{ $t->fecha_inicio }} → {{ $t->fecha_fin }}
                    </small>

                    <div class="mt-auto">
                        <form method="POST" action="{{ route('cancelar',$t->id) }}">
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
        <p>No estás inscrito en ningún taller</p>
    @endforelse

    </div>

</div>
@endsection