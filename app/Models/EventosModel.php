<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventosModel extends Model
{
    protected $table = 'eventos';
    protected $primaryKey = 'ideventos';
    protected $fillable = ['nombre', 'descrripcion', 'estado'];
}
