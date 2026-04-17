@extends('layouts.app')

@section('content')

<h2>Editar Actividad</h2>

<form method="POST" action="{{ route('actividades.update',$actividad->id) }}">
@csrf

<input type="text" name="nombre" value="{{ $actividad->nombre }}" class="form-control mb-2">
<textarea name="descripcion" class="form-control mb-2">{{ $actividad->descripcion }}</textarea>
<input type="number" name="cupo" value="{{ $actividad->cupo }}" class="form-control mb-2">
<input type="date" name="fecha_inicio" value="{{ $actividad->fecha_inicio }}" class="form-control mb-2">
<input type="date" name="fecha_fin" value="{{ $actividad->fecha_fin }}" class="form-control mb-2">

<button class="btn btn-success">Actualizar</button>

</form>

@endsection