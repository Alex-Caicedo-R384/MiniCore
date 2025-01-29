<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Gasto extends Model
{
    use HasFactory;

    protected $table = 'gastos'; // Nombre de la tabla

    protected $fillable = ['fecha', 'descripcion', 'monto', 'empleado_id', 'departamento_id']; // Campos asignables en masa

    // Relación con el modelo Empleado
    public function empleado()
    {
        return $this->belongsTo(Empleado::class);
    }

    // Relación con el modelo Departamento
    public function departamento()
    {
        return $this->belongsTo(Departamento::class);
    }
}
