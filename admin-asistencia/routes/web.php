<?php

// routes/web.php
use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\DocenteController;
use App\Http\Controllers\AsistenciaController;



// Estudiantes
Route::get('estudiantes', [EstudianteController::class, 'index'])->name('estudiantes.index');
Route::get('estudiantes/create', [EstudianteController::class, 'create'])->name('estudiantes.create');
Route::post('estudiantes', [EstudianteController::class, 'store'])->name('estudiantes.store');
Route::get('estudiantes/edit/{id}', [EstudianteController::class, 'edit'])->name('estudiantes.edit');
Route::post('estudiantes/update/{id}', [EstudianteController::class, 'update'])->name('estudiantes.update');
Route::post('estudiantes/delete/{id}', [EstudianteController::class, 'destroy'])->name('estudiantes.destroy');
Route::get('estudiantes/{id}/asistencias', [AsistenciaController::class, 'index'])->name('asistencias.index');


// Docentes
Route::get('docentes', [DocenteController::class, 'index'])->name('docentes.index');
Route::get('docentes/create', [DocenteController::class, 'create'])->name('docentes.create');
Route::post('docentes', [DocenteController::class, 'store'])->name('docentes.store');
Route::get('docentes/edit/{id}', [DocenteController::class, 'edit'])->name('docentes.edit');
Route::post('docentes/update/{id}', [DocenteController::class, 'update'])->name('docentes.update');
Route::post('docentes/delete/{id}', [DocenteController::class, 'destroy'])->name('docentes.destroy');
Route::get('docentes/{id}/asistencias', [DocenteController::class, 'showAsistencias'])->name('docentes.asistencias');
