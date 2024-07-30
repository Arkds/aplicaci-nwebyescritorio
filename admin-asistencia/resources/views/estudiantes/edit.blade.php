<!-- resources/views/estudiantes/edit.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Estudiante</h1>
    <form action="{{ route('estudiantes.update', $estudiante->id) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre', $estudiante->nombre) }}" required>
        </div>
        <div class="form-group">
            <label for="codigo">Código</label>
            <input type="text" class="form-control" id="codigo" name="codigo" value="{{ old('codigo', $estudiante->codigo) }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Guardar cambios</button>
        <a href="{{ route('estudiantes.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
