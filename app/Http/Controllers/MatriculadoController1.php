<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registro;
use App\Models\Matriculado;

class MatriculadoController1 extends Controller
{
    public function showMatriculados(Request $request)
    {
        // Inicializa las variables para la búsqueda y filtros
        $query = Matriculado::query();

        // Filtrar por fecha (si se proporciona)
        if ($request->has('fecha_inicio') && $request->has('fecha_fin')) {
            $query->whereBetween('created_at', [$request->input('fecha_inicio'), $request->input('fecha_fin')]);
        }

        // Buscar por DNI (si se proporciona)
        if ($request->has('dni')) {
            $query->where('dni', $request->input('dni'));
        }

        // Obtener todos los matriculados según los filtros
        $matriculados = $query->get();

        return view('matriculados.index', compact('matriculados'));
    }

    public function showRegistros(Request $request)
    {
        // Inicializa las variables para la búsqueda
        $query = Registro::query();

        // Buscar por DNI (si se proporciona)
        if ($request->has('dni')) {
            $query->where('dni', $request->input('dni'));
        }

        // Buscar por nombre (si se proporciona)
        if ($request->has('nombre')) {
            $query->where('nombres', 'LIKE', '%' . $request->input('nombre') . '%')
                  ->orWhere('apellidos', 'LIKE', '%' . $request->input('nombre') . '%');
        }

        // Obtener todos los registros según los filtros
        $registros = $query->get();

        return view('registros.index', compact('registros'));
    }
}