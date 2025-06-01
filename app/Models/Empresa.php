<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $table = 'empresas';
    
    public $timestamps = false; // Indicamos que no usamos timestamps

    protected $fillable = [
        'nombre',
        'descripcion',
        'industria',
        'sitio_web',
        'logo_url'
    ];

    /**
     * Obtiene el representante de la empresa
     */
    public function representante()
    {
        return $this->hasOne(RepresentanteEmpresa::class);
    }

    /**
     * Obtiene las ofertas de empleo de la empresa
     */
    public function ofertasEmpleo()
    {
        return $this->hasMany(OfertaEmpleo::class);
    }
} 