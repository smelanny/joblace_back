<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RepresentanteEmpresa extends Model
{
    use HasFactory;

    protected $table = 'representantes_empresa';
    
    public $timestamps = false;
    public $incrementing = false;

    protected $fillable = [
        'user_id',
        'empresa_id',
        'cargo',
        'telefono_contacto'
    ];

    protected $primaryKey = ['user_id', 'empresa_id'];

    /**
     * Obtiene el usuario asociado
     */
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'user_id');
    }

    /**
     * Obtiene la empresa asociada
     */
    public function empresa()
    {
        return $this->belongsTo(Empresa::class);
    }
} 