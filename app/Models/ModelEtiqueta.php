<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelEtiqueta extends Model
{
    protected $table = 'etiquetas';
    protected $primaryKey = 'idetiquetas';
    protected $fillable = ['nombre','descripcion', 'estado'];

    public function ModelClientes(){
        return $this->hasMany('App\Models\ClientesModel', 'idetiquetas', 'idetiquetas');
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
