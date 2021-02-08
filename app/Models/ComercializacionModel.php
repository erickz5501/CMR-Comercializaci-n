<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComercializacionModel extends Model
{
    protected $table = 'comercializacion';
    protected $primaryKey = 'idcomercializacion';
    protected $fillable = ['idclientes', 'persona_contacto', 'activiad', 'idmedios', 'idusers', 'detalle_llamada', 'ideventos', 
                            'fecha_evento', 'descripcion_evento', 'idpersonal', 'calificacion', 'avance', 'por_cobrar', 'observacion', 'estado'];
}
