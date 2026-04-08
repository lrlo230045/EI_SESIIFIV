@extends('layouts.app')

@section('content')
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            Crear Taller
        </div>

        <div class="card-body">

            <form method="POST" action="{{ route('talleres.store') }}">
            @csrf

                <div class="mb-3">
                    <label>Nombre</label>
                    <input type="text" name="nombre" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Descripción</label>
                    <textarea name="descripcion" class="form-control"></textarea>
                </div>

                <div class="mb-3">
                    <label>Cupo</label>
                    <input type="number" name="cupo" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Fecha inicio</label>
                    <input type="date" name="fecha_inicio" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Fecha fin</label>
                    <input type="date" name="fecha_fin" class="form-control" required>
                </div>

                <div class="form-check mb-3">
                    <input type="checkbox" name="activo" class="form-check-input" checked>
                    <label class="form-check-label">Activo</label>
                </div>

                <button class="btn btn-success">Guardar</button>
                <a href="{{ route('talleres.index') }}" class="btn btn-secondary">Volver</a>

            </form>

        </div>
   @endsection