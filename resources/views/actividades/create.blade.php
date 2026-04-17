@extends('layouts.app')

@section('content')

<h2>Crear Actividad</h2>

<form method="POST" action="{{ route('actividades.store') }}">
@csrf

<div class="mb-3">
    <label>Nombre</label>
    <input type="text" name="nombre" class="form-control">
</div>

<div class="mb-3">
    <label>Descripción</label>
    <textarea name="descripcion" class="form-control"></textarea>
</div>

<div class="mb-3">
    <label>Cupo</label>
    <input type="number" name="cupo" class="form-control">
</div>

<div class="mb-3">
    <label>Fecha inicio</label>
    <input type="date" name="fecha_inicio" class="form-control">
</div>

<div class="mb-3">
    <label>Fecha fin</label>
    <input type="date" name="fecha_fin" class="form-control">
</div>

<button class="btn btn-success">Guardar</button>

</form>

@endsection