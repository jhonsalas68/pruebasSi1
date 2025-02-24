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
    public function productos(){
        return $this->hasMany(Producto::class);
      }
}
