@extends('layouts.app')

@section('content')

<div class="container mt-5">

    <div class="card shadow">
        <div class="card-header bg-warning">
            Editar Taller
        </div>

        <div class="card-body">

            <form method="POST" action="{{ route('talleres.update',$taller->id) }}">
            @csrf

                <div class="mb-3">
                    <label>Nombre</label>
                    <input type="text" name="nombre" value="{{ $taller->nombre }}" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Descripción</label>
                    <textarea name="descripcion" class="form-control">{{ $taller->descripcion }}</textarea>
                </div>

                <div class="mb-3">
                    <label>Cupo</label>
                    <input type="number" name="cupo" value="{{ $taller->cupo }}" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Fecha inicio</label>
                    <input type="date" name="fecha_inicio" value="{{ $taller->fecha_inicio }}" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Fecha fin</label>
                    <input type="date" name="fecha_fin" value="{{ $taller->fecha_fin }}" class="form-control" required>
                </div>

                <div class="form-check mb-3">
                    <input type="checkbox" name="activo" class="form-check-input" {{ $taller->activo?'checked':'' }}>
                    <label class="form-check-label">Activo</label>
                </div>

                <button class="btn btn-warning">Actualizar</button>
                <a href="{{ route('talleres.index') }}" class="btn btn-secondary">Volver</a>

            </form>
@endsection