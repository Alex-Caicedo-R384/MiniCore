@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Gasto</h1>

    <form action="{{ route('gastos.update', $gasto) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="fecha" class="form-label">Fecha</label>
            <input type="date" name="fecha" id="fecha" class="form-control" value="{{ $gasto->fecha }}" required>
        </div>
        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <input type="text" name="descripcion" id="descripcion" class="form-control" value="{{ $gasto->descripcion }}" required>
        </div>
        <div class="mb-3">
            <label for="monto" class="form-label">Monto</label>
            <input type="number" step="0.01" name="monto" id="monto" class="form-control" value="{{ $gasto->monto }}" required>
        </div>
        <div class="mb-3">
            <label for="empleado_id" class="form-label">Empleado</label>
            <select name="empleado_id" id="empleado_id" class="form-control" required>
                @foreach ($empleados as $empleado)
                    <option value="{{ $empleado->id }}" {{ $empleado->id == $gasto->empleado_id ? 'selected' : '' }}>
                        {{ $empleado->nombre }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="departamento_id" class="form-label">Departamento</label>
            <select name="departamento_id" id="departamento_id" class="form-control" required>
                @foreach ($departamentos as $departamento)
                    <option value="{{ $departamento->id }}" {{ $departamento->id == $gasto->departamento_id ? 'selected' : '' }}>
                        {{ $departamento->nombre }}
                    </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-success">Actualizar</button>
        <a href="{{ route('gastos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
