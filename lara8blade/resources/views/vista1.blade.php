@extends('layouts.vistapadre')

@section('contenidoPrincipal')
    <h2>Contenido de la VISTA 1</h2>
    <div class="card">
    <div class="card-header">
        Featured
    </div>
    <div class="card-body">
        <h5 class="card-title">Special title treatment</h5>
        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
        <a href="#" class="btn btn-primary">Go somewhere</a>
    </div>
    </div>
    
@if (count($users)===1)
  <span class="badge bg-primary">Hay un solo elemento en el arreglo</span>
@elseif  (count($users) > 1)   
  <span class="badge bg-success">Hay muchos elementos en el arreglo</span>
 @else
  <span class="badge bg-danger">No hay elementos</span>
@endif   

@php
    echo 'esto es un texto de prueba';
@endphp

<ul>
  @for ($i = 0; $i < 10; $i++)
    <li>el valor de i es: {{$i}} </li>
  @endfor  
</ul>

<ul>
  @foreach  ($users as $user)
    <li>{{$user}}</li>
  @endforeach
</ul>

@endsection