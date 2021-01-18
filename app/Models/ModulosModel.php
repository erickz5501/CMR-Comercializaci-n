<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModulosModel extends Model
{
    protected $table = 'modulos';
    protected $primaryKey = 'idmodulos';
    protected $fillable = ['nombre', 'estado'];
}
