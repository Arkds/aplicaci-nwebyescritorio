<!-- resources/views/docentes/asistencias.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Asistencias del Docente {{ $docente->nombre }}</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Hora de Llegada</th>
                    <th>Hora de Salida</th>
                </tr>
            </thead>
            <tbody>
                @foreach($asistencias as $asistencia)
                    <tr>
                        <td>{{ $asistencia->id }}</td>
                        <td>{{ $asistencia->hora_llegada }}</td>
                        <td>{{ $asistencia->hora_salida }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ route('docentes.index') }}" class="btn btn-primary">Volver a la lista de Docentes</a>
    </div>
@endsection
