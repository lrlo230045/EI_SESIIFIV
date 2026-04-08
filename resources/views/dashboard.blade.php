@extends('layouts.app')

@section('content')

<h2>Bienvenido {{ auth()->user()->name }}</h2>

<hr>

<div class="mt-4">

    <a href="/talleres-disponibles" class="btn btn-success">
        Ver Talleres
    </a>

    <a href="/mis-talleres" class="btn btn-primary">
        Mis Talleres
    </a>

    @if(auth()->user()->role == 'admin')
        <hr>

        <h4>Panel Admin</h4>

        <a href="/users" class="btn btn-dark">Usuarios</a>
        <a href="/talleres" class="btn btn-dark">Talleres</a>
    @endif

</div>

@endsection