<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModuloComercializacionModel extends Model
{
    protected $table = 'modulo_comercializacion';
    protected $primaryKey = 'idmodulo_comercializacion';
    protected $fillable = ['idmodulos', 'cant_licencias', 'idcomercializacion', 'estado'];

    public function modulo(){
        return $this->hasOne('App\Models\ModulosModel', 'idmodulos', 'idmodulos');
    }
}
