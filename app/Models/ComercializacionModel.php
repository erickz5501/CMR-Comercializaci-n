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
        'idactividad',
        'idmedios',
        'users_id',
        'detalla_llamada',
        'ideventos',
        'fecha_evento',
        'descripcion_evento',
        'nro_cotizacion',
        'idpersonal',
        'calificacion',
        'proxima_llamada',
        'avance',
        'por_cobrar',
        'observacion',
        'estado'];

    public function ModeloCliente(){
        return $this->belongsTo('App\Models\ClientesModel', 'idclientes', 'idclientes');
    }

    public function medio(){
        return $this->hasOne('App\Models\MediosModel', 'idmedios', 'idmedios');
    }

    public function evento(){
        return $this->hasOne('App\Models\EventosModel', 'ideventos', 'ideventos');
    }

    public function personal(){
        return $this->hasOne('App\Models\PersonalModel', 'idpersonal', 'idpersonal');
    }

    public function actividad(){
        return $this->hasOne('App\Models\ActividadModel', 'idactividad', 'idactividad');
    }

    public function ModeloCotizacionComercializaciones(){
        return $this->hasMany('App\Models\CotizacionComercializacionModel', 'idcomercializacion', 'idcomercializacion');
    }

}
