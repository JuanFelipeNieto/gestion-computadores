@extends('layouts.app')

@section('contenido')

<h2 class="mb-4">Tipos de Computadores</h2>

<div class="mb-3">
    <a href="{{ route('tipos.create') }}" class="btn btn-primary">
        + Crear Tipo
    </a>
</div>

<div class="row">

    @foreach($tipos as $tipo)
        <div class="col-md-6">
            <div class="card mb-4">

                <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">{{ $tipo->nombre }}</h4>

                    <div>
                        <a href="{{ route('tipos.edit', $tipo->id) }}" class="btn btn-warning btn-sm">Editar</a>

                        <form action="{{ route('tipos.destroy', $tipo->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm"
                                onclick="return confirm('¿Confirmas eliminar este tipo?')">
                                Eliminar
                            </button>
                        </form>
                    </div>
                </div>

                <div class="card-body">
                    @if($tipo->computadores->count() > 0)
                        <ul class="list-group">
                            @foreach($tipo->computadores as $c)
                                <li class="list-group-item">
                                    <strong>{{ $c->marca }}</strong> - {{ $c->modelo }}

                                    <span class="text-muted float-end">
                                        {{ $c->ram_gb }}GB RAM /
                                        {{ $c->almacenamiento_gb }}GB
                                    </span>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p class="mb-0">No hay computadores registrados para este tipo.</p>
                    @endif
                </div>

            </div>
        </div>
    @endforeach

</div>

@endsection
