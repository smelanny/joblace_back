<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;
    protected $table = 'categorias';
    public $timestamps = false;

    protected $fillable = ['nombre'];

    public function ofertas()
    {
        return $this->belongsToMany(OfertaEmpleo::class, 'oferta_categoria', 'categoria_id', 'oferta_id')
            ->withPivot('fecha_asociacion');
    }
} 