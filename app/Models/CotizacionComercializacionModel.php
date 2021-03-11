<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CotizacionComercializacionModel extends Model
{
    protected $table = 'cotizacion_comercializacion';
    protected $primaryKey = 'idcotizacion_comercializacion';
    protected $fillable = ['idcomercializacion', 'idcotizaciones',  'estado'];

    public function cotizacion(){
        return $this->hasOne('App\Models\CotizacionesModel', 'idcotizaciones', 'idcotizaciones');
    }
}
