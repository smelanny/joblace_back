<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Usuario extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'usuarios';

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nombre',
        'email',
        'contrasena_hash',
        'tipo_usuario',
        'ultima_actividad'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'contrasena_hash',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'fecha_creacion' => 'datetime',
        'ultima_actividad' => 'datetime',
    ];

    /**
     * Boot the model.
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->fecha_creacion)) {
                $model->fecha_creacion = now();
            }
        });
    }

    /**
     * Get the password for the user.
     *
     * @return string
     */
    public function getAuthPassword()
    {
        return $this->contrasena_hash;
    }

    /**
     * Determina si el usuario es un candidato
     *
     * @return bool
     */
    public function esCandidato()
    {
        return $this->tipo_usuario === 'candidato';
    }

    /**
     * Determina si el usuario es un representante de empresa
     *
     * @return bool
     */
    public function esRepresentanteEmpresa()
    {
        return $this->tipo_usuario === 'representante_empresa';
    }

    /**
     * Obtiene el perfil del candidato asociado si existe
     */
    public function candidato()
    {
        return $this->hasOne(Candidato::class, 'user_id', 'id');
    }
    /**
     * Obtiene el perfil del representante de empresa asociado si existe
     */
    public function representanteEmpresa()
    {
        return $this->hasOne(RepresentanteEmpresa::class);
    }

    public function representaciones()
    {
        return $this->hasMany(RepresentanteEmpresa::class, 'user_id');
    }
} 