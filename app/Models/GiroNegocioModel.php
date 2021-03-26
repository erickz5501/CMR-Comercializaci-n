<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GiroNegocioModel extends Model
{
    protected $table = 'giro_negocio';
    protected $primaryKey = 'idgiro_negocio';
    protected $fillable = ['nombre', 'estado'];

    public function ClientesModel(){
        return $this->belongsTo('App\Models\ClientesModel', 'idgiro_negocio');
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
