<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.admin-login'); // Vista personalizada para el login de admin
    }

    public function login(Request $request)
    {
        // Validar los datos del formulario
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        // Intentar autenticar solo si el rol es admin
        if (Auth::attempt(array_merge($credentials, ['role' => 'admin']))) {
            // Autenticación exitosa y rol es admin
            return redirect()->intended('/sistema_Matricula'); // Redirigir a la página deseada
        }

        // Si falla la autenticación, redirigir de nuevo con un mensaje de error
        return redirect()->route('loginM')->withErrors([
            'email' => 'Las credenciales no coinciden o no tienes permisos.',
        ]);
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('loginM');
    }
}
