@extends('template.base')

@section('content')

<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="deleteModalLabel">CONFIRMACIÓN</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ¿Seguro que quieres eliminar el alumno <span id="modal-cvs-nombre"></span>?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">CANCELAR</button>
        <button form="form-delete" type="submit" class="btn btn-primary">ELIMINAR ALUMNO</button>
      </div>
    </div>
  </div>
</div>

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
                <a data-nombre="{{$alumno->nombre}}" data-href="{{ route('alumno.destroy', $alumno->id) }}" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">ELIMINAR</a>
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