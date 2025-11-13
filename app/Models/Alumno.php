<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    protected $table = 'alumno';

    protected $fillable = [
        'nombre',
        'apellidos',
        'telefono',
        'correo',
        'nacimiento',
        'nota',
        'experiencia',
        'formacion',
        'habilidades',
        'path'
    ];

    function getPath() {
        $url = url('assets/img/user.png');
        if($this->path != null) {
            $url = url('storage/' . $this->path);
        }
        return $url;
    }
}
