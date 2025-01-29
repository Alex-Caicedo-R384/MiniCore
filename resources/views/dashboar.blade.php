@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Dashboard</h1>
    <p>Desde aquí puedes navegar a las distintas secciones de la aplicación:</p>
    <div class="list-group">
        <a href="{{ route('empleados.index') }}" class="list-group-item list-group-item-action">
            Gestión de Empleados
        </a>
        <a href="{{ route('departamentos.index') }}" class="list-group-item list-group-item-action">
            Gestión de Departamentos
        </a>
        <a href="{{ route('gastos.index') }}" class="list-group-item list-group-item-action">
            Gestión de Gastos
        </a>
    </div>
</div>
@endsection
