<!-- resources/views/docentes/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Docentes</h1>
        <a href="{{ route('docentes.create') }}" class="btn btn-primary mb-3">Crear Docente</a>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>DNI</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($docentes as $docente)
                    <tr>
                        <td>{{ $docente->id }}</td>
                        <td>{{ $docente->nombre }}</td>
                        <td>{{ $docente->dni }}</td>
                        <td>
                            <a href="{{ route('docentes.edit', $docente->id) }}" class="btn btn-warning btn-sm">Editar</a>
                            <form action="{{ route('docentes.destroy', $docente->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('POST') <!-- Cambia esto a DELETE si estás utilizando el método DELETE -->
                                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                            </form>
                            <a href="{{ route('docentes.asistencias', $docente->id) }}" class="btn btn-info btn-sm">Ver Asistencias</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
