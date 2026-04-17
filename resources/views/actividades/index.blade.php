@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Gestión de Actividades</h2>

    @if(auth()->user()->role == 'admin')
        <a href="{{ route('actividades.create') }}" class="btn btn-primary">
            + Crear Actividad
        </a>
    @endif
</div>

<div class="card shadow">
    <div class="card-body">

        <table class="table table-hover">
            <thead class="table-dark">
                <tr>
                    <th>Nombre</th>
                    <th>Cupo</th>
                    <th>Inicio</th>
                    <th>Fin</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody>
            @foreach($actividades as $a)
                <tr>
                    <td>{{ $a->nombre }}</td>
                    <td>{{ $a->cupo }}</td>
                    <td>{{ $a->fecha_inicio }}</td>
                    <td>{{ $a->fecha_fin }}</td>

        
                    <td>
                        <a href="{{ route('actividades.edit',$a->id) }}" class="btn btn-sm btn-warning">
                            Editar
                        </a>

                        <a href="{{ route('actividades.delete',$a->id) }}"
                           class="btn btn-sm btn-danger"
                           onclick="return confirm('¿Eliminar actividad?')">
                            Eliminar
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>

        </table>

    </div>
</div>

@endsection