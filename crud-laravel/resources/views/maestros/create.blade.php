@extends('layout/template')

@section('title', 'Registrar Maestro | Escuela')

@section('contenido')
<main>
    <div class="container py-4">
        <h2>Registrar Maestro</h2>

        @if ($errors->any())

        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <ul>
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

        @endif

        <form action="{{ url('maestros') }}" method="post">
            
            @csrf
            
            <div class="mb-3 row">
                <label for="nit" class="col-sm-2 col-form-label">Nit</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" name="nit" id="nit" value="{{ old('nit') }}">
                </div>
            </div>

            <div class="mb-3 row">
                <label for="nombre" class="col-sm-2 col-form-label">Nombre Completo:</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" name="nombre" id="nombre" value="{{ old('nombre') }}" required>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="fecha" class="col-sm-2 col-form-label">Fecha de nacimiento:</label>
                <div class="col-sm-5">
                    <input type="date" class="form-control" name="fecha" id="fecha" value="{{ old('fecha') }}" required>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="telefono" class="col-sm-2 col-form-label">Telefono</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" name="telefono" id="telefono" value="{{ old('telefono') }}" required>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" name="email" id="email" value="{{ old('email') }}">
                </div>
            </div>  

            <div class="mb-3 row">
                <label for="carrera" class="col-sm-2 col-form-label">Carrera:</label>
                <div class="col-sm-5">
                    <select name="carrera" id="carrera" class="form-select" required>
                        <option value="">Seleccionar carrera</option>
                        @foreach($carreras as $carrera)
                        <option value="{{ $carrera->id }}">{{ $carrera->nombre }}</option>
                        @endforeach
                    </select>
                </div>
            </div>  

            <a href="{{ url('maestros') }}" class="btn btn-secondary">Regresar</a>
            
            <button type="submit" class="btn btn-success">Guardar</button>

        </form>

    </div>
</main>