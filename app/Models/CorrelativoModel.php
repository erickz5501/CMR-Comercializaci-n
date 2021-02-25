<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CorrelativoModel extends Model
{
    protected $table = 'correlativo';
    protected $primaryKey = 'idcorrelativo';
    protected $fillable = ['nombre', 'serie', 'correlativo', 'estado'];

}
