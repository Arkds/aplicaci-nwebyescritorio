<?php

// app/Http/Controllers/EstudianteController.php

// app/Http/Controllers/EstudianteController.php

namespace App\Http\Controllers;

// app/Http/Controllers/EstudianteController.php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use Illuminate\Http\Request;

class EstudianteController extends Controller
{
    public function index()
    {
        $estudiantes = Estudiante::all();
        return view('estudiantes.index', compact('estudiantes'));
    }

    public function create()
    {
        return view('estudiantes.create');
    }

    public function store(Request $request)
    {
        Estudiante::create($request->all());
        return redirect()->route('estudiantes.index');
    }

    public function edit($id)
    {
        $estudiante = Estudiante::find($id);
        return view('estudiantes.edit', compact('estudiante'));
    }

    public function update(Request $request, $id)
    {
        $estudiante = Estudiante::find($id);
        $estudiante->update($request->all());
        return redirect()->route('estudiantes.index');
    }

    public function destroy($id)
    {
        Estudiante::destroy($id);
        return redirect()->route('estudiantes.index');
    }
}
