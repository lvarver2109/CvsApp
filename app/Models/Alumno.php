<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    protected $table = 'alumnos';

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
        'fotografia'
    ];

    function getPath() {
        $url = url('assets/img/user.png');
        if($this->fotografia != null) {
            $url = url('storage/' . $this->fotografia);
        }
        return $url;
    }
}
