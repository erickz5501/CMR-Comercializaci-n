<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReclamosModel extends Model
{
    protected $table = 'reclamos';
    protected $primaryKey = 'idreclamos';
    protected $fillable = ['idclientes', 'persona_contacto', 'Ruc_nro_contrato', 'idmedios', 'idmodulos', 'descripcion_reclamo', 'tipo_solucion',
                            'causa', 'procede', 'accion_tomar', 'idpersonal', 'fecha_compromiso', 'fecha_solucion', 'solucion_minutos', 'solucion_dias',
                            'evidencia', 'emite_accion', 'estado'];

    public function clientes(){
        return $this->hasOne('App\Models\ClientesModel', 'idclientes', 'idclientes');
    }

    public function medio(){
        return $this->hasOne('App\Models\MediosModel', 'idmedios', 'idmedios');
    }

    public function evento(){
        return $this->hasOne('App\Models\EventosModel', 'ideventos', 'ideventos');
    }

    public function personal(){
        return $this->hasOne('App\Models\PersonalModel', 'idpersonal', 'idpersonal');
    }

    public function modulo(){
        return $this->hasOne('App\Models\ModulosModel', 'idmodulos', 'idmodulos');
    }

}
