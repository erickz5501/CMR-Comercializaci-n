<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActualizacionesModel extends Model
{
    protected $table = 'actualizaciones';
    protected $primaryKey = 'idactualizaciones';
    protected $fillable = ['idcompras', 'tipo', 'version', 'tiempo_licencia', 'cantidad_licencia', 'precio', 'acta', 
                            'salido', 'fecha_instalacion', 'fecha_entrega', 'fecha_fin', 'procedimiento', 'estado'];
}
