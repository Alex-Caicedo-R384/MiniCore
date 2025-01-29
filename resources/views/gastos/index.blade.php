@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Lista de Gastos</h1>

    <!-- Formulario de filtro -->
    <form action="{{ route('gastos.index') }}" method="GET" class="mb-3">
        <div class="row">
            <div class="col-md-3">
                <input type="date" name="fecha_inicio" class="form-control" value="{{ request('fecha_inicio') }}" required>
            </div>
            <div class="col-md-3">
                <input type="date" name="fecha_fin" class="form-control" value="{{ request('fecha_fin') }}" required>
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary">Filtrar</button>
            </div>
        </div>
    </form>

    <!-- Mostrar total de gastos filtrados -->
    @if(isset($total_gastos))
        <h4>Total de Gastos: ${{ number_format($total_gastos, 2) }}</h4>
    @endif

    <a href="{{ route('gastos.create') }}" class="btn btn-primary mb-3">Registrar Nuevo Gasto</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Fecha</th>
                <th>Descripción</th>
                <th>Monto</th>
                <th>Empleado</th>
                <th>Departamento</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($gastos as $gasto)
                <tr>
                    <td>{{ $gasto->id }}</td>
                    <td>{{ $gasto->fecha }}</td>
                    <td>{{ $gasto->descripcion }}</td>
                    <td>${{ number_format($gasto->monto, 2) }}</td>
                    <td>{{ $gasto->empleado->nombre }}</td>
                    <td>{{ $gasto->departamento->nombre }}</td>
                    <td>
                        <a href="{{ route('gastos.show', $gasto) }}" class="btn btn-info btn-sm">Ver</a>
                        <a href="{{ route('gastos.edit', $gasto) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('gastos.destroy', $gasto) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
