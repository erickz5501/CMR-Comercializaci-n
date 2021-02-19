<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComprasModel extends Model
{
    protected $table = 'compras';
    protected $primaryKey = 'idcompras';
    protected $fillable = ['idclientes', 'idcotizaciones', 'fecha_cotizacion', 'contrato_cotizacion', 'factura', 'cantidad', 'fecha_instalacion', 
                            'fecha_entrega', 'fecha_renovacion', 'licencia', 'dias_sobrantes', 'estado'];

    public function ActualizacionModel(){
        return $this->belongsTo('App\Models\ActualizacionesModel', 'idcompras');
    }

    public function actualizaciones(){
        return $this->hasOne('App\Models\ActualizacionesModel', 'idcompras', 'idcompras');
    }

    public function clientes(){
        return $this->hasOne('App\Models\ClientesModel', 'idclientes', 'idclientes');
    }

    public function cotizacion(){
        return $this->hasOne('App\Models\CotizacionesModel', 'idcotizaciones', 'idcotizaciones');
    }
}
