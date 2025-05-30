<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Categoria extends Model
{
    protected $table = 'categorias';
    
    protected $fillable = [
        'nombre'
    ];

    public function ofertas(): BelongsToMany
    {
        return $this->belongsToMany(OfertaEmpleo::class, 'oferta_categoria', 'categoria_id', 'oferta_id')
            ->withPivot('fecha_asociacion')
            ->withTimestamps();
    }
} 