@extends('layouts.app')

@section('contenido')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">

<link rel="stylesheet" href="{{ asset('css/estilos.css') }}">

<div class="login-container">

    <h3 class="login-title">Iniciar Sesion</h3>

    @if($errors->any())
        <div class="alert alert-danger">
            {{ $errors->first() }}
        </div>
    @endif

    <form action="{{ url('/login') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">Correo Electrónico</label>
            <input 
                type="email" 
                name="email" 
                class="form-control" 
                placeholder="ingrese su correo electronico"
                required
            >
        </div>

        <div class="mb-3">
            <label class="form-label">Contraseña</label>
            <input 
                type="password" 
                name="password" 
                class="form-control" 
                placeholder="Ingresa tu contraseña"
                required
            >
        </div>

        <button class="btn btn-primary w-100 mb-2">Ingresar</button>

     

    </form>

</div>

@endsection
