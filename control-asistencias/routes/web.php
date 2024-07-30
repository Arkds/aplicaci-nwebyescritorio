<?php

use App\Http\Controllers\AsistenciaController;

Route::get('/asistencias', [AsistenciaController::class, 'index']);
Route::post('/asistencias/registrar', [AsistenciaController::class, 'registrar']);
