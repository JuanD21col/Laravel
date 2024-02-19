@extends('layout/template')

@section('title', 'Maestros | Escuela')

@section('contenido')

<main>
    <div class="container py-4">
        <h2>Listado de maestros</h2>

        <a href="{{ url('maestros/create') }}" class="btn btn-primary btn-sm">Nuevo registro</a>

        <table class="table table-hover">

        <thead>
            <tr>
                <th>#</th>
                <th>Nit</th>
                <th>Nombre</th>
                <th>Fecha Nacimiento</th>
                <th>Telefono</th>
                <th>Email</th>
                <th>Carrera</th>
                <th></th>
                <th></th>
            </tr>
        </thead>

        <tbody>
            @foreach($maestros as $maestro)
            <tr>
                <td>{{ $maestro->id }}</td>
                <td>{{ $maestro->nit }}</td>
                <td>{{ $maestro->nombre }}</td>
                <td>{{ $maestro->fecha_nacimiento }}</td>
                <td>{{ $maestro->telefono }}</td>
                <td>{{ $maestro->email }}</td>
                <td>{{ $maestro->carrera->nombre }}</td>
                <td><a href="{{ url('maestros/'.$maestro->id.'/edit' ) }}" class="btn btn-warning btn-sm">Editar</a></td>
                <td>
                    <form action="{{ url('maestros/'.$maestro->id) }}" method="post">
                        @method("DELETE")
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>

        </table>

    </div>
</main>