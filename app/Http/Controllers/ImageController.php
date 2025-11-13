<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use Illuminate\Http\Request;

class ImageController extends Controller {

    function view($id) {
        $alumno = Alumno::find($id);
        if($alumno == null ||
                $alumno->path == null ||
                !file_exists(storage_path('app/private') . '/' . $alumno->path)) {
            return response()->file(base_path('public/assets/img/noimage.png'));
        }
        return response()->file(storage_path('app/private') . '/' . $alumno->path);
    }
}