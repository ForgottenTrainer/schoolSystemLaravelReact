<?php

namespace App\Models\Auth;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'edad',
        'imagen',
        'email',
        'direccion',
        'telefono',
        'genero',
    ];
}
