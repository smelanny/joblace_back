<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DocumentoCandidato extends Model
{
    protected $table = 'documentos_candidato';
    protected $primaryKey = 'documento_id';
    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'tipo_documento',
        'url_archivo',
        'fecha_subida'
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'user_id');
    }
}
