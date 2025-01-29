@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Crear Nuevo Departamento</h1>

    <form action="{{ route('departamentos.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" name="nombre" id="nombre" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{ route('departamentos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
