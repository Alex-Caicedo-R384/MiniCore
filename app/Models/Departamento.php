<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Departamento extends Model
{
    use HasFactory;

    protected $table = 'departamentos'; // Nombre de la tabla

    protected $fillable = ['nombre']; // Campos asignables en masa

    // Relación con la tabla gastos
    public function gastos()
    {
        return $this->hasMany(Gasto::class);
    }
}
