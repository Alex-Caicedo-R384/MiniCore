@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalles del Gasto</h1>

    <div class="mb-3">
        <strong>ID:</strong> {{ $gasto->id }}
    </div>
    <div class="mb-3">
        <strong>Fecha:</strong> {{ $gasto->fecha }}
    </div>
    <div class="mb-3">
        <strong>Descripción:</strong> {{ $gasto->descripcion }}
    </div>
    <div class="mb-3">
        <strong>Monto:</strong> ${{ number_format($gasto->monto, 2) }}
    </div>
    <div class="mb-3">
        <strong>Empleado:</strong> {{ $gasto->empleado->nombre }}
    </div>
    <div class="mb-3">
        <strong>Departamento:</strong> {{ $gasto->departamento->nombre }}
    </div>

    <a href="{{ route('gastos.index') }}" class="btn btn-primary">Volver</a>
</div>
@endsection
