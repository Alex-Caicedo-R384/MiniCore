## Autor
Este proyecto fue desarrollado por Alex Caicedo Ramos. Puedes contactarlo a través de su correo electrónico: chevyagcr@gmail.com.


# Proyecto de Gestión de Gastos

Este proyecto tiene como objetivo desarrollar una aplicación web para gestionar los gastos de una empresa. La aplicación se basa en tres tablas relacionadas en la base de datos: **Empleado**, **Departamento** y **Gasto**. La funcionalidad principal de la aplicación es permitir al usuario filtrar y calcular los gastos registrados en un rango de fechas específico.

## Descripción del Proyecto

El sistema consta de las siguientes entidades:

1. **Empleado**: Cada empleado tiene un `id` y un `nombre`.
2. **Departamento**: Cada departamento tiene un `id` y un `nombre`.
3. **Gasto**: Cada gasto tiene un `id`, una `fecha`, una `descripción`, un `monto`, un `id` de empleado y un `id` de departamento.

## Funcionalidad Principal (Core)
El core de la aplicación se centra en filtrar y calcular los gastos registrados en la base de datos. El usuario puede ingresar un rango de fechas (fecha de inicio y fecha de fin) y la aplicación devolverá los gastos dentro de ese rango, además de calcular el monto total de esos gastos.

## Requisitos

1. **PHP** (preferentemente versión 8.0 o superior).
2. **Composer** para la gestión de dependencias.
3. **Laravel**: El framework PHP utilizado para desarrollar la aplicación.
4. **MySQL** o cualquier base de datos compatible con Laravel.
5. **Servidor local** como **XAMPP** o **Laragon**, o utilizar el servidor integrado de Laravel con `php artisan serve`.
6. **Node.js** y **npm** para gestionar las dependencias de JavaScript y la construcción de los assets.

## Instalación

Sigue estos pasos para configurar el proyecto en tu máquina local:

1. Instala las dependencias de Laravel:

    ```bash
    composer install
    ```

2. Configura el archivo `.env` con los detalles de tu base de datos:

    ```bash
    cp .env.example .env
    ```

    Luego edita el archivo `.env` con los parámetros de tu base de datos:

    ```dotenv
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=nombre_de_tu_base_de_datos
    DB_USERNAME=tu_usuario
    DB_PASSWORD=tu_contraseña
    ```

3. Instala las dependencias de JavaScript:

    ```bash
    npm install
    ```

4. Ejecuta los assets con:

    ```bash
    npm run dev
    ```

5. Inicia el servidor de desarrollo de Laravel:

    ```bash
    php artisan serve
    ```

    Ahora puedes acceder a la aplicación a través de `http://localhost:8000`.

## Estructura de la Base de Datos

La base de datos tiene tres tablas: `empleados`, `departamentos` y `gastos`. A continuación se presentan los detalles de cada tabla:

#### 1. Tabla **empleados**

- **id**: Identificador único del empleado (clave primaria).
- **nombre**: Nombre del empleado.

#### 2. Tabla **departamentos**

- **id**: Identificador único del departamento (clave primaria).
- **nombre**: Nombre del departamento.

#### 3. Tabla **gastos**

- **id**: Identificador único del gasto (clave primaria).
- **fecha**: Fecha en que se registró el gasto.
- **descripcion**: Descripción del gasto.
- **monto**: Monto del gasto.
- **empleado_id**: Relación con el empleado que registró el gasto (clave foránea).
- **departamento_id**: Relación con el departamento al que pertenece el gasto (clave foránea).

## Funcionalidad para Filtrar y Calcular los Gastos

La funcionalidad principal es permitir al usuario filtrar los gastos en función de un rango de fechas. El formulario de filtro incluye dos campos: `fecha_inicio` y `fecha_fin`, que corresponden al rango de fechas que se quiere consultar.

El controlador `GastoController` incluye un método `index` que recibe las fechas de inicio y fin, filtra los gastos por ese rango y calcula el total de los gastos:

```php
public function index(Request $request)
{
    $gastos = Gasto::with(['empleado', 'departamento']);

    // Filtrar por rango de fechas
    if ($request->has('fecha_inicio') && $request->has('fecha_fin')) {
        $gastos = $gastos->whereBetween('fecha', [$request->fecha_inicio, $request->fecha_fin]);
    }

    $gastos = $gastos->get();
    $total_gastos = $gastos->sum('monto'); // Sumar el total de los gastos

    return view('gastos.index', compact('gastos', 'total_gastos'));
}
```

## Conclusion
Este proyecto implementa una solución para gestionar y analizar los gastos de una empresa, utilizando Laravel y PHP. Se ha diseñado para ser fácil de usar y permite a los administradores filtrar los gastos por fecha y obtener resúmenes de los totales. Las tablas empleados, departamentos y gastos están interrelacionadas, lo que permite gestionar de forma eficiente la información de los gastos de los empleados y departamentos.


