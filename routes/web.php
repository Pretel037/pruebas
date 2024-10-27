<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\MatriculadoController;
use App\Http\Controllers\MatriculadoController1;




use App\Http\Controllers\PageController;
Route::get('/registro', [RegistroController::class, 'create'])->name('registro.create');
Route::post('/registro', [RegistroController::class, 'store'])->name('registro.store');



// LOGIN
Route::get('loginM', [AdminLoginController::class, 'showLoginForm'])->name('loginM');
Route::post('loginM', [AdminLoginController::class, 'login']);

// Rutas protegidas por autenticación
Route::group(['middleware' => 'auth'], function () {
    
    Route::get('/sistema_Matricula', function () {
        return view('sistema_Matricula');
    })->name('sistema_Matricula');

    Route::get('registrar-alumno', [MatriculadoController::class, 'showForm'])->name('form.registrar.alumno');
    Route::post('registrar-alumno', [MatriculadoController::class, 'registrarAlumno']);

    // Rutas para mostrar matriculados
    Route::get('/matriculados', [MatriculadoController1::class, 'showMatriculados'])->name('matriculados.index');

    // Rutas para mostrar registros
    Route::get('/registros', [MatriculadoController1::class, 'showRegistros'])->name('registros.index');

    Route::post('/logout', [AdminLoginController::class, 'logout'])->name('logout');
});
