<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Promotor extends Model
{
    protected $fillable = [
        'nombre',
        'direccion',
        'telefono',
        'sexo'
    ];
}
