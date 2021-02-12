<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GiroNegocioModel extends Model
{
    protected $table = 'giro_negocio';
    protected $primaryKey = 'idgiro_negocio';
    protected $fillable = ['nombre'];

    public function ClientesModel(){
        return $this->belongsTo('App\Models\ClientesModel', 'idclientes');
    }
    
}
