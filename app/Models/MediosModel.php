<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MediosModel extends Model
{
    protected $table = 'medios';
    protected $primaryKey = 'idmedios';
    protected $fillable = ['nombre', 'estado'];

    public function comercializacion(){
        return $this->belongsTo('App\Models\ComercializacionModel', 'idmedios');
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
