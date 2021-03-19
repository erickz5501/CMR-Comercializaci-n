<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonalModel extends Model
{
    protected $table = 'personal';
    protected $primaryKey = 'idpersonal';
    protected $fillable = ['nombres', 'apellidos', 'estado'];

    public function comercializacion(){
        return $this->belongsTo('App\Models\ComercializacionModel', 'idpersonal');
    }


}
