<?php

namespace App\Models\historial;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModulosModel extends Model
{
    protected $table = 'modulos';
    protected $primaryKey = 'idmodulos';
    protected $fillable = ['nombre', 'caracteristicas', 'estado'];

    public function modulo_comercializacion(){
        return $this->belongsTo('App\Models\comercializacion\ModuloComercializacionModel', 'idmodulos');
    }
}
