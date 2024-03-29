<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CotizacionesModel extends Model
{
    protected $table = 'cotizaciones';
    protected $primaryKey = 'idcotizaciones';
    protected $fillable = ['nombre', 'validez', 'ruta', 'estado'];

    public function ComprasModel(){
        return $this->belongsTo('App\Models\ComprasModel', 'idcompras');
    }
    public function cotizacion_comercializacion(){
        return $this->belongsTo('App\Models\CotizacionComercializacionModel', 'idcotizaciones');
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
