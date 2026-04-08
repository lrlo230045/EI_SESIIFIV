@extends('layouts.app')

@section('content')
        <div class="card-header bg-primary text-white">
            Crear Usuario
        </div>

        <div class="card-body">

            <form method="POST" action="{{ route('users.store') }}">
            @csrf

                <div class="mb-3">
                    <label>Nombre</label>
                    <input type="text" name="name" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Correo</label>
                    <input type="email" name="email" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Contraseña</label>
                    <input type="password" name="password" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Rol</label>
                    <select name="role" class="form-select">
                        <option value="user">Usuario</option>
                        <option value="admin">Admin</option>
                    </select>
                </div>

                <div class="form-check mb-3">
                    <input type="checkbox" name="active" class="form-check-input" checked>
                    <label class="form-check-label">Activo</label>
                </div>

                <button class="btn btn-success">Guardar</button>
                <a href="{{ route('users.index') }}" class="btn btn-secondary">Volver</a>

            </form>
@endsection
