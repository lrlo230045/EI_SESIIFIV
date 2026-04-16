@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Gestión de Usuarios</h2>
    <a href="{{ route('users.create') }}" class="btn btn-primary">+ Crear Usuario</a>
</div>

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

                @php
                    $esElMismo = auth()->id() == $user->id;
                @endphp

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

                        @if(!$esElMismo)
                            <!-- EDITAR -->
                            <a href="{{ route('users.edit',$user->id) }}"
                               class="btn btn-sm btn-warning">
                               Editar
                            </a>

                            <!-- ELIMINAR  -->
                            <form method="POST"
                                  action="{{ route('users.delete',$user->id) }}"
                                  style="display:inline;">
                                @csrf
                                <button class="btn btn-sm btn-danger"
                                    onclick="return confirm('¿Eliminar usuario?')">
                                    Eliminar
                                </button>
                            </form>
                        @else
                            <span class="text-muted small">
                                No puedes modificarte
                            </span>
                        @endif

                    </td>
                </tr>
            @endforeach
            </tbody>

        </table>

    </div>
</div>

@endsection