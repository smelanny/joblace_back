<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Usuario;

class OfertaEmpleo extends Model
{
    use HasFactory;

    protected $table = 'ofertas_empleo';
    
    // Deshabilitar timestamps
    public $timestamps = false;

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

    protected $casts = [
        'fecha_publicacion' => 'date',
        'salario_estimado' => 'decimal:2'
    ];

    // Relaciones
    public function empresa()
    {
        return $this->belongsTo(Empresa::class);
    }

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'user_id');
    }

    public function categorias()
    {
        return $this->belongsToMany(Categoria::class, 'oferta_categoria', 'oferta_id', 'categoria_id')
            ->withPivot('fecha_asociacion');
    }

    public function postulaciones()
    {
        return $this->hasMany(Postulacion::class, 'oferta_id');
    }
}
