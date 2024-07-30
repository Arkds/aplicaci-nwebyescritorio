<!-- resources/views/estudiantes/delete.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Eliminar Estudiante</h1>
    <form action="{{ route('estudiantes.destroy', $estudiante->id) }}" method="POST">
        @csrf
        <p>¿Está seguro de que desea eliminar este estudiante?</p>
        <button type="submit" class="btn btn-danger">Eliminar</button>
        <a href="{{ route('estudiantes.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
