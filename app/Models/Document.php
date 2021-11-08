<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'descripcion',
        'url_imagen',
        'url_archivo',
        'id_procedure',
    ];
}
