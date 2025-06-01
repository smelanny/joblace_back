<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Candidato extends Model
{
    use HasFactory;

    protected $table = 'candidatos';
    protected $primaryKey = 'perfil_id';
    public $timestamps = false;

    protected $fillable = [
        'perfil_id',
        'user_id',
        'titulo_profesional',
        'resumen_perfil',
        'anos_experiencia',
        'disponibilidad'
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'user_id');
    }

    public function postulaciones()
    {
        return $this->hasMany(Postulacion::class, 'user_id', 'user_id');
    }

    public function habilidades()
    {
        return $this->belongsToMany(Habilidad::class, 'habilidades_candidatos', 'user_id', 'habilidad_id')
                    ->withPivot('nivel');
    }

    public function documentos()
    {
        return $this->hasMany(DocumentoCandidato::class, 'user_id', 'user_id');
    }
}
