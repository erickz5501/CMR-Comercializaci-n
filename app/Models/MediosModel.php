<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MediosModel extends Model
{
    protected $table = 'medios';
    protected $primaryKey = 'idmedios';
    protected $fillable = ['nombre', 'estado'];
}
