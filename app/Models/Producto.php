<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $fillable = [
        'nombre',
        'descripcion',
        'precio',
        'stock',
        'imagen',
        'categoria_id',
        'promotor_id' 
    ];

    public function categoria(){
        return $this->belongsTo(Categoria::class);
    }

    public function promotor(){
        return $this->belongsTo(Promotor::class);
    }
}
