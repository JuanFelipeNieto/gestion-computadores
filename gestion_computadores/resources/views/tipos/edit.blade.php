@extends('layouts.app')

@section('contenido')

<div class="container">

    <h2 class="mb-4">Editar Tipo de Computador</h2>

    <div class="card">
        <div class="card-header bg-dark text-white">
            <h4 class="mb-0">Editar Tipo</h4>
        </div>

        <div class="card-body">

            {{-- Mostrar errores --}}
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach($errors->all() as $e)
                            <li>{{ $e }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('tipos.update', $tipo) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre del tipo</label>
                    <input 
                        type="text" 
                        name="nombre" 
                        id="nombre" 
                        class="form-control"
                        value="{{ $tipo->nombre }}"
                        required
                    >
                </div>

                <button type="submit" class="btn btn-primary">Actualizar</button>
                <a href="{{ route('tipos.index') }}" class="btn btn-secondary">Cancelar</a>

            </form>

        </div>
    </div>

</div>

@endsection
