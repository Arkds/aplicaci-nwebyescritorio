<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Asistencia;
use App\Models\Estudiante;
use App\Models\Docente;

class AsistenciaController extends Controller
{
    public function index()
    {
        return view('asistencia.index');
    }

    public function registrar(Request $request)
    {
        $request->validate([
            'codigo' => 'nullable|string',
            'dni' => 'nullable|string',
            'tipo_registro' => 'required|string|in:entrada,salida',
        ]);

        $hora_actual = now();

        try {
            if ($request->has('codigo') && $request->codigo) {
                $estudiante = Estudiante::where('codigo', $request->codigo)->first();
                if ($estudiante) {
                    if ($request->tipo_registro === 'entrada') {
                        // Registrar la entrada
                        Asistencia::create([
                            'persona_id' => $estudiante->id,
                            'tipo_persona' => 'estudiante',
                            'hora_llegada' => $hora_actual,
                            'hora_salida' => null,
                        ]);
                        return response()->json(['message' => 'Entrada registrada para el estudiante.']);
                    } elseif ($request->tipo_registro === 'salida') {
                        // Registrar la salida
                        // Buscar el último registro de entrada pendiente
                        $asistencia = Asistencia::where([
                            ['persona_id', $estudiante->id],
                            ['tipo_persona', 'estudiante'],
                            ['hora_salida', null]
                        ])->latest()->first();
                        
                        if ($asistencia) {
                            $asistencia->update([
                                'hora_salida' => $hora_actual
                            ]);
                            return response()->json(['message' => 'Salida registrada para el estudiante.']);
                        } else {
                            return response()->json(['message' => 'No hay una entrada pendiente para registrar la salida.'], 400);
                        }
                    }
                } else {
                    return response()->json(['message' => 'Código de estudiante no válido.'], 404);
                }
            }

            if ($request->has('dni') && $request->dni) {
                $docente = Docente::where('dni', $request->dni)->first();
                if ($docente) {
                    if ($request->tipo_registro === 'entrada') {
                        // Registrar la entrada
                        Asistencia::create([
                            'persona_id' => $docente->id,
                            'tipo_persona' => 'docente',
                            'hora_llegada' => $hora_actual,
                            'hora_salida' => null,
                        ]);
                        return response()->json(['message' => 'Entrada registrada para el docente.']);
                    } elseif ($request->tipo_registro === 'salida') {
                        // Registrar la salida
                        // Buscar el último registro de entrada pendiente
                        $asistencia = Asistencia::where([
                            ['persona_id', $docente->id],
                            ['tipo_persona', 'docente'],
                            ['hora_salida', null]
                        ])->latest()->first();
                        
                        if ($asistencia) {
                            $asistencia->update([
                                'hora_salida' => $hora_actual
                            ]);
                            return response()->json(['message' => 'Salida registrada para el docente.']);
                        } else {
                            return response()->json(['message' => 'No hay una entrada pendiente para registrar la salida.'], 400);
                        }
                    }
                } else {
                    return response()->json(['message' => 'DNI de docente no válido.'], 404);
                }
            }

            return response()->json(['message' => 'Código o DNI requerido.'], 400);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error interno del servidor.'], 500);
        }
    }
}
