<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComercializacionModel extends Model
{
    protected $table = 'comercializacion';
    protected $primaryKey = 'idcomercializacion';
    protected $fillable = [
        'idclientes', 
        'persona_contacto', 
        'actividad', 
        'idmedios', 
        'idusers', 
        'detalla_llamada', 
        'ideventos', 
        'fecha_evento', 
        'descripcion_evento',
        'nro_cotizacion', 
        'idpersonal', 
        'calificacion', 
        'avance', 
        'por_cobrar', 
        'observacion', 
        'estado'];

    public function clientes(){
        return $this->hasOne('App\Models\ClientesModel', 'idclientes', 'idclientes');
    }

    public function medio(){
        return $this->hasOne('App\Models\historial\MediosModel', 'idmedios', 'idmedios');
    }

    public function evento(){
        return $this->hasOne('App\Models\historial\EventosModel', 'ideventos', 'ideventos');
    }

    public function personal(){
        return $this->hasOne('App\Models\historial\PersonalModel', 'idpersonal', 'idpersonal');
    }

}
