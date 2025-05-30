<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class OfertaEmpleo extends Model
{
    protected $table = 'ofertas_empleo';

    protected $fillable = [
        'empresa_id',
        'user_id',
        'titulo_puesto',
        'descripcion_puesto',
        'tipo_jornada',
        'ubicacion',
        'salario_estimado',
        'fecha_publicacion',
        'estado',
        'modalidad'
    ];

    public function empresa(): BelongsTo
    {
        return $this->belongsTo(Empresa::class);
    }

    public function usuario(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function categorias(): BelongsToMany
    {
        return $this->belongsToMany(Categoria::class, 'oferta_categoria', 'oferta_id', 'categoria_id')
            ->withPivot('fecha_asociacion')
            ->withTimestamps();
    }
} 