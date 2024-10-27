<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Registro;
use App\Models\VoucherValidado;
use App\Models\Matriculado;

class MatriculadoController extends Controller
{
    public function registrarAlumno(Request $request)
{
    // Validar el DNI recibido
    $dni = $request->input('dni');

    // Verificar si el DNI es válido
    if (empty($dni) || strlen($dni) < 8) {
        return redirect()->route('form.registrar.alumno')->with('error', 'DNI inválido. Asegúrate de que el DNI tenga al menos 8 caracteres.');
    }

    // Verificar si el alumno está registrado
    $registro = Registro::where('dni', $dni)->first();

    if (!$registro) {
        return redirect()->route('form.registrar.alumno')->with('error', 'Alumno no registrado con el DNI proporcionado.');
    }

    // Verificar si el voucher está validado
    $voucher = VoucherValidado::where('dni_codigo', $dni)->first();

    if (!$voucher) {
        return redirect()->route('form.registrar.alumno')->with('error', 'Voucher no encontrado o no validado para el DNI proporcionado.');
    }

    // Verificar si el DNI ya está registrado en la tabla Matriculado
    $matriculadoExistente = Matriculado::where('dni', $dni)->first();

    if ($matriculadoExistente) {
        return redirect()->route('form.registrar.alumno')->with('error', 'DNI ya registrado en la matrícula.');
    }

    // Registrar al alumno en la tabla `matriculados`
    Matriculado::create([
        'nombres' => $registro->nombres,
        'apellidos' => $registro->apellidos,
        'dni' => $registro->dni,
        'registro_id' => $registro->id,
        'voucher_validado_id' => $voucher->id,
        'user_id' => auth()->user()->id,
        'matricula_id' => 1,
    ]);

    return redirect()->route('form.registrar.alumno')->with('success', 'Alumno registrado con éxito');
}

    

    public function showForm()
    {
        $registros = Registro::all(); // Obtener todos los registros
        $matriculados = Matriculado::all(); // Obtener todos los matriculados

        return view('registrar-alumno', compact('registros', 'matriculados'));
    }
}
