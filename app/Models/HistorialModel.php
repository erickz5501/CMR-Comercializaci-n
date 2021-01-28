<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistorialModel extends Model
{
    protected $table          = 'historial_comercializacion';
    protected $primaryKey     = 'idhistorial_comercializacion';
    protected $fillable       = ['persona_contacto','idmodulos', 'idmedios', 'users_id', 'detalle_llamada', 'ideventos', 'fecha_evento', 'descripcion_evento', 'idpersonal', 
                                'calificacion_encuesta', 'solucion_temporal', 'idcotizacion', 'observaciones', 'conclusiones'];

    public function ModulosModel(){
        return $this->belongsTo('App\Models\historial\ModulosModel', 'idmodulos', 'idmodulos');
    }
    public function MediosModel(){
        return $this->belongsTo('App\Models\historial\MediosModel', 'idmedios', 'idmedios');
    }
    
}
