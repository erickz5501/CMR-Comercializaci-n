<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsersModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $fillable = [ 'idpersonal',
                            'email',
                            'avatar',
                            'email_verified_at',
                            'password',
                            'remember_token',
                            'codigo_confirmacion',
                            'codigo_recuperacion',
                            'fecha_recuperacion',
                            'estado'
                        ];

    public function ModeloPersonal()
    {
        return $this->belongsTo('App\Models\PersonalModel', 'idpersonal', 'idpersonal');
    }

    public function scopeActivos( $query)
    {
        return $query->where('estado', '=', '0');
    }
    public function scopeInactivos( $query)
    {
        return $query->where('estado', '=', '1');
    }
}
