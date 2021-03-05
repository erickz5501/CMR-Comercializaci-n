<?php

namespace App\Models\historial;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActividadModel extends Model
{
    protected $table = 'actividad';
    protected $primaryKey = 'idactividad';
    protected $fillable = ['nombre', 'estado'];

    public function comercializacion(){
        return $this->belongsTo('App\Models\ComercializacionModel', 'idactividad');
    }
}
