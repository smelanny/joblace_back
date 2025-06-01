<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Habilidad extends Model
{
    protected $table = 'habilidades';
    protected $primaryKey = 'habilidad_id';
    public $timestamps = false;

    protected $fillable = [
        'nombre_habilidad'
    ];

    public function candidatos()
    {
        return $this->belongsToMany(Candidato::class, 'habilidades_candidatos', 'habilidad_id', 'user_id')
                    ->withPivot('nivel');
    }
}
