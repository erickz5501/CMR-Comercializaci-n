<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientesModel extends Model
{
    protected $table = 'clientes';
    protected $primaryKey = 'idclientes';
    protected $fillable = ['idgiro_negocio', 'tipo_documento', 'nro_documento', 'nombres_razon_social', 'apellidos_nombre_comercial', 'correo_1', 'correo_2',
                            'correo_3', 'telefono_empresa', 'telefono_contacto', 'telefono_otro', 'tipo_persona','direccion','tamano_empresa',
                            'a_que_dedicas','grado_interes','provincia','estado'];

    public function gironegocio(){
        return $this->hasOne('App\Models\GiroNegocioModel', 'idgiro_negocio', 'idgiro_negocio');
    }

    // public function comercializacion(){
    //     return $this->belongsTo('App\Models\ComercializacionModel', 'idclientes');
    // }

    public function ModeloComercializaciones(){
        return $this->hasMany('App\Models\ComercializacionModel', 'idclientes', 'idclientes');
   }

   // SCOPE

   public function scopeInteresados($query)
   {
       return $query->where('tipo_persona', '=', '1');
   }

   public function scopeClientes($query)
   {
       return $query->where('tipo_persona', '=', '2');
   }

   public function scopeActivos( $query)
   {
       return $query->where('estado', '=', '0');
   }
   public function scopeInactivos( $query)
   {
       return $query->where('estado', '=', '1');
   }


}
