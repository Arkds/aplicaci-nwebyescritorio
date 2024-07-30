<?php

// app/Http/Controllers/AsistenciaController.php

// app/Http/Controllers/AsistenciaController.php

// app/Http/Controllers/AsistenciaController.php

// app/Http/Controllers/AsistenciaController.php

namespace App\Http\Controllers;

use App\Models\Asistencia;
use App\Models\Estudiante;
use Illuminate\Http\Request;

class AsistenciaController extends Controller
{
    public function index($id)
    {
        $asistencias = Asistencia::where('persona_id', $id)
            ->where('tipo_persona', 'estudiante')
            ->with('estudiante') // Incluye la relación estudiante
            ->get();

        return view('asistencias.index', compact('asistencias'));
    }
}
