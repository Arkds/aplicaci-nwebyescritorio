<?php

namespace App\Http\Controllers;
use App\Models\Asistencia; // Asegúrate de importar el modelo aquí

use App\Models\Docente;
use Illuminate\Http\Request;

class DocenteController extends Controller
{
    public function index()
    {
        $docentes = Docente::all();
        return view('docentes.index', compact('docentes'));
    }

    public function create()
    {
        return view('docentes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'dni' => 'required|string|max:255',
        ]);

        Docente::create($request->all());
        return redirect()->route('docentes.index')->with('success', 'Docente creado exitosamente');
    }

    public function edit($id)
    {
        $docente = Docente::findOrFail($id);
        return view('docentes.edit', compact('docente'));
    }

    public function showAsistencias($id)
    {
        $docente = Docente::find($id);
        if (!$docente) {
            return redirect()->route('docentes.index')->with('error', 'Docente no encontrado');
        }

        $asistencias = Asistencia::where('persona_id', $id)
                                  ->where('tipo_persona', 'docente')
                                  ->get();

        return view('docentes.asistencias', compact('docente', 'asistencias'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'dni' => 'required|string|max:255',
        ]);

        $docente = Docente::findOrFail($id);
        $docente->update($request->all());
        return redirect()->route('docentes.index')->with('success', 'Docente actualizado exitosamente');
    }

    public function destroy($id)
    {
        Docente::destroy($id);
        return redirect()->route('docentes.index')->with('success', 'Docente eliminado exitosamente');
    }
}
