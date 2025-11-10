@extends('template.base')

@section('scripts')
<script src="https://kit.fontawesome.com/ec3e7e2cc5.js" crossorigin="anonymous"></script>
@endsection

@section('content')
@php
//use Carbon\Carbon;
@endphp
<header class="masthead" style="background-image: url('{{ route('fotografia.view', $alumno->id) }}')">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="post-heading">
                    <h1>{{ $alumno->nombre }}</h1>
                    <h2 class="subheading">{{ $alumno->apellidos }}</h2>
                    <span class="meta">
                        Creado por {{ $alumno->nombre }} en {{ $alumno->created_at->format('F d, Y') }}
                        @if($alumno->updated_at != $alumno->created_at)
                            , editado en {{ $alumno->updated_at->format('F d, Y') }}
                        @endif
                    </span>
                </div>
            </div>
        </div>
    </div>
</header>
<article class="mb-4">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <br>
                <p>Teléfono: <h5>{{ $alumno->telefono }}</h5></p>
                <p>Correo: <h5>{{ $alumno->correo }}</h5></p>
                <p>Fecha de nacimiento: <h5>{{ $alumno->nacimiento }}</h5></p>
                <p>Nota media: <h5>{{ $alumno->nota }}</h5></p>
                <p>Experiencia: <h5>{{ $alumno->experiencia }}</h5></p>
                <p>Formación: <h5>{{ $alumno->formacion }}</h5></p>
                <p>Habilidades: <h5>{{ $alumno->habilidades }}</h5></p>
            </div>
        </div>
    </div>
</article>
<footer class="border-top">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <ul class="list-inline text-center">
                    <li class="list-inline-item">
                        <a href="#!">
                            <span class="fa-stack fa-lg">
                                <i class="fas fa-circle fa-stack-2x"></i>
                                <i class="fab fa-twitter fa-stack-1x fa-inverse"></i>
                            </span>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="#!">
                            <span class="fa-stack fa-lg">
                                <i class="fas fa-circle fa-stack-2x"></i>
                                <i class="fab fa-facebook-f fa-stack-1x fa-inverse"></i>
                            </span>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="#!">
                            <span class="fa-stack fa-lg">
                                <i class="fas fa-circle fa-stack-2x"></i>
                                <i class="fab fa-github fa-stack-1x fa-inverse"></i>
                            </span>
                        </a>
                    </li>
                </ul>
            <div class="small text-center text-muted fst-italic">&copy; Cvs App {{ $year }}</div>
        </div>
    </div>
</footer>
@endsection