@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalles del Empleado</h1>

    <div class="mb-3">
        <strong>ID:</strong> {{ $empleado->id }}
    </div>
    <div class="mb-3">
        <strong>Nombre:</strong> {{ $empleado->nombre }}
    </div>

    <a href="{{ route('empleados.index') }}" class="btn btn-primary">Volver</a>
</div>
@endsection
