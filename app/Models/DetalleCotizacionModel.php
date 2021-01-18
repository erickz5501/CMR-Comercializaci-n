<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleCotizacionModel extends Model
{
    protected $table = 'detalle_cotizacion';
    protected $primaryKey = 'iddetalle_cotizacion';
    protected $fillable = ['idcotizacion', 'idmodulos', 'descripcion', 'cantidad', 'precio_unitario', 'descuento', 'subtotal'];

    public function CotizacionModel(){
        return $this->belongsTo('App\Models\CotizacionModel', 'idcotizacion', 'idcotizacion');
    }
    
    public function ModulosModel(){
        return $this->belongsTo('App\Models\ModulosModel', 'idmodulos', 'idmodulos');
    }
}
