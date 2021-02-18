<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompraModuloModel extends Model
{
    protected $table = 'compra_modulos';
    protected $primaryKey = 'idcompra_modulos';
    protected $fillable = ['idcompras', 'idmodulos',  'estado'];
}
