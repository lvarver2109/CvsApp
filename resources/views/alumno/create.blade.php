@extends('template.base')

@section('content')
<form action="{{ route('alumno.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div>
        <label for="nombre">Nombre:</label>
        <input class="form-control" required id="nombre" type="text" name="nombre" placeholder="Nombre del alumno" value="{{ old('nombre') }}">
    </div>
    <br>
    <div>
        <label for="apellidos">Apellidos:</label>
        <input class="form-control" required id="apellidos" type="text" name="apellidos" placeholder="Apellidos del alumno" value="{{ old('apellidos') }}">
    </div>
    <br>
    <div>
        <label for="telefono">Teléfono:</label>
        <input class="form-control" required id="telefono" type="text" name="telefono" placeholder="Teléfono del alumno" value="{{ old('telefono') }}">
    </div>
    <br>
    <div>
        <label for="correo">Correo:</label>
        <input class="form-control" required id="correo" type="email" name="correo" placeholder="Correo del alumno" value="{{ old('correo') }}">
    </div>
    <br>
    <div>
        <label for="nacimiento">Fecha de nacimiento:</label>
        <input class="form-control" required id="nacimiento" type="text" name="nacimiento" placeholder="Fecha de nacimiento del alumno" value="{{ old('nacimiento') }}">
    </div>
    <br>
    <div>
        <label for="nota">Nota media:</label>
        <input class="form-control" required id="nota" type="text" name="nota" placeholder="Nota media del alumno" value="{{ old('nota') }}">
    </div>
    <br>
    <div>
        <label for="experiencia">Experiencia:</label>
        <input class="form-control" required id="experiencia" type="text" name="experiencia" placeholder="Experiencia del alumno" value="{{ old('experiencia') }}">
    </div>
    <br>
    <div>
        <label for="formacion">Formación:</label>
        <input class="form-control" required id="formacion" type="text" name="formacion" placeholder="Formación del alumno" value="{{ old('formacion') }}">
    </div>
    <br>
    <div>
        <label for="habilidades">Habilidades:</label>
        <input class="form-control" required id="habilidades" type="text" name="habilidades" placeholder="Habilidades del alumno" value="{{ old('habilidades') }}">
    </div>
    <br>
    <div>
        <label for="fotografia">Fotografía:</label>
        <input class="form-control" id="fotografia" type="file" name="fotografia" accept="image/*">
    </div>
    <br>
    <div class="upper-space" style="padding-top: 16px;">
        <input class="btn btn-primary" type="submit" value="Crear nuevo alumno">
    </div>
</form>
@endsection