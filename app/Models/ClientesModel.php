<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientesModel extends Model
{
    protected $table = 'clientes';
    protected $primaryKey = 'idclientes';
    protected $fillable = ['idgiro_negocio', 'tipo_documento', 'nro_documento', 'nombres_razon_social', 'apellidos_nombre_comercial', 'correo_1', 'correo_2',
                            'correo_3', 'telefono_empresa', 'telefono_contacto', 'telefono_otro', 'tipo_persona', 'estado'];

    public function gironegocio(){
        return $this->hasOne('App\Models\GiroNegocioModel', 'idgiro_negocio', 'idgiro_negocio');
    }
    
    public function comercializacion(){
        return $this->belongsTo('App\Models\ComercializacionModel', 'idclientes');
    }

}
