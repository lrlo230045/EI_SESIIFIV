@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Gestión de Usuarios</h2>
    <a href="{{ route('users.create') }}" class="btn btn-primary">+ Crear Usuario</a>
</div>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="card shadow">
    <div class="card-body">

        <table class="table table-hover">
            <thead class="table-dark">
                <tr>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Rol</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>

                    <td>
                        <span class="badge bg-{{ $user->role == 'admin' ? 'danger' : 'secondary' }}">
                            {{ $user->role }}
                        </span>
                    </td>

                    <td>
                        <span class="badge bg-{{ $user->active ? 'success' : 'secondary' }}">
                            {{ $user->active ? 'Activo' : 'Inactivo' }}
                        </span>
                    </td>

                    <td>
                        <a href="{{ route('users.edit',$user->id) }}" class="btn btn-sm btn-warning">Editar</a>

                        <a href="{{ route('users.delete',$user->id) }}"
                           class="btn btn-sm btn-danger"
                           onclick="return confirm('¿Eliminar usuario?')">
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