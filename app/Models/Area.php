<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    //
    protected $table = 'areas';

    protected $fillable = [
        'siglas',
        'nombre',
        'responsable',
        'contacto',
    ];

    // app/Models/Area.php
    public function users()
    {
        return $this->hasMany(User::class, 'id_area');
    }
}
