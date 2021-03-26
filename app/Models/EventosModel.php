<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventosModel extends Model
{
    protected $table = 'eventos';
    protected $primaryKey = 'ideventos';
    protected $fillable = ['nombre', 'descrripcion', 'estado'];

    public function comercializacion(){
        return $this->belongsTo('App\Models\ComercializacionModel', 'ideventos');
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
