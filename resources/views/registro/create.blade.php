<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Registro</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* Variables de color */
        :root {
            --primary-color: #4776E6;
            --secondary-color: #8E54E9;
            --text-color: #2d3436;
            --error-color: #e74c3c;
            --success-color: #2ecc71;
            --input-bg: #f5f6fa;
            --shadow-color: rgba(0, 0, 0, 0.1);
        }

        /* Estilos generales */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            min-height: 100vh;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        /* Contenedor del formulario */
        .form-container {
            background: white;
            padding: 2.5rem;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
            width: 100%;
            max-width: 500px;
            animation: slideUp 0.5s ease-out;
        }

        /* Encabezado */
        .form-header {
            text-align: center;
            margin-bottom: 2rem;
        }

        .form-header h1 {
            color: var(--text-color);
            font-size: 2rem;
            margin-bottom: 0.5rem;
        }

        .form-header p {
            color: #636e72;
            font-size: 0.95rem;
        }

        /* Grupos de campos */
        .form-group {
            margin-bottom: 1.5rem;
            position: relative;
        }

        .input-group {
            position: relative;
            display: flex;
            align-items: center;
        }

        .input-icon {
            position: absolute;
            left: 15px;
            color: #636e72;
            font-size: 1.1rem;
        }

        /* Etiquetas */
        label {
            display: block;
            margin-bottom: 0.5rem;
            color: var(--text-color);
            font-weight: 500;
            font-size: 0.9rem;
        }

        /* Campos de entrada */
        input,
        select {
            width: 100%;
            padding: 12px 40px;
            border: 2px solid transparent;
            border-radius: 10px;
            background: var(--input-bg);
            color: var(--text-color);
            font-size: 0.95rem;
            transition: all 0.3s ease;
        }

        input:focus,
        select:focus {
            outline: none;
            border-color: var(--primary-color);
            background: white;
        }

        /* Botón */
        .submit-btn {
            width: 100%;
            padding: 14px;
            border: none;
            border-radius: 10px;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 1rem;
        }

        .submit-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        /* Mensajes */
        .success-message {
            background: rgba(46, 204, 113, 0.1);
            color: var(--success-color);
            padding: 1rem;
            border-radius: 10px;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            animation: fadeIn 0.5s ease-out;
        }

        .success-message i {
            margin-right: 10px;
        }

        .error-message {
            color: var(--error-color);
            font-size: 0.8rem;
            margin-top: 0.5rem;
            display: flex;
            align-items: center;
        }

        .error-message i {
            margin-right: 5px;
        }

        /* Grid para campos relacionados */
        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
        }

        /* Animaciones */
        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        /* Responsive */
        @media (max-width: 600px) {
            .form-grid {
                grid-template-columns: 1fr;
            }
            
            .form-container {
                padding: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <div class="form-container">
        <div class="form-header">
            <h1>Registro de Usuario</h1>
            <p>Por favor, complete todos los campos del formulario</p>
        </div>

        @if (session('success'))
            <div class="success-message">
                <i class="fas fa-check-circle"></i>
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('registro.store') }}" method="POST">
            @csrf

            <div class="form-grid">
                <div class="form-group">
                    <label for="nombres">Nombres:</label>
                    <div class="input-group">
                        <i class="fas fa-user input-icon"></i>
                        <input type="text" id="nombres" name="nombres" value="{{ old('nombres') }}" placeholder="Ingrese sus nombres">
                    </div>
                    @error('nombres')
                        <div class="error-message">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="apellidos">Apellidos:</label>
                    <div class="input-group">
                        <i class="fas fa-user-tag input-icon"></i>
                        <input type="text" id="apellidos" name="apellidos" value="{{ old('apellidos') }}" placeholder="Ingrese sus apellidos">
                    </div>
                    @error('apellidos')
                        <div class="error-message">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>

            <div class="form-grid">
                <div class="form-group">
                    <label for="dni">DNI:</label>
                    <div class="input-group">
                        <i class="fas fa-id-card input-icon"></i>
                        <input type="text" id="dni" name="dni" value="{{ old('dni') }}" placeholder="Ingrese su DNI">
                    </div>
                    @error('dni')
                        <div class="error-message">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="celular">Celular:</label>
                    <div class="input-group">
                        <i class="fas fa-mobile-alt input-icon"></i>
                        <input type="text" id="celular" name="celular" value="{{ old('celular') }}" placeholder="Ingrese su celular">
                    </div>
                    @error('celular')
                        <div class="error-message">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>

            <div class="form-grid">
                <div class="form-group">
                    <label for="edad">Edad:</label>
                    <div class="input-group">
                        <i class="fas fa-birthday-cake input-icon"></i>
                        <input type="number" id="edad" name="edad" value="{{ old('edad') }}" placeholder="Ingrese su edad">
                    </div>
                    @error('edad')
                        <div class="error-message">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="sexo">Sexo:</label>
                    <div class="input-group">
                        <i class="fas fa-venus-mars input-icon"></i>
                        <select id="sexo" name="sexo">
                            <option value="" disabled selected>Seleccione su género</option>
                            <option value="M" {{ old('sexo') == 'M' ? 'selected' : '' }}>Masculino</option>
                            <option value="F" {{ old('sexo') == 'F' ? 'selected' : '' }}>Femenino</option>
                        </select>
                    </div>
                    @error('sexo')
                        <div class="error-message">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
                <div class="input-group">
                    <i class="fas fa-calendar-alt input-icon"></i>
                    <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" value="{{ old('fecha_nacimiento') }}">
                </div>
                @error('fecha_nacimiento')
                    <div class="error-message">
                        <i class="fas fa-exclamation-circle"></i>
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <button type="submit" class="submit-btn">
                <i class="fas fa-user-plus"></i>
                Completar Registro
            </button>
        </form>
    </div>
</body>
</html>