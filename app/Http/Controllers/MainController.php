<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MainController extends Controller {

    function index(): View {
        $alumnos = Alumno::all();
        foreach($alumnos as $alumno) {
            $url = url('assets/img/user.png');
            if($alumno->path != null) {
                $url = url('storage/' . $alumno->path);
            }
            $alumno->newPath = $url;
        }
        $array = ['alumnos' => $alumnos];
        return view('main.index', $array);
    }

}