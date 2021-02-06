<?php

namespace App\Models\historial;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsersModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'idusers';
    protected $fillable = [ 'nombres','apellidos', 'email', 'email_verified_at', 'password', 'remember_token','codigo_confirmacion', 'codigo_recuperacion', 'fecha_recuperacion', 'estado'];
}
