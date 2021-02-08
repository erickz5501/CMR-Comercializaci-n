<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CotizacionesModel extends Model
{
    protected $table = 'cotizaciones';
    protected $primaryKey = 'idcotizaciones';
    protected $fillable = ['nombre', 'ruta', 'estado'];
}
