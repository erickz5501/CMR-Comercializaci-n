<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CotizacionModel extends Model
{
    protected $table = 'cotizacion';
    protected $primaryKey = 'idcotizacion';
    protected $fillable = ['idclientes', 'fecha', 'codigo', 'dias_validos', 'subtotal', 'igv', 'total', 'estado'];

    public function ClientesModel(){
        return $this->belongsto('App\Models\ClientesModel', 'idclientes', 'id_clientes');
    }
}
