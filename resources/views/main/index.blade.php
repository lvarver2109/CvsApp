@extends('template.base')

@section('content')
    
<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
    @foreach($alumnos as $alumno)
    <div class="col">
        <div class="card shadow-sm" style="min-height: 500px;">
            @php
                $url = url('assets/img/user.png');
                if($alumno->path != null) {
                    $url = url('storage/' . $alumno->path);
                }
            @endphp
            <svg aria-label="Placeholder: Thumbnail" class="bd-placeholder-img card-img-top"
                height="225" preserveAspectRatio="xMidYMid slice" role="img" width="100%"
                xmlns="http://www.w3.org/2000/svg"
                style="background-image: url('{{ $alumno->getPath() }}');
                       background-size: cover;
                       background-position: center center;">
                <title>Placeholder</title>
                <rect width="100%" height="100%" fill="#55595c11"></rect>
            </svg>
            <div class="card-body">
                <p class="card-text">
                    <h5>{{ $alumno->nombre }} {{ $alumno->apellidos }}</h5> <br>
                    <p>Teléfono: {{ $alumno->telefono }}</p> <br>
                    <p>Correo: {{ $alumno->correo }}</p> <br>
                    <p>Fecha de nacimiento: {{ $alumno->nacimiento }}</p> <br>
                    <p>Nota media: {{ $alumno->nota }}</p> <br>
                    <p>Experiencia: {{ $alumno->experiencia }}</p> <br>
                    <p>Formación: {{ $alumno->formacion }}</p> <br>
                    <p>Habilidades: {{ $alumno->habilidades }}</p> <br>
                </p>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                        <a href="{{ route('alumno.show', $alumno->id) }}" class="btn btn-sm btn-outline-secondary">Ver</a>
                        <a href="{{ route('alumno.edit', $alumno->id) }}" class="btn btn-sm btn-outline-secondary">Editar</a>
                    </div>
                    <small class="text-body-secondary">{{ $alumno->nombre }} {{ $alumno->apellidos }}</small>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>

@endsection