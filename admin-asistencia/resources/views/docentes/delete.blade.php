<!-- resources/views/docentes/delete.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Eliminar Docente</h1>
    <form action="{{ route('docentes.destroy', $docente->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <div class="alert alert-danger">
            <strong>¿Estás seguro de que quieres eliminar al docente "{{ $docente->nombre }}"?</strong>
        </div>
        <button type="submit" class="btn btn-danger">Eliminar</button>
        <a href="{{ route('docentes.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
