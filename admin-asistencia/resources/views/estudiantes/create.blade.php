<!-- resources/views/estudiantes/create.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Crear Estudiante</h1>
        <form action="{{ route('estudiantes.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>
            <div class="form-group">
                <label for="codigo">Código:</label>
                <input type="text" class="form-control" id="codigo" name="codigo" required>
            </div>
            <button type="submit" class="btn btn-primary">Crear</button>
        </form>
    </div>
@endsection
