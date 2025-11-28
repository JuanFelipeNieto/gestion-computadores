@extends('layouts.app')

@section('contenido')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="{{ asset('css/estilos.css') }}">

<h2 class="mb-3">Registrar Computador</h2>

<form action="{{ route('computadores.store') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label>Marca</label>
        <input type="text" name="marca" class="form-control" value="{{ old('marca') }}" required>

        @error('marca')
            <span class="text-danger small">{{ $message }}</span>
        @enderror
    </div>

    <div class="mb-3">
        <label>Modelo</label>
        <input type="text" name="modelo" class="form-control" value="{{ old('modelo') }}">

        @error('modelo')
            <span class="text-danger small">{{ $message }}</span>
        @enderror
    </div>

    <div class="mb-3">
        <label>RAM (GB)</label>
        <input type="number" name="ram_gb" class="form-control" value="{{ old('ram_gb') }}" required>

        @error('ram_gb')
            <span class="text-danger small">{{ $message }}</span>
        @enderror
    </div>

    <div class="mb-3">
        <label>Almacenamiento (GB)</label>
        <input type="number" name="almacenamiento_gb" class="form-control" value="{{ old('almacenamiento_gb') }}" required>

        @error('almacenamiento_gb')
            <span class="text-danger small">{{ $message }}</span>
        @enderror
    </div>

    <div class="mb-3">
        <label>Precio (COP)</label>
        <input type="number" name="precio" class="form-control" min="0" step="0.01" value="{{ old('precio') }}" required>

        @error('precio')
            <span class="text-danger small">{{ $message }}</span>
        @enderror
    </div>

    <div class="mb-3">
        <label>Tipo de Computador</label>
        <select name="tipo_id" class="form-control" required>
            <option value="">Seleccione un tipo...</option>

            @foreach($tipos as $t)
                <option value="{{ $t->id }}" {{ old('tipo_id') == $t->id ? 'selected' : '' }}>
                    {{ $t->nombre }}
                </option>
            @endforeach
        </select>

        @error('tipo_id')
            <span class="text-danger small">{{ $message }}</span>
        @enderror
    </div>

    <button class="btn btn-success">Guardar</button>
    <a href="{{ route('computadores.index') }}" class="btn btn-secondary">Volver</a>
</form>

@endsection
