<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use Carbon\Carbon;
use Illuminate\Database\QueryException;
use Illuminate\Database\UniqueConstraintViolationException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class AlumnoController extends Controller
{
    function index(): View {
        $alumnos = Alumno::all();
        $array = ['alumnos' => $alumnos];
        return view('alumno.index', $array);
    }

    function create(): View {
        return view('alumno.create');
    }

    function store(Request $request): RedirectResponse {
        $result = false;
        $alumno = new Alumno($request->all());
        try {
            $result = $alumno->save();
            $fotografia = $this->upload($request, $alumno->id);
            $alumno->fotografia = $fotografia;
            $result = $alumno->save();
            $message = 'El alumno ha sido creado.';
        } catch(UniqueConstraintViolationException $e) {
            $message = 'El mismo correo no puede existir más de una vez.';
        } catch(QueryException $e) {
            $message = 'Alguno de los campos está vacío.';
        } catch(\Exception $e) {
            $message = 'Se ha producido un error, en caso de que persista, consulte al administrador.';
        }
        $messageArray = [
            'general' => $message
        ];
        if($result) {
            return redirect()->route('main.index')->with($messageArray);
        } else {
            return back()->withInput()->withErrors($messageArray);
        }
    }

    private function upload(Request $request, $id) {
        $fotografia = null;
        if($request->hasFile('image') && $request->file('image')->isValid()) {
            $image = $request->file('image');
            $fileName = $id . '.' . $image->getClientOriginalExtension();
            $fotografia = $image->storeAs('images', $fileName, 'public');
            $fotografia = $image->storeAs('images', $fileName, 'local');
        }
        return $fotografia;
    }

    function show(Alumno $alumno): View {
        $year = Carbon::now()->year;
        return view('alumno.show', ['alumno' => $alumno, 'year' => $year]);
    }

    function edit(Alumno $alumno) {
        return view('alumno.edit', ['alumno' => $alumno]);
    }

    function update(Request $request, Alumno $alumno) {
        $result = false;
        if ($request->deleteimage == 'delete') {
            $this->destroyImage(storage_path(storage_path('app/public') . '/' . $alumno->fotografia));
            $this->destroyImage(storage_path(storage_path('app/private') . '/' . $alumno->fotografia));
            $alumno->fotografia = null;
        }
        try {
            $fotografia = $this->upload($request, $alumno->id);
            if ($fotografia != null) {
                $alumno->fotografia = $fotografia;
            }
            $result = $alumno->update($request->all());
            $message = 'El alumno ha sido editado.';
        } catch(UniqueConstraintViolationException $e) {
            $message = 'El mismo correo no puede existir más de una vez.';
        } catch(QueryException $e) {
            $message = 'Alguno de los campos está vacío.';
        } catch(\Exception $e) {
            $message = 'Se ha producido un error, en caso de que persista, consulte al administrador.';
        }
        $messageArray = [
            'general' => $message
        ];
        if($result) {
            return redirect()->route('alumno.edit', $alumno->id)->with($messageArray);
        } else {
            return back()->withInput()->withErrors($messageArray);
        }
    }

    private function destroyImage($file) {
        Storage::delete($file);
    } 

    function destroy(Alumno $alumno) {
        try {
            $result = $alumno->delete();
            $message = 'El alumno ha sido eliminado.';
        } catch(\Exception $e) {
            $result = false;
            $message = 'El alumno no ha sido eliminado.';
        }
        $messageArray = [
            'general' => $message
        ];
        if($result) {
            return redirect()->route('alumno.index')->with($messageArray);
        } else {
            return back()->withInput()->withErrors($messageArray);
        }
    }
}
