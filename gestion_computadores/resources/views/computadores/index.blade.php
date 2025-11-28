@extends('layouts.app')

@section('contenido')

<h2 class="mb-3">Lista de Computadores</h2>

<a href="{{ route('computadores.create') }}" class="btn btn-primary mb-3">Nuevo Computador</a>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-bordered">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Marca</th>
            <th>Modelo</th>
            <th>RAM</th>
            <th>Almacenamiento</th>
            <th>Tipo</th>
            <th>Precio</th> {{-- NUEVA COLUMNA --}}
            <th>Acciones</th>
        </tr>
    </thead>

    <tbody>
        @foreach($computadores as $c)
        <tr>
            <td>{{ $c->id }}</td>
            <td>{{ $c->marca }}</td>
            <td>{{ $c->modelo }}</td>
            <td>{{ $c->ram_gb }} GB</td>
            <td>{{ $c->almacenamiento_gb }} GB</td>
            <td>{{ $c->tipo->nombre }}</td>
            <td>${{ number_format($c->precio, 0, ',', '.') }}</td> 
            <td>
                <a href="{{ route('computadores.edit', $c) }}" class="btn btn-sm btn-warning">Editar</a>

                <form action="{{ route('computadores.destroy', $c) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger" onclick="return confirm('¿Eliminar computador?')">
                        Eliminar
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection
