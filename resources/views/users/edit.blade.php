@extends('layouts.app')

@section('content')
        <div class="card-header bg-warning">
            Editar Usuario
        </div>

        <div class="card-body">

            <form method="POST" action="{{ route('users.update',$user->id) }}">
            @csrf

                <div class="mb-3">
                    <label>Nombre</label>
                    <input type="text" name="name" value="{{ $user->name }}" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Correo</label>
                    <input type="email" name="email" value="{{ $user->email }}" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Rol</label>
                    <select name="role" class="form-select">
                        <option value="user" {{ $user->role=='user'?'selected':'' }}>Usuario</option>
                        <option value="admin" {{ $user->role=='admin'?'selected':'' }}>Admin</option>
                    </select>
                </div>

                <div class="form-check mb-3">
                    <input type="checkbox" name="active" class="form-check-input" {{ $user->active?'checked':'' }}>
                    <label class="form-check-label">Activo</label>
                </div>

                <button class="btn btn-warning">Actualizar</button>
                <a href="{{ route('users.index') }}" class="btn btn-secondary">Volver</a>

            </form>
@endsection