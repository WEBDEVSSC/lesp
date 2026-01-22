<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
    //
    protected $table = 'documentos';

    protected $fillable = [
        'nombre',
        'departamento',
        'tipo',
        'clave',
        'revision',
        'vigencia',
        'fecha_revision',
        'sustituye',
        'documento',
        'status',
    ];

    /**
     * Relación con el área (departamento)
     */
    public function area()
    {
        return $this->belongsTo(Area::class, 'departamento');
    }

    /**
     * Relación con el tipo de documento
     */
    public function tipoDocumento()
    {
        return $this->belongsTo(TipoDocumento::class, 'tipo');
    }
}
