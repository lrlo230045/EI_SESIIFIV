@extends('layouts.app')

@section('content')

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Gestión de Talleres</h2>
        <a href="{{ route('talleres.create') }}" class="btn btn-primary">+ Crear Taller</a>
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
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>

                <tbody>
                @foreach($talleres as $t)
                    <tr>
                        <td>{{ $t->nombre }}</td>
                        <td>{{ $t->cupo }}</td>
                        <td>{{ $t->fecha_inicio }}</td>
                        <td>{{ $t->fecha_fin }}</td>

                        <td>
                            <span class="badge bg-{{ $t->activo ? 'success' : 'secondary' }}">
                                {{ $t->activo ? 'Activo' : 'Inactivo' }}
                            </span>
                        </td>

                        <td>
                            <a href="{{ route('talleres.edit',$t->id) }}" class="btn btn-sm btn-warning">Editar</a>

                            <a href="{{ route('talleres.delete',$t->id) }}"
                               class="btn btn-sm btn-danger"
                               onclick="return confirm('¿Eliminar taller?')">
                               Eliminar
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>

            </table>
@endsection