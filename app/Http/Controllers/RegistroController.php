<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registro; 
class RegistroController extends Controller
{
    // Muestra el formulario de registro
    public function create()
    {
        return view('registro.create');
    }

    // Procesa el registro y guarda los datos en la base de datos
    public function store(Request $request)
{
    // Validación de los datos
    $request->validate([
        'nombres' => 'required|string|max:255',
        'apellidos' => 'required|string|max:255',
        'dni' => 'required|numeric|digits:8',
        'celular' => 'required|numeric|digits:9',
        'edad' => 'required|integer|min:0',
        'sexo' => 'required|in:M,F',
        'fecha_nacimiento' => 'required|date',
    ]);

    // Verificar si el DNI ya está registrado
    $existingRegistro = Registro::where('dni', $request->dni)->first();

    if ($existingRegistro) {
        // Redirige o muestra un mensaje de error si el DNI ya está registrado
        return redirect()->route('registro.create')->with('error', 'El DNI ya está registrado.');
    }

    // Creación del registro en la base de datos
    Registro::create($request->all());

    // Redirige o muestra un mensaje de éxito
    return redirect()->route('registro.create')->with('success', 'Registro exitoso');
}
}
