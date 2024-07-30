<!-- resources/views/docentes/create.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Crear Docente</h1>
        <form action="{{ route('docentes.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>
            <div class="form-group">
                <label for="dni">DNI:</label>
                <input type="text" class="form-control" id="dni" name="dni" required>
            </div>
            <button type="submit" class="btn btn-primary">Crear</button>
        </form>
    </div>
@endsection
