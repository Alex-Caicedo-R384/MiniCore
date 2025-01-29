<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Bienvenido a la Aplicación</h1>
        <p class="text-center">Selecciona una de las opciones para navegar a la sección correspondiente:</p>
        
        <div class="d-flex justify-content-center">
            <div class="list-group w-50">
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
    </div>
</body>
</html>
