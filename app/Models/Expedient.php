<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expedient extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'fecha_creacion',
        'estado',
        'id_client',
        'id_lawyer',
        'id_procurator',
        'id_typecase',
    ];
}
