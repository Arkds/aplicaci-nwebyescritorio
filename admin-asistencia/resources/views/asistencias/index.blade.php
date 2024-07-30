@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Reporte de Asistencia</h1>
    <div class="card">
        <div class="card-header">
            <h5>Asistencias Registradas</h5>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre del Estudiante</th>
                        <th>Hora de Llegada</th>
                        <th>Hora de Salida</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($asistencias as $asistencia)
                        <tr>
                            <td>{{ $asistencia->id }}</td>
                            <td>{{ $asistencia->estudiante->nombre }}</td>
                            <td>{{ $asistencia->hora_llegada }}</td>
                            <td>{{ $asistencia->hora_salida }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <a href="{{ route('estudiantes.index') }}" class="btn btn-primary mt-3">Volver a la lista de Estudiantes</a>
        </div>
    </div>
</div>
@endsection
