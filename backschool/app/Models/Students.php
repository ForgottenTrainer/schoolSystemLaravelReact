<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'edad',
        'imagen',
        'email',
        'direccion',
        'telefono',
        'cuatrimestre',
        'genero',
        'carrera',
    ];
}
