<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModulosModel extends Model
{
    protected $table = 'modulos';
    protected $primaryKey = 'idmodulos';
    protected $fillable = ['nombre', 'caracteristicas', 'estado'];

    public function modulo_comercializacion(){
        return $this->belongsTo('App\Models\ModuloComercializacionModel', 'idmodulos');
    }
}
