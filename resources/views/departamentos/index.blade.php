@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Lista de Departamentos</h1>
    <a href="{{ route('departamentos.create') }}" class="btn btn-primary mb-3">Crear Nuevo Departamento</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($departamentos as $departamento)
                <tr>
                    <td>{{ $departamento->id }}</td>
                    <td>{{ $departamento->nombre }}</td>
                    <td>
                        <a href="{{ route('departamentos.show', $departamento) }}" class="btn btn-info btn-sm">Ver</a>
                        <a href="{{ route('departamentos.edit', $departamento) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('departamentos.destroy', $departamento) }}" method="POST" class="d-inline">
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
