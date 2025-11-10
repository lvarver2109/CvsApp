@extends('template.base')

@section('content')

<table class="table table-hover">

    <thead>
        <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>Correo</th>
            <th>Acciones</th>
        </tr>
    </thead>

    <tbody>
        @foreach($alumnos as $alumno)
        <tr>
            <td>{{ $alumno->id }}</td>
            <td>{{ $alumno->nombre }}</td>
            <td>{{ $alumno->apellidos }}</td>
            <td>{{ $alumno->correo }}</td>
            <td>
                <a href="{{ route('alumno.show', $alumno->id) }}" class="btn btn-success">VER</a>
                <a href="{{ route('alumno.edit', $alumno->id) }}" class="btn btn-warning">EDITAR</a>
                <a data-nombre="{{$alumno->nombre}}" data-href="{{ route('alumno.destroy', $alumno->id) }}" class="btn-delete btn btn-danger">ELIMINAR</a>
            </td>
        </tr>
        @endforeach
    </tbody>

    <tfoot>
        <tr>
            <th colspan="4">Número de alumnos:</th>
            <th>{{ count($alumnos) }}</th>
        </tr>
    </tfoot>
</table>

<form id="form-delete" action="" method="post">
    @csrf
    @method('delete')
</form>

@endsection