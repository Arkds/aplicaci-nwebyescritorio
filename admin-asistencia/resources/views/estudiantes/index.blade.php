<!-- resources/views/estudiantes/index.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Estudiantes</h1>
    <a href="{{ route('estudiantes.create') }}" class="btn btn-primary">Agregar Estudiante</a>
    <table class="table">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Código</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($estudiantes as $estudiante)
            <tr>
                <td>{{ $estudiante->nombre }}</td>
                <td>{{ $estudiante->codigo }}</td>
                <td>
                    <a href="{{ route('estudiantes.edit', $estudiante->id) }}" class="btn btn-warning">Editar</a>
                    <form action="{{ route('estudiantes.destroy', $estudiante->id) }}" method="POST" style="display:inline;">
                        @csrf
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                    <a href="{{ route('asistencias.index', $estudiante->id) }}" class="btn btn-info">Ver Asistencias</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
