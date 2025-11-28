@extends('layouts.app')

@section('contenido')

<h2 class="mb-3">Editar Computador</h2>

<form action="{{ route('computadores.update', $computador->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>Marca</label>
        <input type="text" 
               class="form-control" 
               name="marca" 
               value="{{ old('marca', $computador->marca) }}" 
               required>
    </div>

    <div class="mb-3">
        <label>Modelo</label>
        <input type="text" 
               class="form-control" 
               name="modelo" 
               value="{{ old('modelo', $computador->modelo) }}">
    </div>

    <div class="mb-3">
        <label>RAM (GB)</label>
        <input type="number" 
               class="form-control" 
               name="ram_gb" 
               value="{{ old('ram_gb', $computador->ram_gb) }}" 
               required>
    </div>

    <div class="mb-3">
        <label>Almacenamiento (GB)</label>
        <input type="number" 
               class="form-control" 
               name="almacenamiento_gb" 
               value="{{ old('almacenamiento_gb', $computador->almacenamiento_gb) }}" 
               required>
    </div>

    <div class="mb-3">
        <label>Precio (COP)</label>
        <input type="number" 
               class="form-control" 
               name="precio" 
               value="{{ old('precio', $computador->precio) }}" 
               min="0"
               step="0.01"
               required>
    </div>

    <div class="mb-3">
        <label>Tipo de Computador</label>
        <select name="tipo_id" class="form-control" required>
            <option value="">Seleccione...</option>
            @foreach($tipos as $t)
                <option value="{{ $t->id }}" 
                        {{ $computador->tipo_id == $t->id ? 'selected' : '' }}>
                    {{ $t->nombre }}
                </option>
            @endforeach
        </select>
    </div>

    <button class="btn btn-primary">Actualizar</button>
    <a href="{{ route('computadores.index') }}" class="btn btn-secondary">Volver</a>
</form>

@endsection
