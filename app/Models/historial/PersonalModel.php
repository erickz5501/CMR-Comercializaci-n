<?php

namespace App\Models\historial;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonalModel extends Model
{
    protected $table = 'personal';
    protected $primaryKey = 'idpersonal';
    protected $fillable = ['email', 'nombre', 'apellidos', 'estado'];
}
