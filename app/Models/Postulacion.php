<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Postulacion extends Model
{
    use HasFactory;

    protected $table = 'postulaciones';
    protected $primaryKey = 'postulacion_id';
    public $timestamps = false;

    protected $fillable = [
        'postulacion_id',
        'user_id',
        'oferta_id',
        'fecha_postulacion',
        'estado',
        'mensaje_adicional'
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'user_id');
    }

    public function oferta()
    {
        return $this->belongsTo(OfertaEmpleo::class, 'oferta_id');
    }
}
